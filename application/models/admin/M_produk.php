<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model{

	public function tambah_produk($produk_gambar, $produk_nama, $produk_harga, $produk_deskripsi, $produk_kategori_id, $produk_stok, $produk_diskon){

		$data = array(
			'produk_nama' 			=> $produk_nama,
			'produk_slug' 			=> url_title($produk_nama, 'dash', TRUE).'-'.random_string('numeric', 6),
			'produk_harga' 			=> $produk_harga,
			'produk_deskripsi' 		=> $produk_deskripsi,
			'produk_kategori_id' 	=> $produk_kategori_id,
			'produk_gambar' 		=> $produk_gambar,
			'produk_stok' 			=> $produk_stok,
			'produk_diskon' 		=> $produk_diskon,
			'produk_harga_diskon'	=> diskon($produk_harga, $produk_diskon)
		);
	
		return $this->db->insert('produk', $data);

	}

}