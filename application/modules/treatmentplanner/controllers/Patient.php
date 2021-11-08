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
        // parent::__construct();    
        // $this->checkAdminLogin(); 
        // $this->userdata = $this->session->userdata('adminData'); 
        // $this->load->model(array("Admin_model","Patient_model","doctor/Doctor_model","Document_model"));
        
        parent::__construct();    
        $this->checkUserLogin(); 
        $this->userdata = $this->session->userdata('userdata');
        $this->load->model(array("Doctor_model","Plan_model","admin/Admin_model","admin/Patient_model","admin/Document_model"));

    }
    /**
     * @author Surfiq Tech
     */
    public function patientListing()
    {   

        $type = htmlspecialchars($_GET["plan_type"]);
        if($type){
            if($type == 'accepted_plans'){
                // Accepted Patient List
                $data['patientsAcceptedPlans'] = $this->Plan_model->getAllAcceptedPlans();     
                // All Patient List
                $data['userdata']    = $this->userdata;
                $data['patientList'] = $this->Patient_model->getPatientList();
                $allPatientList = $data['patientList'];
                $PatientListPlans = array();
                foreach($data['patientsAcceptedPlans'] as $acceptedPlans){
                    for($i=0;$i<count($allPatientList); $i++){
                        if($acceptedPlans->patient_id == $allPatientList[$i]['pt_id']){
                            $singlePatientData = $allPatientList[$i];
                            $PatientListPlans[] = $singlePatientData;
                        }

                    }
                }
            }elseif($type == 'rejected_plans'){
                // Accepted Patient List
                $data['patientsRejectedPlans'] = $this->Plan_model->getAllRejectedPlans(); 
                // All Patient List
                $data['userdata']    = $this->userdata;
                $data['patientList'] = $this->Patient_model->getPatientList();
                $allPatientList = $data['patientList'];
                $PatientListPlans = array();
                foreach($data['patientsRejectedPlans'] as $acceptedPlans){
                    for($i=0;$i<count($allPatientList); $i++){
                        if($acceptedPlans->patient_id == $allPatientList[$i]['pt_id']){
                            $singlePatientData = $allPatientList[$i];
                            $PatientListPlans[] = $singlePatientData;
                        }

                    }
                }       
            }elseif($type == 'modify_plans'){
                $data['patientsModifyPlans'] = $this->Plan_model->getAllModifyPlans();
                // All Patient List
                $data['userdata']    = $this->userdata;
                $data['patientList'] = $this->Patient_model->getPatientList();
                $allPatientList = $data['patientList'];
                $PatientListPlans = array();
                foreach($data['patientsModifyPlans'] as $acceptedPlans){
                    for($i=0;$i<count($allPatientList); $i++){
                        if($acceptedPlans->patient_id == $allPatientList[$i]['pt_id']){
                            $singlePatientData = $allPatientList[$i];
                            $PatientListPlans[] = $singlePatientData;
                        }

                    }
                }       
            }elseif($type == 'pending_plans'){
                $data['patientsPendingPlans'] = $this->Plan_model->getAllPendingPlans();
                // All Patient List
                $data['userdata']    = $this->userdata;
                $data['patientList'] = $this->Patient_model->getPatientList();
                $allPatientList = $data['patientList'];
                $PatientListPlans = array();
                foreach($data['patientsPendingPlans'] as $acceptedPlans){
                    for($i=0;$i<count($allPatientList); $i++){
                        if($acceptedPlans->patient_id == $allPatientList[$i]['pt_id']){
                            $singlePatientData = $allPatientList[$i];
                            $PatientListPlans[] = $singlePatientData;
                        }

                    }
                }       

            }
            $allAcceptedPatientList = $PatientListPlans;
            $patient_data_array = array();
            for($i=0;$i<count($allAcceptedPatientList); $i++){
                $chkpt_id = $allAcceptedPatientList[$i]['pt_id'];
                $singleData = $allAcceptedPatientList[$i];
                $single_product_data =  $this->Patient_model->getPatientPhotosByID($chkpt_id);
                $singleData['patient_photos'] = $single_product_data;
                $patient_data_array[] = $singleData;

            }
            $data['allPatientListData'] = $patient_data_array;
            $data['shipping_address'] = $this->Admin_model->getDoctorShippingAddress();
        }else{
            $data['userdata']    = $this->userdata;
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
        }
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('patient/patientList',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function patientGridList()
    {
        $data['userdata']    = $this->userdata;

        $data['patientList'] = $this->Patient_model->getPatientList();
               
        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('patient/patientGridList',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function addPatient()
    {
        $data['userdata']    = $this->userdata;
        $data['doctor_data'] = $this->Admin_model->doctorsList();
        $data['reference_doctor'] = $this->Admin_model->getReferenceDoctors();
        $data['business_developer'] = $this->Admin_model->getBusinessDeveloper();
        $data['treatment_data'] = $this->Admin_model->getTreatmentData();
        $data['treatment_case_data'] = $this->Admin_model->getTreatmentCaseData();
        $data['arch_data'] = $this->Admin_model->getArchData();
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('patient/addPatient',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function submitPatient()
    {   
        // echo "<pre>";
        // print_r($this->input->post());
        // die();

        $data['userdata']    = $this->userdata;
        $adminData = $this->userdata;
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
                'pt_referal' => $this->input->post('pt_referal'),
                'pt_treatment_plan' => $this->input->post('pt_treatment_plan'),
                'pt_approval' => $this->input->post('pt_approval'),
                'pt_approval_date' => $this->input->post('pt_approval_date'),
                'pt_custom_status' => $this->input->post('pt_custom_status'),
                'pt_case_type' => $this->input->post('pt_case_type'),
                'pt_aligners' => $this->input->post('pt_aligners'),
                'pt_aligners_dispatch' => $this->input->post('pt_aligners_dispatch'),
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
            for ($i = 0; $i < sizeof($_FILES['images_treatment_plan']['name']); $i++) {
                if (!empty($_FILES['images_treatment_plan']['name'][$i]) && $_FILES['images_treatment_plan']['error'][$i] == 0) {
                    if($i == 0){
                        $docsData = array(
                        'patient_id' => $patientID,
                        'file_type' => 'Treatment Plan',
                        // 'des' => 'add',
                        'added_by' => $adminID,
                        'cur_date' => date('Y-m-d')
                        );
                        $documentID = $this->Doctor_model->insertDocument($docsData);
                    }
                    $file_name = time().str_replace(' ','_',$_FILES['images_treatment_plan']['name'][$i]);
                    move_uploaded_file($_FILES['images_treatment_plan']['tmp_name'][$i], $upload_path . $file_name);
                    $images_treatment_plan['img'] =time().str_replace(' ','_',$_FILES['images_treatment_plan']['name'][$i]);
                    $images_treatment_plan['type'] = 'patient';
                    $images_treatment_plan['key'] = 'Treatment Plan';
                    $images_treatment_plan['post_id'] = $documentID;
                    $images_treatment_plan['user_id'] = $patientID;
                    $images_treatment_plan['created_by'] = $adminID;

                    $result = $this->db->insert('photos',$images_treatment_plan); 



                    $doctorID = $this->input->post('doctor_id');
                    $doctorDetial =  $this->Admin_model->getDoctorProfile($doctorID);

                    $doctorName = $doctorDetial->first_name." ".$doctorDetial->last_name;
                    $doctorEmail = $doctorDetial->email;
                    $patientName = $this->input->post('pt_firstname')." ".$this->input->post('pt_lastname');

                    if($doctorDetial->notification_alert == 'on'){

                        $url = site_url('doctor/viewPatient/');                                           
                        $link = '<a href="'.$url.$patientID.'" target="_blank"><span style="">Click Here</span></a>';
                        $subject = "The Treatment Plan For ". $patientName ." has been added!";

                        $message = "The Treatment Plan for ". $patientName ." can be viewed now. To view the Treatment Plan, ".$link.".";

                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
                        $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

                        $mailRes = mail($doctorEmail,$subject,$message,$headers);
                    }
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
            redirect('treatmentplanner/patient/patientListing');
        }
        else{
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('treatmentplanner/patient/patientListing');
        }
    }

    public function viewPatient($pt_id)
    {
        $data['userdata'] = $this->userdata;
        $adminID = $data['userdata']['id'];
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
        
        $data['getPatientTreatmentPlans'] = $this->Plan_model->getTreatmentPlansData($pt_id);

        foreach($data['getPatientTreatmentPlans']  as $plans){
            if($plans['pre_status'] == 1 && $plans['status'] == 1){ 
             $data['plan_details'] = $this->Plan_model->getTreatmentPlansDetailsByPlanID($plans['id']);
           }
        }

        $data['getAcceptedPatientPlan'] = $this->Plan_model->getAcceptedPatientPlan($pt_id);
        $data['getRejectedPatientPlan'] = $this->Plan_model->getRejectedPatientPlan($pt_id);
        $data['getModifyAccPatientPlan'] = $this->Plan_model->getModifyAccPatientPlan($pt_id);
        $data['getModifyRejPatientPlan'] = $this->Plan_model->getModifyRejPatientPlan($pt_id);

        // echo "<pre>"; print_r($data['singlePatient']); die();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('patient/viewPatient',$data);
        $this->load->view('elements/admin_footer',$data);
    }

     public function viewAcceptedPatient($pt_id)
    {
        $data['userdata'] = $this->userdata;
        $adminID = $data['userdata']['id'];
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
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('patient/viewAcceptedPatient',$data);
        $this->load->view('elements/admin_footer',$data);
    }

    public function viewRejectedPatient($pt_id)
    {
        $data['userdata'] = $this->userdata;
        $adminID = $data['userdata']['id'];
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
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('patient/viewRejectedPatient',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function viewModifyPatient($pt_id)
    {
        $data['userdata'] = $this->userdata;
        $adminID = $data['userdata']['id'];
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
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('patient/viewModifyPatient',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function viewPendingPatient($pt_id)
    {
        $data['userdata'] = $this->userdata;
        $adminID = $data['userdata']['id'];
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
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('patient/viewPendingPatient',$data);
        $this->load->view('elements/admin_footer',$data);
    }
     public function editPatient($pt_id)
    {
        $data['userdata'] = $this->userdata;
        $adminID = $data['userdata']['id'];
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
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('patient/editPatient',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function updatePatient()
    {
        $data['userdata'] = $this->userdata;
        $adminID = $data['userdata']['id'];
        
        // echo "<pre>"; print_r($this->input->post()); die();

        $patientID = $this->input->post('patientID');

        $upload_path = 'assets/uploads/images/';
        $patientData['doctor_id'] = $this->input->post('doctorID');
        $patientData['pt_firstname'] = $this->input->post('pt_firstname');
        $patientData['pt_lastname'] = $this->input->post('pt_lastname');
        $patientData['pt_gender'] = $this->input->post('pt_gender');
        $patientData['pt_email'] = $this->input->post('pt_email');
        $patientData['pt_age'] = $this->input->post('pt_age');

        if($this->input->post('pt_img_name')!='') {
            $patientData['pt_img'] = $this->input->post('pt_img_name');
        }

        $patientData['pt_scan_impression'] = $this->input->post('pt_scan_impression');
        $patientData['pt_referal'] = $this->input->post('pt_referal');
        $patientData['pt_treatment_plan'] = $this->input->post('pt_treatment_plan');
        $patientData['pt_approval'] = $this->input->post('pt_approval');
        $patientData['pt_approval_date'] = $this->input->post('pt_approval_date');
        $patientData['pt_custom_status'] = $this->input->post('pt_custom_status');
        $patientData['pt_case_type'] = $this->input->post('pt_case_type');
        $patientData['pt_aligners'] = $this->input->post('pt_aligners');
        $patientData['pt_aligners_dispatch'] = $this->input->post('pt_aligners_dispatch');
        $patientData['pt_cost_plan'] = 0;
        $patientData['pt_amount_paid'] = 0;
        $patientData['pt_shipping_details'] = $this->input->post('pt_shipping_details');
        $patientData['pt_billing_address'] = $this->input->post('pt_billing_address');
        $patientData['pt_dispatch_date'] = $this->input->post('pt_dispatch_date');
        $patientData['pt_firstname'] = $this->input->post('pt_firstname');
        $patientData['pt_firstname'] = $this->input->post('pt_firstname');
        $patientData['pt_objective'] = $this->input->post('pt_objective');

        $treatmentData = $this->input->post('treatmentData');
        $treatmentCaseData = $this->input->post('treatmentCaseData');
        $archData = $this->input->post('archData');

        $patientData['type_of_treatment'] = json_encode(implode(",", $treatmentData));
        $patientData['other_type_of_treatment'] = $this->input->post('other_type_of_treatment');
        $patientData['type_of_case'] = json_encode(implode(",", $treatmentCaseData));
        $patientData['other_type_of_case'] = $this->input->post('other_type_of_case');
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
            for ($i = 0; $i < sizeof($_FILES['images_treatment_plan']['name']); $i++) {
                if (!empty($_FILES['images_treatment_plan']['name'][$i]) && $_FILES['images_treatment_plan']['error'][$i] == 0) {
                    
                    // On Update Check Doc Id Available If not then Insert
                    $file_type = 'Treatment Plan';
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
                    $file_name = time().str_replace(' ','_',$_FILES['images_treatment_plan']['name'][$i]);
                    move_uploaded_file($_FILES['images_treatment_plan']['tmp_name'][$i], $upload_path . $file_name);
                    $images_treatment_plan['img'] =time().str_replace(' ','_',$_FILES['images_treatment_plan']['name'][$i]);
                    $images_treatment_plan['type'] = 'patient';
                    $images_treatment_plan['key'] = 'Treatment Plan';
                    if(empty($doc_data)){
                        $images_treatment_plan['post_id'] = $documentID;
                    }else{
                        $images_treatment_plan['post_id'] = $doc_data['doc_id'];
                    }
                    $images_treatment_plan['user_id'] = $patientID;
                    $images_treatment_plan['created_by'] = $adminID;

                    // $this->db->insert('photos',$images_treatment_plan);
                    $result = $this->db->insert('photos',$images_treatment_plan); 


                    // $patientID = $this->input->post('patientID');
                    $patientDetial =  $this->Patient_model->getPatientByID($patientID);

                    $doctorID = $patientDetial['doctor_id'];
                    $doctorDetial =  $this->Admin_model->getDoctorProfile($doctorID);

                    $doctorName = $doctorDetial->first_name." ".$doctorDetial->last_name;
                    $doctorEmail = $doctorDetial->email;

                    $patientName = $patientDetial['pt_firstname']." ".$patientDetial['pt_lastname'];

                    if($doctorDetial->notification_alert == 'on'){

                        $url = site_url('doctor/viewPatient/'); 
                         $link = '<a href="'.$url.$patientID.'" target="_blank"><span style="">Click Here</span></a>';                         
                        $subject = "The Treatment Plan For ". $patientName ." has been added!";
                        $message = "The Treatment Plan for ". $patientName ." can be viewed now. To view the Treatment Plan, ".$link.".";

                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
                        $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

                        $mailRes = mail($doctorEmail,$subject,$message,$headers);
                    }

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
            redirect('treatmentplanner/patient/patientListing');
         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('treatmentplanner/patient/patientListing');
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

    public function getdownloadSinglePostFile($photos_id)
    {
        $postData = $this->Patient_model->getPhotosTypeDocPostID($photos_id);
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
        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];

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

        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];

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
        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];

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
        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];

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



    // Patient Treatment Plan

    public function createPatientPlan()
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
    
        $data['accepted_users'] = $this->Admin_model->doctorsList();

        // echo "<pre>";
        // print_r($data['accepted_users']);
        // die();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('plan/createPatientTreatmentPlan',$data);
        $this->load->view('elements/admin_footer',$data);
    }

    public function getDoctorPatientList()
    {
        $doctorID = $this->input->post('id');

        // echo json_encode($doctorID);

        $result = $this->Admin_model->getPatientListByDoctorID($countryID);

        echo json_encode($result);
    }


    
    public function createPlan($patientID)
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        
        $data['patientID'] = $patientID;
        

        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('plan/createTreatmentPlan',$data);
        $this->load->view('elements/admin_footer',$data);
    }

    public function submitPlan()
    {   

        // echo "<pre>";
        // print_r($this->input->post());
        // die();

        $upload_path = 'assets/uploads/images/';

        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];

        $patientID = $this->input->post('patientID');

        $data = array(
            'user_id' => $userID,
            'patient_id' => $this->input->post('patientID'),
            'title' => $this->input->post('title'),
            'detail' => $this->input->post('plan_detail'),
            'upper' => $this->input->post('plan_upper'),
            'lower' => $this->input->post('plan_lower'),
            'petg_amount' => $this->input->post('plan_petg_amount'),
            'duo_amount' => $this->input->post('plan_duo_amount'),
            'link' => $this->input->post('plan_link'),
            // 'pdf_file' => sha1($this->input->post('plan_pdf_files')),               
            // 'video_file' => $this->input->post('plan_video_files'),
               
        );
        
        // echo "<pre>"; print_r($_FILES['plan_video_files']['name']); die();

        $this->db->insert('plans',$data);
        $planID = $this->db->insert_id();

        if($planID){

            if (!empty($_FILES['plan_pdf_files']['name'])) {          
                $file_name = time().str_replace(' ','_',$_FILES['plan_pdf_files']['name']);
                $plan_pdf_files['pdf_file'] =time().str_replace(' ','_',$_FILES['plan_pdf_files']['name']);
                $this->db->where('id', $planID);
                $this->db->update('plans', $plan_pdf_files);      
             }

            if (!empty($_FILES['plan_video_files']['name'])) {
      
                $file_name = time().str_replace(' ','_',$_FILES['plan_video_files']['name']);
                $plan_video_files['video_file'] =time().str_replace(' ','_',$_FILES['plan_video_files']['name']);

                $this->db->where('id', $planID);
                $this->db->update('plans', $plan_video_files);      
            }

            // Patient Details
            $patientDetial = $this->Patient_model->getPatientByID($patientID);

            // Doctor Details
            $doctorID = $patientDetial['doctor_id'];
            $doctorData = $this->Admin_model->getDoctorByID($doctorID);

            //Doctor Email
            foreach($doctorData as $data){
                $doctorEmail = $data->email;
            }
            
            $site_url = site_url('doctor/viewTreatmentPlan/'.$patientID);
            $link = 'Click <a href="'.$site_url.'" target="_blank"><span style="">here.</span></a>';

            $patientName = $patientDetial['pt_firstname']." ".$patientDetial['pt_lastname'];
            $subject = "New Treatment Plan Available!";
            $message = "Treatment Plan for ".$patientName." is available now. To view, ".$link;

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: SmileAligners <admin@smilealigners.in>' . "\r\n";

            $mailRes = mail($doctorEmail,$subject,$message,$headers);

        }

        if($planID){
            $this->session->set_flashdata('success','Plan Created');
           redirect('treatmentplanner/patient/viewPatient/'.$patientID);
        }
        else{
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('treatmentplanner/patient/viewPatient/'.$patientID);
        }

        redirect('treatmentplanner/patient/viewPatient/'.$patientID);
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('patient/patientListing',$data);
        $this->load->view('elements/admin_footer',$data);
    }

    
    public function uploadCreatePatientPlanFile(){
        // SET THE DESTINATION FOLDER
        $source = $_FILES["file"]["tmp_name"];
        $file   =   $_FILES['file']['name'];
        $file   =   preg_replace('/\\s+/', '-', time().$file);
        $destination = 'assets/uploads/images/'.$file;
        // MOVE UPLOADED FILE TO DESTINATION
        move_uploaded_file($source, $destination);
        //RETURN RESPONSE
        echo 1;
    }

    public function editPlan($planID)
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        
        $data['getPatientTreatmentPlans'] = $this->Plan_model->getTreatmentPlansByPlanID($planID);

        // echo "<pre>";
        // print_r($data['getPatientTreatmentPlans']);
        // die();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('plan/editTreatmentPlan',$data);
        $this->load->view('elements/admin_footer',$data);
    }


     public function updatePlan()
    {   

        $upload_path = 'assets/uploads/images/';

        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];

        $planID = $this->input->post('planID');
        $patientID = $this->input->post('patientID');

        $data = array(
            // 'user_id' => $userID,
            // 'patient_id' => $this->input->post('patientID'),
            'title' => $this->input->post('title'),
            'detail' => $this->input->post('plan_detail'),
            'upper' => $this->input->post('plan_upper'),
            'lower' => $this->input->post('plan_lower'),
            'petg_amount' => $this->input->post('plan_petg_amount'),
            'duo_amount' => $this->input->post('plan_duo_amount'),
            'link' => $this->input->post('plan_link'),
            'pre_status' => 0,
            'status' => 0,
            'updated' => 2,
            'seen' => 0,
            // 'pdf_file' => sha1($this->input->post('plan_pdf_files')),               
            // 'video_file' => $this->input->post('plan_video_files'),
               
        );
        
 
        $this->db->where('id',$planID);
        $result = $this->db->update('plans',$data);

        // Delete Old Plan Details
        $this->db->where('plan_id',$planID);
        $this->db->delete("plan_details");

        if($result){

            // PLAN PDF FILE
            if (!empty($_FILES['plan_pdf_files']['name'])) {          
                $file_name = time().str_replace(' ','_',$_FILES['plan_pdf_files']['name']);
                $plan_pdf_files['pdf_file'] =time().str_replace(' ','_',$_FILES['plan_pdf_files']['name']);
                $this->db->where('id', $planID);
                $this->db->update('plans', $plan_pdf_files);      
             }

            // PLAN VIDEO FILE
            if (!empty($_FILES['plan_video_files']['name'])) {
      
                $file_name = time().str_replace(' ','_',$_FILES['plan_video_files']['name']);
                $plan_video_files['video_file'] =time().str_replace(' ','_',$_FILES['plan_video_files']['name']);

                $this->db->where('id', $planID);
                $this->db->update('plans', $plan_video_files);      
            }

            // Patient Details
            $patientDetial = $this->Patient_model->getPatientByID($patientID);

            // Doctor Details
            $doctorID = $patientDetial['doctor_id'];
            $doctorData = $this->Admin_model->getDoctorByID($doctorID);

            //Doctor Email
            foreach($doctorData as $data){
                $doctorEmail = $data->email;
            }

            $site_url = site_url('doctor/viewTreatmentPlan/'.$patientID);
            $link = 'Click <a href="'.$site_url.'" target="_blank"><span style="">here.</span></a>';

            $patientName = $patientDetial['pt_firstname']." ".$patientDetial['pt_lastname'];
            $subject = "We've updated your treatment plan!";
            $message = $patientName."'s treatment plan has been updated as per your requests. To view the updated plan,".$link;

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: SmileAligners <admin@smilealigners.in>' . "\r\n";

            $mailRes = mail($doctorEmail,$subject,$message,$headers);
        }

        if($result){
            $this->session->set_flashdata('success','Plan Updated');
           redirect('treatmentplanner/patient/viewPatient/'.$patientID);
        }
        else{
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('treatmentplanner/patient/viewPatient/'.$patientID);
        }


        // redirect('treatmentplanner/patient/viewPlan/'.$patientID);
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('patient/patientListing',$data);
        $this->load->view('elements/admin_footer',$data);
    }

    // Delete PDF File
    public function deletePdfPlanFile($planID)
    {   

        $data['pdf_file'] = '';
        $this->db->where('id', $planID);
        $deletePDF = $this->db->update('plans', $data);      
       
        echo json_encode($deletePDF);
    }

    // Delete Video File
    public function deleteVideoPlanFile($planID)
    {   
        $data['video_file'] = '';
        $this->db->where('id', $planID);
        $deletePDF = $this->db->update('plans', $data);      
       
        echo json_encode($deletePDF);
    }

     public function viewPlan($patientID)
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        $data['allTreatmentPlans'] = $this->Plan_model->getAllTreatmentPlans();
        $data['getPatientTreatmentPlans'] = $this->Plan_model->getTreatmentPlansByID($patientID, $userID);
        

        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('plan/viewTreatmentPlan',$data);
        $this->load->view('elements/admin_footer',$data);
    }

     public function viewTreatmentPlanDetails($planID){
        $data['userdata']    = $this->userdata;
        $doctorID = $data['userdata']['id'];

        $data['getSingleTreatmentPlan'] = $this->Plan_model->getTreatmentPlansByPlanID($planID);
        $data['getTreatmentPlanDetails'] = $this->Plan_model->getTreatmentPlansDetailsByPlanID($planID);

        // echo "<pre>"; print_r($data['getTreatmentPlanDetails']);die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('plan/viewTreatmentPlanDetails',$data);
        $this->load->view('elements/admin_footer',$data);
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
}
