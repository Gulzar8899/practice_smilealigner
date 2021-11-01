<?php
/**
 * Controller Name: Dashboard
 * Description: back end Dashboard
 * @author Muhammad Irfan Aslam
 * Created date: 2020-05-23
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MY_Controller
{
    /**
     * Setting class elements
     * @author Muhammad irfan aslam
     */
    
    public $data;  
    /**
     * function to invoke necessary component
     * @author Muhammad Irfan Aslam
     */
    function __construct()
    {
        parent::__construct();  
        $this->load->model(array("Login_model"));   
    }
    /**
     * @author Muhammad Irfan Aslam
     */
    public function index()
    {   
        redirect('home?redirecturl=login');
        $this->load->view('elements/front_topbar',$data);
        $this->load->view('index',$data);
        $this->load->view('elements/front_footer',$data);        
    }  
    public function chkUserLogin() 
    {
        $userEmail  =   $this->input->post('email');
        $password   =   $this->input->post('password');
        $psw        =   sha1($password);
        
        // $getuserData   =   $this->Login_model->getMemberData($userEmail);
        // $userData = json_decode(json_encode($getuserData), true);
        // $loginMessage = "Invalid Login Details";

        // if (count($userData)>0) {     
        //     if ($userData[0]['user_type_id'] == '1' ) {
        //         $email = $userData[0]['email'];
        //     } else {
        //         $email = $userEmail;
        //     }
        // } else {
        //     $email = $userEmail;
        // }
        // $sendEmail['Email'] = $email;
        // $sendEmail =  json_encode($sendEmail); 
        
        $username   =  $this->input->post('email');
        $login    = $this->Login_model->checkUserData($username,$password);
        /*check user exist */
        if(count($login)>0){     
            $is_active = $login[0]['is_active'];
            $userType = $login[0]['user_type_id'];

            if($is_active==1) {
                    $userId = $login[0]['id'];
                    $language = ($this->session->userdata("user_languange"))?$this->session->userdata("user_languange"):$login[0]->account_language;

                    if($userType==1){
                        $this->session->set_userdata('adminData', $login[0]);
                    }else{
                        $this->session->set_userdata('userdata', $login[0]);
                    }
                    $response=array("success"=>"1","message"=>"true!","userid"=>$userId,"userType"=>$userType); 
            }
            else {
                $response=array("success"=>"0","message"=>"Your account is not verified"); 
            }
        }
        else {
            $response=array("success"=>"0","message"=>$loginMessage);
        }          
        if ($response['success'] == '1') {
            $logData['user_id']   = $login[0]['id'];
            $logData['ip_address']  = $_SERVER['REMOTE_ADDR'];
            $logData['login_agent'] = $_SERVER['HTTP_USER_AGENT'];
            $logData['login_date']  = date("Y-m-d H:i:s");
            $logRes = $this->Login_model->addLogData($logData);
        }
        echo json_encode($response);
        exit();
    }
    public function logout() 
    {
        $this->userData = $this->session->userdata('userdata');
        $userId = $this->userData->accounts_id;
        $this->session->unset_userdata('userdata');
        $this->session->unset_userdata('login_from');
        redirect('home');
    }
    public function changeLanguage()
    {
        $language = $this->input->post('language');
        $this->session->set_userdata("user_languange",$language);
        $response = array("success"=>"1","message"=>"language changes successfully");
        echo json_encode($response);
        exit;
    }
    public function checkForgotType()
    {
        $userName  =   $this->input->post('forgot_username');
        $password  =   $this->input->post('forgot_password');
        $this->load->view('elements/front_topbar',$data);
        if($userName=='username'){
            $this->load->view('forgotUserName',$data);
        }
        else{
            $this->load->view('forgotPassword',$data);
        }
        $this->load->view('elements/front_footer',$data); 
    }

    public function forgot_password() 
    {
        $this->load->view('elements/front_topbar',$data);
        $this->load->view('forgot-password',$data);
        $this->load->view('elements/front_footer',$data);   
    }
    public function forgotUserName()
    {
        $this->load->view('elements/front_topbar',$data);
        $this->load->view('forgotUserName',$data);
        $this->load->view('elements/front_footer',$data); 
    }
    public function linkSent()
    {
        $this->load->view('elements/front_topbar',$data);
        $this->load->view('linkSent',$data);
        $this->load->view('elements/front_footer',$data); 
    }
    public function forgotUserNameSubmit()
    {
        $email = $this->input->post('email');
        //check mail exist
        $checkEmailExit = $this->Login_model->getMemberData($email);
        if(!empty($checkEmailExit)) {
            $subject = "Forgot Username";
            $message = "Your username is ".$checkEmailExit[0]['first_name'];
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

            $mailRes = mail($email,$subject,$message,$headers);
            // redirect('login');
            if( $mailRes == true ) {
                $this->session->set_flashdata('success', "Email Sent Successfully!");
                // redirect('login/linkSent');
                redirect('home?redirecturl=linkSent');
            }else {
                $this->session->set_flashdata('success', "Something went wrong!");
                    redirect('login');
            }
        }
        else{
            $this->session->set_flashdata('error', "Email Does not exist!");
                    redirect('login');   
        }

    }
    public function forgotPassword()
    {
        $this->load->view('elements/front_topbar',$data);
        $this->load->view('forgotPassword',$data);
        $this->load->view('elements/front_footer',$data); 
    }
    public function resetPassword($password_reset_token = '')
    {
        $email = $this->input->post('email');
        //check mail exist
        $checkEmailExit = $this->Login_model->getMemberData($email);
        if(!empty($checkEmailExit)) {
            $userId = $checkEmailExit[0]['id'];
            $password_reset_token = sha1(uniqid(time()));
            $userdata['password_reset_token'] = $password_reset_token;

            // echo $password_reset_token;
            $userData = array('password_reset_token' => $password_reset_token );
            $result = $this->Login_model->setResetToken($userId,$userData);

            if($result){
                // $url = site_url('home?redirecturl=change-password').$userdata['password_reset_token'];
                $url = site_url('/home?redirecturl=change-password&userId='.$userId.'&userEmail='.$email);
                $link = '<a href="'.$url.'" target="_blank"><span style="">Re-Set Your Password</span></a>';

                $subject = "Forgot Password";
                $message = "Please click this link to reset your password ".$link;
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

                $mailRes = mail($email,$subject,$message,$headers);
                // redirect('login');
                if( $mailRes == true ) {
                    $this->session->set_flashdata('success', "An Email Has been sent to your Email Account please check for password reset link!");
                        // redirect('login');
                        redirect('home?redirecturl=linkSent');

                }else {
                    $this->session->set_flashdata('success', "Something went wrong!");
                        redirect('login');
                }

                $this->session->set_flashdata('success', 'An Email Has been sent to your Email Account please check for password reset link');
                // redirect('login');
                redirect('home?redirecturl=linkSent');

            }
            else{
                $this->session->set_flashdata('error', 'Something went wrong. Please try again later.');
                redirect('login');
            }
        }
        else{
            $this->session->set_flashdata('error', 'Email Does not exist.');
            redirect('login/linkSent');

        }
    }
    function reset_password($password_reset_token){
        $result = $this->Login_model->get_user_by_password_reset_token($password_reset_token);
         // print_r($result); die();
         if($result){
            $data['user_id'] = $result[0]['id'];
            $data['user_email'] = $result[0]['email'];
            $this->load->view('elements/front_topbar',$data);
            $this->load->view('reset_password',$data);
            $this->load->view('elements/front_footer',$data); 
        } else{
            $this->session->set_flashdata('error', 'Link Expired. Please try again later.');
            redirect('login');
        } 
    }
    function update_password(){
        $password = $this->input->post('password');
        $data['password'] = sha1($password);
        $user_id= $this->input->post('user_id');
        $user_email= $this->input->post('user_email');
        $result = $this->Login_model->updateUserPassword($user_id,$data);
        if($result==0){
            $this->session->set_flashdata('success', 'You have used same password.');
                redirect('login?redirecturl=reset_password');
        }
        elseif($result==1){

            $url = site_url('/home?redirecturl=login');
            $link = '<a href="'.$url.'" target="_blank"><span style="">Click Here</span></a>';

            // Password Succesfully Reset
            $subject = "Password Successfully Updated";
            $message = "Your password has been successfully reset, and you can login to your account. ".$link;
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

            $mailRes = mail($user_email,$subject,$message,$headers);
            // redirect('login');

            $this->session->set_flashdata('success', 'Password Updated successfully.');
                redirect('login?redirecturl=reset_password');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong, Please try again later.');
                redirect('login');
        }
    }

      // Check Password Availability
     public function check_password_avalibility() { 

        $user_id = $_POST["user_id"];
        $password = sha1($_POST["password"]);
        if ($this->Login_model->is_password_available($user_id, $password)) {
                $response = array("success" => "0", "message" => "failed", "reason" => "Please use a password that has not been used before.");
            } else {
                $response = array("success" => "1", "message" => "failed", "reason" => "Password is valid");
        }
        echo json_encode($response);
        exit;
    }

}
