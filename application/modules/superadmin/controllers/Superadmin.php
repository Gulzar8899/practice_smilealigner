<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends MX_Controller{

    private $request_type;
    public function __construct(){
        parent::__construct();
        $this->load->model("Superadmin_model");
        $this->load->library('pagination');
        $no_session_methods = array('login',"check_credential");
        $post_request_method = array('add_new_doctor');
        $current_method = $this->router->method;
        $session_data = $this->session->userdata('admin_data');
        $ajax_method = array("check_credential","add_new_doctor","logout","get_question_answers","change_status","get_doctor_info","edit_doctor","get_orders_page","deactivate_doc","update_password");
        $this->load->library("send_email");
        if(in_array($current_method,$no_session_methods) && !empty($session_data)){
            redirect(base_url("superadmin"));
        }else if(!in_array($current_method,$no_session_methods) && empty($session_data)){
            redirect(base_url("superadmin/login"));
        }
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && in_array($current_method,$ajax_method)){
            $this->request_type = "ajax";
        }else if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && !in_array($current_method,$ajax_method)){
            echo json_encode(array(
                'status' => false,
                'status_code' => "Bad_request",
                'message' => "Invalid request"
            ));
            die;
        }else if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower(@$_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest' && in_array($current_method,$ajax_method)){
            redirect(base_url("superadmin"));
        }else if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower(@$_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest' && !in_array($current_method,$ajax_method)){
            $this->request_type = "normal";
        }

        if($current_method == "add_new_doctor" &&  $this->form_validation->run('add_new_doctor')==false ){
            $error = array($this->form_validation->error_array());
            echo json_encode(array(
                "success"=>false,
                "message"=> "Doctor Information Added Success",
                "values"=>$error
            ));
            die;
        }
    }
    public function index(){
        $total_orders = $this->Superadmin_model->get_count_orders();
        $total_doctors = $this->Superadmin_model->get_count_all_doctors();

        $doctor_data = $this->Superadmin_model->get_all_doctors(0);
        $order_data = $this->Superadmin_model->get_all_orders(0);
        $this->load->admin_template("dashboard",array("doctors"=>$doctor_data->result(),"total_doctors"=>$total_doctors,"total_orders"=>$total_orders,"orders"=>$order_data->result()));
    }
    public function get_orders_page(){
        if($_POST['type'] == "doctor"){
            $total= $this->Superadmin_model->get_count_all_doctors();
            $page_number = $_POST['page_num'];
            $record = (($page_number-1)*10);
            $doctor_data = $this->Superadmin_model->get_all_doctors($record)->result();
            $start_row_id = $total-(($page_number-1)*10);
            $value = $this->load->view("doctor_pagination",array("start_id"=>$start_row_id,"doctors"=>$doctor_data),true);
            echo json_encode(array("success"=>true,"values"=>$value));
        }else{
            $total_orders = $this->Superadmin_model->get_count_orders();
            $page_number = $_POST['page_num'];
            $record = (($page_number - 1) * 10);
            $order_data = $this->Superadmin_model->get_all_orders($record)->result();
            $start_row_id = $total_orders - (($page_number - 1) * 10);
            $value = $this->load->view("order_pagination", array("start_id" => $start_row_id, "orders" => $order_data), true);
            echo json_encode(array("success" => true, "values" => $value));
        }

    }

    public function logout(){
        $this->session->sess_destroy();
        echo json_encode(array(
            "success"=>true,
            "message"=> "Logout success",
        ));
    }
    public function login(){
        $this->load->admin_template("login");
    }
    public function check_credential(){
        $username = $_POST['login_username'];
        $password = $_POST['login_password'];
        echo json_encode($this->Superadmin_model->check_credential($username,$password));

    }
    public function add_new_doctor(){
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $mobile = $_POST['mobile_no'];
        $email = $_POST['email'];
//        $speciality = $_POST['speciality'];
//        $location = $_POST['location'];
        $password = rand(1111111111,9999999999);
        $data = $this->Superadmin_model->add_new_doctor($first_name,$middle_name,$last_name,$mobile,$email,$password);
        if($data){
            $this->send_email->send_mail($email,"Your profile created by <b>Smile Aligners<b>.<br/>Your Username: $email and Password: $password","Profile Created");
            $this->send_email->send_sms("Your profile created by Smile Aligners.\nYour Username: $email and Password: $password",$mobile);
            echo json_encode(array(
                "success"=>true,
                "message"=> "Doctor Information Added Success",
                "values"=>$data->row()
            ));
        }else{
            echo json_encode(array(
                "success"=>false,
                "message"=>"Something went wrong. Please try again"
            ));
        }
    }

    public function get_question_answers(){
        $unique_id = $_POST['unique_id'];
        /*$questions = $this->Superadmin_model->get_all_questions();
        $answers = $this->Superadmin_model->get_all_answers($unique_id);
        $options = explode(",",$answers->row()->options);
        $comments =json_decode("[".$answers->row()->comments."]");
        $patient_name = $answers->row()->patient_name;
        $patient_age = $answers->row()->patient_age;
        $patient_sex = $answers->row()->patient_sex;
        $answers = explode(",",$answers->row()->answers);

        $ques_view = $this->load->view("order_answers",array('questions'=>$questions->result(),'answers'=>$answers,'result_option'=>$options,'comments'=>$comments,
            "patient_name" =>$patient_name,"patient_age"=>$patient_age,"patient_sex"=>$patient_sex),true);
        echo json_encode(array("success"=>true,"value" => $ques_view));*/

        $questions = $this->Superadmin_model->get_all_questions();
        $q_options = $this->Superadmin_model->get_all_q_options();
        $answers = $this->Superadmin_model->get_all_answers2($unique_id)->result();
        $patient_name = $answers[0]->patient_name;
        $patient_age = $answers[0]->patient_age;
        $patient_sex = $answers[0]->patient_sex;
        $patient_address = $answers[0]->patient_address;
        $ques_view = $this->load->view("order_answers2",array('questions'=>$questions->result(),'q_options'=>$q_options->result(),'answers'=>$answers,
            "patient_name" =>$patient_name,"patient_age"=>$patient_age,"patient_sex"=>$patient_sex,"patient_address"=>$patient_address,"patient_id"=>$answers[0]->id),true);


        /*
         * exporting pdf
         */
        $filename = $patient_name."-".$answers[0]->id.".pdf";
        $this->load->library('M_pdf');
        $stylesheet  = '';
        $stylesheet .= file_get_contents(base_url("assets/css/animate.css"));
        $stylesheet .= file_get_contents(base_url("assets/font-awesome/css/font-awesome.css"));
        $stylesheet .= file_get_contents(base_url("assets/css/bootstrap.css"));
        $stylesheet .= file_get_contents(base_url("assets/superadmin/css/admin_panel.css"));
        $stylesheet .= file_get_contents(base_url("assets/superadmin/css/hide_in_pdf.css"));

        $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        $this->m_pdf->pdf->WriteHTML($ques_view,2);
        if (!file_exists('./PDFS/')) {
            mkdir('./PDFS/', 0777, true);
//            mkdir('./PDFS2/', 0777, true);
        }
        $dir_name = './PDFS/';
//        echo "filename:".$filename;
        $this->m_pdf->pdf->Output($dir_name.$filename, "F");

        //pdf ends
        echo json_encode(array("success"=>true,"value" => $ques_view));
    }
    public function change_status(){
        $unique_id = $_POST['unique_id'];
        $status = $_POST['status'];
        $res = $this->Superadmin_model->update_status($unique_id,$status);
        if($res){
            $email = $res->row()->email;
            $mobile = $res->row()->mobile;
            $this->send_email->send_mail($email,"Your order id: $unique_id is $status.","Order Status Changed");
            $this->send_email->send_sms("Your order id: $unique_id is $status. ",$mobile);
            echo json_encode(array("success"=>true,"message"=>"Success"));
        }else{
            echo json_encode(array("success"=>false,"message"=>"Success"));
        }
    }
    public function get_doctor_info(){
        $id = $_POST['doctor_id'];
        $doctor_info = $this->Superadmin_model->get_doctor_info($id)->row();
        echo json_encode(array("success"=>true,"values"=>$doctor_info));
    }
    public function edit_doctor(){
        $id= $_POST['doctor_id'];
        $data['clinic_name'] = $_POST['edit_clinic_name'] ;
        $data['first_name'] = $_POST['edit_first_name'];
        $data['middle_name'] = $_POST['edit_middle_name'];
        $data['last_name'] = $_POST['edit_last_name'];
        $data['email'] = $_POST['edit_email'] ;
        $data['mobile'] = $_POST['edit_mobile'];
        $data['speciality'] = $_POST['edit_speciality'];
        $data['address'] = $_POST['edit_address'];
        $data['city'] = $_POST['edit_city']   ;
        $data['pincode'] = $_POST['edit_pincode'];
        if($this->Superadmin_model->update_doctor_info($id,$data)){
            echo json_encode(array("success"=>true,"Message"=>"Data Updated"));
        }else{
            echo json_encode(array("success"=>false,"Message"=>"Updating Failed. Please try again"));
        }
    }
    public function deactivate_doc()
    {
        $data=array();
        $decativate=$this->Superadmin_model->deactivate_doctor($_POST['doctor_id']);
        if($decativate)
        {
            $data['status']=true;
            $data['msg']="Doctor deactivated";
        }
        else{
            $data['status']=false;
            $data['msg']="Doctor not deactivated";
        }
        echo json_encode($data);
    }

    public function update_password()
    {

        $data=array();
        $new_password=$_POST['new'];
        $confirm_new_password=$_POST['confirm'];
        $current_password=$_POST['old'];
        $user_id=$this->session->userdata('admin_data')['id'];

        if($new_password !=$confirm_new_password)
        {
            $data['status']=false;
            $data['msg']='New password and confirm password are not same !';
        }
        else
        {
            $checkpass=get_data_where('admin_credential',array('id'=>$user_id,'password'=>$current_password));
            if ($checkpass->num_rows() > 0) {
                if(update_data('admin_credential',array('password'=>$confirm_new_password),array('id'=>$user_id)))
                {
                    $data['status']=true;
                    $data['msg']='Password has been reset successfully';
                }
                else{
                    $data['status']=false;
                    $data['msg']='Some technical problem occurred';
                }


            }
            else{
                $data['status']=false;
                $data['msg']='Current password didn\'t match with our record';
            }

        }
        echo json_encode($data);
    }
}
