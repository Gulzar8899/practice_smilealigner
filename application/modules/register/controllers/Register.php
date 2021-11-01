<?php
/**
 * Controller Name: Register
 * Description: front end Register
 * @author Surfiq Tech
 * Created date: 2021-07-02
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends MY_Controller
{
    /**
     * Setting class elements
     * @author Surfiq Tech
     */
    
    public $data;  
    /**
     * function to invoke necessary component
     * @author Surfiq Tech
     */
    function __construct()
    {
        parent::__construct();  
        $this->load->model(array("Register_model","admin/Admin_model"));   
    }
    /**
     * @author Surfiq Tech
     */
    public function index()
    {
        redirect('home?redirecturl=register');
        $this->load->view('elements/front_topbar',$data);
        $this->load->view('index',$data);
        $this->load->view('elements/front_footer',$data);         
    }  
    public function submitRegister()
    {   
        // echo "<pre>";
        // print_r($this->input->post());
        // die();
        $userEmail = $this->input->post('email');
        $upload_path = 'assets/uploads/images/';
        // if (!empty($_FILES['user_edit_avatar_control']['name']) && $_FILES['user_edit_avatar_control']['error'] == 0) {
        //     $file_name = time().str_replace(' ','_',$_FILES['user_edit_avatar_control']['name']);
        //     move_uploaded_file($_FILES['user_edit_avatar_control']['tmp_name'], $upload_path . $file_name);
        //     $doctor_image =time().str_replace(' ','_',$_FILES['user_edit_avatar_control']['name']);
        // }
        $alreadyuser_data = $this->Register_model->getUserData($userEmail);

        $businessReference = $this->input->post('business_reference_person');
        $personReference = $this->input->post('reference_person');
        if($businessReference != ''){
            $reference = $businessReference;
        }else{
            $reference = $personReference;
        }

        if(empty($alreadyuser_data)){
            $verification_code = mt_rand(1000, 9999);
            $userdata = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('lastName'),
                'email' => $this->input->post('email'),
                'phone_number' => $this->input->post('phone_number'),
                'default_billing_address' => 1,
                'street_address' => $this->input->post('billing_streetaddress'),
                'country' => $this->input->post('billing_country'),
                'state' => $this->input->post('billing_state'),
                'city' => $this->input->post('billing_city'),
                'zip_code' => $this->input->post('billing_zipcode'),
                'gst_no' => $this->input->post('gst_no'),
                'refer_by' => $this->input->post('radio_group'),
                'refer_text' => $reference,
                'profile_image' => $this->input->post('user_edit_avatar_control'),
                'notification_alert' => $this->input->post('notification_alert'),
                'user_type_id' => 2,
                'is_active' => 0,
                'source' => 0,
                'created' => date('Y-m-d')
            );
            $result = $this->Register_model->insertUser($userdata);
            $doctor_id = $this->db->insert_id();

            // $sameAddress = $this->input->post('same_billing_address');
            // if($sameAddress == 1){
            //     $data = array(
            //         'doctor_id' => $doctor_id,
            //         'street_address' => $this->input->post('billing_streetaddress'),
            //         'country' => $this->input->post('billing_country'),
            //         'state' => $this->input->post('billing_state'),
            //         'city' => $this->input->post('billing_city'),
            //         'zip_code' => $this->input->post('billing_zipcode'),
            //         'default_shipping_address' => 1,
            //     );
            // }else{
                $data = array(
                    'doctor_id' => $doctor_id,
                    'street_address' => $this->input->post('shipping_streetaddress'),
                    'country' => $this->input->post('shipping_country'),
                    'state' => $this->input->post('shipping_state'),
                    'city' => $this->input->post('shipping_city'),
                    'zip_code' => $this->input->post('shipping_zipcode'),
                    'default_shipping_address' => 1,
                );
            // }
            
            $doctorShippingAddress = $this->db->insert('shipping_address',$data);

            $to_email = $this->input->post('email');
            $firstName = $this->input->post('first_name');
            $lastName = $this->input->post('lastName');

            if($result){

                $config = Array(
                  'protocol' => 'sendmail',
                  'smtp_host' => 'ssl://smtp.gmail.com',
                  'smtp_port' => 465,
                  'smtp_user' => 'surfiq.testemail@gmail.com', // change it to yours
                  'smtp_pass' => 'Surfiq123', // change it to yours
                  'mailtype' => 'html',
                  'charset' => 'iso-8859-1',
                  'wordwrap' => TRUE
                );

                $message = 'Thank you for registering with us. Your account is currently in the process of being approved. We’ll notify you once we’ve reviewed your application.';
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('hr@smilealigners.in', 'Smilealigners'); // change it to yours
                $this->email->to($to_email);// change it to yours
                $this->email->subject('Thank you for registering with us.');
                $this->email->message($message);
                $mailRes = $this->email->send();

                // $subject = "Dear ".$firstName." ".$lastName.", Your Application is Under Review";
                // $message = 'Thank you for registering with us. Your account is currently in the process of
                //                 being approved. We’ll notify you once we’ve reviewed your application.';
                
                // // Always set content-type when sending HTML email
                // $headers = "MIME-Version: 1.0" . "\r\n";
                // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // // More headers
                // $headers .= 'From: <hr@smilealigners.in>' . "\r\n";

                // $mailRes = mail($to_email,$subject,$message,$headers);

                if($mailRes){
                     $this->session->set_flashdata('success', "Dear user, your account details are being reviewed by our staff. We’ll notify you once the review is complete!");
                                redirect('home?redirecturl=login');
                }else{
                        
                      $this->session->set_flashdata('error', "Email has not been sent.");
                                redirect('home');
                }
            }

            // if($email_sent){
            //     $this->session->set_flashdata('success', "Dear user, your account details are being reviewed by our staff. We’ll notify you once the review is complete!");
            //                     redirect('home');
            // } else{
            //     $this->session->set_flashdata('error', "something went wrong.");
            //     redirect('register');
            // }
        }else{
            $this->session->set_flashdata('error', "User Already Registerd agaist this Email.");
            redirect('home');
        }
    }
    public function check_email_avalibility() {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $response = array("success" => "0", "message" => "failed", "reason" => "Invalid Email");
        } else {
            if ($this->Register_model->is_email_available($_POST["email"])) {
                $response = array("success" => "0", "message" => "failed", "reason" => "User account already exists");
            } else {
                $response = array("success" => "1", "message" => "failed", "reason" => "Email Available");
            }
        }
        echo json_encode($response);
        exit;
    }

     public function check_email_avalibility_sendlink() {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $response = array("success" => "0", "message" => "failed", "reason" => "Invalid Email");
        } else {
            if ($this->Register_model->is_email_available($_POST["email"])) {
                $response = array("success" => "1", "message" => "failed", "reason" => "Email Available");
            } else {
                $response = array("success" => "0", "message" => "failed", "reason" => "Invalid Email");
            }
        }
        echo json_encode($response);
        exit;
    }

    public function imgCrop()
    {
        $data = $_POST['image'];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);

        $image_name = 'assets/uploads/images/' . time() . '.png';
        $fileimage_name =  time() . '.png';

        file_put_contents($image_name, $data);
        echo $fileimage_name;
    }
    public function getBusinessDeveloper()
    {

        $result = $this->Register_model->getBusinessDeveloper();
        echo json_encode($result);
        exit;

    }

    public function getAllCoutries()
    {
        $countryID = $this->input->post('id');
        $result = $this->Register_model->getAllCountries();

        echo json_encode($result);
    }

    public function getEditStates()
    {
        $countryName = $this->input->post('name');
        $countryDetail = $this->Register_model->getCountryByName($countryName);
        $countryID = $countryDetail->id;

        $result = $this->Register_model->getStatesByCountryID($countryID);

        echo json_encode($result);
    }

    public function getEditCities()
    {   

        $stateName = $this->input->post('name');
        $stateDetail = $this->Register_model->getStateByName($stateName);
        $stateID = $stateDetail->id;

        $result = $this->Register_model->getCitiesByStateID($stateID);
        echo json_encode($result);
    }


    public function getStates()
    {
        $countryID = $this->input->post('id');
        $result = $this->Register_model->getStatesByCountryID($countryID);

        echo json_encode($result);
    }

    public function getCities()
    {   

        $stateID = $this->input->post('id');
        $result = $this->Register_model->getCitiesByStateID($stateID);
        echo json_encode($result);
    }


}
