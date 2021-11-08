<?php
/**
 * model Name: Plan_model
 * Description: front end Plan_model
 * @author Surfiq Tech
 * Created date: 2020-05-07
 */
class Plan_model extends CI_Model {

    /**
     * function to invoke necessary component
     * @author  Surfiq Tech
     */
    function __construct() {
        parent :: __construct();
    }


    function getAllTreatmentPlans()
    {
        $this->db->select('*');
        $res = $this->db->get('plans');
        return $res->result();
    }

    function getTreatmentPlansByID($patientID, $userID)
    {
        $this->db->select('*');
        $this->db->where('patient_id', $patientID);
        $this->db->where('user_id', $userID);
        $res = $this->db->get('plans');
        return $res->result();
    }

    function getTreatmentPlansByPatientID($patientID)
    {
        $this->db->select('*');
        $this->db->where('patient_id', $patientID);
        $res = $this->db->get('plans');
        return $res->result();
    }
    function getTreatmentPlansData($patientID)
    {
        $this->db->select('*');
        $this->db->where('patient_id', $patientID);
        $res = $this->db->get('plans');
        return $res->result_array();
    }
    function getNewTreatmentPlansByPatientID($patientID)
    {
        $this->db->select('*');
        $this->db->where('seen', 0);
        $this->db->where('patient_id', $patientID);
        $res = $this->db->get('plans');
        return $res->result();
    }

    function getTreatmentPlansByPlanID($planID)
    {
        $this->db->select('*');
        $this->db->where('id', $planID);
        $res = $this->db->get('plans');
        return $res->row();
    }

     function getTreatmentPlansDetailsByPlanID($planID)
    {
        $this->db->select('*');
        $this->db->where('plan_id', $planID);
        $res = $this->db->get('plan_details');
        return $res->row();
    }

    // Get All Accepted Plans
    function getAllAcceptedPlans(){
        $this->db->select('*');
        $this->db->where('pre_status', 1);
        $this->db->where('status', 1);
        $res = $this->db->get('plans');
        return $res->result();
    }

    // Get All Rejected Plans
    function getAllRejectedPlans(){
        $this->db->select('*');
        $this->db->where('pre_status', 1);
        $this->db->where('status', 2);
        $res = $this->db->get('plans');
        return $res->result();
    }


    // Get All Modify Plans
    function getAllModifyPlans(){

        $where_in = array('1','2');
        $this->db->select('*');
        $this->db->where('pre_status', 0);
        $this->db->where_in('status', $where_in);
        $res = $this->db->get('plans');
        return $res->result();
    }

    // Get All Accept Modify Plans
    function getAllAcceptModifyPlans(){
        $this->db->select('*');
        $this->db->where('pre_status', 0);
        $this->db->where('status', 1);
        $this->db->limit(1);
        $this->db->order_by('id',"DESC");
        $res = $this->db->get('plans');
        return $res->result();
    }

    // Get All Reject Modify Plans
    function getAllRejectModifyPlans(){
        $this->db->select('*');
        $this->db->where('pre_status', 0);
        $this->db->where('status', 2);
        $this->db->limit(1);
        $this->db->order_by('id',"DESC");
        $res = $this->db->get('plans');
        return $res->result();
    }

    // Get All Pending Plans
    function getAllPendingPlans(){
        $this->db->select('*');
        $this->db->where('pre_status', 0);
        $this->db->where('status', 0);
        $this->db->limit(1);
        $this->db->order_by('id',"DESC");
        $res = $this->db->get('plans');
        return $res->result();
    }

    // Get Accepted Patient Plan
     function getAcceptedPatientPlan($patientID)
    {   
        $this->db->select('*');
        $this->db->where('patient_id', $patientID);
        $this->db->where('pre_status', 1);
        $this->db->where('status', 1);
        $this->db->limit(1);
        $this->db->order_by('id',"DESC");
        $res = $this->db->get('plans');
        return $res->row();
    }

    // Get Rejected Patient Plan
     function getRejectedPatientPlan($patientID)
    {
        $this->db->select('*');
        $this->db->where('patient_id', $patientID);
        $this->db->where('pre_status', 1);
        $this->db->where('status', 2);
        $this->db->limit(1);
        $this->db->order_by('id',"DESC");
        $res = $this->db->get('plans');
        return $res->row();
    }

    // Get Modify Patient Plan
     function getModifyAccPatientPlan($patientID)
    {
        $this->db->select('*');
        $this->db->where('patient_id', $patientID);
        $this->db->where('pre_status', 0);
        $this->db->where('status', 1);
        $this->db->limit(1);
        $this->db->order_by('id',"DESC");
        $res = $this->db->get('plans');
        return $res->row();
    }

    // Get Modify Patient Plan
     function getModifyRejPatientPlan($patientID)
    {
        $this->db->select('*');
        $this->db->where('patient_id', $patientID);
        $this->db->where('pre_status', 0);
        $this->db->where('status', 2);
        $this->db->limit(1);
        $this->db->order_by('id',"DESC");
        $res = $this->db->get('plans');
        return $res->row();
    }


    // Download Plan File
    function getPDFFilesbyPlanID($planID)
    {   
        $this->db->select('*');
        $this->db->where('id',$planID);
        $res = $this->db->get('plans');
        return $res->result_array();
    }
 
}