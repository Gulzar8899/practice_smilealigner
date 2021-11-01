<?php
/**
 * Controller Name: Admin
 * Description: back end admin
 * @author Surfiq Tech
 * Created date: 2021-07-04
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Doctor extends MY_Controller
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
    public function doctorList()
    {
        $data['admin_data']    = $this->adminData;
        $data['accepted_users'] = $this->Admin_model->acceptedUsers();
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('doctor/doctorList.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function doctorGridList()
    {
        // $data['admin_data']    = $this->adminData;
        // $data['accepted_users'] = $this->Admin_model->acceptedUsers();

        $data['admin_data']    = $this->adminData;
        $data['accepted_users'] = $this->Admin_model->doctorsList();
        $data['doctor_patients'] = $this->Admin_model->getPatientDocuments($adminID);
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('doctor/doctorGridList',$data);
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
    public function addDoctor()
    {
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];
        $data['doctor_data'] = $this->Admin_model->getDoctorByID($adminID);
        $data['countries'] = $this->Admin_model->getAllCountries($adminID);
        $data['business_developer'] = $this->Admin_model->getBusinessDeveloper();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('doctor/addDoctor',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function submitDoctor()
    {   

        $upload_path = 'assets/uploads/images/';

        $refer_by = $this->input->post('refer_by');
        if($refer_by == 'Business Executive' ){
            $refer_text = $this->input->post('business_executive');
        }else{
            $refer_text = $this->input->post('reference_person');
        }

        $doctorData = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'age' => $this->input->post('age'),
                'gender' => $this->input->post('gender'),
                'phone_number' => $this->input->post('phone_number'),
                'password' => sha1($this->input->post('password')),               
                'default_billing_address' => 1,
                'street_address' => $this->input->post('billing_streetaddress'),
                'country' => $this->input->post('billing_country'),
                'state' => $this->input->post('billing_state'),
                'city' => $this->input->post('billing_city'),
                'zip_code' => $this->input->post('billing_zipcode'),
                'gst_no' => $this->input->post('gst_no'),
                'refer_by' => $this->input->post('refer_by'), 
                'refer_text' => $refer_text,
                'profile_image' => $this->input->post('doctor_img_name'),
                'notification_alert' => "on",
                'user_type_id' => 2,
                'is_active' => 1,
                'source' => 0,
                'added_by' => 1,
                'created' => date('Y-m-d')
        );
        $doctorID = $this->db->insert('users',$doctorData);
        $doctor_id = $this->db->insert_id();

        if($doctor_id){

            $doctorName = $this->input->post('first_name')." ".$this->input->post('last_name');
            $doctorEmail = $this->input->post('email');
            $doctorPassword = $this->input->post('password');
            $site_url = site_url();
            $link = 'Click <a href="'.$site_url.'" target="_blank"><span style="">Here</span></a>';

            $subject = "SmileAligners";
            $message = "Welcome to SmileAligners. To log in, use your credentials as shown below:";
            $message .= "<br>";
            $message .= "Username: ".$doctorEmail;
            $message .= "<br>";
            $message .= "Password: ".$doctorPassword;
            $message .= "<br>";
            $message .= "Please use the following link to log in: ".$link;

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: SmileAligners <admin@smilealigners.in>' . "\r\n";

            $mailRes = mail($doctorEmail,$subject,$message,$headers);
        }
       
        $data = array(
            'doctor_id' => $doctor_id,
            'street_address' => $this->input->post('shipping_streetaddress'),
            'country' => $this->input->post('shipping_country'),
            'state' => $this->input->post('shipping_state'),
            'city' => $this->input->post('shipping_city'),
            'zip_code' => $this->input->post('shipping_zipcode'),
            'default_shipping_address' => 1,
            'added_by' => 1,
        );
        $doctorShippingAddress = $this->db->insert('shipping_address',$data);

        if($doctor_id)
        {
            $this->session->set_flashdata('success','Doctor Added!');
            redirect('admin/doctors');
        }
        else{
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('admin/doctors');
        }
    }
    public function editDoctor($doctorID)
    {
		$data['admin_data']    = $this->adminData;
		$adminID = $data['admin_data']['id'];

        $data['doctor_data'] = $this->Admin_model->getDoctorByID($doctorID);
        $data['countries'] = $this->Admin_model->getAllCountries();
        $data['states'] = $this->Admin_model->getAllStates();
        $data['cities'] = $this->Admin_model->getAllCities();        
        $data['default_shipping_address'] = $this->Admin_model->getDefaultShipppingAddress($doctorID);
        $data['shipping_address_except_default'] = $this->Admin_model->getShipppingAddressExceptDefault($doctorID);
        $data['business_developer'] = $this->Admin_model->getBusinessDeveloper();
		
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('doctor/editDoctor',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function udpateDoctorData()
    {   

        // echo "<pre>";
        // print_r($this->input->post());
        // die();
        $upload_path = 'assets/uploads/images/';

        $doctorID = $this->input->post('doctorID');

        $refer_by = $this->input->post('refer_by');
        if($refer_by == 'Business Executive' ){
            $refer_text = $this->input->post('business_executive');
        }else{
            $refer_text = $this->input->post('reference_person');
        }
        $updateData['first_name'] = $this->input->post('first_name');  
        $updateData['last_name'] = $this->input->post('last_name');  
        $updateData['email'] = $this->input->post('email');    
        $updateData['age'] = $this->input->post('age');    
        $updateData['gender'] = $this->input->post('gender');    
        $updateData['phone_number'] = $this->input->post('phone_number'); 
        $updateData['refer_by'] = $this->input->post('refer_by'); 
        $updateData['refer_text'] = $refer_text; 
        if($this->input->post('password')!='') { 
            $updateData['password'] = sha1($this->input->post('password'));  
        }
        if($this->input->post('doctor_img_name')!='') {
            $updateData['profile_image'] = $this->input->post('doctor_img_name');     
        }
        // $updateData['shipping_address'] = $this->input->post('default_shipping_address');  
        $updateData['default_billing_address'] = $this->input->post('default_billing_address');
        $updateData['gst_no'] = $this->input->post('gst_no');

        $result = $this->Admin_model->udpateDoctorStatus($doctorID , $updateData);

        // Update All Dcotor Shipping Record 0
        $shipping_id = $this->input->post('default_shipping_address');
        if($shipping_id){

            $data['default_shipping_address'] = 0;
            $result =  $this->Admin_model->updateDoctorAllShippingAddress($doctorID, $data);

            $shippingData['default_shipping_address'] = 1;
            $result =  $this->Admin_model->updateShippingAddress($shipping_id, $shippingData);
        }

        // If Email Edit
        $doctorEmail = $this->input->post('email');
        $doctorOldEmail = $this->input->post('old_email');
        if($doctorEmail){
            $doctorName = $this->input->post('first_name')." ".$this->input->post('last_name');
            $doctorEmail = $this->input->post('email');
            $doctorPassword = $this->input->post('password');
            $site_url = site_url();
            $link = '<a href="'.$site_url.'" target="_blank"><span style="">Click Here</span></a>';

            $subject = "SmileAligners";
            $message = "You have requested that we update your email address used for SmileAligners. This request has been accepted. The new email id is < ".$doctorEmail." >. You can now log in to your SmileAligners account using the new email ID.";
            $message .= "<br>";
            $message .= "Please use the following link to log in: Click here: ".$link;

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: SmileAligners <admin@smilealigners.in>' . "\r\n";

            $mailRes = mail($doctorOldEmail,$subject,$message,$headers);
        }


        // Mail Send When New Password Added Or Password Changed
        $isPasswordAvailable = $this->input->post('isPasswordAvailable');
        $password = $this->input->post('password');

        if($password){
            if($isPasswordAvailable){
                $doctorName = $this->input->post('first_name')." ".$this->input->post('last_name');
                $doctorEmail = $this->input->post('email');
                $doctorPassword = $this->input->post('password');
                $site_url = site_url();
                $link = '<a href="'.$site_url.'" target="_blank"><span style="">Click Here</span></a>';

                $subject = "SmileAligners";
                $message = "You have requested that we update your password used for SmileAligners. This request has been accepted. The new password is < ".$doctorPassword." >. You can now log in to your SmileAligners account using the new password.";
                $message .= "<br>";
                $message .= "Please use the following link to log in: Click here: ".$link;

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: SmileAligners <admin@smilealigners.in>' . "\r\n";
                $mailRes = mail($doctorEmail,$subject,$message,$headers);
               
            }else{
                $doctorName = $this->input->post('first_name')." ".$this->input->post('last_name');
                $doctorEmail = $this->input->post('email');
                $doctorPassword = $this->input->post('password');
                $site_url = site_url();
                $link = '<a href="'.$site_url.'" target="_blank"><span style="">Click Here</span></a>';
                $subject = "SmileAligners";
                $message = "Welcome to SmileAligners. To log in, use your credentials as shown below:";
                $message .= "<br>";
                $message .= "Username: ".$doctorEmail;
                $message .= "<br>";
                $message .= "Password: ".$doctorPassword;
                $message .= "<br>";
                $message .= "Please use the following link to log in: Click here: ".$link;

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: SmileAligners <admin@smilealigners.in>' . "\r\n";

                $mailRes = mail($doctorEmail,$subject,$message,$headers);
            }
        }
       

        if($result){
            $this->session->set_flashdata('success', "Doctor Updated");
            redirect('admin/doctors');
         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/doctors');
        }
    }
    public function viewDoctor($doctorID)
    {
        $data['admin_data']    = $this->adminData;
        $data['doctor_data'] = $this->Admin_model->getDoctorByID($doctorID);
        $data['shipping_address'] = $this->Admin_model->getShipppingAddress($doctorID);
        $data['countries'] = $this->Admin_model->getAllCountries();
        $data['states'] = $this->Admin_model->getAllStates();
        $data['cities'] = $this->Admin_model->getAllCities();        
        
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('doctor/viewDoctor.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function deleteDoctorByID()
    {
        // echo json_encode('yes');
        $recordID = $this->input->post('recordID');
        $table_name = $this->input->post('table_name');
        $resultData = $this->Admin_model->deleteDoctorByID($recordID, $table_name);

        // Delete Doctor Request from Request Table
        $deleteDoctorRequestByID = $this->Admin_model->deleteDoctorRequestByID($recordID);
            
        // Delete Doctor Shipping Address
        $deleteDoctorShippingAddress = $this->Admin_model->deleteShippingAddressByID($recordID);

        //getting patient data against doctor ID
        $patientDoctorData = $this->Admin_model->getDoctorPatientData($recordID);
        for($i=0;$i<count($patientDoctorData);$i++)
        {   
            $patientID = $patientDoctorData[$i]->pt_id;
            $table_name = 'patients';
            $this->Admin_model->deletePatientByID($patientID, $table_name);
            $this->Admin_model->deletePhotosByID($patientID);
            $this->Admin_model->deleteDocumentByID($patientID);
            $this->Admin_model->deleteDocPhotosByID($patientID);
        }
        
        if ($resultData) {
            //$this->session->set_flashdata('success', 'Doctor Deleted');
            $response = array("type"=>"success","message"=>"Doctor Deleted"); 
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


    // Add Shipping Shipping Address
    public  function addShippingAddress(){

        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

        $doctorID = $this->input->post('doctorID');
        // $newAddress = $this->input->post('new_address');
        $data = array(
            'doctor_id' => $doctorID,
            'street_address' => $this->input->post('shipping_streetaddress'),
            'country' => $this->input->post('shipping_country'),
            'state' => $this->input->post('shipping_state'),
            'city' => $this->input->post('shipping_city'),
            'zip_code' => $this->input->post('shipping_zipcode'),
            'added_by' => 1,
        );
        $result = $this->Admin_model->insertShippingAddress($data);
        // redirect('admin/doctor/editDoctor/'.$doctorID);
        if($result){
            $this->session->set_flashdata('success', "Address Added");
            redirect('admin/doctor/editDoctor/'.$doctorID);
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/doctor/editDoctor/'.$doctorID);
        }
    }

    // Update Shipping Address
    public  function updateShippingAddress(){

        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

        $doctorID = $this->input->post('doctorID');
        $shipping_id = $this->input->post('shippingID');


        $data = array(
            'doctor_id' => $doctorID,
            'street_address' => $this->input->post('shipping_streetaddress'),
            'country' => $this->input->post('shipping_country'),
            'state' => $this->input->post('shipping_state'),
            'city' => $this->input->post('shipping_city'),
            'zip_code' => $this->input->post('shipping_zipcode'),
            'added_by' => 1,
        );
        $result = $this->Admin_model->updateShippingAddress($shipping_id, $data);
        // redirect('admin/doctor/editDoctor/'.$doctorID);
        if($result){
            $this->session->set_flashdata('success', "Address Updated");
            redirect('admin/doctor/editDoctor/'.$doctorID);
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/doctor/editDoctor/'.$doctorID);
        }
    }


    //  Edit Shipping Address
    public  function editAddress(){
        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];
        
        $shipping_id = $this->input->post('id');
        $result = $this->Admin_model->getEditShippingAddress($shipping_id);
        echo json_encode($result);
    }

    //  View Shipping Address
    public  function viewShippingAddress(){
        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];
        
        $shipping_id = $this->input->post('id');
        $result = $this->Admin_model->getEditShippingAddress($shipping_id);
        echo json_encode($result);
    }

    // Delete Shipping Address
    public function deleteShippingAddress()
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


	// public  function addNewAddress(){

	// 	$data['admin_data']    = $this->adminData;
	// 	$adminID = $data['admin_data']['id'];

	// 	$data['userdata']    = $this->userdata;
	// 	$adminID = $data['userdata']['id'];
	// 	$doctorID = $this->input->post('doctorID');
	// 	$newAddress = $this->input->post('new_address');
	// 	$shippingData = array(
	// 		'doctor_id' => $doctorID,
	// 		'shipping_address' => $newAddress,
	// 		'added_by' => $adminID,
	// 	);
	// 	$result = $this->Admin_model->insertShippingAddress($shippingData);
	// 	redirect('admin/doctor/editDoctor/'.$doctorID);
	// 	if($result){
	// 		$this->session->set_flashdata('success', "Doctor Updated");
	// 		redirect('admin/doctors');
	// 	} else {
	// 		$this->session->set_flashdata('error', "Somethin went wrong!.");
	// 		redirect('admin/doctors');
	// 	}
	// }


	// public  function updateAddress(){

	// 	$data['admin_data']    = $this->adminData;
	// 	$adminID = $data['admin_data']['id'];
	// 	$doctor_id = $this->input->post('doctorID');
	// 	$shipping_id = $this->input->post('shippingID');
	// 	$address = $this->input->post('new_address');

	// 	$shippingData = array(
	// 		'doctor_id' => $doctor_id,
	// 		'shipping_address' => $address,
	// 		'added_by' => $adminID,
	// 	);
	// 	$result = $this->Admin_model->updateShippingAddress($shipping_id, $shippingData);
	// 	redirect('admin/doctor/editDoctor/'.$doctor_id);
	// 	if($result){
	// 		$this->session->set_flashdata('success', "Doctor Updated");
	// 		redirect('admin/doctors');
	// 	} else {
	// 		$this->session->set_flashdata('error', "Somethin went wrong!.");
	// 		redirect('admin/doctors');
	// 	}
	// }

	
     // Update Billing Address
    public  function updateBillingAddress(){
        // echo "<pre>";
        // print_r($this->input->post());
        // die();
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

        $doctorID = $this->input->post('doctorID');

        $data = array(
            'street_address' => $this->input->post('billing_streetaddress'),
            'country' => $this->input->post('billing_country'),
            'state' => $this->input->post('billing_state'),
            'city' => $this->input->post('billing_city'),
            'zip_code' => $this->input->post('billing_zipcode'),
        );
        $result = $this->Admin_model->udpateDoctorStatus($doctorID, $data);
        // redirect('admin/doctor/editDoctor/'.$doctorID);
        if($result){
            $this->session->set_flashdata('success', "Address Updated");
            redirect('admin/doctor/editDoctor/'.$doctorID);
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/doctor/editDoctor/'.$doctorID);
        }
    }


	public  function getSpecificDoctorAddress(){

    	$doctorID = $this->input->post('id');
		$result = $this->Admin_model->getSpecificDoctorAddress($doctorID);
		echo json_encode($result);
	}

    public  function getSpecificDoctorProfile(){
        $doctorID = $this->input->post('id');
        $result = $this->Admin_model->getDoctorProfile($doctorID);
        echo json_encode($result);
    }

    public function getEditStates()
    {
        $countryName = $this->input->post('name');
        $countryDetail = $this->Admin_model->getCountryByName($countryName);
        $countryID = $countryDetail->id;

        $result = $this->Admin_model->getStatesByCountryID($countryID);

        echo json_encode($result);
    }

    public function getEditCities()
    {   

        $stateName = $this->input->post('name');
        $stateDetail = $this->Admin_model->getStateByName($stateName);
        $stateID = $stateDetail->id;

        $result = $this->Admin_model->getCitiesByStateID($stateID);
        echo json_encode($result);
    }

    public function getAllCoutries()
    {
        $countryID = $this->input->post('id');
        $result = $this->Admin_model->getAllCountries();

        echo json_encode($result);
    }

    public function getStates()
    {
        $countryID = $this->input->post('id');
        $result = $this->Admin_model->getStatesByCountryID($countryID);

        echo json_encode($result);
    }

    public function getCities()
    {   

        $stateID = $this->input->post('id');
        $result = $this->Admin_model->getCitiesByStateID($stateID);
        echo json_encode($result);
    }


    public function searchDoctor()
    {
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

        $doctorName = $this->input->post('doctor_name');

        $this->db->select('*');
        // $this->db->where('user_type_id', 2);
        // $this->db->where('is_active', 1);
        $this->db->from('users');
        $this->db->like('first_name', $doctorName);
        $this->db->or_like('last_name', $doctorName);
        $this->db->or_like('phone_number', $doctorName);
        $this->db->or_like('email', $doctorName);
        $this->db->or_like('gst_no', $doctorName);

        $res = $this->db->get();
        $result = $res->result_array();

        if ($result) {
            
            echo json_encode($result);
            exit;
        }
    }
    public function getAllDoctor(){
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

        // $doctorName = $this->input->post('doctor_name');

        $this->db->select('*');
        $this->db->where('user_type_id', 2);
        $this->db->where('is_active', 1);
        $this->db->from('users');

        $res = $this->db->get();
        $result = $res->result_array();

        if ($result) {
            
            echo json_encode($result);
            exit;
        }


    }

        
    

}
