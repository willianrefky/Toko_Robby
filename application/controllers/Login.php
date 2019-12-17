<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
		$this->load->library('encryption');
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('login/v_login');
	}


	public function login_process() 
	{

		// data post
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => md5($password) 
		);

		$cek = $this->login_m->login_check('user',$where)->num_rows();

		if ($cek = 1) {

			$data_session = array(
				'username' => $username,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			redirect(base_url("dashboard"));

		} else {
			$this->session->set_flashdata('message', '<div style="color: red; margin-top: -15px;" role="alert">Username atau password salah!</div>'); // session flash data
			redirect(base_url("login")); //redirect ke halaman login
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}