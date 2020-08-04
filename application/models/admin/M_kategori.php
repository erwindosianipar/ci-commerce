<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model{

	public function tambah_kategori($nama){

		$this->load->helper('string');

		$data = array(
			'kategori_nama' 	=> $nama,
			'kategori_slug' 	=> url_title($nama, 'dash', TRUE).'-'.random_string('numeric', 6)
		);

		return $this->db->insert('kategori', $data);
	
	}

	public function ambil_kategori($kategori_slug = FALSE){

		if ($kategori_slug === FALSE){
		
			$query = $this->db->query("SELECT * FROM kategori");
			return $query;
		
		}

		$query = $this->db->get_where('kategori', array('kategori_slug' => $kategori_slug));
		return $query->row_array();
	
	}

}