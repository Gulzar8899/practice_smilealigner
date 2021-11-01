<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

    }
    public function index()
    {
        $this->load->view('elements/front_topbar');
        $this->load->view('about');
        $this->load->view('elements/front_footer');
    }
}
