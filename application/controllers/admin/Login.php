<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/m_auth');
	}

	public function index(){

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === TRUE) {

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($this->m_auth->login($username, $password)) {

				$admin_id 					= $this->m_auth->get_admin_id($username);
				$admin_data 				= $this->m_auth->get_admin_data($admin_id);

				$_SESSION['admin_id']		= (int)$admin_data->admin_id;
				$_SESSION['username']		= (string)$admin_data->username;
				$_SESSION['log_admin']		= (bool)TRUE;

				redirect(base_url('admin/dashboard'));

			} else {

				$this->session->set_flashdata('msg', 'Username atau password salah');
				redirect(base_url('admin/login'));

			}

		} else {

			$data = array(
				'title' => 'Login Admin - Rima Arhyan'
			);

			$this->load->view('template/visitor/header', $data);
			$this->load->view('admin/login');
			$this->load->view('template/visitor/footer');

		}

	}

	public function logout(){

		if (!isset($_SESSION['log_admin'])) {

			show_404();
		
		}

		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}

		$this->session->set_flashdata('msg', 'Anda telah berhasil logout');
		redirect(base_url('admin/login'));
	
	}

}