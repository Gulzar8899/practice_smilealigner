<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_account_model extends CI_Model {
    public function __construct()
    {
        parent:: __construct();
    }

    public function get_doc_profile()
    {

        return $this->db->query();
    }

    function update_profile($data){
        $id = $this->session->userdata("doctor_data")['doctor_id'];

        $this->db->where("id",$id)->update("doctors",$data);
        $res = $this->db->select("*")->where("id",$id)->get("doctors");
        if($res->num_rows()>0){
            $row = $res->row();
            $session_doctor_data = array(
                'doctor_id' => $row->id,
                'first_name' => $row->first_name,
                'middle_name' => $row->middle_name,
                'last_name' => $row->last_name,
                'email' => $row->email,
                'mobile' => $row->mobile,
                'speciality' => $row->speciality,
                'address' => $row->address,
                'pincode' => $row->pincode,
                'city' => $row->city,
                "profile_completed" =>$row->profile_completed,
                'clinic_name'=>$row->clinic_name
            );
            if($row->profile_completed!=0) {
                $doctor_data = array("doctor_data" =>$session_doctor_data );
                $this->session->set_userdata($doctor_data);
            }else{
                $doctor_data = array("uncompleted_doctor_data" =>$session_doctor_data );
                $this->session->set_userdata($doctor_data);
            }

            return $row;
        }else{
            return false;
        }
    }
}
