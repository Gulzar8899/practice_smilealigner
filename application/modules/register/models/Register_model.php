<?php
/**
 * model Name: Register_model
 * Description: front end Register_model
 * @author Muhammad Irfan Aslam
 * Created date: 2020-07-11
 */
class Register_model extends CI_Model {
    function __construct() 
    {
        parent :: __construct();
    }
    
    function insertUser($data)
    {
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    } 
    function getUserData($email)
    {
        $this->db->select("*");
        $this->db->from('users'); 
        $this->db->where('email', $email);
        $q = $this->db->get();
        return $q->result_array();
    } 
    function is_email_available($email) {
      $this->db->where('email', $email);  
      $query = $this->db->get("users");  
        if($query->num_rows() > 0){  
          return true;  
        }  
        else{  
          return false;  
        }  
    }  
   
     function getBusinessDeveloper()
    {
        $this->db->select('*');
        $this->db->where('user_type_id', 5);
        $res = $this->db->get('users');
        return $res->result();
    }
        // Get All Countries
    function getAllCountries()
    {
        $this->db->select('*');
        $res = $this->db->get('countries');
        return $res->result();
    }

    // Get All Countries
    function getAllStates()
    {
        $this->db->select('*');
        $res = $this->db->get('states');
        return $res->result();
    }

    // Get All Countries
    function getAllCities()
    {
        $this->db->select('*');
        $res = $this->db->get('cities');
        return $res->result();
    }

    function getCountryByName($countryName)
    {
        $this->db->select('*');
        $this->db->where('name', $countryName);
        $res = $this->db->get('countries');
        return $res->row();
    }

    function getStateByName($stateName)
    {
        $this->db->select('*');
        $this->db->where('name', $stateName);
        $res = $this->db->get('states');
        return $res->row();
    }

    // Get All Countries
    function getStatesByCountryID($countryID)
    {
        $this->db->select('*');
        $this->db->where('country_id', $countryID);
        $res = $this->db->get('states');
        return $res->result();
    }

     // Get All Cities
    function getCitiesByStateID($stateID)
    {
        $this->db->select('*');
        $this->db->where('state_id', $stateID);
        $res = $this->db->get('cities');
        return $res->result();
    }
}