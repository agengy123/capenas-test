<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id')){
            redirect('welcome');
        } else {
            if($this->session->userdata('level') != 'Admin'){
                redirect('user/dashboard');
            }
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['jumlahBarang'] = $this->m_model->get('tb_barang')->num_rows();
        $data['jumlahPengguna'] = $this->m_model->get('tb_user')->num_rows();
        $data['Lina'] = $this->m_model->get('tb_barang')->num_rows();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/templates/footer');
    }
}