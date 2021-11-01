<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requirement_model extends CI_Model
{
    public function get_all_questions(){
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

    function store_answer($question_data){
        //echo json_encode($question_data);
        return $this->db->insert_batch("selected_questions",$question_data);
    }

    public function get_doc_email($doctor_id)
    {
        return $this->db->query('select concat(`first_name`," ",`middle_name`," ",`last_name`) as `doc_name`, `email` from `doctors` where `id`='.$doctor_id);
    }

    public function get_admin_email()
    {
        return $this->db->query('select `username` from admin_credential');
    }

    public  function check_dr_exist($data){
        $query = $this->db->select("*")->get_where('doctors', array(
            'email' => $data['email']
        ));
        $password = rand(1111111111,9999999999);
        $data['password'] = $password;
        $count = $query->num_rows();
        if ($count === 0) {
            $this->db->insert('doctors', $data);
            $this->send_email->send_mail($data['email'], "Your profile created by <b>Smile Aligners<b>.<br/>Your Username: " . $data['email'] . " and Password: $password", "Profile Created");
            $this->send_email->send_sms("Your profile created by Smile Aligners.\nYour Username: " . $data['email'] ." and Password: $password", $data['mobile']);
            return $this->db->insert_id();

        }else{
            $result = $query->row();
            return $result->id;
        }
    }
}