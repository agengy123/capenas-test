<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('id') != '' ){
			if($this->session->userdata('level') == 'Admin' ){
				redirect('admin/dashboard');
			} else {
				redirect('user/dashboard');
			}
		} else {
			$this->load->view('login');
		}
	}

	public function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$where = array(
			'username' => $username,
			'password' => md5($password)
		);

		$cek = $this->m_model->get_where($where, 'tb_user')->num_rows();
		if($cek > 0){
			$data = $this->m_model->get_where($where, 'tb_user')->result();
			foreach ($data as $dt) {
				$datauser = array(
					'id' 			=> $dt->id,
					'nama' 			=> $dt->nama,
					'username' 		=> $dt->username,
					'password' 		=> $dt->password,
					'level' 		=> $dt->level,
					'createDate' 	=> $dt->createDate
				);
			}

			$this->session->set_userdata($datauser);
			if($this->session->userdata('level') == 'Admin'){
				redirect('admin/dashboard');
			} else {
				redirect('user/dashboard');
			}
		} else {
			$this->session->set_flashdata('pesan', 'Username atau Password anda salah!');
			redirect('welcome');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
