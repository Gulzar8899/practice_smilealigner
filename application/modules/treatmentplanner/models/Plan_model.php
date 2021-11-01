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

    // Download Plan File
    function getPDFFilesbyPlanID($planID)
    {   
        $this->db->select('*');
        $this->db->where('id',$planID);
        $res = $this->db->get('plans');
        return $res->result_array();
    }
 
}