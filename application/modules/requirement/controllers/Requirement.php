<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Requirement extends MX_Controller
{

    private $session_data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Requirement_model");
        // $this->load->library("send_email");
        $this->session_data = $this->session->userdata('doctor_data');
//        if (empty($this->session_data)) {
//            redirect(base_url(""));
//        }
    }

    public function index()
    {
        $questions = $this->Requirement_model->get_all_questions();
        // $this->load->template("requirement", array('questions' => $questions->result()));
        $this->load->view('elements/front_topbar');
        $this->load->view('requirement', array('questions' => $questions->result()));
        $this->load->view('elements/front_footer');
    }

    public function check_requirement()
    {
        $unique_id = sprintf("%06d", mt_rand(1, 999999));
        $question_data = array();
        $dr_data = array();

        /* doctor information --------------007 */
        $dr_id = '';
        if (!isset($this->session_data)) {
            $dr_data = array(
                "first_name" => $_POST['dr_fname'],
                "middle_name" => $_POST['dr_mname'],
                "last_name" => $_POST['dr_lname'],
                "email" => $_POST['dr_email'],
                "mobile" => $_POST['dr_mobile'],
                "speciality" => $_POST['dr_speciality'],
                "clinic_name" => $_POST['dr_clinic_name'],
                "address" => $_POST['dr_address'],
                "city" => $_POST['dr_city'],
                "pincode" => $_POST['dr_pincode'],
            );

            if ($dr_data['first_name'] == '' || $dr_data['last_name'] == '' || $dr_data['email'] == '' ||
                $dr_data['mobile'] == '' || $dr_data['speciality'] == '' || $dr_data['clinic_name'] == '' ||
                $dr_data['address'] == '' || $dr_data['city'] == '' || $dr_data['pincode'] == '') {
                echo json_encode(array("success" => false, "message" => "Please enter all doctors information."));
                return false;
            }
            if ($dr_data['email'] == null || $dr_data['email'] == '') {
                echo json_encode(array("success" => false, "message" => "Email is required."));
                return false;
            }
            if (strlen($dr_data['mobile']) !== 10 || !ctype_digit(strval($dr_data['mobile']))) {
                echo json_encode(array("success" => false, "message" => "Enter valid mobile number."));
                return false;
            }
            if (strlen($dr_data['pincode']) !== 6 || !ctype_digit(strval($dr_data['pincode']))) {
                echo json_encode(array("success" => false, "message" => "Enter valid pincode."));
                return false;
            } else {

                $dr_id = $this->Requirement_model->check_dr_exist($dr_data);
            }
        } else {
            $dr_id = $this->session_data['doctor_id'];
        }
        /* doctor information --------------007 ends*/

        $patient_name = $_POST['patient_name'];
        $patient_age = $_POST['patient_age'];
        $patient_sex = $_POST['patient_sex'];
        $addr = $_POST['addr'];
        $counter = 0;

        foreach ($_POST as $key => $p) {

            $data['question_id'] = "";
            $data['unique_id'] = "";
            $data['doctor_id'] = "";
            $data['option_id'] = "";
            $data['comment'] = "";
            $comment = '';
            $empty_q = 0;
            if ($key == "patient_name" || $key == "patient_age" || $key == "patient_sex") {
                continue;
            }

            if (strpos($key, 'comment') !== false) {
                $p_data = explode("_", $key);
                $question_data_size = sizeof($question_data) - 1;
                if ($question_data_size == $counter) {
                    if ($question_data[$counter]["question_id"] == $p_data[1] && $p_data[1] > 0 && $_POST['comment_' . $p_data[1]] !== "") {
                        $comment = $_POST['comment_' . $p_data[1]];
                        $question_data[$counter]['comment'] = $comment;
                    } else {
                    }
                    $counter++;
                    continue;
                } else if ($question_data_size !== $counter && $_POST['comment_' . $p_data[1]] !== "") {
                    $comment = $_POST['comment_' . $p_data[1]];
                    $data['question_id'] = $p_data[1];
                    $data['unique_id'] = $unique_id;
                    $data['doctor_id'] = $dr_id;
                    $data['patient_name'] = $patient_name;
                    $data['patient_age'] = $patient_age;
                    $data['patient_sex'] = $patient_sex;
                    $data['comment'] = $comment;
                    array_push($question_data, $data);
                    $counter++;
                    continue;
                } else {

                }

                continue;
            }

            $i = 0;
            $option[] = "";
            $p_data = explode("_", $key);
            foreach ($p_data as $pd) {

                if ($p_data[1] > 0 && sizeof($p_data) == 2) {
                    $option = $_POST['question_' . $p_data[1]];
                } else {
                }
                $i++;
            }

            if ($option[0] !== '') {
                $option_obj = implode(',', $option);
                $data['question_id'] = $p_data[1];
                $data['unique_id'] = $unique_id;
//                $data['doctor_id'] = $this->session_data['doctor_id'];
                $data['doctor_id'] = $dr_id;
                $data['patient_name'] = $patient_name;
                $data['patient_age'] = $patient_age;
                $data['patient_sex'] = $patient_sex;
                $data['option_id'] = $option_obj;
                $data['comment'] = $comment;
                $data['patient_address'] = $addr;
                array_push($question_data, $data);
            }
            $option = '';
        }

        if ($this->Requirement_model->store_answer($question_data)) {
            /*
             * send mail to admin and doctor about the order
             * Mail body should contain
             * Patient Name
             * Patient Sex
             * Patient Age
             * Patient Address
             * Date of Order
             */
            $doctor_id = $dr_id;
            $doctor_email = $this->Requirement_model->get_doc_email($doctor_id)->row();
            $admin_email = $this->Requirement_model->get_admin_email()->row();

            $message = "Hi,<br> An Order has been punched.<br>";
            $message .= "<b>Patient Name:</b> $patient_name <br>";
            $message .= "<b>Patient Age:</b> $patient_age <br>";
            $message .= "<b>Patient Sex:</b> $patient_sex <br>";
            $message .= "<b>Patient Address:</b> $addr <br>";
            $message .= "Thanks,<br> SmileAligners :)";

            $this->send_email->send_mail($doctor_email->email, $message, "SmileAligners order punched");
            $this->send_email->send_mail($admin_email->username, $message, "SmileAligners order punched");

            echo json_encode(array("success" => true, "message" => "Your Requirement Submitted"));
        } else {
            echo json_encode(array("success" => false, "message" => "Failed, Please try again."));
        }
    }
}
