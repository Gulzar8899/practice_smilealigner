<?php
/**
 * model Name: Deposit_model
 * Description: front end Deposit_model
 * @author Surfiq Tech
 * Created date: 2021-09-30
 */
class Payment_model extends CI_Model {

   
    /**
     * function to invoke necessary component
     * @author  Surfiq Tech
     */
    function __construct() {
        parent :: __construct();
    }
    function insertDepositAmount($depositData)
    {
        $this->db->insert('payments',$depositData);
        return $this->db->insert_id();
    }

     function updateDepositAmount($id, $data)
    {
        $this->db->where('id',$id);
        return $this->db->update('payments',$data);
    }

    function getPaymentByPatientID($patientID)
    {
        $this->db->select('*');
        $this->db->where('patient_id',$patientID);
        $res = $this->db->get('payments');
        return $res->result_array();
    }

    function getPaymentByIDLastRow($patientID)
    {
        $this->db->select('*');
        $this->db->where('patient_id',$patientID);
        $this->db->where('amount_type', 'payment');
        $res = $this->db->get('payments');
        return $res->last_row();
    }

    //  GET Payment For Edit
    function getEditPaymentHistory($id){
        // $this->db->select('*');
        // $this->db->where('id',$id);
        // $res = $this->db->get('payments');
        // return $res->row();

        $this->db->select("*");
        $this->db->where('id',$id);
        $this->db->from('payments');
        $this->db->join('photos', 'photos.photos_id = payments.photos_id');

        $q = $this->db->get();

        if(empty($q->row())){
            $this->db->select("*");
            $this->db->where('id',$id);
            $this->db->from('payments');
            $result = $this->db->get();
            return $result->row();

        }else{
        return $q->row();

        }

    }

    //  GET Payment For Edit
    function getPaymentByID($id, $table){

        $this->db->select("*");
        $this->db->where('id',$id);
        $this->db->from($table);
        $q = $this->db->get();
        return $q->row();
    }

    function deletePaymentPhotosByID($id)
    {
        // code...
        $this->db->where('photos_id', $id);
        $this->db->delete('photos');
        return $this->db->affected_rows();
    }

     function deletePaymentByID($id, $table)
    {
        // code...
        $this->db->where('id', $id);
        // $this->db->where('amount_type', 'payment');
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

     function deleteDepositByID($id)
    {
        // code...
        $this->db->where('invoice_no', $id);
        $this->db->where('amount_type', 'deposit');
        $this->db->delete('payments');
        return $this->db->affected_rows();
    }

    function getSinglePatientInvoiceByID($postID)
    {
        $this->db->select('*');
        $this->db->from('photos');
        $this->db->where('photos_id',$postID);
        // $this->db->join('payments', 'payments.photos_id = photos.photos_id');
        $q = $this->db->get();
        return $q->result_array(); 
    }

    //  GET Payment For Edit
    function getDepositInvoiceNo($id){

        $this->db->select("*");
        $this->db->where('invoice_no',$id);
        $this->db->from('payments');
        $q = $this->db->get();
        return $q->result_array();
    }


     function getImageByPhotosID($photoID, $imageType){
        $this->db->select('*');
        $this->db->where('photos_id',$photoID);
        $this->db->where('key',$imageType);
        $res = $this->db->get('photos');
        return $res->result_array();   
    }

    function getPhotosTyoePostID($docType, $photoID)
    {
        if($docType == 'oral_opg_lateral'){
            $this->db->select('*');
            $this->db->group_start();
            $this->db->where('key','Intra Oral Images');
            $this->db->or_where('key','OPG Images');
            $this->db->or_where('key','Lateral C Images');
            $this->db->group_end();
            $this->db->where('photos_id',$photoID);
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
        $this->db->where('photos_id',$photoID);
        $res = $this->db->get('photos');
        return $res->result_array();
    }
    

    // function getPatientList()
    // {
    //     $this->db->select("*");
    //     $this->db->from('patients');
    //     $q = $this->db->get();
    //     return $q->row_array();
    // }
    // function getDocumentDataByID($doc_id)
    // {
    //     $this->db->select('*');
    //     $this->db->where('doc_id',$doc_id);
    //     $res = $this->db->get('documents');
    //     return $res->result();
    // }
    // function getDocumentDataByPatID($patientID, $file_type)
    // {
    //     $this->db->select('*');
    //     $this->db->where('patient_id',$patientID);
    //     $this->db->where('file_type',$file_type);
    //     $res = $this->db->get('documents');
    //     return $res->row_array();
    // }
    // function getPostDataByID($postID)
    // {
    //     $this->db->select('*');
    //     $this->db->where('post_id',$postID);
    //     $res = $this->db->get('photos');
    //     return $res->result();
    // }
    // function getPatientListByID()
    // {   
    //     $this->db->select('*');
    //     $res = $this->db->get('patients');
    //     return $res->result();
    // }
    // function getDocumentListByID()
    // {
    //     $this->db->select("*");
    //     $this->db->from('patients');
    //     // $this->db->join('patients', 'patients.pt_id = documents.patient_id');
    //     $this->db->join('documents', 'documents.patient_id = patients.pt_id');
    //     $this->db->order_by('documents.doc_id','desc');
    //     $q = $this->db->get();
    //     return $q->result_array();
    // }
    // function updateDocumentData($docid, $data)
    // {
    //     $this->db->where('doc_id',$docid);
    //     return $this->db->update('documents',$data);
    // }
    // function getPhotosByID($postID)
    // {
    //     $this->db->select('*');
    //     $this->db->where('post_id',$postID);
    //     $this->db->where('type','document');
    //     $res = $this->db->get('photos');
    //     return $res->result_array();   
    // }
    // function deleteDocumentByID($recordID, $table_name) {
    //     $this->db->where('doc_id', $recordID);
    //     $this->db->delete($table_name);
    //     return $this->db->affected_rows();
    // } 
    // function deleteDocumentPhotosByID($postID)
    // {
    //     $this->db->where('post_id', $postID);
    //     $this->db->where('type','document');
    //     $this->db->delete('photos');
    //     return $this->db->affected_rows();
    // }
}