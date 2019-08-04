<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['main_view'] = "home_view";
        $this->load->view('layouts/main',$data);
    }
}