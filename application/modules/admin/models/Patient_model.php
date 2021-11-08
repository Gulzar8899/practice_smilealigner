<?php
/**
 * model Name: Patient_model
 * Description: front end Patient_model
 * @author Surfiq Tech
 * Created date: 2021-07-17
 */
class Patient_model extends CI_Model {

    /**
     * function to invoke necessary component
     * @author  Surfiq Tech
     */
    function __construct() {
        parent :: __construct();
    }
    function insertPatients($patientData)
    {
        $this->db->insert('patients',$patientData);
        return $this->db->insert_id();
    }
    function getPatientList()
    {
        $this->db->select("*");
        $this->db->from('patients');
        $this->db->join('users', 'users.id = patients.doctor_id');
        $this->db->order_by('pt_id', 'DESC');
        $q = $this->db->get();
        return $q->result_array();
    }

    function getAllPatientList()
    {
        $this->db->select("*");
        $this->db->from('patients');
        $this->db->join('users', 'users.id = patients.doctor_id');
        $q = $this->db->get();
        return $q->result_array();
    }

    function getSinglePatient($ptID)
    {
        $this->db->select("*");
        $this->db->from('patients');
        $this->db->join('users', 'users.id = patients.doctor_id');
        $this->db->where('patients.pt_id', $ptID);
        $q = $this->db->get();
        return $q->result_array();
    }
    function getPatientByID($ptID)
    {
        $this->db->select("*");
        $this->db->from('patients');
        $this->db->where('patients.pt_id', $ptID);
        $q = $this->db->get();
        return $q->row_array();
    }

    function udpatePatientData($ptID, $patientData)
    {
        $this->db->where('pt_id',$ptID);
        return $this->db->update('patients',$patientData);
    }
    function getPatientPhotosByID($postID)
    {
        $this->db->select('*');
        $this->db->where('user_id',$postID);
        // $this->db->where('type','patient');
        $res = $this->db->get('photos');
        return $res->result_array();   
    }

    function getPatientInvoiceByID($postID)
    {
        $this->db->select('*');
        $this->db->from('photos');
        $this->db->where('user_id',$postID);
        $this->db->join('payments', 'payments.photos_id = photos.photos_id');
        $q = $this->db->get();
        return $q->result_array(); 
    }

    function getPhotosTyoePostID($docType, $postID)
    {
        if($docType == 'oral_opg_lateral'){
            $this->db->select('*');
            $this->db->group_start();
            $this->db->where('key','Intra Oral Images');
            $this->db->or_where('key','OPG Images');
            $this->db->or_where('key','Lateral C Images');
            $this->db->group_end();
            $this->db->where('user_id',$postID);
            $res = $this->db->get('photos');
            return $res->result_array();
        }else if($docType == 'images_stl'){
            $key = 'STL File(3D File)';
        }else if($docType == 'images_treatment_plan'){
            $key = 'Treatment Plan';
        }else if($docType == 'ipr_files'){
            $key = 'IPR';
        }else if($docType == 'invoice_files'){
            $key = 'Invoice';
        }
        $this->db->select('*');
        $this->db->where('key',$key);
        $this->db->where('user_id',$postID);
        $res = $this->db->get('photos');
        return $res->result_array();
    }

     function getPhotosTypeDocPostID($photos_id)
    {   
        $this->db->select('*');
        $this->db->where('photos_id',$photos_id);
        $res = $this->db->get('photos');
        return $res->result_array();
    }
    
    function getPhotosByImageID($img_id)
    {
        $this->db->select('*');
        $this->db->where('photos_id',$img_id);
        $res = $this->db->get('photos');
        return $res->row_array();   
    }
    
    function getDocByID($doc_id)
    {
        $this->db->select('*');
        $this->db->where('doc_id',$doc_id);
        $res = $this->db->get('documents');
        return $res->result_array();   
    }
    
    function deleteDocsByID($doc_id){
      $this->db->where('doc_id',$doc_id);
      $this->db->delete("documents");
    }
    
    function deleteImagePatientByID ($imgID){
      $this->db->where('photos_id',$imgID);
      $this->db->delete("photos");
    }
    
    function getImageByTypeAndID($patientID, $imageType){
        $this->db->select('*');
        $this->db->where('user_id',$patientID);
        $this->db->where('key',$imageType);
        $res = $this->db->get('photos');
        return $res->result_array();   
    }
}
