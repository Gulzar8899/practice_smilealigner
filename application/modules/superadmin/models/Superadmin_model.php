<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin_model extends CI_Model
{
    function check_credential($username, $password)
    {
        $current_time = date('Y-m-d H:i:s');
        $res = $this->db->select("*")->where(array("username" => $username, "password" => $password))->get('admin_credential');
        if ($res->num_rows() > 0) {
            $data = $res->row();
            $log_data = array(
                "admin_id" => $data->id,
                "action" => "Login",
                "login_time" => $current_time,
                "status" => "success"
            );
            $admin_data = array(
                "id" => $data->id,
                "name" => $data->name,
                "position" => $data->position,
                "login_date" => $current_time
            );
            $this->session->set_userdata(array("admin_data" => $admin_data));
            $return_data = array(
                "status" => true,
                "message" => "Login Success"
            );

        } else {
            $log_data = array(
                "username" => $username,
                "password" => $password,
                "action" => "Login",
                "login_time" => $current_time,
                "status" => "failed"
            );
            $return_data = array(
                "status" => false,
                "message" => "Username or password is does not match"
            );
        }
        $this->db->insert("admin_log", $log_data);
        return $return_data;
    }
    function get_count_orders(){
//        return $this->db->from("answers")->group_by("unique_id")->count_all_results();
        return $this->db->from("selected_questions")->group_by("unique_id")->count_all_results();
    }

    function get_count_all_doctors(){
        return $this->db->from("doctors")->where("status",1)->count_all_results();
    }

    function add_new_doctor($first_name, $middle_name, $last_name, $mobile, $email, $password)
    {
        if ($this->db->insert("doctors", array(
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'email' => $email,
            'mobile' => $mobile,
            'password' => $password
        ))
        ) {
            return $this->db->select("*")->where('id', $this->db->insert_id())->get("doctors");
        } else {
            return false;
        }
    }

    function get_all_doctors($start)
    {
        return $this->db->select("*")
            ->where("status",1)
            ->order_by("id", "desc")
            ->limit(10,$start)
            ->get("doctors");
    }

    function get_all_orders($start)
    {
        return $this->db->select("sq.id,sq.status,sq.unique_id,sq.created_at,d.first_name,d.last_name,d.middle_name,d.city")
            ->join("doctors d","d.id = sq.doctor_id","left")
            ->group_by("unique_id")
            ->order_by("sq.id","desc")
            ->limit(10,$start)
            ->get("selected_questions sq");
      /*  return $this->db->select("a.status,a.unique_id,a.created_at,d.first_name,d.last_name,d.middle_name,d.city")
            ->join("doctors d","d.id = a.doctor_id","left")
            ->group_by("unique_id")
            ->order_by("a.id","desc")
            ->limit(10,$start)
            ->get("answers a");*/

//        return $this->db->query("SELECT a.status,a.unique_id,a.created_at,d.first_name,d.last_name,d.middle_name,d.city FROM `answers` a join doctors d ON d.id = a.doctor_id group by unique_id limit 10 order by id desc ");
    }

    public function get_all_questions()
    {
        $this->db->query('SET SESSION group_concat_max_len = 1000000;');
        return $this->db->query('
        SELECT questions.id,questions.question,
        GROUP_CONCAT("{","\"option_id\"",": \"",q_options.id,"\",", 
        "\"option\"",":\"",q_options.option_value,"\",",
         "\"category\"",":\"",q_options.category,"\",", 
         "\"parent_option_id\"",":\"",q_options.parent_option_id, "\"}") 
         as sub_options FROM `questions` left join q_options on questions.id = q_options.question_id GROUP BY questions.id order by questions.id
        ');
    }

    public function get_all_answers($unique_id)
    {

        return $this->db->query('select patient_name,patient_age,patient_sex,GROUP_CONCAT(answer) as answers,GROUP_CONCAT(option_id) as options,(SELECT GROUP_CONCAT("{\"",question_id,"\":\"",comment,"\"}") FROM `answers` where unique_id="' . $unique_id . '" GROUP by unique_id) as comments FROM answers where unique_id="' . $unique_id . '"');
    }
    public function get_all_answers2($unique_id)
    {
        $answers= $this->db->query('select * FROM selected_questions where unique_id="'.$unique_id.'"');
        return $answers;
    }

    public function get_all_q_options(){
        return $this->db->query('select * FROM q_options');
    }
    function update_status($unique_id, $status)
    {
        $this->db->insert("order_status", array("unique_id" => $unique_id, "status" => $status));
        if ($this->db->where("unique_id", $unique_id)->update("selected_questions", array("status" => $status))) {
            return $this->db->select("email,mobile")->join("doctors","doctor_id = doctors.id")->where("unique_id",$unique_id)->group_by("unique_id")->get("selected_questions");
        } else {
            return false;
        }
    }
    function get_doctor_info($id){

        $query = $this->db->select("*")->where("id",trim($id))->get("doctors");
        // echo $this->db->last_query();
        return $query;
    }
    function update_doctor_info($id,$data){
        $this->db->where("id",$id)->update("doctors",$data);
        return true;
    }

    function deactivate_doctor($id)
    {
        return $this->db->query("UPDATE `doctors` SET `status` = '0' WHERE `id`='".$id."'");
    }

}
