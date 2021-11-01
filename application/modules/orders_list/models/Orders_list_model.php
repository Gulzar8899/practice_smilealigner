<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_list_model extends CI_Model{
    public function get_list($doctor_id){
//        return $this->db->query("SELECT a.status,a.unique_id,a.created_at,d.first_name,d.last_name,d.middle_name,d.city FROM `answers` a join doctors d ON d.id = a.doctor_id where a.doctor_id='$doctor_id' group by unique_id");
        return $this->db->query("SELECT sq.status,sq.unique_id,sq.created_at,d.first_name,d.last_name,d.middle_name,d.city FROM `selected_questions` sq join doctors d ON d.id = sq.doctor_id where sq.doctor_id='$doctor_id' group by unique_id");
    }
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

    public function get_all_answers($unique_id){
        return $this->db->query('select patient_name,patient_age,patient_sex FROM selected_questions where unique_id="'.$unique_id.'"');
    }

    public function get_all_q_options(){
        return $this->db->query('select * FROM q_options');
    }

    public function get_all_questions_answers($unique_id){
       /* $all_ques = $this->db->query("select * from questions")->result_array();
        $answers = $this->db->query("select questions.id,GROUP_CONCAT(option_value) as answers , comment from questions LEFT JOIN answers ON questions.id = answers.question_id LEFT JOIN q_options on q_options.id = answer where unique_id='$unique_id' GROUP BY questions.id")->result_array();
        $answers = $this->db->query('select questions.id,GROUP_CONCAT(\'{"\',answer,\'","\',option_value,\'","\',answers.category,\'","\',answers.option_id,\'","\',answers.sub_option_id,\'"}\') as answers , comment from questions LEFT JOIN answers ON questions.id = answers.question_id LEFT JOIN q_options on q_options.id = answer where unique_id="'.$unique_id.'" GROUP BY questions.id')->result_array();
        return array("questions"=>$all_ques,"answers"=>$answers);*/
/*
        //$all_ques = $this->db->query("select * from questions")->result_array();
        $answers = $this->db->query("select questions.id,GROUP_CONCAT(option_value) as selected_questions , comment from questions LEFT JOIN selected_questions ON questions.id = selected_questions.question_id LEFT JOIN q_options on q_options.id = selected_questions.question_id where unique_id='$unique_id' GROUP BY questions.id")->result_array();
        $answers = $this->db->query('select questions.id,GROUP_CONCAT(\'{"\',answer,\'","\',option_value,\'","\',answers.category,\'","\',answers.option_id,\'","\',answers.sub_option_id,\'"}\') as answers , comment from questions LEFT JOIN answers ON questions.id = answers.question_id LEFT JOIN q_options on q_options.id = answer where unique_id="'.$unique_id.'" GROUP BY questions.id')->result_array();
        */
        $answers= $this->db->query('select * FROM selected_questions where unique_id="'.$unique_id.'"');

        return $answers;

        //return array("answers"=>$answers);
    }

    public function patient_details($unique_id)
    {
        return $this->db->query('select `patient_name`, `patient_age`, `patient_sex`, `patient_address` from `selected_questions` where `unique_id`="'.$unique_id.'" limit 1');
    }
}
