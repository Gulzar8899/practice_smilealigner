<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/* load the MX_Controller class */
require APPPATH."third_party/MX/Controller.php";
class MY_Controller extends MX_Controller {

    function __construct(){
        parent::__construct();      
    }   
    function checkAdminLogin()
    {
        if(!$this->session->userdata('adminData')){
            redirect('login');
        }
    } 
    function checkUserLogin()
    {
        if(!$this->session->userdata('userdata')){
            redirect('login');
        }
    }  
}
?>