<?php
/**
 * Controller Name: Admin
 * Description: back end admin
 * @author Surfiq Tech
 * Created date: 2021-07-04
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Document extends MY_Controller
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
        //$this->checkAdminLogin(); 
        $this->adminData = $this->session->userdata('adminData');
        $this->load->model(array("doctor/Doctor_model","Document_model","admin/Admin_model","admin/Patient_model"));
    }
    /**
     * @author Surfiq Tech
     */
    public function documentList()
    {   

        $data['admin_data']    = $this->adminData;

        $type = htmlspecialchars($_GET["image_type"]);
        if($type){

            if($type == 'intra_oral_images'){
                $image_type = 'Intra Oral Images';
            }elseif($type == 'opg_images'){
                $image_type = 'OPG Images';
            }elseif($type == 'lateral_c_images'){
                $image_type = 'Lateral C Images';
            }elseif($type == 'stl_file'){
                $image_type = 'STL File(3D File)';
            }elseif($type == 'scans_images'){
                $image_type = 'scans';
            }elseif($type == 'treatment_plan_images'){
                $image_type = 'Treatment Plan';
            }elseif($type == 'ipr_file'){
                $image_type = 'IPR';
            }else{
                $image_type = 'Invoice';
            }

            $document_data = $this->Document_model->getDocumentListByType($image_type);
            $document_data_array = array();
            for($i=0;$i<count($document_data); $i++){
                $doc_id = $document_data[$i]['doc_id'];
                // $pat_id = $document_data[$i]['patient_id'];
                $singleData = $document_data[$i];
                $single_product_data =  $this->Document_model->getPhotosByID($doc_id,$image_type);
                $singleData['document_photos'] = $single_product_data;
                $document_data_array[] = $singleData;
            }
            
            $data['documents_data'] = $document_data_array;
         // echo "<pre>";print_r($data['documents_data']);die();

        }else{

            $document_data = $this->Document_model->getDocumentListByID();



        

            $document_data_array = array();
            for($i=0;$i<count($document_data); $i++){
                $doc_id = $document_data[$i]['doc_id'];
                // $pat_id = $document_data[$i]['patient_id'];
                $singleData = $document_data[$i];
                $single_product_data =  $this->Document_model->getPhotosByID($doc_id);
                $singleData['document_photos'] = $single_product_data;
                $document_data_array[] = $singleData;
            }
            
            $data['documents_data'] = $document_data_array;

        } 
        
        echo "<pre>";
        print_r($data['documents_data']);
        die();
        // print_r($data['documents_data']);die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('documents/documentList',$data);
        $this->load->view('elements/admin_footer',$data);
        
    }
    public function addDocument()
    {
        $accepted_users = $this->Document_model->getPatientList();
        if(!empty($accepted_users)){
            $data['admin_data']    = $this->adminData;
            $data['patient_data'] = $this->Document_model->getPatientListByID();
            $this->load->view('elements/admin_header',$data);
            $this->load->view('admin_topbar',$data);
            $this->load->view('admin_sidebar',$data);
            $this->load->view('documents/addDocument',$data);
            $this->load->view('elements/admin_footer',$data);
        }else{
            $this->session->set_flashdata('error','No Patient exist');
            redirect('admin/document/documentList');
        }
        
    }
    public function submitDocument()
    {
        $adminData = $this->adminData;
        $adminID = $adminData['id'];

        $upload_path = 'assets/uploads/images/';

        if (!empty($_FILES['pt_img']['name']) && $_FILES['pt_img']['error'] == 0) {
            $file_name = time().str_replace(' ','_',$_FILES['pt_img']['name']);
            move_uploaded_file($_FILES['pt_img']['tmp_name'], $upload_path . $file_name);
            $doctor_image = time().str_replace(' ','_',$_FILES['pt_img']['name']);
        }

        $docsData = array(
                'patient_id' => $this->input->post('patientID'),
                'file_type' => $this->input->post('fileType'),
                // 'des' => $this->input->post('des'),
                'added_by' => $adminID,
                'cur_date' => date('Y-m-d')
        );
        $documentID = $this->Doctor_model->insertDocument($docsData);

        if($documentID)
        {
            //upload images
            for ($i = 0; $i < sizeof($_FILES['document_img']['name']); $i++) {
                if (!empty($_FILES['document_img']['name'][$i]) && $_FILES['document_img']['error'][$i] == 0) {
                    $file_name = time().str_replace(' ','_',$_FILES['document_img']['name'][$i]);
                    move_uploaded_file($_FILES['document_img']['tmp_name'][$i], $upload_path . $file_name);

                    $document_img['img'] = $file_name;
                    $document_img['key'] = $this->input->post('fileType');
                    $document_img['type'] = 'document';
                    $document_img['post_id'] = $documentID;
                    $document_img['user_id'] = $this->input->post('patientID');
                    $document_img['created_by'] = $adminID;

                    $file_type = $this->input->post('fileType');


                    if($file_type == 'Treatment Plan' || $file_type == 'IPR'){
                        
                        $result = $this->db->insert('photos',$document_img); 
                            

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

                            $subject = $file_type." Has Been Added! ".$patientName;
                            // $message = "Dear " .$doctorName. " " .$file_type. "Has Been Successfully Added of Your Patient ".$patientName;

                             $message = "The ".$file_type." is available for ".$patientName." is available now. You can view it through this ".$link."";

                            // Always set content-type when sending HTML email
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            // More headers
                            $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

                            $mailRes = mail($doctorEmail,$subject,$message,$headers);
                        }
                    }else{
                        $this->db->insert('photos',$document_img); 
                    }


                }
            } 

            $this->session->set_flashdata('success','Document Added');
            redirect('admin/document/documentList');
        }
        else{
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('admin/document/documentList');
        }


    }
    public function editDocument($doc_id)
    {   
        // echo "<pre>";
        // print_r($userID);
        // die();
        $data['admin_data']    = $this->adminData;
        $userID = $data['admin_data']['id'];
        $data['patient_data'] = $this->Document_model->getPatientListByID($userID);
        $data['document_data'] = $this->Document_model->getDocumentDataByID($doc_id);
        $data['docsImages_data'] = $this->Document_model->getPostDataByID($doc_id);
        // print_r($data['docsImages_data']);die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('documents/editDocument',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function updateDocument()
    {
        $data['admin_data'] = $this->adminData;
        $userID = $data['admin_data']['id'];
        $upload_path = 'assets/uploads/images/';
        $docsID = $this->input->post('docsID');

        $docsData['patient_id'] = $this->input->post('patientID');
        // $docsData['des'] = $this->input->post('des');
        $postID = $this->Doctor_model->updateDocumentData($docsID , $docsData);

        if($postID){
            //upload images
            for ($i = 0; $i < sizeof($_FILES['document_img']['name']); $i++) {
                if (!empty($_FILES['document_img']['name'][$i]) && $_FILES['document_img']['error'][$i] == 0) {
                    $file_name = time().str_replace(' ','_',$_FILES['document_img']['name'][$i]);
                    move_uploaded_file($_FILES['document_img']['tmp_name'][$i], $upload_path . $file_name);
                    $document_img['img'] = $file_name;
                    $document_img['key'] = 'document_img';
                    $document_img['type'] = 'document';
                    $document_img['post_id'] = $docsID;
                    $document_img['user_id'] = $this->input->post('patientID');
                    $document_img['created_by'] = $userID;

                    $this->db->insert('photos',$document_img); 
                }
            } 
            $this->session->set_flashdata('success','Document Updated');
            redirect('doctor/document/documentList');  
        } else {
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('doctor/document/documentList');
        }


    }
    public function deleteDocumentByID()
    {
        $recordID = $this->input->post('recordID');
        $table_name = $this->input->post('table_name');
        
        $this->Document_model->deleteDocumentPhotosByID($recordID, $table_name);
        $resultData = $this->Document_model->deleteDocumentByID($recordID, $table_name);
        if ($resultData) {
            //$this->session->set_flashdata('success', 'Record successfully deleted.');
            $response = array("type"=>"success","message"=>"Document Deleted"); 
        } 
        else {
            $this->session->set_flashdata('error', 'Seems to an error. Please try again later.');
            $response = array("type"=>"error","message"=>"Something went wrong"); 

        }

        echo json_encode($response);
        exit;
    }
    public function downloadPostFile($postID)
    {
        $postData = $this->Document_model->getPhotosByID($postID);
        for($i=0;$i<count($postData);$i++)
        {
            $imgPath = 'assets/uploads/images/'.$postData[$i]['img'];
            $postFile = $imgPath;
            $this->zip->read_file($postFile);
        }
        $this->zip->download(''.time().'.zip');
    }

}