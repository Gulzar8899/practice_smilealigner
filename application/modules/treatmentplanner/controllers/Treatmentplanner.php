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
        $this->checkUserLogin(); 
        $this->userdata = $this->session->userdata('userdata');
        $this->load->model(array("Doctor_model","Plan_model","admin/Admin_model","admin/Patient_model"));
    }
    /**
     * @author Surfiq Tech
     */
    public function index()
    {
        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];

        // echo "<pre>"; print_r($adminID); die();

        $data['patientsAcceptedPlans'] = $this->Plan_model->getAllAcceptedPlans();
        $data['patientsRejectedPlans'] = $this->Plan_model->getAllRejectedPlans();
        $data['patientsModifyPlans'] = $this->Plan_model->getAllModifyPlans();
        // $data['patientsAcceptModifyPlans'] = $this->Plan_model->getAllAcceptModifyPlans();
        // $data['patientsRejectModifyPlans'] = $this->Plan_model->getAllRejectModifyPlans();
        $data['patientsPendingPlans'] = $this->Plan_model->getAllPendingPlans();

        // $data['doctor_patients'] = $this->Doctor_model->getDoctorPatients($adminID);
        // $data['oral_images'] = $this->db->where(['added_by'=>$adminID, 'file_type'=>'Intra Oral Images'])->from("documents")->count_all_results();
        // $data['opg_images'] = $this->db->where(['added_by'=>$adminID, 'file_type'=>'OPG Images'])->from("documents")->count_all_results();
        // $data['lateral_c_images'] = $this->db->where(['added_by'=>$adminID, 'file_type'=>'Lateral C Images'])->from("documents")->count_all_results();
        // $data['stl_file'] = $this->db->where(['added_by'=>$adminID, 'file_type'=>'STL File(3D File)'])->from("documents")->count_all_results();
        // $data['scans'] = $this->db->where(['added_by'=>$adminID, 'file_type'=>'scans'])->from("documents")->count_all_results();
        // $data['treatment_plan'] = $this->db->where(['file_type'=>'Treatment Plan'])->from("documents")->count_all_results();
        // $data['ipr'] = $this->db->where(['file_type'=>'IPR'])->from("documents")->count_all_results();
        // $data['invoice'] = $this->db->where(['file_type'=>'Invoice'])->from("documents")->count_all_results();
        // $data['id'] = $adminID;
        //  $data['all_documents'] = $this->Doctor_model->getAllPatientDocuments();
        // echo "<pre>"; print_r($data['patientsAcceptedPlans']); die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('planner_body',$data);
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

    public function profile()
    {
        $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];
        $data['doctor_data'] = $this->Admin_model->getDoctorByID($adminID);
         //print_r($adminID);die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('profile',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function updateProfile()
    {
        $doctorID = $this->input->post('doctorID');
 
        $updateData['email'] = $this->input->post('email'); 
        $updateData['billing_address'] = $this->input->post('billing_address');
        $updateData['shipping_address'] = $this->input->post('shipping_address');    
        $updateData['payer_address'] = $this->input->post('payer_address');    


        if($this->input->post('password')!='') { 
            $updateData['password'] = sha1($this->input->post('password'));  
        }

        $result = $this->Admin_model->udpateDoctorStatus($doctorID , $updateData);
        if($result){
            $this->session->set_flashdata('success', "Doctor Updated");
            redirect('doctor/profile');
         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('doctor/profile');
        }
    }
    public function updateAdress()
    {
        $doctorID = $this->input->post('doctorID');
   
        $newAddress = $this->input->post('new_address');
        if($newAddress !=''){

            $checkNewAddress = $this->Admin_model->getDoctorByID($adminID);

            if($checkNewAddress[0]->address_one ==''){

                $updateNewAddress['address_one'] = $this->input->post('new_address');
                $result = $this->Admin_model->udpateDoctorStatus($doctorID , $updateNewAddress);

            }
            else if($checkNewAddress[0]->address_two ==''){
                 $updateNewAddress['address_two'] = $this->input->post('new_address');
                $result = $this->Admin_model->udpateDoctorStatus($doctorID , $updateNewAddress);
            }else if($checkNewAddress[0]->address_three ==''){
                 $updateNewAddress['address_three'] = $this->input->post('new_address');
                $result = $this->Admin_model->udpateDoctorStatus($doctorID , $updateNewAddress);
            }else{
                $updateNewAddress['address_one'] = $this->input->post('new_address');
                $result = $this->Admin_model->udpateDoctorStatus($doctorID , $updateNewAddress);
                redirect('doctor/profile');
            }
        }
        if($result){
            $this->session->set_flashdata('success', "Doctor Updated");
            redirect('doctor/profile');
         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('doctor/profile');
        }
    }


     public function viewAcceptedPlan()
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        $data['patient_data'] = $this->Doctor_model->getPatientListByID($userID);
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('plan/viewAcceptedTreatmentPlanDetails',$data);
        $this->load->view('elements/admin_footer',$data);
    }
     public function viewRejectedPlan()
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        $data['patient_data'] = $this->Doctor_model->getPatientListByID($userID);
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('plan/viewRejectedTreatmentPlanDetails',$data);
        $this->load->view('elements/admin_footer',$data);
    }

     public function viewPlanDetails()
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        $data['patient_data'] = $this->Doctor_model->getPatientListByID($userID);
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('plan/viewTreatmentPlanDetails',$data);
        $this->load->view('elements/admin_footer',$data);
    }


     public function createNewPlan()
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        $data['patient_data'] = $this->Doctor_model->getPatientListByID($userID);
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('planner_topbar',$data);
        $this->load->view('planner_sidebar',$data);
        $this->load->view('createNewPlan',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function patientList()
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        $data['patient_data'] = $this->Doctor_model->getPatientListByID($userID);
        
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
        $data['patient_data'] = $this->Doctor_model->getPatientListByID($userID);
         
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
        $data['treatment_data'] = $this->Admin_model->getTreatmentData();
        $data['treatment_case_data'] = $this->Admin_model->getTreatmentCaseData();
        $data['arch_data'] = $this->Admin_model->getArchData();

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
                 'type_of_treatment' => json_encode($this->input->post('treatmentData')),
                 'type_of_case' => json_encode($this->input->post('treatmentCaseData')),
                 'arc_treated' => json_encode($this->input->post('archData')),
                 'attachment_placed' => $this->input->post('attachment_placed'),
                'ipr_performed' => $this->input->post('ipr_performed'),
                'pt_status' => 1,
                'added_by' => $userID, 
                'cur_date' => date('Y-m-d')
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
        $data['treatment_data'] = $this->Admin_model->getTreatmentData();
        $data['treatment_case_data'] = $this->Admin_model->getTreatmentCaseData();
        $data['arch_data'] = $this->Admin_model->getArchData();

        $singlePatient = $this->Doctor_model->getSinglePatient($pt_id);
        $data['doctor_data'] = $this->Doctor_model->getDoctorByID($doctorID);

        $patient_data_array = array();
        for($i=0;$i<count($singlePatient); $i++){
            $chkpt_id = $singlePatient[$i]['pt_id'];
            $singleData = $singlePatient[$i];
            $single_product_data =  $this->Doctor_model->getPatientPhotosByID($chkpt_id);
            $singleData['patient_photos'] = $single_product_data;
            $patient_data_array[] = $singleData;
        }
        $data['singlePatient'] = $patient_data_array;
        
      

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

        if (!empty($_FILES['pt_img']['name']) && $_FILES['pt_img']['error'] == 0) {
            $file_name = time().str_replace(' ','_',$_FILES['pt_img']['name']);
            move_uploaded_file($_FILES['pt_img']['tmp_name'], $upload_path . $file_name);
            $pt_img = time().str_replace(' ','_',$_FILES['pt_img']['name']);
        }

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

        $patientData['type_of_treatment'] =json_encode($this->input->post('treatmentData'));
        $patientData['type_of_case'] = json_encode($this->input->post('treatmentCaseData'));
        $patientData['arc_treated'] = json_encode($this->input->post('archData'));
        $patientData['attachment_placed'] = $this->input->post('attachment_placed');
        $patientData['ipr_performed'] = $this->input->post('ipr_performed');


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
         // print_r($data['singlePatient']);die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('patients/viewPatient',$data);
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




    // File Upload In Create Plan
    public function uploadCreatePlanFile(){
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
}   