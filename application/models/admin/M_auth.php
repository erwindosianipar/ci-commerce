<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model{

	public function login($username, $password){
	
		$this->db->select('password');
		$this->db->from('admin');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');

		return $this->verify($password, $hash);
	
	}

	private function verify($password, $hash){

		return password_verify($password, $hash);
	
	}

	public function get_admin_id($username){

		$this->db->select('admin_id');
		$this->db->from('admin');
		$this->db->where('username', $username);

		return $this->db->get()->row('admin_id');

	}

	public function get_admin_data($admin_id){

		$this->db->from('admin');
		$this->db->where('admin_id', $admin_id);

		return $this->db->get()->row();

	}

}