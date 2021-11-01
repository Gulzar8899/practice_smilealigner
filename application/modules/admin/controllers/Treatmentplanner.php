<?php
/**
 * Controller Name: Admin
 * Description: back end admin
 * @author Surfiq Tech
 * Created date: 2021-07-04
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Treatmentplanner extends MY_Controller
{
    /**
     * Setting class elements
     * @author Surfiq Tech
     */
    
    public $data;  
    /**
     * function to invoke necessary component
     * @author Surfiq Tech
     */
    function __construct()
    {
        parent::__construct();    
        $this->checkAdminLogin(); 
        $this->adminData = $this->session->userdata('adminData');
        $this->load->model(array("Admin_model"));
    }
    /**
     * @author Surfiq Tech
     */
    public function plannersList()
    {
        $data['admin_data']    = $this->adminData;
        $data['accepted_users'] = $this->Admin_model->plannersList();
        $data['shipping_address'] = $this->Admin_model->getDoctorShippingAddress();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('TreatmentPlanner/indexList.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function plannersGrid()
    {
        $data['admin_data']    = $this->adminData;
        $data['accepted_users'] = $this->Admin_model->plannersList();
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('TreatmentPlanner/indexGrid',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function profile()
    {
        $data['admin_data']    = $this->adminData;
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('doctor/profile.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function addPlanner()
    {
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];
        $data['doctor_data'] = $this->Admin_model->getDoctorByID($adminID);
        $data['countries'] = $this->Admin_model->getAllCountries();
        $data['states'] = $this->Admin_model->getAllStates();
        $data['cities'] = $this->Admin_model->getAllCities();


        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('TreatmentPlanner/add',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function submitPlanner()
    {   
        // echo "<pre>";
        // print_r($this->input->post());
        // die();
        $upload_path = 'assets/uploads/images/';

        $plannerData = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'age' => $this ->input->post('age'),
                'phone_number' => $this->input->post('phone_number'),
                'password' => sha1($this->input->post('password')),
                'profile_image' => $this->input->post('planner_img_name'),
                'gender' => $this->input->post('gender'),
                'user_type_id' => 4,
                'is_active' => 1,
                'source' => 0,
                'created' => date('Y-m-d')
        );
        
        $this->db->insert('users',$plannerData);
        $plannerID = $this->db->insert_id();

        if($plannerID){

            $plannerName = $this->input->post('first_name')." ".$this->input->post('last_name');
            $plannerEmail = $this->input->post('email');
            $plannerPassword = $this->input->post('password');
            $site_url = site_url();
            $link = '<a href="'.$site_url.'" target="_blank"><span style="">Click Here</span></a>';

            $subject = "SmileAligners";
            $message = "Welcome to SmileAligners. To log in, use your credentials as shown below:";
            $message .= "<br>";
            $message .= "Username: ".$plannerEmail;
            $message .= "<br>";
            $message .= "Password: ".$plannerPassword;
            $message .= "<br>";
            $message .= "Please use the following link to log in: Click here: ".$link;

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: SmileAligners <admin@smilealigners.in>' . "\r\n";

            $mailRes = mail($plannerEmail,$subject,$message,$headers);
        }


        $randomTreatmentID = $this->input->post('randomTreatmentID');
        if($randomTreatmentID){
            $updateData['doctor_id'] = $plannerID;
            $result = $this->Admin_model->updateIDShippingAddress($randomTreatmentID, $updateData);
        }

        if($plannerID)
        {
            $this->session->set_flashdata('success','Treatment Planner Added!');
            redirect('admin/treatmentplanner/plannersList');
        }
        else{
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('admin/treatmentplanner/plannersList');
        }
    }
    public function edit($id)
    {
        $data['admin_data']    = $this->adminData;
        $data['planner_data'] = $this->Admin_model->getDoctorByID($id);

        $data['countries'] = $this->Admin_model->getAllCountries();
        $data['states'] = $this->Admin_model->getAllStates();
        $data['cities'] = $this->Admin_model->getAllCities();
        $data['treatment_address'] = $this->Admin_model->getShipppingAddress($id);


        // echo "<pre>";
        // print_r($data['treatment_address']);
        // die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('TreatmentPlanner/edit',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function udpatePlannerData()
    {


        $upload_path = 'assets/uploads/images/';

        $id = $this->input->post('plannerID');

        $updateData['first_name'] = $this->input->post('first_name');  
        $updateData['last_name'] = $this->input->post('last_name');  
        $updateData['email'] = $this->input->post('email');    
        $updateData['age'] = $this->input->post('age');    
        $updateData['phone_number'] = $this->input->post('phone_number'); 
        if($this->input->post('password')!='') { 
            $updateData['password'] = sha1($this->input->post('password'));  
        }
        if($this->input->post('planner_img_name')!='') {
            $updateData['profile_image'] = $this->input->post('planner_img_name');     
        }
        $updateData['gender'] = $this->input->post('gender');

        $result = $this->Admin_model->udpatePlannerStatus($id , $updateData);
        if($result){
            $this->session->set_flashdata('success', "Treatment Planner Updated");
            redirect('admin/treatmentplanner/plannersList');
         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/treatmentplanner/plannersList');
        }
    }
    public function view($id)
    {
        $data['admin_data']    = $this->adminData;
        $data['planner_data'] = $this->Admin_model->getDoctorByID($id);
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('TreatmentPlanner/show.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function deletePlannerByID()
    {
        $recordID = $this->input->post('recordID');
        $table_name = $this->input->post('table_name');
        $resultData = $this->Admin_model->deleteDoctorByID($recordID, $table_name);
        
        if ($resultData) {
            //$this->session->set_flashdata('success', 'Doctor Deleted');
            $response = array("type"=>"success","message"=>"Treatment Planner Deleted"); 
        } 
        else {
            $this->session->set_flashdata('error', 'Seems to an error. Please try again later.');
            $response = array("type"=>"error","message"=>"Something went wrong"); 

        }

        echo json_encode($response);
        exit;
    } 
    public function doctorimgCrop()
    {
        $data = $_POST['image'];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);

        $image_name = 'assets/uploads/images/' . time() . '.png';
        $fileimage_name =  time() . '.png';

        file_put_contents($image_name, $data);
        echo $fileimage_name;
    }


    // Add Treat Address from ADD Treatment Page
    public  function addTreatAddress(){

        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

        $treatmentID = $this->input->post('treatmentID');
        $checkAll = $this->input->post('checkAll');

        if(!empty($checkAll)){
            $data = array(
                'doctor_id' => $treatmentID,
                'check_all' => 1,
                'added_by' => 1,
            );
        }else{
            $data = array(
                'doctor_id' => $treatmentID,
                // 'street_address' => $this->input->post('shipping_streetaddress'),
                'country' => $this->input->post('shipping_country'),
                'state' => $this->input->post('shipping_state'),
                'city' => $this->input->post('shipping_city'),
                // 'zip_code' => $this->input->post('shipping_zipcode'),
                'added_by' => 1,
            );
        }

        $result = $this->Admin_model->insertShippingAddress($data);
        if($result){
            echo json_encode($result);
            exit;
        } 
    }

    // Delete Treat Address from ADD Treatment Page
    public function deleteTreatAddress(){

        $id = $this->input->post('id');
        $result = $this->Admin_model->deleteShippingAddress($id);
        if($result){
            echo json_encode($result);
            exit;
        } 
    }

    // Add Treatment Address from EDIT Treatment Page
    public  function addTreatmentAddress(){

        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

        $treatmentID = $this->input->post('treatmentID');
        $checkAll = $this->input->post('checkAll');

        if(!empty($checkAll)){
            $data = array(
                'doctor_id' => $treatmentID,
                'check_all' => 1,
                'added_by' => 1,
            );
        }else{
            $data = array(
                'doctor_id' => $treatmentID,
                // 'street_address' => $this->input->post('shipping_streetaddress'),
                'country' => $this->input->post('shipping_country'),
                'state' => $this->input->post('shipping_state'),
                'city' => $this->input->post('shipping_city'),
                // 'zip_code' => $this->input->post('shipping_zipcode'),
                'added_by' => 1,
            );
        }
       
        $result = $this->Admin_model->insertShippingAddress($data);
        // redirect('admin/doctor/editDoctor/'.$doctorID);
        if($result){
            $this->session->set_flashdata('success', "Address Added");
            redirect('admin/treatmentplanner/edit/'.$treatmentID);
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/treatmentplanner/edit/'.$treatmentID);
        }
    }

     // Delete Shipping Address from EDIT Treatment Page
    public function deleteTreatmentAddress()
    {
    
        $recordID = $this->input->post('recordID');
        $table_name = $this->input->post('table_name');
        $resultData = $this->Admin_model->deleteShippingAddress($recordID);

        if ($resultData) {
            // $this->session->set_flashdata('success', 'Address Deleted');
            $response = array("type"=>"success","message"=>"Address Deleted"); 
        } 
        else {
            $this->session->set_flashdata('error', 'Seems to an error. Please try again later.');
            $response = array("type"=>"error","message"=>"Something went wrong"); 
        }

        echo json_encode($response);
        exit;
    }


}