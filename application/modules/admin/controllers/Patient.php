<?php
/**
 * Controller Name: Admin
 * Description: back end admin
 * @author Surfiq Tech
 * Created date: 2021-07-04
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient extends MY_Controller
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
        $this->load->model(array("Admin_model","Patient_model","doctor/Doctor_model","Document_model"));
    }
    /**
     * @author Surfiq Tech
     */
    public function patientListing()
    {
        $data['admin_data']    = $this->adminData;
        $data['patientList'] = $this->Patient_model->getPatientList();
        $allPatientList=  $data['patientList'];
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

        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('patient/patientList',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function patientGridList()
    {
        $data['admin_data']    = $this->adminData;
        $data['patientList'] = $this->Patient_model->getPatientList();
               
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('patient/patientGridList',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function addPatient()
    {
        $data['admin_data']    = $this->adminData;
        $data['doctor_data'] = $this->Admin_model->doctorsList();
        $data['reference_doctor'] = $this->Admin_model->getReferenceDoctors();
        $data['business_developer'] = $this->Admin_model->getBusinessDeveloper();
        $data['treatment_data'] = $this->Admin_model->getTreatmentData();
        $data['treatment_case_data'] = $this->Admin_model->getTreatmentCaseData();
        $data['arch_data'] = $this->Admin_model->getArchData();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('patient/addPatient',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function submitPatient()
    {   
        // echo "<pre>";
        // print_r($this->input->post());
        // die();

        $data['admin_data']    = $this->adminData;
        $adminData = $this->adminData;
        $adminID = $adminData['id'];

        $upload_path = 'assets/uploads/images/';

        $treatmentData = $this->input->post('treatmentData');
        $treatmentCaseData = $this->input->post('treatmentCaseData');
        $archData = $this->input->post('archData');

        $patientData = array(
                'doctor_id' => $this->input->post('doctor_id'),
                'pt_firstname' => $this->input->post('pt_firstname'),
                'pt_lastname' => $this->input->post('pt_lastname'),
                'pt_gender' => $this->input->post('pt_gender'),
                'ipr_performed' => $this->input->post('ipr_performed'),
                'attachment_placed' => $this->input->post('attachment_placed'),
                'pt_email' => $this->input->post('pt_email'),
                'pt_age' => $this->input->post('pt_age'),
                'pt_img' => $this->input->post('pt_img_name'),
                'pt_scan_impression' => $this->input->post('pt_scan_impression'),
                'pt_objective' => $this->input->post('pt_objective'),
                // 'pt_referal' => $this->input->post('pt_referal'),
                // 'pt_treatment_plan' => $this->input->post('pt_treatment_plan'),
                // 'pt_approval' => $this->input->post('pt_approval'),
                // 'pt_approval_date' => $this->input->post('pt_approval_date'),
                // 'pt_custom_status' => $this->input->post('pt_custom_status'),
                // 'pt_case_type' => $this->input->post('pt_case_type'),
                // 'pt_aligners' => $this->input->post('pt_aligners'),
                // 'pt_aligners_dispatch' => $this->input->post('pt_aligners_dispatch'),
                'pt_cost_plan' => 0,
                'pt_amount_paid' => 0,
                'pt_shipping_details' => $this->input->post('pt_shipping_details'),
                'pt_billing_address' => $this->input->post('pt_billing_address'),
                'pt_dispatch_date' => $this->input->post('pt_dispatch_date'),
                'type_of_treatment' => json_encode(implode(",", $treatmentData)),
                'other_type_of_treatment' => $this->input->post('other_type_of_treatment'),
                'type_of_case' => json_encode(implode(",", $treatmentCaseData)),
                'arc_treated' => json_encode(implode(",", $archData)),
                'attachment_placed' => $this->input->post('attachment_placed'),
                'ipr_performed' => $this->input->post('ipr_performed'),
                'pt_status' => 1,
                'added_by' => $adminID,
                'cur_date' => date('Y-m-d')
        );

        $patientID = $this->Patient_model->insertPatients($patientData);
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
                        'added_by' => $adminID,
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
                    $images_intra_oral['created_by'] = $adminID;

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
                        'added_by' => $adminID,
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
                    $images_opg['created_by'] = $adminID;

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
                        'added_by' => $adminID,
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
                    $images_lateral_c['created_by'] = $adminID;

                    $this->db->insert('photos',$images_lateral_c); 
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
                        'added_by' => $adminID,
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
                    $images_stl['created_by'] = $adminID;

                    $this->db->insert('photos',$images_stl); 
                }
            } 
            //images_treatment_plan
            // for ($i = 0; $i < sizeof($_FILES['images_treatment_plan']['name']); $i++) {
            //     if (!empty($_FILES['images_treatment_plan']['name'][$i]) && $_FILES['images_treatment_plan']['error'][$i] == 0) {
            //         if($i == 0){
            //             $docsData = array(
            //             'patient_id' => $patientID,
            //             'file_type' => 'Treatment Plan',
            //             // 'des' => 'add',
            //             'added_by' => $adminID,
            //             'cur_date' => date('Y-m-d')
            //             );
            //             $documentID = $this->Doctor_model->insertDocument($docsData);
            //         }
            //         $file_name = time().str_replace(' ','_',$_FILES['images_treatment_plan']['name'][$i]);
            //         move_uploaded_file($_FILES['images_treatment_plan']['tmp_name'][$i], $upload_path . $file_name);
            //         $images_treatment_plan['img'] =time().str_replace(' ','_',$_FILES['images_treatment_plan']['name'][$i]);
            //         $images_treatment_plan['type'] = 'patient';
            //         $images_treatment_plan['key'] = 'Treatment Plan';
            //         $images_treatment_plan['post_id'] = $documentID;
            //         $images_treatment_plan['user_id'] = $patientID;
            //         $images_treatment_plan['created_by'] = $adminID;

            //         $result = $this->db->insert('photos',$images_treatment_plan); 



            //         $doctorID = $this->input->post('doctor_id');
            //         $doctorDetial =  $this->Admin_model->getDoctorProfile($doctorID);

            //         $doctorName = $doctorDetial->first_name." ".$doctorDetial->last_name;
            //         $doctorEmail = $doctorDetial->email;
            //         $patientName = $this->input->post('pt_firstname')." ".$this->input->post('pt_lastname');

            //         if($doctorDetial->notification_alert == 'on'){

            //             $url = site_url('doctor/viewPatient/');                                           
            //             $link = '<a href="'.$url.$patientID.'" target="_blank"><span style="">Click Here</span></a>';
            //             $subject = "The Treatment Plan For ". $patientName ." has been added!";

            //             $message = "The Treatment Plan for ". $patientName ." can be viewed now. To view the Treatment Plan, ".$link.".";

            //             // Always set content-type when sending HTML email
            //             $headers = "MIME-Version: 1.0" . "\r\n";
            //             $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            //             // More headers
            //             $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

            //             $mailRes = mail($doctorEmail,$subject,$message,$headers);
            //         }
            //     }
            // } 

            //scna impression images
            for ($i = 0; $i < sizeof($_FILES['scan_impression_img']['name']); $i++) {
                if (!empty($_FILES['scan_impression_img']['name'][$i]) && $_FILES['scan_impression_img']['error'][$i] == 0) {
                    if($i == 0){
                        $docsData = array(
                        'patient_id' => $patientID,
                        'file_type' => 'Scans',
                        // 'des' => 'add',
                        'added_by' => $adminID,
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
                    $scan_impression_img['created_by'] = $adminID;

                    $this->db->insert('photos',$scan_impression_img); 
                }
            } 
            //ipr files
            for ($i = 0; $i < sizeof($_FILES['ipr_files']['name']); $i++) {
                if (!empty($_FILES['ipr_files']['name'][$i]) && $_FILES['ipr_files']['error'][$i] == 0) {
                    if($i == 0){
                        $docsData = array(
                        'patient_id' => $patientID,
                        'file_type' => 'IPR',
                        // 'des' => 'add',
                        'added_by' => $adminID,
                        'cur_date' => date('Y-m-d')
                        );
                        $documentID = $this->Doctor_model->insertDocument($docsData);
                    }
                    $file_name = time().str_replace(' ','_',$_FILES['ipr_files']['name'][$i]);
                    move_uploaded_file($_FILES['ipr_files']['tmp_name'][$i], $upload_path . $file_name);
                    $ipr_files['img'] =time().str_replace(' ','_',$_FILES['ipr_files']['name'][$i]);
                    $ipr_files['type'] = 'patient';
                    $ipr_files['key'] = 'IPR';
                    $ipr_files['post_id'] = $documentID;
                    $ipr_files['user_id'] = $patientID;
                    $ipr_files['created_by'] = $adminID;

                    $result = $this->db->insert('photos',$ipr_files); 

                    $doctorID = $this->input->post('doctor_id');
                    $doctorDetial =  $this->Admin_model->getDoctorProfile($doctorID);

                    $doctorName = $doctorDetial->first_name." ".$doctorDetial->last_name;
                    $doctorEmail = $doctorDetial->email;

                    $patientName = $this->input->post('pt_firstname')." ".$this->input->post('pt_lastname');
                    
                    if($doctorDetial->notification_alert == 'on'){

                        $url = site_url('doctor/viewPatient/');
                        $link = '<a href="'.$url.$patientID.'" target="_blank"><span style="">Click Here</span></a>';    
                        
                        $subject = "The IPR For ". $patientName ." has been added!";
                        $message = "The IPR for ". $patientName ." can be viewed now. To view the IPR, ".$link.".";

                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
                        $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

                        $mailRes = mail($doctorEmail,$subject,$message,$headers);
                    }

                }
            } 
            //inoice files
            for ($i = 0; $i < sizeof($_FILES['invoice_files']['name']); $i++) {
                if (!empty($_FILES['invoice_files']['name'][$i]) && $_FILES['invoice_files']['error'][$i] == 0) {
                    if($i == 0){
                        $docsData = array(
                        'patient_id' => $patientID,
                        'file_type' => 'Invoice',
                        // 'des' => 'add',
                        'added_by' => $adminID,
                        'cur_date' => date('Y-m-d')
                        );
                        $documentID = $this->Doctor_model->insertDocument($docsData);
                    }
                    $file_name = time().str_replace(' ','_',$_FILES['invoice_files']['name'][$i]);
                    move_uploaded_file($_FILES['invoice_files']['tmp_name'][$i], $upload_path . $file_name);
                    $invoice_files['img'] =time().str_replace(' ','_',$_FILES['invoice_files']['name'][$i]);
                    $invoice_files['type'] = 'patient';
                    $invoice_files['key'] = 'Invoice';
                    $invoice_files['post_id'] = $documentID;
                    $invoice_files['user_id'] = $patientID;
                    $invoice_files['created_by'] = $adminID;

                    $this->db->insert('photos',$invoice_files); 
                }
            } 
            $this->session->set_flashdata('success','Patient Added');
            redirect('admin/patient/patientListing');
        }
        else{
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('admin/patient/patientListing');
        }
    }

    public function viewPatient($pt_id)
    {
        $data['admin_data'] = $this->adminData;
        $adminID = $data['admin_data']['id'];
        $singlePatient = $this->Patient_model->getSinglePatient($pt_id);

        $patient_data_array = array();
        for($i=0;$i<count($singlePatient); $i++){
            $chkpt_id = $singlePatient[$i]['pt_id'];
            $singleData = $singlePatient[$i];
            $single_product_data =  $this->Patient_model->getPatientPhotosByID($chkpt_id);
            $singleData['patient_photos'] = $single_product_data;
            $patient_data_array[] = $singleData;
        }
        $data['singlePatient'] = $patient_data_array;
        $data['shipping_address'] = $this->Admin_model->getDoctorShippingAddress();
        
		// echo "<pre>";
		// print_r($data['singlePatient']);
		// die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('patient/viewPatient',$data);
        $this->load->view('elements/admin_footer',$data);
    }
     public function editPatient($pt_id)
    {
        $data['admin_data'] = $this->adminData;
        $adminID = $data['admin_data']['id'];
        $singlePatient = $this->Patient_model->getSinglePatient($pt_id);
        // $data['doctor_data'] = $this->Admin_model->getRegUsers();
         $data['doctor_data'] = $this->Admin_model->doctorsList();
        $data['reference_doctor'] = $this->Admin_model->getReferenceDoctors();
        $data['business_developer'] = $this->Admin_model->getBusinessDeveloper();
        $data['treatment_data'] = $this->Admin_model->getTreatmentData();
        $data['treatment_case_data'] = $this->Admin_model->getTreatmentCaseData();
        $data['arch_data'] = $this->Admin_model->getArchData();
        
        $patient_data_array = array();
        
        // echo "<pre>";
        // print_r($singlePatient);
        // die();
       
        for($i=0;$i<count($singlePatient); $i++){
            $pt_id = $singlePatient[$i]['pt_id'];
            $singleData = $singlePatient[$i];
            $single_product_data =  $this->Patient_model->getPatientPhotosByID($pt_id);
            $singleData['patient_photos'] = $single_product_data;
            $patient_data_array[] = $singleData;
        }
        
        //  echo "<pre>";
        // print_r($treatment_case_data);
        // die();
        
        $data['patient_data'] = $patient_data_array;
        // print_r($data['patient_data']);die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('patient/editPatient',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function updatePatient()
    {
        $data['admin_data'] = $this->adminData;
        $adminID = $data['admin_data']['id'];
        
        $patientID = $this->input->post('patientID');

        $upload_path = 'assets/uploads/images/';
        $patientData['doctor_id'] = $this->input->post('doctor_id');
        $patientData['pt_firstname'] = $this->input->post('pt_firstname');
        $patientData['pt_lastname'] = $this->input->post('pt_lastname');
        $patientData['pt_gender'] = $this->input->post('pt_gender');
        $patientData['pt_email'] = $this->input->post('pt_email');
        $patientData['pt_age'] = $this->input->post('pt_age');

        if($this->input->post('pt_img_name')!='') {
            $patientData['pt_img'] = $this->input->post('pt_img_name');
        }

        $patientData['pt_scan_impression'] = $this->input->post('pt_scan_impression');
        // $patientData['pt_referal'] = $this->input->post('pt_referal');
        // $patientData['pt_treatment_plan'] = $this->input->post('pt_treatment_plan');
        // $patientData['pt_approval'] = $this->input->post('pt_approval');
        // $patientData['pt_approval_date'] = $this->input->post('pt_approval_date');
        // $patientData['pt_custom_status'] = $this->input->post('pt_custom_status');
        $patientData['pt_case_type'] = $this->input->post('pt_case_type');
        // $patientData['pt_aligners'] = $this->input->post('pt_aligners');
        // $patientData['pt_aligners_dispatch'] = $this->input->post('pt_aligners_dispatch');
        $patientData['pt_cost_plan'] = 0;
        $patientData['pt_amount_paid'] = 0;
        $patientData['pt_shipping_details'] = $this->input->post('pt_shipping_details');
        $patientData['pt_billing_address'] = $this->input->post('pt_billing_address');
        // $patientData['pt_dispatch_date'] = $this->input->post('pt_dispatch_date');
        $patientData['pt_firstname'] = $this->input->post('pt_firstname');
        $patientData['pt_firstname'] = $this->input->post('pt_firstname');
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
                            'added_by' => $adminID,
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
                    $images_intra_oral['created_by'] = $adminID;

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
                            'added_by' => $adminID,
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
                        $images_opg['post_id'] = $documentID;
                    }else{
                        $images_opg['post_id'] = $doc_data['doc_id'];
                    }
                    $images_opg['user_id'] = $patientID;
                    $images_opg['created_by'] = $adminID;

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
                            'added_by' => $adminID,
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
                        $images_lateral_c['post_id'] = $documentID;
                    }else{
                        $images_lateral_c['post_id'] = $doc_data['doc_id'];
                    }
                    $images_lateral_c['user_id'] = $patientID;
                    $images_lateral_c['created_by'] = $adminID;

                    $this->db->insert('photos',$images_lateral_c); 
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
                            'added_by' => $adminID,
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
                        $images_stl['post_id'] = $documentID;
                    }else{
                        $images_stl['post_id'] = $doc_data['doc_id'];
                    }
                    $images_stl['user_id'] = $patientID;
                    $images_stl['created_by'] = $adminID;

                    $this->db->insert('photos',$images_stl); 
                }
            } 
            //images_treatment_plan
            // for ($i = 0; $i < sizeof($_FILES['images_treatment_plan']['name']); $i++) {
            //     if (!empty($_FILES['images_treatment_plan']['name'][$i]) && $_FILES['images_treatment_plan']['error'][$i] == 0) {
                    
            //         // On Update Check Doc Id Available If not then Insert
            //         $file_type = 'Treatment Plan';
            //         $doc_data = $this->Document_model->getDocumentDataByPatID($patientID, $file_type);
            //         if(empty($doc_data)){
            //             if($i == 0){
            //                 $docsData = array(
            //                 'patient_id' => $patientID,
            //                 'file_type' => $file_type,
            //                 // 'des' => 'add',
            //                 'added_by' => $adminID,
            //                 'cur_date' => date('Y-m-d')
            //                 );
            //                 $documentID = $this->Doctor_model->insertDocument($docsData);
            //             }
            //         }
            //         $file_name = time().str_replace(' ','_',$_FILES['images_treatment_plan']['name'][$i]);
            //         move_uploaded_file($_FILES['images_treatment_plan']['tmp_name'][$i], $upload_path . $file_name);
            //         $images_treatment_plan['img'] =time().str_replace(' ','_',$_FILES['images_treatment_plan']['name'][$i]);
            //         $images_treatment_plan['type'] = 'patient';
            //         $images_treatment_plan['key'] = 'Treatment Plan';
            //         if(empty($doc_data)){
            //             $images_treatment_plan['post_id'] = $documentID;
            //         }else{
            //             $images_treatment_plan['post_id'] = $doc_data['doc_id'];
            //         }
            //         $images_treatment_plan['user_id'] = $patientID;
            //         $images_treatment_plan['created_by'] = $adminID;

            //         // $this->db->insert('photos',$images_treatment_plan);
            //         $result = $this->db->insert('photos',$images_treatment_plan); 


            //         // $patientID = $this->input->post('patientID');
            //         $patientDetial =  $this->Patient_model->getPatientByID($patientID);

            //         $doctorID = $patientDetial['doctor_id'];
            //         $doctorDetial =  $this->Admin_model->getDoctorProfile($doctorID);

            //         $doctorName = $doctorDetial->first_name." ".$doctorDetial->last_name;
            //         $doctorEmail = $doctorDetial->email;

            //         $patientName = $patientDetial['pt_firstname']." ".$patientDetial['pt_lastname'];

            //         if($doctorDetial->notification_alert == 'on'){

            //             $url = site_url('doctor/viewPatient/'); 
            //              $link = '<a href="'.$url.$patientID.'" target="_blank"><span style="">Click Here</span></a>';                         
            //             $subject = "The Treatment Plan For ". $patientName ." has been added!";
            //             $message = "The Treatment Plan for ". $patientName ." can be viewed now. To view the Treatment Plan, ".$link.".";

            //             // Always set content-type when sending HTML email
            //             $headers = "MIME-Version: 1.0" . "\r\n";
            //             $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            //             // More headers
            //             $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

            //             $mailRes = mail($doctorEmail,$subject,$message,$headers);
            //         }

            //     }
            // } 
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
                            'added_by' => $adminID,
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
                    $scan_impression_img['created_by'] = $adminID;

                    $this->db->insert('photos',$scan_impression_img); 
                }
            } 
            //ipr files
            for ($i = 0; $i < sizeof($_FILES['ipr_files']['name']); $i++) {
                if (!empty($_FILES['ipr_files']['name'][$i]) && $_FILES['ipr_files']['error'][$i] == 0) {
                    
                    // On Update Check Doc Id Available If not then Insert
                    $file_type = 'IPR';
                    $doc_data = $this->Document_model->getDocumentDataByPatID($patientID, $file_type);
                    if(empty($doc_data)){
                        if($i == 0){
                            $docsData = array(
                            'patient_id' => $patientID,
                            'file_type' => $file_type,
                            // 'des' => 'add',
                            'added_by' => $adminID,
                            'cur_date' => date('Y-m-d')
                            );
                            $documentID = $this->Doctor_model->insertDocument($docsData);
                        }
                    }
                    
                    $file_name = time().str_replace(' ','_',$_FILES['ipr_files']['name'][$i]);
                    move_uploaded_file($_FILES['ipr_files']['tmp_name'][$i], $upload_path . $file_name);
                    $ipr_files['img'] =time().str_replace(' ','_',$_FILES['ipr_files']['name'][$i]);
                    $ipr_files['type'] = 'patient';
                    $ipr_files['key'] = 'IPR';
                    if(empty($doc_data)){
                        $ipr_files['post_id'] = $documentID;
                    }else{
                        $ipr_files['post_id'] = $doc_data['doc_id'];
                    }
                    $ipr_files['user_id'] = $patientID;
                    $ipr_files['created_by'] = $adminID;

                    // $this->db->insert('photos',$ipr_files);
                    $result = $this->db->insert('photos',$ipr_files); 


                    $patientID = $this->input->post('patientID');
                    $patientDetial =  $this->Patient_model->getPatientByID($patientID);

                    $doctorID = $patientDetial['doctor_id'];
                    $doctorDetial =  $this->Admin_model->getDoctorProfile($doctorID);

                    $doctorName = $doctorDetial->first_name." ".$doctorDetial->last_name;
                    $doctorEmail = $doctorDetial->email;

                    $patientName = $patientDetial['pt_firstname']." ".$patientDetial['pt_lastname'];
                  
                    if($doctorDetial->notification_alert == 'on'){

                        $url = site_url('doctor/viewPatient/');
                        $link = '<a href="'.$url.$patientID.'" target="_blank"><span style="">Click Here</span></a>';     
                        
                        $subject = "The IPR For ". $patientName ." has been added!";
                        $message = "The IPR for ". $patientName ." can be viewed now. To view the IPR, ".$link.".";

                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
                        $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

                        $mailRes = mail($doctorEmail,$subject,$message,$headers);
                    }

                }
            } 
            //inoice files
            for ($i = 0; $i < sizeof($_FILES['invoice_files']['name']); $i++) {
                if (!empty($_FILES['invoice_files']['name'][$i]) && $_FILES['invoice_files']['error'][$i] == 0) {
                    
                    // On Update Check Doc Id Available If not then Insert
                    $file_type = 'Invoice';
                    $doc_data = $this->Document_model->getDocumentDataByPatID($patientID, $file_type);
                    if(empty($doc_data)){
                        if($i == 0){
                            $docsData = array(
                            'patient_id' => $patientID,
                            'file_type' => $file_type,
                            // 'des' => 'add',
                            'added_by' => $adminID,
                            'cur_date' => date('Y-m-d')
                            );
                            $documentID = $this->Doctor_model->insertDocument($docsData);
                        }
                    }
                    
                    $file_name = time().str_replace(' ','_',$_FILES['invoice_files']['name'][$i]);
                    move_uploaded_file($_FILES['invoice_files']['tmp_name'][$i], $upload_path . $file_name);
                    $invoice_files['img'] =time().str_replace(' ','_',$_FILES['invoice_files']['name'][$i]);
                    $invoice_files['type'] = 'patient';
                    $invoice_files['key'] = 'Invoice';
                    if(empty($doc_data)){
                        $invoice_files['post_id'] = $documentID;
                    }else{
                        $invoice_files['post_id'] = $doc_data['doc_id'];
                    }
                    $invoice_files['user_id'] = $patientID;
                    $invoice_files['created_by'] = $adminID;

                    $this->db->insert('photos',$invoice_files); 
                }
            } 

        $result = $this->Patient_model->udpatePatientData($patientID , $patientData);
        if($result){
            $this->session->set_flashdata('success', "Patient Updated");
            redirect('admin/patient/patientListing');
         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/patient/patientListing');
        }
    }
    public function getdownloadPostFile($docType, $postID)
    {
        $postData = $this->Patient_model->getPhotosTyoePostID($docType, $postID);
        echo print($postData);

        for($i=0;$i<count($postData);$i++)
        {
            $imgPath = 'assets/uploads/images/'.$postData[$i]['img'];
            $postFile = $imgPath;
            $this->zip->read_file($postFile);
        }
        $this->zip->download(''.time().'.zip');
    }
    public function deleteImgPatientData() 
    {
        $img_id=$this->input->post('img_id');
        $carImageData=$this->Patient_model->deleteImagePatientByID($img_id);
        echo json_encode($carImageData);
        
    }
    public function deletePatientByID()
    {
        $recordID = $this->input->post('recordID');
        $table_name = $this->input->post('table_name');
        $resultData = $this->Admin_model->deletePatientByID($recordID, $table_name);
        //delete photos
        $this->Admin_model->deletePhotosByID($recordID);
        $this->Admin_model->deleteDocumentByID($recordID);
        $this->Admin_model->deleteDocPhotosByID($recordID);
        if ($resultData) {
            //$this->session->set_flashdata('success', 'Record successfully deleted.');
            $response = array("type"=>"success","message"=>"Patient Deleted"); 
        } 
        else {
            $this->session->set_flashdata('error', 'Seems to an error. Please try again later.');
            $response = array("type"=>"error","message"=>"Something went wrong"); 

        }

        echo json_encode($response);
        exit;
    }

    //    Add New Shipping Address
    public  function addNewAddress(){
//      echo "<pre>";
//      print_r($this->input->post());
//      die();
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

//      $data['userdata']    = $this->userdata;
//      $adminID = $data['userdata']['id'];
        $doctorID = $this->input->post('doctorID');
        $newAddress = $this->input->post('new_address');
        $shippingData = array(
            'doctor_id' => $doctorID,
            'shipping_address' => $newAddress,
            'added_by' => $adminID,
        );

        $result = $this->Admin_model->insertShippingAddress($shippingData);
        if($result){
            echo json_encode($response);
            exit;
        } 
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
        if($result){
            echo json_encode($result);
            exit;
        } 
    }

    public  function getPatientImagetype(){

        $type = htmlspecialchars($_GET["imageType"]);
        $patientID = htmlspecialchars($_GET["id"]);
        if($type){

            if($type == 'oral_opg_lateral'){
                $image_type = 'Intra Oral Images';
                $intra = $this->Patient_model->getImageByTypeAndID($patientID, $image_type);
                
                $image_type = 'OPG Images';
                $opg = $this->Patient_model->getImageByTypeAndID($patientID, $image_type);
                
                $image_type = 'Lateral C Images';
                 $lateral = $this->Patient_model->getImageByTypeAndID($patientID, $image_type);

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

        $result = $this->Patient_model->getImageByTypeAndID($patientID, $image_type);
        echo json_encode($result);



    }

    public function searchPatient()
    {
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

        $patientName = $this->input->post('patient_name');

        $this->db->select('*');
        // $this->db->where('user_type_id', 2);
        // $this->db->where('is_active', 1);
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
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

        // $patientName = $this->input->post('patient_name');
        $this->db->select('*');
        $this->db->from('patients');

        $res = $this->db->get();
        $result = $res->result_array();
        
        if ($result) {
            echo json_encode($result);
            exit;
        }
    }

}
