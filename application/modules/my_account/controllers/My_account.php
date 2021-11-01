<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_account extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("My_account_model");
        $this->session_data = $this->session->userdata('doctor_data');
        if (empty($this->session_data)) {
            redirect(base_url(""));
        }
    }
    public function index()
    {
        $data=array();
        $data['doc_details']=$this->session->userdata('doctor_data');
        $this->load->template("myaccount",$data);
    }

    public function update_profile(){
        /*echo "<pre>";
        print_r($_POST);
        die;*/
        $data=array();
        $data['address']=$_POST['address'];
        $data['city']=$_POST['city'];
        $data['clinic_name']=$_POST['cli_name'];
        $data['email']=$_POST['email'];
        $data['first_name']=$_POST['fname'];
        $data['last_name']=$_POST['lname'];
        $data['middle_name']=$_POST['mname'];
        $data['mobile']=$_POST['mobile'];
        $data['pincode']=$_POST['pincode'];
        //$data['speciality']=$_POST['speciality'];

        $profile = $this->My_account_model->update_profile($data);
        if($profile){
            if($profile->profile_completed==1) {
                $this->send_email->send_mail($profile->email,"Your profile Information updated successfully","Profile Updated");
                $this->send_email->send_sms("Your profile Information updated successfully",$profile->mobile);
                $data = array('success' => true);
            }else{
                $data = array("success"=>false,"message"=>"Profile Updating.");
            }
        }else{
            $data = array('success'=>false,'message'=>"Something went wrong. Please try again");
        }
        echo json_encode($data);

    }

    public function update_password()
    {
        $data=array();
        $new_password=$_POST['new'];
        $confirm_new_password=$_POST['confirm'];
        $current_password=$_POST['old'];
        $user_id=$this->session->userdata('doctor_data')['doctor_id'];

        if($new_password !=$confirm_new_password)
        {
            $data['status']=false;
            $data['msg']='New password and confirm password are not same !';
        }
        else
        {
            $checkpass=get_data_where('doctors',array('id'=>$user_id,'password'=>$current_password));
            if ($checkpass->num_rows() > 0) {
                if(update_data('doctors',array('password'=>$confirm_new_password),array('id'=>$user_id)))
                {
                    $data['status']=true;
                    $data['msg']='Password has been reset successfully';
                }
                else{
                    $data['status']=false;
                    $data['msg']='Some technical problem occurred';
                }


            }
            else{
                $data['status']=false;
                $data['msg']='Current password didn\'t match with our record';
            }

        }
        echo json_encode($data);
    }
}


