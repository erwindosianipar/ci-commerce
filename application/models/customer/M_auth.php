<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model{

	public function login($username, $password){
	
		$this->db->select('password');
		$this->db->from('customer');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');

		return $this->verifikasi_password($password, $hash);
	
	}

	private function verifikasi_password($password, $hash){

		return password_verify($password, $hash);
	
	}

	public function ambil_customer_id($username){

		$this->db->select('customer_id');
		$this->db->from('customer');
		$this->db->where('username', $username);

		return $this->db->get()->row('customer_id');

	}

	public function ambil_customer_data($customer_id){

		$this->db->from('customer');
		$this->db->where('customer_id', $customer_id);

		return $this->db->get()->row();

	}

	public function tambah_customer($nama, $username, $email, $password){

		$this->load->helper('string');

		$data = array(
			'nama' 		=> $nama,
			'username'	=> $username,
			'email'		=> $email,
			'password'	=> password_hash($password, PASSWORD_DEFAULT, ['cost' => 5]),
			'hash'		=> random_string('alnum', 200)
		);

		return $this->db->insert('customer', $data);

	}

	public function aktifasi_customer($email){

		$satu = 1;

		$this->db->query("UPDATE customer SET aktif = '$satu', hash = '$satu' WHERE customer.email = '$email'");
		$this->db->set('customer', $satu);
	
	}

	public function cek_customer_email_hash($email, $hash){

		$query = $this->db->query("SELECT email FROM customer WHERE email = '$email' AND hash = '$hash'");
		return $query->num_rows();
	
	}

	public function cek_apakah_aktif($username){

		$this->db->select('aktif');
		$this->db->from('customer');
		$this->db->where('username', $username);

		return $this->db->get()->row('aktif');

	}

}