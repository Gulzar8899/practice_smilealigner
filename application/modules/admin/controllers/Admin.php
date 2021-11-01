<?php
/**
 * Controller Name: Admin
 * Description: back end admin
 * @author Surfiq Tech
 * Created date: 2021-07-02
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MY_Controller
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
    public function index()
    {
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];
        $data['accepted_users'] = $this->Admin_model->acceptedUsers();
        $data['doctor_patients'] = $this->Admin_model->getPatientDocuments($adminID);
        $data['all_documents'] = $this->Admin_model->getAllPatientDocuments();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('admin_body',$data);
        //$this->load->view('doctor/doctorList.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function treatment_planners(){
        $data['admin_data']    = $this->adminData;
        $data['accepted_users'] = $this->Admin_model->plannersList();
        $data['shipping_address'] = $this->Admin_model->getDoctorShippingAddress();

        // $data['doctor_patients'] = $this->Admin_model->getPatientDocuments($adminID);
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        //$this->load->view('admin_body',$data);
        $this->load->view('TreatmentPlanner/indexList.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function business_developers(){
        $data['admin_data']    = $this->adminData;
        $data['accepted_users'] = $this->Admin_model->developersList();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('BusinessDeveloper/indexList.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function doctors(){
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

        $data['accepted_users'] = $this->Admin_model->doctorsList();
        $data['doctor_patients'] = $this->Admin_model->getPatientDocuments($adminID);
        $data['countries'] = $this->Admin_model->getAllCountries($adminID);
        $data['states'] = $this->Admin_model->getAllStates();
        $data['cities'] = $this->Admin_model->getAllCities();  
        $data['shipping_address'] = $this->Admin_model->getDoctorShippingAddress();

        // echo "<pre>";
        // print_r( $data['shipping_address']);
        // die();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        //$this->load->view('admin_body',$data);
        $this->load->view('doctor/doctorList.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function profile()
    {
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];
        $data['adminProfile'] = $this->Admin_model->getDoctorByID($adminID);

        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('admin_profile',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function updateProfile()
    {
        $adminID = $this->input->post('adminID');

        $updateData['first_name'] = $this->input->post('first_name');  
        $updateData['email'] = $this->input->post('email');    

        if($this->input->post('password')!='') { 
            $updateData['password'] = sha1($this->input->post('password'));  
        }

        $result = $this->Admin_model->udpateDoctorStatus($adminID , $updateData);
        if($result){
            $this->session->set_flashdata('success', "Admin data update successfully!");
            redirect('admin/profile');
         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!");
            redirect('admin/profile');
        }
    }
    public function regReq()
    {
        $data['admin_data']    = $this->adminData;
        $data['users'] = $this->Admin_model->getRegUsers();
        $data['accepted_users'] = $this->Admin_model->acceptedUsers();
        $data['declinedUsers'] = $this->Admin_model->declinedUsers();
        $data['pendingUsers'] = $this->Admin_model->pendingUsers();
        $data['shipping_address'] = $this->Admin_model->getDoctorShippingAddress();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('users/regReq',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function viewRegistration($doctorID)
    {
        $data['admin_data']    = $this->adminData;
        $data['doctor_data'] = $this->Admin_model->getDoctorByID($doctorID);
        $data['rejected_data'] = $this->Admin_model->getRejectedByID($doctorID);
        $data['shipping_address'] = $this->Admin_model->getDoctorShippingAddress();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('users/viewRegistration',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function acceptDoctor()
    {
        $doctorID = $this->input->post('doctorIDVal');
        $doctorPassword = $this->input->post('doctorPassword');

        $data = array('password' => sha1($doctorPassword),'is_active' => 1);
        $result = $this->Admin_model->udpateDoctorStatus($doctorID , $data);
        
        $doctorData =  $this->Admin_model->getAcceptedDoctorDetails($doctorID);
        $doctorEmail = $doctorData->email;
        // $password =  sha1($doctorPassword);
        
        if($result){
            $subject = "Your Request has been Accepted";
            $message = "Congratulations! Your application to Smilealigners was accepted. You’re now officially a member of the family, so here are your credentials. <br> Email: ".$doctorEmail." <br> Password: ".$doctorPassword;
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: SmileAligners <hr@smilealigners.in>' . "\r\n";

            $mailRes = mail($doctorEmail,$subject,$message,$headers);
            
            if($mailRes){
                $this->session->set_flashdata('success', "Doctor Added");
                $this->session->set_flashdata('icon', "tick-green");
                redirect('admin/regReq');
            }else{
                $this->session->set_flashdata('error', "Somethin went wrong!");
                redirect('admin/regReq');
            }

         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!");
            redirect('admin/regReq');
        }
    }
    public function declineDoctor()
    {   
        $doctorID = $this->input->post('doctorID');


        $data = array('is_active' => 2);
        $result = $this->Admin_model->udpateDoctorStatus($doctorID , $data);

        //      echo "<pre>";
        // print_r($result);
        // die();
        //insert into rejected data
        $rejData = array('user_id' => $doctorID,'cur_date' => date('Y-m-d h:i:sa'));
        $this->Admin_model->insertRejectedUsers($rejData);
        
        $doctorData =  $this->Admin_model->getRejectedDoctorDetails($doctorID);
        $doctorEmail = $doctorData->email;
        
        if($result){
            $subject = "Your Request has been Rejected";
            $message = "We have carefully examined your application and regret to inform you that your recent application has been denied.";
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: SmileAligners <hr@smilealigners.in>' . "\r\n";

            $mailRes = mail($doctorEmail,$subject,$message,$headers);
            
            if($mailRes){
                $this->session->set_flashdata('success', "Doctor not verified!");
                $this->session->set_flashdata('icon', "cross-red");
                redirect('admin/regReq');
            }else{
                    
                $this->session->set_flashdata('error', "Somethin went wrong!");
                redirect('admin/regReq');
            }
            
            // $this->session->set_flashdata('success', "Doctor not verified!");
            // $this->session->set_flashdata('icon', "cross-red");
            // redirect('admin/regReq');
         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!");
            redirect('admin/regReq');
        }
    }
    public function setDoctorPassword()
    {
        $doctorID = $this->input->post('doctorID');
        $doctorData = $this->Admin_model->getDoctorByID($doctorID);

        if (empty($doctorData)) {
            $response = array("success"=>"0","message"=>"failed","reason"=>"No Campaign Found");
        } else {
            $response = array("success"=>"1","message"=>"success","doctorData"=>$doctorData);
        }
        echo json_encode($response);
        exit; 
    }
    
     public function update_status(){
        
        $data = $_POST;
        if(isset($data['document_id'])){
            $rec = array('status'=>'Seen');
            $this->db->where('photos_id',$data['document_id']);
            $this->db->update('photos',$rec);
        }
    }


     public function dismiss_all(){
        $rec = array('status'=>'Seen');
        $this->db->where('status','Pending');
        $this->db->update('photos',$rec);
         redirect('admin');
    }

    
}