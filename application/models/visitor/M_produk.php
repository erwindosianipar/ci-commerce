<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model{

	public function ambil_produk($produk_slug = FALSE){

		if ($produk_slug === FALSE){
		
			$query = $this->db->query("SELECT * FROM produk");
			return $query;
		
		}

		$query = $this->db->get_where('produk', array('produk_slug' => $produk_slug));
		return $query->row_array();
	
	}

}