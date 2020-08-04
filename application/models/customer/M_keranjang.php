<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keranjang extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->helper('string');
	}

	public function ambil_produk_id($produk_id){

		$query = $this->db->get_where('produk', array('produk_id' => $produk_id));
		return $query->row_array();
	
	}

	public function cek_di_keranjang($keranjang_produk_id){

		$query = $this->db->get_where('keranjang',
			array(
				'keranjang_customer_id' => $this->session->userdata('customer_id'),
				'keranjang_produk_id' 	=> $keranjang_produk_id,
				'keranjang_status'		=> 0
			)
		);

		return $query->row_array();
	
	}

	public function double_produk($keranjang_produk_id, $keranjang_kuantitas, $keranjang_harga){

		$this->db->where(
			array(
				'keranjang_customer_id'	=> $this->session->userdata('customer_id'),
				'keranjang_produk_id' 	=> $keranjang_produk_id,
				'keranjang_status'		=> 0
			)
		);

		$data = array(
			'keranjang_kuantitas' 	=> $keranjang_kuantitas,
			'keranjang_harga'		=> $keranjang_harga
		);

		$this->db->update('keranjang', $data);
	 
	}

	public function tambah_keranjang_update_kode($keranjang_produk_id, $keranjang_kuantitas, $keranjang_harga){

		$session 	= $this->session->userdata('customer_id');
		$random 	= random_string('alnum', 6);

		$data1 = array(
			'keranjang_customer_id' => $session,
			'keranjang_produk_id'	=> $keranjang_produk_id,
			'keranjang_kuantitas'	=> $keranjang_kuantitas,
			'keranjang_harga'		=> $keranjang_harga,
			'keranjang_tanggal'		=> date('Y-m-d H:i:s'),
			'keranjang_kode'		=> $random
		);

		$data2 = $this->db->query("UPDATE keranjang SET keranjang_kode='$random' WHERE keranjang.keranjang_customer_id = '$session' AND keranjang.keranjang_status ='0'");

		return $this->db->insert('keranjang', $data1);
		return $data2;
	
	}

	public function jumlah_di_keranjang(){

		$query = $this->db->get_where('keranjang',
			array(
				'keranjang_customer_id' => $this->session->userdata('customer_id'),
				'keranjang_status'		=> 0
			)
		);

		return $query->num_rows();
	
	}

	public function produk_di_keranjang(){

		$this->db->select('*');
		$this->db->from('keranjang');
		$this->db->join('produk', 'produk.produk_id = keranjang.keranjang_produk_id');
		$this->db->where(
			array(
				'keranjang.keranjang_customer_id' 	=> $this->session->userdata('customer_id'),
				'keranjang.keranjang_status'		=> 0
			)
		);
		
		$query = $this->db->get();

		return $query;

	}

	public function total_belanja(){

		$session = $this->session->userdata('customer_id');
		$query = $this->db->query("SELECT sum(keranjang_harga) as 'total' FROM keranjang WHERE keranjang_customer_id = '$session' AND keranjang_status = '0'");

		return $query->row()->total;

	}

	public function hapus_produk_dari_keranjang($keranjang_id){

		$this->db->where(
			array(
				'keranjang_id' 		=> $keranjang_id,
				'keranjang_status'	=> 0
			)
		);
		
		$query = $this->db->delete('keranjang');
	
		return $query;

	}

}