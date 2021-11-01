<?php
/**
 * model Name: Login_model
 * Description: front end Login_model
 * @author Muhammad Irfan Aslam
 * Created date: 2020-07-11
 */
class Login_model extends CI_Model {
    function __construct() 
    {
        parent :: __construct();
    }
    function getMemberData($email)
    {
        $this->db->select("*");
        $this->db->from('users'); 
        $this->db->where('email', $email);
        $q = $this->db->get();
        return $q->result_array();
    }
    function checkUserData($username,$password) 
    {    
        $this->db->where('email',$username);
        if ($password) {
            $this->db->where('password', sha1($password));
        }
        $this->db->limit(1);
        $q = $this->db->get('users');
        return $q->result_array();
    }
    function addLogData($data)
    {
        $this->db->insert('tbl_login_log',$data);
        return $this->db->insert_id();

    }    
    function setResetToken($id , $resetToken)
    {
    $this->db->where('id', $id);
    $this->db->update('users',$resetToken);
    return $this->db->affected_rows();
    }
    function get_user_by_password_reset_token($reset_token)
    {
    $this->db->where('password_reset_token', $reset_token);
    $result = $this->db->get('users');
        return $result->result_array();

    }
      function updateUserPassword($id , $password)
    {
    $this->db->where('id', $id);
    $this->db->update('users',$password);
    return $this->db->affected_rows();
    }

    function is_password_available($userID, $password) {
    
    $this->db->where('id', $userID);  
    $this->db->where('password', $password);  
    $query = $this->db->get("users");  
        if($query->num_rows() > 0){  
          return true;  
        }  
        else{  
          return false;  
        }  
    }  

}