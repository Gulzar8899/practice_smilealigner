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
        $this->checkUserLogin();
        $this->userdata = $this->session->userdata('userdata');
        $this->load->model(array("Doctor_model","admin/Admin_model","treatmentplanner/Plan_model","admin/Patient_model"));
    }
    /**
     * @author Surfiq Tech
     */
    public function index()
    {
        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];
        $data['doctor_patients'] = $this->Doctor_model->getDoctorPatients($adminID);
        $data['oral_images'] = $this->db->where(['added_by'=>$adminID, 'file_type'=>'Intra Oral Images'])->from("documents")->count_all_results();
        $data['opg_images'] = $this->db->where(['added_by'=>$adminID, 'file_type'=>'OPG Images'])->from("documents")->count_all_results();
        $data['lateral_c_images'] = $this->db->where(['added_by'=>$adminID, 'file_type'=>'Lateral C Images'])->from("documents")->count_all_results();
        $data['stl_file'] = $this->db->where(['added_by'=>$adminID, 'file_type'=>'STL File(3D File)'])->from("documents")->count_all_results();
        $data['scans'] = $this->db->where(['added_by'=>$adminID, 'file_type'=>'scans'])->from("documents")->count_all_results();
        $data['treatment_plan'] = $this->db->where(['file_type'=>'Treatment Plan'])->from("documents")->count_all_results();
        $data['ipr'] = $this->db->where(['file_type'=>'IPR'])->from("documents")->count_all_results();
        $data['invoice'] = $this->db->where(['file_type'=>'Invoice'])->from("documents")->count_all_results();
        $data['id'] = $adminID;
        //  $data['all_documents'] = $this->Doctor_model->getAllPatientDocuments();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('doctor_body',$data);
        $this->load->view('elements/admin_footer',$data);
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
        $result = $this->db->update('photos',$rec);

        if($result){
            $rec = array('status'=>'Dismiss');
            $this->db->where('status','Seen');
            $result = $this->db->update('photos',$rec);
        }

        redirect('doctor');
    }

    public function profile()
    {   

        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];
        $data['doctor_data'] = $this->Admin_model->getDoctorByID($adminID);
        $data['countries'] = $this->Admin_model->getAllCountries();
        $data['states'] = $this->Admin_model->getAllStates();
        $data['cities'] = $this->Admin_model->getAllCities();      
        $data['default_shipping_address'] = $this->Admin_model->getDefaultShipppingAddress($adminID);
        $data['shipping_address_except_default'] = $this->Admin_model->getShipppingAddressExceptDefault($adminID);

        $data['default_billing_address'] = $this->Admin_model->getDefaultBillingAddress($adminID);
        $data['billing_address_except_default'] = $this->Admin_model->getBillingAddressExceptDefault($adminID);


        // $data['shipping_address'] = $this->Doctor_model->getShipppingAddress($adminID);
//         print_r($data['shipping_address']);die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('profile',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function updateProfile()
    {   

        // echo "<pre>";
        // print_r($this->input->post());
        // die();
        $doctorID = $this->input->post('doctorID');
        // $updateData['billing_address'] = $this->input->post('billing_address');
        // $updateData['shipping_address'] = $this->input->post('shipping_address');
        $updateData['payer_address'] = $this->input->post('payer_address');
        $updateData['notification_alert'] = $this->input->post('notification_alert');


        if($this->input->post('password')!='') {
            $updateData['password'] = sha1($this->input->post('password'));
        }

        $result = $this->Admin_model->udpateDoctorStatus($doctorID , $updateData);

        // Update All Dcotor Shipping Record 0
        $shipping_id = $this->input->post('default_shipping_address');
        if($shipping_id){

            $data['default_shipping_address'] = 0;
            $result =  $this->Admin_model->updateDoctorAllShippingAddress($doctorID, $data);

            $shippingData['default_shipping_address'] = 1;
            $result =  $this->Admin_model->updateShippingAddress($shipping_id, $shippingData);
        }


      

        // Update All Dcotor Billing Record 0
        $billing_id = $this->input->post('default_billing_address');
        if($billing_id){

            $defaultBillingData['default_billing_address'] = 0;
            $result =  $this->Admin_model->updateDoctorAllBillingAddress($doctorID, $defaultBillingData);

            $billingData['default_billing_address'] = 1;
            $result =  $this->Admin_model->updateBillingAddress($billing_id, $billingData);
        }


        

        if($result){
            $this->session->set_flashdata('success', "Doctor Updated");
            redirect('doctor/profile');
         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('doctor/profile');
        }
    }

	//    Add New Shipping Address
	public  function addNewAddress(){
//    	echo "<pre>";
//    	print_r($this->input->post());
//    	die();
		$data['userdata']    = $this->userdata;
		$adminID = $data['userdata']['id'];
		$doctorID = $this->input->post('doctorID');
		$newAddress = $this->input->post('new_address');
		$shippingData = array(
			'doctor_id' => $doctorID,
			'shipping_address' => $newAddress,
			'added_by' => $adminID,
		);
		$result = $this->Doctor_model->insertShippingAddress($shippingData);
		redirect('doctor/profile');
		if($result){
			$this->session->set_flashdata('success', "Doctor Updated");
			redirect('doctor/profile');
		} else {
			$this->session->set_flashdata('error', "Somethin went wrong!.");
			redirect('doctor/profile');
		}
	}

	//    Add Edit Shipping Address
	public  function editAddress(){
        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];
        
        $shipping_id = $this->input->post('id');
        $result = $this->Admin_model->getEditShippingAddress($shipping_id);
        echo json_encode($result);
	}

     // Add Shipping Shipping Address
    public  function addShippingAddress(){

        $data['userdata']    = $this->adminData;
        $adminID = $data['userdata']['id'];

        $doctorID = $this->input->post('doctorID');
        $newAddress = $this->input->post('new_address');
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
            redirect('doctor/profile');
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('doctor/profile');
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
            redirect('doctor/profile');
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('doctor/profile');
        }
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

	//    Add Update Shipping Address
	public  function updateAddress(){
//    	echo "<pre>";
//    	print_r($this->input->post());
//    	die();
		$data['userdata'] = $this->userdata;
		$adminID = $data['userdata']['id'];
		$doctor_id = $this->input->post('doctorID');
		$shipping_id = $this->input->post('shippingID');
		$address = $this->input->post('new_address');

		$shippingData = array(
			'doctor_id' => $doctor_id,
			'shipping_address' => $address,
			'added_by' => $adminID,
		);
		$result = $this->Doctor_model->updateShippingAddress($shipping_id, $shippingData);
		redirect('doctor/profile');
		if($result){
			$this->session->set_flashdata('success', "Doctor Updated");
			redirect('doctor/profile');
		} else {
			$this->session->set_flashdata('error', "Somethin went wrong!.");
			redirect('doctor/profile');
		}
	}


     // Add Shipping Shipping Address
    public  function addBillingAddress(){

        $data['userdata']    = $this->adminData;
        $adminID = $data['userdata']['id'];
        $doctorID = $this->input->post('doctorID');

        $data = array(
            'doctor_id' => $doctorID,
            'street_address' => $this->input->post('billing_streetaddress'),
            'country' => $this->input->post('billing_country'),
            'state' => $this->input->post('billing_state'),
            'city' => $this->input->post('billing_city'),
            'zip_code' => $this->input->post('billing_zipcode'),
            'added_by' => 1,
        );
        $result = $this->Admin_model->insertBillingAddress($data);

        if($result){
            $this->session->set_flashdata('success', "Address Added");
            redirect('doctor/profile');
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('doctor/profile');
        }
    }

    //    Add Edit Billing Address
    public  function editBillingAddress(){
        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];
        
        $shipping_id = $this->input->post('id');
        $result = $this->Admin_model->getEditBillingAddress($shipping_id);
        echo json_encode($result);
    }

     // Update Billing Address
    public  function updateBillingAddress(){
        // echo "<pre>";
        // print_r($this->input->post());
        // die();

        $data['userdata']    = $this->adminData;
        $adminID = $data['userdata']['id'];

        $doctorID = $this->input->post('doctorID');
        $billing_id = $this->input->post('billingID');

        $data = array(
            'doctor_id' => $doctorID,
            'street_address' => $this->input->post('billing_streetaddress'),
            'country' => $this->input->post('billing_country'),
            'state' => $this->input->post('billing_state'),
            'city' => $this->input->post('billing_city'),
            'zip_code' => $this->input->post('billing_zipcode'),
            'added_by' => 1,
        );
        $result = $this->Admin_model->updateBillingAddress($billing_id, $data);
        // redirect('admin/doctor/editDoctor/'.$doctorID);
        if($result){
            $this->session->set_flashdata('success', "Address Updated");
            redirect('doctor/profile');
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('doctor/profile');
        }
    }
	


