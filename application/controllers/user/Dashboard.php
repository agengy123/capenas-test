<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id')){
            redirect('welcome');
        } else {
            if($this->session->userdata('level') != 'User'){
                redirect('admin/dashboard');
            }
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/templates/sidebar');
        $this->load->view('user/dashboard', $data);
        $this->load->view('user/templates/footer');
    }
}