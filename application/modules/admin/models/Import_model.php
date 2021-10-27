<?php

/**
 * model Name: Admin_model
 * Description: front end Admin_model
 * @author Muhammad Irfan Aslam
 * Created date: 2020-05-07
 */
class Import_model extends CI_Model {

    /**
     * function to invoke necessary component
     * @author  Irfan Aslam
     */
    function __construct() {
        parent :: __construct();
    }

    function insertPatientData($data)
    {
        $this->db->insert_batch('patients', $data);
    }

    function insertDoctorData($data)
    {
        $this->db->insert_batch('users', $data);
    }

    function select() {
        $this->db->order_by('CustomerID', 'DESC');
        $query = $this->db->get('test');
        return $query;
    }
}

?>
