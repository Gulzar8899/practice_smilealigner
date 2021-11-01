<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locate_orthodontist extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('elements/front_topbar');
        $this->load->view('locate_orthodontist');
        $this->load->view('elements/front_footer');
    }
    public function search_orthodontist(){
        $pincode = $_POST['pincode']==""?"%":$_POST['pincode'];
        $city = $_POST['city']==""?"%":$_POST['city'];
        $data = $this->db->query("SELECT * FROM `doctors` WHERE pincode like '%$pincode%' AND city like '%$city%' and profile_completed=1")->result();
        $load_view = $this->load->view("result",array("search"=>$data),true);
        echo json_encode(array("success"=>true,"values"=>$load_view));
    }
}
