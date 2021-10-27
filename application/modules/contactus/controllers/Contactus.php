<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library("send_email");
    }
    public function index()
    {
        $data=array();
        if(empty($this->session->userdata('doctor_data')))
        {
            $data['form_view']=$this->load->view('general_contact_form',array(),true);
        }
        else{
            $data['form_view']=$this->load->view('doctor_contact_form',array(),true);
        }
        $this->load->view('elements/front_topbar');
        $this->load->view('contactus',$data);
        $this->load->view('elements/front_footer');
    }
    // CODE 007
    public function contactform(){
        $name = $_POST['name'];
        $comname = $_POST['comname']==""?" ":$_POST['comname'];
        $email =$_POST['email'];
        $mobile = $_POST['mobile']==""?" ":$_POST['mobile'];
        $msg = $_POST['msg']==""?" ":$_POST['msg'];
        if($name !=="" && $email !=="") {
            $send_mail = $this->send_email->sent_contact_mail($email,"New query from <b>".$name."</b>.<br/>Company Name:".$comname.",<br/> Mobile Number:". $mobile.",<br/> Message: ".$msg,"New query from ".$name);
            if ($send_mail) {
                echo json_encode(array(
                    "success" => true,
                    "message" => "Email send successfully."
                ));
            } else {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Email send failed. Please try again..."
                ));
            }
        }else{
            echo json_encode(array(
                "success" => false,
                "message" => "Please fill the above information."
            ));
        }
    }
    // code end 007

    //dinesh code
    public function doctor_contactform(){
        $topic = $_POST['topic'];
        $msg = $_POST['msg']==""?" ":$_POST['msg'];
        $doctor_details=$this->session->userdata('doctor_data');

        $doctor_name=$doctor_details['first_name']." ".$doctor_details['last_name'];
        $doctor_email=$doctor_details['email'];
        $doctor_mobile=$doctor_details['mobile'];

        echo "<pre>";
        print_r($this->session->userdata('doctor_data'));

        if($topic !=="" && $msg !=="") {
            $send_mail = $this->send_email->sent_contact_mail($doctor_email,"New query from Dr. <b>".$doctor_name."</b>.,<br/> Mobile Number:". $doctor_mobile.",<br/> Enquiry: ".$msg,"New query from Dr.".$doctor_name);
            if ($send_mail) {
                echo json_encode(array(
                    "success" => true,
                    "message" => "Email send successfully."
                ));
            } else {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Email send failed. Please try again..."
                ));
            }
        }else{
            echo json_encode(array(
                "success" => false,
                "message" => "Please fill the above information."
            ));
        }
    }
    //dinesh code end
}


