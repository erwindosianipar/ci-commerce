<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model{

	public function ambil_profil(){

		$session = $this->session->userdata('customer_id');

		$query = $this->db->get_where('customer', array('customer_id' => $session));
		return $query->row_array();
	
	}

}