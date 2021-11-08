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
        $this->checkUserLogin(); 
        $this->userdata = $this->session->userdata('userdata');
        $this->load->model(array("Doctor_model","admin/Admin_model","admin/Patient_model"));
    }
    /**
     * @author Surfiq Tech
     */
    public function documentList()
    {   
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
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

            $document_data = $this->Doctor_model->getDocumentListByType($userID, $image_type);
            $document_data_array = array();
            for($i=0;$i<count($document_data); $i++){
                $doc_id = $document_data[$i]['doc_id'];
                // $pat_id = $document_data[$i]['patient_id'];
                $singleData = $document_data[$i];
                $single_product_data =  $this->Doctor_model->getPhotosByID($doc_id,$image_type);
                $singleData['document_photos'] = $single_product_data;
                $document_data_array[] = $singleData;
            }
            $data['documents_data'] = $document_data_array;

        }else{
            $data['userdata'] = $this->userdata;
            $userID = $data['userdata']['id'];
            $document_data = $this->Doctor_model->getDocumentListByID($userID);
            $document_data_array = array();
            for($i=0;$i<count($document_data); $i++){
                $doc_id = $document_data[$i]['doc_id'];                
                $singleData = $document_data[$i];
                $single_product_data =  $this->Doctor_model->getPhotosByID($doc_id);
                $singleData['document_photos'] = $single_product_data;
                $document_data_array[] = $singleData;
            }
            $data['documents_data'] = $document_data_array;
        }
        
         // echo "<pre>";print_r($data['documents_data']);die();

        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('documents/documentList',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function addDocument()
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        $patient_data = $this->Doctor_model->getPatientListByID($userID);


        if(!empty($patient_data)){
            $data['patient_data'] = $this->Doctor_model->getPatientListByID($userID);
            $this->load->view('elements/admin_header',$data);
            $this->load->view('doctor_topbar',$data);
            $this->load->view('doctor_sidebar',$data);
            $this->load->view('documents/addDocument',$data);
            $this->load->view('elements/admin_footer',$data);
        }else{
            $this->session->set_flashdata('error','No Patient exist');
            redirect('doctor/document/documentList');
        }
    }
    public function submitDocument()
    {
        $userdata = $this->userdata;
        $userID = $userdata['id'];

        $upload_path = 'assets/uploads/images/';

        if (!empty($_FILES['pt_img']['name']) && $_FILES['pt_img']['error'] == 0) {
            $file_name = time().str_replace(' ','_',$_FILES['pt_img']['name']);
            move_uploaded_file($_FILES['pt_img']['tmp_name'], $upload_path . $file_name);
            $doctor_image = time().str_replace(' ','_',$_FILES['pt_img']['name']);
        }

        $docsData = array(
                'patient_id' => $this->input->post('patientID'),
                'des' => $this->input->post('des'),
                'file_type' => $this->input->post('fileType'),
                'added_by' => $userID,
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
                    $document_img['img'] =time().str_replace(' ','_',$_FILES['document_img']['name'][$i]);
                    $document_img['key'] = $this->input->post('fileType');
                    $document_img['type'] = 'document';
                    $document_img['post_id'] = $documentID;
                    $document_img['user_id'] = $this->input->post('patientID');
                    $document_img['created_by'] = $userID;

                    $this->db->insert('photos',$document_img); 
                }
            } 

            $this->session->set_flashdata('success','Document Added!');
            redirect('doctor/document/documentList');
        }
        else{
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('doctor/document/documentList');
        }


    }
    public function editDocument($doc_id)
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        $data['patient_data'] = $this->Doctor_model->getPatientListByID($userID);
        $data['document_data'] = $this->Doctor_model->getDocumentDataByID($doc_id);
        $data['docsImages_data'] = $this->Doctor_model->getPostDataByID($doc_id);
        // print_r($data['docsImages_data']);die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('documents/editDocument',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function updateDocument()
    {
        $data['userdata']    = $this->userdata;
        $userID = $data['userdata']['id'];
        $upload_path = 'assets/uploads/images/';
        $docsID = $this->input->post('docsID');

        $docsData['patient_id'] = $this->input->post('patientID');
        $docsData['des'] = $this->input->post('des');
        $postID = $this->Doctor_model->updateDocumentData($docsID , $docsData);

        if($postID){
            //upload images
            for ($i = 0; $i < sizeof($_FILES['document_img']['name']); $i++) {
                if (!empty($_FILES['document_img']['name'][$i]) && $_FILES['document_img']['error'][$i] == 0) {
                    $file_name = time().str_replace(' ','_',$_FILES['document_img']['name'][$i]);
                    move_uploaded_file($_FILES['document_img']['tmp_name'][$i], $upload_path . $file_name);
                    $document_img['img'] =time().str_replace(' ','_',$_FILES['document_img']['name'][$i]);
                    $document_img['key'] = 'document_img';
                    $document_img['type'] = 'document';
                    $document_img['post_id'] = $docsID;
                    $document_img['user_id'] = $this->input->post('patientID');
                    $document_img['created_by'] = $userID;

                    $this->db->insert('photos',$document_img); 
                }
            } 
            $this->session->set_flashdata('success','Data Updated');
            redirect('doctor/document/documentList');  
        } else {
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('doctor/document/documentList');
        }


    }

    // public function upload()
    // {
    //     // code...
    //     $output = '';  
    //     $base_url = base_url();
    //      if(isset($_FILES['file']['name'][0]))  
    //      {  
    //           //echo 'OK';  
    //           foreach($_FILES['file']['name'] as $keys => $values)  
    //           {  


    //                if(move_uploaded_file($_FILES['file']['tmp_name'][$keys], 'assets/uploads/' . $values))  
    //                {  
    //                      $output .= '<div class="uk-width-medium-1-4"><img src="'.$base_url.'assets/uploads/'.$values.'" class="h-100" /></div>';  
    //                }  
    //           }  
    //      }  
    //      echo $output;  
    // }

}