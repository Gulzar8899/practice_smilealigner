<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_list extends MX_Controller{
    private $session_data;
    public function __construct(){
        parent::__construct();
        $this->load->model("Orders_list_model");
        $this->session_data = $this->session->userdata('doctor_data');
        if (empty($this->session_data)) {
            redirect(base_url(""));
        }
    }
    public function index(){
        $order_data = $this->Orders_list_model->get_list($this->session_data['doctor_id']);
        $this->load->template("orders_list",array("orders"=>$order_data->result()));
    }

    public function get_question_answers(){
        $unique_id = $_POST['unique_id'];
        $questions = $this->Orders_list_model->get_all_questions();

        $q_options = $this->Orders_list_model->get_all_q_options();

       /* $answers = $this->Orders_list_model->get_all_answers($unique_id);
//        $options = explode(",",$answers->row()->options);
//        $comments =json_decode("[".$answers->row()->comments."]");
        $patient_name = $answers->row()->patient_name;
        $patient_age = $answers->row()->patient_age;
        $patient_sex = $answers->row()->patient_sex;*/
//        $answers = explode(",",$answers->row()->answers);

        $answers = $this->Orders_list_model->get_all_questions_answers($unique_id)->result();
        $patient_details=$this->Orders_list_model->patient_details($unique_id)->row();

      /*  $ques_view = $this->load->view("order_answers",array('questions'=>$questions->result(),'q_options'=>$q_options->result(),'answers'=>$answers['answers'],
            "patient_name" =>$patient_name,"patient_age"=>$patient_age,"patient_sex"=>$patient_sex),true);*/
        $ques_view = $this->load->view("order_answers",array('questions'=>$questions->result(),'q_options'=>$q_options->result(),'answers'=>$answers,'patient_details'=>$patient_details),true);
        echo json_encode(array("success"=>true,"value" => $ques_view));
    }
}
