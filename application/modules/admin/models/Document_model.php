<?php
/**
 * model Name: Doctor_model
 * Description: front end Doctor_model
 * @author Muhammad Irfan Aslam
 * Created date: 2020-05-07
 */
class Document_model extends CI_Model {

   
    /**
     * function to invoke necessary component
     * @author  Irfan Aslam
     */
    function __construct() {
        parent :: __construct();
    }
    function insertDocument($docData)
    {
        $this->db->insert('documents',$docData);
        return $this->db->insert_id();
    }
    function getPatientList()
    {
        $this->db->select("*");
        $this->db->from('patients');
        $q = $this->db->get();
        return $q->row_array();
    }
    function getDocumentDataByID($doc_id)
    {
        $this->db->select('*');
        $this->db->where('doc_id',$doc_id);
        $res = $this->db->get('documents');
        return $res->result();
    }
    function getDocumentDataByPatID($patientID, $file_type)
    {
        $this->db->select('*');
        $this->db->where('patient_id',$patientID);
        $this->db->where('file_type',$file_type);
        $res = $this->db->get('documents');
        return $res->row_array();
    }
    function getPostDataByID($postID)
    {
        $this->db->select('*');
        $this->db->where('post_id',$postID);
        $res = $this->db->get('photos');
        return $res->result();
    }
    function getPatientListByID()
    {   
        $this->db->select('*');
        $res = $this->db->get('patients');
        return $res->result();
    }
    function getDocumentListByID()
    {
        $this->db->select("*");
        $this->db->from('patients');
        $this->db->join('users', 'users.id = patients.doctor_id');
        $this->db->join('documents', 'documents.patient_id = patients.pt_id');
        $this->db->order_by('documents.doc_id','desc');
        $q = $this->db->get();
        return $q->result_array();
    }
    function getDocumentListByType($imageType)
    {
        $this->db->select("*");
        $this->db->from('patients');
        // $this->db->join('patients', 'patients.pt_id = documents.patient_id');
        $this->db->where('file_type',$imageType);
        $this->db->join('documents', 'documents.patient_id = patients.pt_id');
        $this->db->order_by('documents.doc_id','desc');
        $q = $this->db->get();
        return $q->result_array();
    }
    function updateDocumentData($docid, $data)
    {
        $this->db->where('doc_id',$docid);
        return $this->db->update('documents',$data);
    }
    function getPhotosByID($postID)
    {
        $this->db->select('*');
        $this->db->where('post_id',$postID);
        // $this->db->where('type','document');
        $res = $this->db->get('photos');
        return $res->result_array();   
    }
    function deleteDocumentByID($recordID, $table_name) {
        $this->db->where('doc_id', $recordID);
        $this->db->delete($table_name);
        return $this->db->affected_rows();
    } 
    function deleteDocumentPhotosByID($postID)
    {
        $this->db->where('post_id', $postID);
        // $this->db->where('type','document');
        $this->db->delete('photos');
        return $this->db->affected_rows();
    }
}