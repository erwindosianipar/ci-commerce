<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_carousel extends CI_Model{

	public function tambah_carousel($carousel_judul, $carousel_gambar){

		$data = array(
			'carousel_judul' 	=> $carousel_judul,
			'carousel_gambar' 	=> $carousel_gambar
		);

		return $this->db->insert('carousel', $data);
	
	}

	public function ambil_carousel(){

		$query = $this->db->query("SELECT * FROM carousel");
		return $query;
	
	}

}