//    public function updateAdress()
//    {
//        $doctorID = $this->input->post('doctorID');
//
//        $newAddress = $this->input->post('new_address');
//        if($newAddress !=''){
//
//            $checkNewAddress = $this->Admin_model->getDoctorByID($adminID);
//
//            if($checkNewAddress[0]->address_one ==''){
//
//                $updateNewAddress['address_one'] = $this->input->post('new_address');
//                $result = $this->Admin_model->udpateDoctorStatus($doctorID , $updateNewAddress);
//
//            }
//            else if($checkNewAddress[0]->address_two ==''){
//                 $updateNewAddress['address_two'] = $this->input->post('new_address');
//                $result = $this->Admin_model->udpateDoctorStatus($doctorID , $updateNewAddress);
//            }else if($checkNewAddress[0]->address_three ==''){
//                 $updateNewAddress['address_three'] = $this->input->post('new_address');
//                $result = $this->Admin_model->udpateDoctorStatus($doctorID , $updateNewAddress);
//            }else{
//                $updateNewAddress['address_one'] = $this->input->post('new_address');
//                $result = $this->Admin_model->udpateDoctorStatus($doctorID , $updateNewAddress);
//                redirect('doctor/profile');
//            }
//        }
//        if($result){
//            $this->session->set_flashdata('success', "Doctor Updated");
//            redirect('doctor/profile');
//         } else {
//            $this->session->set_flashdata('error', "Somethin went wrong!.");
//            redirect('doctor/profile');
//        }
//    }
    public function patientList()
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        $allPatientList = $this->Doctor_model->getPatientListByID($userID);

        $patient_data_array = array();
        for($i=0;$i<count($allPatientList); $i++){
            $chkpt_id = $allPatientList[$i]['pt_id'];
            $singleData = $allPatientList[$i];
            $single_product_data =  $this->Patient_model->getPatientPhotosByID($chkpt_id);
            $singleData['patient_photos'] = $single_product_data;
            $patient_data_array[] = $singleData;

        }
        $data['allPatientListData'] = $patient_data_array;
        $data['shipping_address'] = $this->Admin_model->getDoctorShippingAddress();
        $data['billing_address'] = $this->Admin_model->getDoctorBillingAddress();

         // echo "<pre>";
         // print_r($data['allPatientListData']);
         // die();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('patients/patientList',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function patientGridList()
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        $data['patient_data'] = $this->Doctor_model->getPatientList($userID);
      
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('patients/patientGridList',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function addPatient()
    {
        $data['userdata']    = $this->userdata;

        $doctorID = $data['userdata']['id'];
        $data['doctor_data'] = $this->Admin_model->getDoctorByID($doctorID);
        $data['reference_doctor'] = $this->Admin_model->getReferenceDoctors();
        $data['business_developer'] = $this->Admin_model->getBusinessDeveloper();
        $data['treatment_data'] = $this->Admin_model->getTreatmentData();
        $data['treatment_case_data'] = $this->Admin_model->getTreatmentCaseData();
        $data['arch_data'] = $this->Admin_model->getArchData();
        $data['shipping_address'] = $this->Admin_model->getSpecificDoctorAddress($doctorID);
        $data['billing_address'] = $this->Admin_model->getSpecificDoctorBillingAddress($doctorID);
        

         //$this->load->view('elements/front_topbar',$data);
         //$this->load->view('doctor_topbar',$data);
         //$this->load->view('doctor_sidebar',$data);
         // $this->load->view('patients/addPatient',$data);
         //$this->load->view('elements/front_footer',$data);

        $this->load->view('elements/admin_header',$data);
         $this->load->view('doctor_topbar',$data);
         $this->load->view('doctor_sidebar',$data);
         $this->load->view('patients/addPatient',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function submitPatient()
    {
        $userdata = $this->userdata;
        $userID = $userdata['id'];

        $upload_path = 'assets/uploads/images/';

        $treatmentData = $this->input->post('treatmentData');
        $treatmentCaseData = $this->input->post('treatmentCaseData');
        $archData = $this->input->post('archData');

        $patientData = array(
                'doctor_id' => $userID,
                'pt_firstname' => $this->input->post('pt_firstname'),
                'pt_lastname' => $this->input->post('pt_lastname'),
                'pt_gender' => $this->input->post('pt_gender'),
                'pt_email' => $this->input->post('pt_email'),
                'pt_img' => $this->input->post('pt_img_name'),
                'pt_scan_impression' => $this->input->post('pt_scan_impression'),
                'pt_objective' => $this->input->post('pt_objective'),
                'pt_referal' => $this->input->post('pt_referal'),
                'pt_age' => $this->input->post('pt_age'),
                'type_of_treatment' => json_encode(implode(",", $treatmentData)),
                'other_type_of_treatment' => $this->input->post('other_type_of_treatment'),
                'type_of_case' => json_encode(implode(",", $treatmentCaseData)),
                'arc_treated' => json_encode(implode(",", $archData)),
                 'attachment_placed' => $this->input->post('attachment_placed'),
                'ipr_performed' => $this->input->post('ipr_performed'),
                'pt_status' => 1,
                'added_by' => $userID,
                'cur_date' => date('Y-m-d'),
                'pt_shipping_details' => $this->input->post('pt_shipping_details'),
                'pt_billing_address' => $this->input->post('pt_billing_address'),
                'pt_special_instruction' => $this->input->post('pt_special_instruction')
        );
        $patientID = $this->Doctor_model->insertPatientsData($patientData);
        if($patientID)
        {
            //upload images
            for ($i = 0; $i < sizeof($_FILES['images_intra_oral']['name']); $i++) {
                if (!empty($_FILES['images_intra_oral']['name'][$i]) && $_FILES['images_intra_oral']['error'][$i] == 0) {

                    if($i == 0){

                        $docsData = array(
                        'patient_id' => $patientID,
                        'file_type' => 'Intra Oral Images',
                        // 'des' => null,
                        'added_by' => $userID,
                        'cur_date' => date('Y-m-d')
                        );
                        $documentID = $this->Doctor_model->insertDocument($docsData);
                    }

                    $file_name = time().str_replace(' ','_',$_FILES['images_intra_oral']['name'][$i]);
                    move_uploaded_file($_FILES['images_intra_oral']['tmp_name'][$i], $upload_path . $file_name);
                    $images_intra_oral['img'] =time().str_replace(' ','_',$_FILES['images_intra_oral']['name'][$i]);
                    $images_intra_oral['key'] = 'Intra Oral Images';
                    $images_intra_oral['type'] = 'patient';
                    $images_intra_oral['post_id'] = $documentID;
                    $images_intra_oral['user_id'] = $patientID;
                    $images_intra_oral['created_by'] = $userID;

                    $this->db->insert('photos',$images_intra_oral);
                }
            }


            //opg images
            for ($i = 0; $i < sizeof($_FILES['images_opg']['name']); $i++) {
                if (!empty($_FILES['images_opg']['name'][$i]) && $_FILES['images_opg']['error'][$i] == 0) {
                    if($i == 0){

                        $docsData = array(
                        'patient_id' => $patientID,
                        'file_type' => 'OPG Images',
                        // 'des' => 'add',
                        'added_by' => $userID,
                        'cur_date' => date('Y-m-d')
                        );
                        $documentID = $this->Doctor_model->insertDocument($docsData);
                    }
                    $file_name = time().str_replace(' ','_',$_FILES['images_opg']['name'][$i]);
                    move_uploaded_file($_FILES['images_opg']['tmp_name'][$i], $upload_path . $file_name);
                    $images_opg['img'] =time().str_replace(' ','_',$_FILES['images_opg']['name'][$i]);
                    $images_opg['type'] = 'patient';
                    $images_opg['key'] = 'OPG Images';
                    $images_opg['post_id'] = $documentID;
                    $images_opg['user_id'] = $patientID;
                    $images_opg['created_by'] = $userID;

                    $this->db->insert('photos',$images_opg);
                }
            }
            //images_lateral_c
            for ($i = 0; $i < sizeof($_FILES['images_lateral_c']['name']); $i++) {
                if (!empty($_FILES['images_lateral_c']['name'][$i]) && $_FILES['images_lateral_c']['error'][$i] == 0) {
                    if($i == 0){

                        $docsData = array(
                        'patient_id' => $patientID,
                        'file_type' => 'Lateral C Images',
                        // 'des' => 'add',
                        'added_by' => $userID,
                        'cur_date' => date('Y-m-d')
                        );
                        $documentID = $this->Doctor_model->insertDocument($docsData);
                    }
                    $file_name = time().str_replace(' ','_',$_FILES['images_lateral_c']['name'][$i]);
                    move_uploaded_file($_FILES['images_lateral_c']['tmp_name'][$i], $upload_path . $file_name);
                    $images_lateral_c['img'] =time().str_replace(' ','_',$_FILES['images_lateral_c']['name'][$i]);
                    $images_lateral_c['type'] = 'patient';
                    $images_lateral_c['key'] = 'Lateral C Images';
                    $images_lateral_c['post_id'] = $documentID;
                    $images_lateral_c['user_id'] = $patientID;
                    $images_lateral_c['created_by'] = $userID;

                    $this->db->insert('photos',$images_lateral_c);
                }
            }

            //scna impression images
            for ($i = 0; $i < sizeof($_FILES['scan_impression_img']['name']); $i++) {
                if (!empty($_FILES['scan_impression_img']['name'][$i]) && $_FILES['scan_impression_img']['error'][$i] == 0) {
                    if($i == 0){
                        $docsData = array(
                        'patient_id' => $patientID,
                        'file_type' => 'Scans',
                        // 'des' => 'add',
                        'added_by' => $userID,
                        'cur_date' => date('Y-m-d')
                        );
                        $documentID = $this->Doctor_model->insertDocument($docsData);
                    }
                    $file_name = time().str_replace(' ','_',$_FILES['scan_impression_img']['name'][$i]);
                    move_uploaded_file($_FILES['scan_impression_img']['tmp_name'][$i], $upload_path . $file_name);
                    $scan_impression_img['img'] =time().str_replace(' ','_',$_FILES['scan_impression_img']['name'][$i]);
                    $scan_impression_img['type'] = 'patient';
                    $scan_impression_img['key'] = 'Scans';
                    $scan_impression_img['post_id'] = $documentID;
                    $scan_impression_img['user_id'] = $patientID;
                    $scan_impression_img['created_by'] = $userID;

                    $this->db->insert('photos',$scan_impression_img);
                }
            }

            //images_stl
            for ($i = 0; $i < sizeof($_FILES['images_stl']['name']); $i++) {
                if (!empty($_FILES['images_stl']['name'][$i]) && $_FILES['images_stl']['error'][$i] == 0) {
                    if($i == 0){

                        $docsData = array(
                        'patient_id' => $patientID,
                        'file_type' => 'STL File(3D File)',
                        // 'des' => 'add',
                        'added_by' => $userID,
                        'cur_date' => date('Y-m-d')
                        );
                        $documentID = $this->Doctor_model->insertDocument($docsData);
                    }
                    $file_name = time().str_replace(' ','_',$_FILES['images_stl']['name'][$i]);
                    move_uploaded_file($_FILES['images_stl']['tmp_name'][$i], $upload_path . $file_name);
                    $images_stl['img'] =time().str_replace(' ','_',$_FILES['images_stl']['name'][$i]);
                    $images_stl['type'] = 'patient';
                    $images_stl['key'] = 'STL File(3D File)';
                    $images_stl['post_id'] = $documentID;
                    $images_stl['user_id'] = $patientID;
                    $images_stl['created_by'] = $userID;

                    $this->db->insert('photos',$images_stl);
                }
            }


            $this->session->set_flashdata('success','Patient Added');
            redirect('doctor/patientList');
        }
        else{
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('doctor/patientList');
        }
    }
    public function editPatient($pt_id)
    {
        $data['userdata']    = $this->userdata;
        $doctorID = $data['userdata']['id'];

        $data['doctor_data'] = $this->Admin_model->getDoctorByID($doctorID);
        $data['reference_doctor'] = $this->Admin_model->getReferenceDoctors();
        $data['business_developer'] = $this->Admin_model->getBusinessDeveloper();
        
        $data['treatment_data'] = $this->Admin_model->getTreatmentData();
        $data['treatment_case_data'] = $this->Admin_model->getTreatmentCaseData();
        $data['arch_data'] = $this->Admin_model->getArchData();

        $singlePatient = $this->Doctor_model->getSinglePatient($pt_id);
        $data['doctor_data'] = $this->Doctor_model->getDoctorByID($doctorID);

        $data['shipping_address'] = $this->Admin_model->getSpecificDoctorAddress($doctorID);
        $data['billing_address'] = $this->Admin_model->getSpecificDoctorBillingAddress($doctorID);

        $patient_data_array = array();
        for($i=0;$i<count($singlePatient); $i++){
            $chkpt_id = $singlePatient[$i]['pt_id'];
            $singleData = $singlePatient[$i];
            $single_product_data =  $this->Doctor_model->getPatientPhotosByID($chkpt_id);
            $singleData['patient_photos'] = $single_product_data;
            $patient_data_array[] = $singleData;
        }
        $data['singlePatient'] = $patient_data_array;


// echo "<pre>"; print_r($data['shipping_address']); die();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('patients/editPatient',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function updatePatient()
    {
        $userdata = $this->userdata;
        $userID = $userdata['id'];
        $patientID = $this->input->post('patientID');
        $upload_path = 'assets/uploads/images/';
        $patientData['pt_firstname'] = $this->input->post('pt_firstname');
        $patientData['pt_lastname'] = $this->input->post('pt_lastname');
        $patientData['pt_gender'] = $this->input->post('pt_gender');
        $patientData['pt_email'] = $this->input->post('pt_email');
        if($this->input->post('pt_img_name')!='') {
            $patientData['pt_img'] = $this->input->post('pt_img_name');
        }
        $patientData['pt_scan_impression'] = $this->input->post('pt_scan_impression');
        $patientData['pt_referal'] = $this->input->post('pt_referal');
        $patientData['pt_objective'] = $this->input->post('pt_objective');
        
        $treatmentData = $this->input->post('treatmentData');
        $treatmentCaseData = $this->input->post('treatmentCaseData');
        $archData = $this->input->post('archData');

        $patientData['type_of_treatment'] = json_encode(implode(",", $treatmentData));
        $patientData['other_type_of_treatment'] = $this->input->post('other_type_of_treatment');
        $patientData['type_of_case'] = json_encode(implode(",", $treatmentCaseData));
        $patientData['arc_treated'] = json_encode(implode(",", $archData));
        $patientData['attachment_placed'] = $this->input->post('attachment_placed');
        $patientData['ipr_performed'] = $this->input->post('ipr_performed');
        $patientData['pt_shipping_details'] = $this->input->post('pt_shipping_details');
        $patientData['pt_billing_address'] = $this->input->post('pt_billing_address');
        $patientData['pt_special_instruction'] = $this->input->post('pt_special_instruction');
        $result = $this->Patient_model->udpatePatientData($patientID , $patientData);

        //upload images
            for ($i = 0; $i < sizeof($_FILES['images_intra_oral']['name']); $i++) {
                if (!empty($_FILES['images_intra_oral']['name'][$i]) && $_FILES['images_intra_oral']['error'][$i] == 0) {

                    // On Update Check Doc Id Available If not then Insert
                    $file_type = 'Intra Oral Images';
                    $doc_data = $this->Document_model->getDocumentDataByPatID($patientID, $file_type);
                    if(empty($doc_data)){
                        if($i == 0){
                            $docsData = array(
                            'patient_id' => $patientID,
                            'file_type' => $file_type,
                            // 'des' => 'add',
                            'added_by' => $userID,
                            'cur_date' => date('Y-m-d')
                            );
                            $documentID = $this->Doctor_model->insertDocument($docsData);
                        }
                    }

                    $file_name = time().str_replace(' ','_',$_FILES['images_intra_oral']['name'][$i]);
                    move_uploaded_file($_FILES['images_intra_oral']['tmp_name'][$i], $upload_path . $file_name);
                    $images_intra_oral['img'] =time().str_replace(' ','_',$_FILES['images_intra_oral']['name'][$i]);
                    $images_intra_oral['key'] = 'Intra Oral Images';
                    $images_intra_oral['type'] = 'patient';

                    if(empty($doc_data)){
                        $images_intra_oral['post_id'] = $documentID;
                    }else{
                        $images_intra_oral['post_id'] = $doc_data['doc_id'];
                    }

                    $images_intra_oral['user_id'] = $patientID;
                    $images_intra_oral['created_by'] = $userID;

                    $this->db->insert('photos',$images_intra_oral);
                }
            }
            //opg images
            for ($i = 0; $i < sizeof($_FILES['images_opg']['name']); $i++) {
                if (!empty($_FILES['images_opg']['name'][$i]) && $_FILES['images_opg']['error'][$i] == 0) {

                    // On Update Check Doc Id Available If not then Insert
                    $file_type = 'OPG Images';
                    $doc_data = $this->Document_model->getDocumentDataByPatID($patientID, $file_type);
                    if(empty($doc_data)){
                        if($i == 0){
                            $docsData = array(
                            'patient_id' => $patientID,
                            'file_type' => $file_type,
                            // 'des' => 'add',
                            'added_by' => $userID,
                            'cur_date' => date('Y-m-d')
                            );
                            $documentID = $this->Doctor_model->insertDocument($docsData);
                        }
                    }

                    $file_name = time().str_replace(' ','_',$_FILES['images_opg']['name'][$i]);
                    move_uploaded_file($_FILES['images_opg']['tmp_name'][$i], $upload_path . $file_name);
                    $images_opg['img'] =time().str_replace(' ','_',$_FILES['images_opg']['name'][$i]);
                    $images_opg['type'] = 'patient';
                    $images_opg['key'] = 'OPG Images';
                    if(empty($doc_data)){
                        $images_intra_oral['post_id'] = $documentID;
                    }else{
                        $images_intra_oral['post_id'] = $doc_data['doc_id'];
                    }
                    $images_opg['user_id'] = $patientID;
                    $images_opg['created_by'] = $userID;

                    $this->db->insert('photos',$images_opg);
                }
            }
            //images_lateral_c
            for ($i = 0; $i < sizeof($_FILES['images_lateral_c']['name']); $i++) {
                if (!empty($_FILES['images_lateral_c']['name'][$i]) && $_FILES['images_lateral_c']['error'][$i] == 0) {

                    // On Update Check Doc Id Available If not then Insert
                    $file_type = 'Lateral C Images';
                    $doc_data = $this->Document_model->getDocumentDataByPatID($patientID, $file_type);
                    if(empty($doc_data)){
                        if($i == 0){
                            $docsData = array(
                            'patient_id' => $patientID,
                            'file_type' => $file_type,
                            // 'des' => 'add',
                            'added_by' => $userID,
                            'cur_date' => date('Y-m-d')
                            );
                            $documentID = $this->Doctor_model->insertDocument($docsData);
                        }
                    }
                    $file_name = time().str_replace(' ','_',$_FILES['images_lateral_c']['name'][$i]);
                    move_uploaded_file($_FILES['images_lateral_c']['tmp_name'][$i], $upload_path . $file_name);
                    $images_lateral_c['img'] =time().str_replace(' ','_',$_FILES['images_lateral_c']['name'][$i]);
                    $images_lateral_c['type'] = 'patient';
                    $images_lateral_c['key'] = 'Lateral C Images';
                    if(empty($doc_data)){
                        $images_intra_oral['post_id'] = $documentID;
                    }else{
                        $images_intra_oral['post_id'] = $doc_data['doc_id'];
                    }
                    $images_lateral_c['user_id'] = $patientID;
                    $images_lateral_c['created_by'] = $userID;

                    $this->db->insert('photos',$images_lateral_c);
                }
            }

             //scna impression images
            for ($i = 0; $i < sizeof($_FILES['scan_impression_img']['name']); $i++) {
                if (!empty($_FILES['scan_impression_img']['name'][$i]) && $_FILES['scan_impression_img']['error'][$i] == 0) {

                     // On Update Check Doc Id Available If not then Insert
                    $file_type = 'Scans';
                    $doc_data = $this->Document_model->getDocumentDataByPatID($patientID, $file_type);
                    if(empty($doc_data)){
                        if($i == 0){
                            $docsData = array(
                            'patient_id' => $patientID,
                            'file_type' => $file_type,
                            // 'des' => 'add',
                            'added_by' => $userID,
                            'cur_date' => date('Y-m-d')
                            );
                            $documentID = $this->Doctor_model->insertDocument($docsData);
                        }
                    }

                    $file_name = time().str_replace(' ','_',$_FILES['scan_impression_img']['name'][$i]);
                    move_uploaded_file($_FILES['scan_impression_img']['tmp_name'][$i], $upload_path . $file_name);
                    $scan_impression_img['img'] =time().str_replace(' ','_',$_FILES['scan_impression_img']['name'][$i]);
                    $scan_impression_img['type'] = 'patient';
                    $scan_impression_img['key'] = 'Scans';
                    if(empty($doc_data)){
                        $scan_impression_img['post_id'] = $documentID;
                    }else{
                        $scan_impression_img['post_id'] = $doc_data['doc_id'];
                    }
                    $scan_impression_img['user_id'] = $patientID;
                    $scan_impression_img['created_by'] = $userID;

                    $this->db->insert('photos',$scan_impression_img);
                }
            }

            //images_stl
            for ($i = 0; $i < sizeof($_FILES['images_stl']['name']); $i++) {
                if (!empty($_FILES['images_stl']['name'][$i]) && $_FILES['images_stl']['error'][$i] == 0) {
                    // On Update Check Doc Id Available If not then Insert
                    $file_type = 'STL File(3D File)';
                    $doc_data = $this->Document_model->getDocumentDataByPatID($patientID, $file_type);
                    if(empty($doc_data)){
                        if($i == 0){
                            $docsData = array(
                            'patient_id' => $patientID,
                            'file_type' => $file_type,
                            // 'des' => 'add',
                            'added_by' => $userID,
                            'cur_date' => date('Y-m-d')
                            );
                            $documentID = $this->Doctor_model->insertDocument($docsData);
                        }
                    }
                    $file_name = time().str_replace(' ','_',$_FILES['images_stl']['name'][$i]);
                    move_uploaded_file($_FILES['images_stl']['tmp_name'][$i], $upload_path . $file_name);
                    $images_stl['img'] =time().str_replace(' ','_',$_FILES['images_stl']['name'][$i]);
                    $images_stl['type'] = 'patient';
                    $images_stl['key'] = 'STL File(3D File)';
                    if(empty($doc_data)){
                        $images_intra_oral['post_id'] = $documentID;
                    }else{
                        $images_intra_oral['post_id'] = $doc_data['doc_id'];
                    }
                    $images_stl['user_id'] = $patientID;
                    $images_stl['created_by'] = $userID;

                    $this->db->insert('photos',$images_stl);
                }
            }

        if($result){
            $this->session->set_flashdata('success', "Patient Updated");
            redirect('doctor/patientList');
         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('doctor/patientList');
        }
    }
    public function viewPatient($pt_id)
    {
        $data['userdata']    = $this->userdata;
        $doctorID = $data['userdata']['id'];

        $singlePatient = $this->Doctor_model->getSinglePatient($pt_id);
        // $data['doctor_data'] = $this->Doctor_model->getDoctorByID($doctorID);
        $patient_data_array = array();
        for($i=0;$i<count($singlePatient); $i++){
            $chkpt_id = $singlePatient[$i]['pt_id'];
            $singleData = $singlePatient[$i];
            $single_product_data =  $this->Doctor_model->getPatientPhotosByID($chkpt_id);
            $singleData['patient_photos'] = $single_product_data;
            $patient_data_array[] = $singleData;
        }
        $data['singlePatient'] = $patient_data_array;
        $data['shipping_address'] = $this->Admin_model->getDoctorShippingAddress();

        $data['getPatientTreatmentPlans'] = $this->Plan_model->getNewTreatmentPlansByPatientID($pt_id);
        // array_unshift($data['getPatientTreatmentPlans'],"");
        // unset($data['getPatientTreatmentPlans'][0]);

        foreach($data['getPatientTreatmentPlans']  as $plans){
            if($plans->pre_status == 1 && $plans->status == 1){ 
             $data['plan_details'] = $this->Plan_model->getTreatmentPlansDetailsByPlanID($plans->id);
           }
        }

        $data['getAcceptedPatientPlan'] = $this->Plan_model->getAcceptedPatientPlan($pt_id);
        $data['getRejectedPatientPlan'] = $this->Plan_model->getRejectedPatientPlan($pt_id);
        $data['getModifyAccPatientPlan'] = $this->Plan_model->getModifyAccPatientPlan($pt_id);
        $data['getModifyRejPatientPlan'] = $this->Plan_model->getModifyRejPatientPlan($pt_id);

        
         // print_r($patientID);die();
        // echo "<pre>"; print_r($data['getPatientTreatmentPlans']);die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('patients/viewNewPatient',$data);
        $this->load->view('elements/admin_footer',$data);
    }

    public function imgCrops()
    {
        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];
        $data['doctor_data'] = $this->Admin_model->getDoctorByID($adminID);
        // print_r($data['doctor_data']);die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('imgCrops',$data);
        $this->load->view('elements/admin_footer',$data);
    }
     public function imgCrop()
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
    public function deleteImagData()
    {
        $img_id=$this->input->post('img_id');
        $carImageData=$this->Doctor_model->deleteImagesByID($img_id);
        echo json_encode($carImageData);
    }

     public function getdownloadPostFile($docType, $postID)
    {
        $postData = $this->Doctor_model->getPhotosTyoePostID($docType, $postID);
        echo print($postData);

        for($i=0;$i<count($postData);$i++)
        {
            $imgPath = 'assets/uploads/images/'.$postData[$i]['img'];
            $postFile = $imgPath;
            $this->zip->read_file($postFile);
        }
        $this->zip->download(''.time().'.zip');
    }


     public  function getPatientImagetype(){

        $type = htmlspecialchars($_GET["imageType"]);
        $patientID = htmlspecialchars($_GET["id"]);
        if($type){

            if($type == 'oral_opg_lateral'){
                $image_type = 'Intra Oral Images';
                $intra = $this->Doctor_model->getImageByTypeAndID($patientID, $image_type);
                
                $image_type = 'OPG Images';
                $opg = $this->Doctor_model->getImageByTypeAndID($patientID, $image_type);
                
                $image_type = 'Lateral C Images';
                 $lateral = $this->Doctor_model->getImageByTypeAndID($patientID, $image_type);

                $result = array_merge($intra, $opg, $lateral);

                echo json_encode($result);
                exit();

            }elseif($type == 'stl_file'){
                $image_type = 'STL File(3D File)';
            }elseif($type == 'scans_images'){
                $image_type = 'Scans';
            }elseif($type == 'treatment_plan_images'){
                $image_type = 'Treatment Plan';
            }elseif($type == 'ipr_file'){
                $image_type = 'IPR';
            }elseif($type == 'invoice'){
                $image_type = 'Invoice';
            }

        }
        // $patientID = $this->input->post('id');
        // $imageType = $this->input->post('imageType');

        $result = $this->Doctor_model->getImageByTypeAndID($patientID, $image_type);
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


     public function searchPatient()
    {
        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];

        $patientName = $this->input->post('patient_name');

        $this->db->select('*');
        // $this->db->where('user_type_id', 2);
        // $this->db->where('doctor_id', $adminID);
        $this->db->from('patients');
        $this->db->like('pt_firstname', $patientName);
        $this->db->or_like('pt_lastname', $patientName);
        // $this->db->or_like('phone_number', $patientName);
        $this->db->or_like('pt_email', $patientName);
        // $this->db->or_like('gst_no', $patientName);

        $res = $this->db->get();
        $result = $res->result_array();

        if ($result) {
            
            echo json_encode($result);
            exit;
        }
    }

    public function getAllPatient()
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];

        // $patientName = $this->input->post('patient_name');
        $this->db->select('*');
        $this->db->where('id', $userID);
        $this->db->from('patients');

        $res = $this->db->get();
        $result = $res->result_array();
        
        if ($result) {
            echo json_encode($result);
            exit;
        }
    }


    // Treatment Plan Module

    // View Treatment Plan List
    public function viewNewTreatmentPlan($patientID){
        $data['userdata']    = $this->userdata;
        $doctorID = $data['userdata']['id'];

        $data['patientID'] = $patientID;
        $data['getPatientTreatmentPlans'] = $this->Plan_model->getNewTreatmentPlansByPatientID($patientID);

        $data['getAcceptedPatientPlan'] = $this->Plan_model->getAcceptedPatientPlan($patientID);
        $data['getRejectedPatientPlan'] = $this->Plan_model->getRejectedPatientPlan($patientID);
        $data['getModifyAccPatientPlan'] = $this->Plan_model->getModifyAccPatientPlan($patientID);
        $data['getModifyRejPatientPlan'] = $this->Plan_model->getModifyRejPatientPlan($patientID);

        // echo "<pre>"; print_r($data['getPatientTreatmentPlans']);die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('treatmentplan/viewTreatmentPlan',$data);
        $this->load->view('elements/admin_footer',$data);
    }

    // View Treatment Plan List
    public function viewTreatmentPlan($patientID){
        $data['userdata']    = $this->userdata;
        $doctorID = $data['userdata']['id'];

        $data['patientID'] = $patientID;
        $data['getPatientTreatmentPlans'] = $this->Plan_model->getTreatmentPlansByPatientID($patientID);

         $data['getAcceptedPatientPlan'] = $this->Plan_model->getAcceptedPatientPlan($patientID);
        $data['getRejectedPatientPlan'] = $this->Plan_model->getRejectedPatientPlan($patientID);
        $data['getModifyAccPatientPlan'] = $this->Plan_model->getModifyAccPatientPlan($patientID);
        $data['getModifyRejPatientPlan'] = $this->Plan_model->getModifyRejPatientPlan($patientID);


        // echo "<pre>"; print_r($data['getAcceptedPatientPlan']);die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('treatmentplan/viewTreatmentPlan',$data);
        $this->load->view('elements/admin_footer',$data);
    }

    public function viewTreatmentPlanDetails($planID){
        $data['userdata']    = $this->userdata;
        $doctorID = $data['userdata']['id'];

        $data['getSingleTreatmentPlan'] = $this->Plan_model->getTreatmentPlansByPlanID($planID);
        $data['getTreatmentPlanDetails'] = $this->Plan_model->getTreatmentPlansDetailsByPlanID($planID);

        $patientID = $data['getSingleTreatmentPlan']->patient_id;
        $data['getPatientTreatmentPlans'] = $this->Plan_model->getTreatmentPlansData($patientID);
        // array_unshift($data['getPatientTreatmentPlans'],"");
        // unset($data['getPatientTreatmentPlans'][0]);
            
         $data['getAcceptedPatientPlan'] = $this->Plan_model->getAcceptedPatientPlan($patientID);
        $data['getRejectedPatientPlan'] = $this->Plan_model->getRejectedPatientPlan($patientID);
        $data['getModifyAccPatientPlan'] = $this->Plan_model->getModifyAccPatientPlan($patientID);
        $data['getModifyRejPatientPlan'] = $this->Plan_model->getModifyRejPatientPlan($patientID);

        // echo "<pre>"; print_r($patientID);die();
        // echo "<pre>"; print_r($data['getAcceptedPatientPlan']);die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('treatmentplan/viewTreatmentPlanDetails',$data);
        $this->load->view('elements/admin_footer',$data);
    }

    public function acceptTreatmentPlan($planID){
        $data['userdata']    = $this->userdata;
        $doctorID = $data['userdata']['id'];

        $planData['status'] = 1;
        $this->db->where('id', $planID);
        $result = $this->db->update('plans', $planData);   

        if($result){
            $this->session->set_flashdata('success', "Plan Updated");
            redirect('doctor/viewTreatmentPlanDetails/'.$planID);
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('doctor/viewTreatmentPlanDetails/'.$planID);
        }

    }

    public function rejectTreatmentPlan($planID){
        $data['userdata']    = $this->userdata;
        $doctorID = $data['userdata']['id'];

        $planData['status'] = 2;
        $planData['updated'] = 0;
        // $planData['seen'] = 0;
        $this->db->where('id', $planID);
        $result = $this->db->update('plans', $planData);   
            
        if($result){
            $this->session->set_flashdata('success', "Plan Updated");
            redirect('doctor/viewTreatmentPlanDetails/'.$planID);
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('doctor/viewTreatmentPlanDetails/'.$planID);
        }

    }


    public function submitPlanDetails($planID){   
        $data['userdata']    = $this->userdata;
        $doctorID = $data['userdata']['id'];

       // echo "<pre>";
       //  print_r($this->input->post());
       //  die();

        $data = array(
            'plan_id' => $planID,
            'treatment_type' => $this->input->post('treatment_type'),
            'upper_sheet' => $this->input->post('type_upper'),
            'lower_sheet' => $this->input->post('type_lower'),
            'upper_aligners' => $this->input->post('upper_aligners'),
            'lower_aligners' => $this->input->post('lower_aligners'),
        );
        
        $this->db->insert('plan_details',$data);
        $planDetailID = $this->db->insert_id();

        if($planDetailID){
            $planData['status'] = 1;
            $planData['pre_status'] = 1;
            $this->db->where('id', $planID);
            $this->db->update('plans', $planData); 
        }


        if($planDetailID){
            $this->session->set_flashdata('success', "Plan Details Updated");
            redirect('doctor/viewTreatmentPlanDetails/'.$planID);
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('doctor/viewTreatmentPlanDetails/'.$planID);
        }

    }

    public function submitRejectedPlanDetails($planID){   
        $data['userdata']    = $this->userdata;
        $doctorID = $data['userdata']['id'];

        $data = array(
            'plan_id' => $planID,
            'rejected_reason' => $this->input->post('rejected_reason'),
        );
        
        $this->db->insert('plan_details',$data);
        $planDetailID = $this->db->insert_id();

        if($planDetailID){
            $planData['status'] = 2;
            $planData['pre_status'] = 1;
            $this->db->where('id', $planID);
            $this->db->update('plans', $planData); 
        }
        
        if($planDetailID){
            $this->session->set_flashdata('success', "Plan Details Updated");
            redirect('doctor/viewTreatmentPlanDetails/'.$planID);
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('doctor/viewTreatmentPlanDetails/'.$planID);
        }
    }

    // PDF File
    public function getdownloadPdfPlanFile($planID)
    {
        $postData = $this->Plan_model->getPDFFilesbyPlanID($planID);
        echo print($postData);

        for($i=0;$i<count($postData);$i++)
        {
            $imgPath = 'assets/uploads/images/'.$postData[$i]['pdf_file'];
            $postFile = $imgPath;
            $this->zip->read_file($postFile);
        }
        $this->zip->download(''.time().'.zip');
    }

    // Video File
    public function getdownloadVideoPlanFile($planID)
    {
        $postData = $this->Plan_model->getPDFFilesbyPlanID($planID);
        echo print($postData);

        for($i=0;$i<count($postData);$i++)
        {
            $imgPath = 'assets/uploads/images/'.$postData[$i]['video_file'];
            $postFile = $imgPath;
            $this->zip->read_file($postFile);
        }
        $this->zip->download(''.time().'.zip');
    }


    public function updatePlanStatus(){
        
        $data = $_POST;
        if(isset($data['plan_id'])){
            $rec = array('seen'=>'1');
            $this->db->where('id',$data['plan_id']);
            $this->db->update('plans',$rec);
        }
    }


    public function addScan()
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('scan/addScan',$data);
        $this->load->view('elements/admin_footer',$data);

    }

    public function submitScan()
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        // echo "<pre>"; print_r($this->input->post()); die();
        // echo "<pre>"; print_r($_FILES['drop_scan_file']['name'][0]); 
        // echo "<pre>"; print_r($_FILES['scan_file']['name'][0]); die();


        //upload images
        for ($i = 0; $i < sizeof($_FILES['drop_intra_file']['name']); $i++) {
            if (!empty($_FILES['drop_intra_file']['name'][$i]) && $_FILES['drop_intra_file']['error'][$i] == 0) {
                if($i == 0){
                    $docsData = array(
                    'patient_id' => 420,
                    'file_type' => 'drop_intra_file',
                    'added_by' => $userID,
                    'cur_date' => date('Y-m-d')
                    );
                    $documentID = $this->Doctor_model->insertDocument($docsData);
                }
                $file_name = time().str_replace(' ','_',$_FILES['drop_intra_file']['name'][$i]);
                $images_intra_oral['img'] =time().str_replace(' ','_',$_FILES['drop_intra_file']['name'][$i]);
                $images_intra_oral['key'] = 'drop_intra_file';
                $images_intra_oral['type'] = 'patient';
                $images_intra_oral['post_id'] = $documentID;
                $images_intra_oral['user_id'] = 420;
                $images_intra_oral['created_by'] = $userID;
                // echo "<pre>";
                // print_r($images_intra_oral); 
                // echo "</pre>";
                // die();
                $this->db->insert('photos',$images_intra_oral);
            }
        }

        // //upload images
        // for ($i = 0; $i < sizeof($_FILES['scan_file']['name']); $i++) {
        //     // echo "<pre>"; print_r($_FILES['scan_file']['name'][$i]); die();
        //     if (!empty($_FILES['scan_file']['name'][$i]) && $_FILES['scan_file']['error'][$i] == 0) {
            
        //         // echo "<pre>"; print_r($_FILES['scan_file']['name'][$i]); die();

        //         // $file_name = time().str_replace(' ','_',$_FILES['scan_file']['name'][$i]);
        //         // move_uploaded_file($_FILES['scan_file']['tmp_name'][$i], $upload_path . $file_name);

        //         // $patientID = uniqid();
        //         $scan_file['img'] = $_FILES['scan_file']['name'][$i];
        //         $scan_file['key'] = 'Composite';
        //         $scan_file['type'] = 'patient';
        //         $scan_file['post_id'] = 1;
        //         $scan_file['user_id'] = 1;
        //         $scan_file['created_by'] = $userID;

        //         $this->db->insert('photos',$scan_file);
        //     }
        // }

        // //upload images
        // for ($i = 0; $i < sizeof($_FILES['drop_scan_file']['name']); $i++) {
        //         // echo "<pre>"; print_r($_FILES['scan_file']['name'][$i]); die();
            
        //     if (!empty($_FILES['drop_scan_file']['name'][$i]) && $_FILES['drop_scan_file']['error'][$i] == 0) {
            
        //         // echo "<pre>"; print_r($_FILES['drop_scan_file']['name'][$i]); die();

        //         // $file_name = time().str_replace(' ','_',$_FILES['scan_file']['name'][$i]);
        //         // move_uploaded_file($_FILES['scan_file']['tmp_name'][$i], $upload_path . $file_name);

        //         // $patientID = uniqid();
        //         $drop_scan_file['img'] = $_FILES['drop_scan_file']['name'][$i];
        //         $drop_scan_file['key'] = 'Composite';
        //         $drop_scan_file['type'] = 'patient';
        //         $drop_scan_file['post_id'] = 1;
        //         $drop_scan_file['user_id'] = 1;
        //         $drop_scan_file['created_by'] = $userID;

        //         $this->db->insert('photos',$drop_scan_file);
        //     }
        // }



        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('scan/addScan',$data);
        $this->load->view('elements/admin_footer',$data);

    }

    public function upload()
    {
        $output = '';
        $fileName = '';
        $base_url = base_url();

        if(isset($_FILES['file']['name'][0])) {  
            foreach($_FILES['file']['name'] as $keys => $values) {
                $fileName = time().str_replace(' ','_',$_FILES['file']['name'][$keys]);
                if(move_uploaded_file($_FILES['file']['tmp_name'][$keys], 'assets/uploads/images/' . $fileName)) {    
                    // $scan_file['img'] = $file_name;
                    // $scan_file['key'] = 'Composite';
                    // $scan_file['type'] = 'patient';
                    // $scan_file['post_id'] = 1;
                    // $scan_file['user_id'] = 1;
                    // $scan_file['created_by'] = 1;

                    // $this->db->insert('photos',$scan_file);

                    $output .= '<div class="uk-grid uk-margin-medium-top"><div class="uk-width-medium-1-2"><div class="uk-flex uk-flex-middle uk-flex-between uk-flex-center upload-stl-bg"><span><img src="'.$base_url.'assets/images/pdf-icon.svg" class="h-100" /><span class="pl-15p">'.$_FILES['file']['name'][$keys].'</span></span><img src="'.$base_url.'assets/images/delete-icon.svg"></div></div></div>';
                        // $output .= '<div class="uk-width-medium-1-4"><img src="'.$base_url.'assets/uploads/'.$values.'" class="h-100" /></div>';  
                }  
            }  
        }  
        echo $output;  
    }


}   
