<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    
        
    // function __construct()
    // {
    //     parent::__construct();
    //     // $this->load->model('Dashboard_model');
    //     // $this->load->library('form_validation');
    // }

    public function index()
    {
        
        $data = array('tes' => 'Testing testing');
        $this->template->load('template','dashboard', $data);
        // $this->template->load('dashboard','index');
    }
}