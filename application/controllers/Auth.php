<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('customer/m_auth');
	}

	public function login(){

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() === TRUE) {

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($this->m_auth->login($username, $password)) {

				if ($this->m_auth->cek_apakah_aktif($username) == '1') {
				
					$customer_id 				= $this->m_auth->ambil_customer_id($username);
					$customer_data 				= $this->m_auth->ambil_customer_data($customer_id);

					$_SESSION['customer_id']	= (int)$customer_data->customer_id;
					$_SESSION['username']		= (string)$customer_data->username;
					$_SESSION['log_customer']	= (bool)TRUE;

					redirect(base_url());
				
				} else {

					$this->session->set_flashdata('msg', 'Akun belum aktif, segera konfirmasi email');
					redirect(base_url('auth/login'));

				}

			} else {

				$this->session->set_flashdata('msg', 'Username atau password salah');
				redirect(base_url('auth/login'));

			}

		} else {

			$data = array(
				'title' => 'Login – Rima Arhyan'
			);

			$this->load->view('template/visitor/header', $data);
			$this->load->view('template/visitor/navbar');
			$this->load->view('customer/login');
			$this->load->view('template/visitor/footer');

		}

	}

	public function logout(){

		if (!isset($_SESSION['log_customer'])) {

			show_404();
		
		}

		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}

		$this->session->set_flashdata('msg', 'Anda telah berhasil logout');
		redirect(base_url('auth/login'));
	
	}

	public function register(){

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|min_length[3]|callback_alpha_space',
			array(
				'required' 		=> '%s tidak boleh kosong',
				'min_length'	=> '%s minimal 3 karakter',
				'callback_alpha_space' 	=> '%s tidak boleh mengandung simbol dan angka'
			)
		);

		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|alpha_numeric|is_unique[customer.username]',
			array(
				'required' 		=> '%s tidak boleh kosong',
				'min_length'	=> '%s minimal 6 karakter',
				'alpha_numeric'	=> '$s hanya memperbolehkan huruf dan angka',
				'is_unique'		=> '%s sudah digunakan'
			)
		);
		
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|valid_email|is_unique[customer.email]',
			array(
				'required' 		=> '%s tidak boleh kosong',
				'valid_email'	=> '%s tidak valid',
				'is_unique'		=> '%s sudah digunakan'
			)
		);
		
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',
			array(
				'required' 		=> '%s tidak boleh kosong',
				'min_length'	=> '%s minimal 6 karakter'
			)
		);

		if ($this->form_validation->run() === TRUE) {

			$nama 		= $this->input->post('nama');
			$username 	= $this->input->post('username');
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');

			$this->m_auth->tambah_customer($nama, $username, $email, $password);

			$this->session->set_flashdata('msg', 'Konfirmasi email untuk mengaktifkan akun');
			redirect(base_url('auth/login'));


		} else {

			$data = array(
				'title' => 'Mendaftar – Rima Arhyan'
			);

			$this->load->view('template/visitor/header', $data);
			$this->load->view('template/visitor/navbar');
			$this->load->view('customer/register');
			$this->load->view('template/visitor/footer');

		}
	}

	public function alpha_space($name){

		if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
			$this->form_validation->set_message('alpha_space', 'Nama tidak boleh mengandung simbol dan angka');
			return FALSE;
		} else {
			return TRUE;
		}

	}

	public function cek_email($email){

		$cek = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'TRUE' : 'FALSE';

		if ($cek == 'TRUE') {

			return TRUE;

		} else {

			return FALSE;

		}
	
	}

	public function aktifasi($hash=''){

		$email = $this->input->get('email');

		if (strlen($hash) == 200) {

			if ($this->m_auth->cek_customer_email_hash($email, $hash) > 0) {

				$this->m_auth->aktifasi_customer($email);

				$this->session->set_flashdata('msg', 'Email telah dikonfirmasi, silahkan login');
				redirect(base_url('auth/login'));

			} else {

				show_404();

			}

		} else {

			show_404();

		}
	
	}

}