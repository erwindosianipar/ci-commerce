<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model{

	public function tambah_transaksi($kode, $total){

		$this->load->helper('string');

		$session = $this->session->userdata('customer_id');

		$transaksi = array(
			'transaksi_keranjang_customer_id' 	=> $session,
			'transaksi_keranjang_kode' 			=> $kode,
			'transaksi_total'					=> $total,
			'transaksi_kode'					=> strtoupper(random_string('alnum', 8)).'-'.$session,
			'transaksi_tanggal'					=> date('Y-m-d H:i:s')
		);

		$keranjang = $this->db->query("UPDATE keranjang SET keranjang_status = '1' WHERE keranjang.keranjang_kode='$kode'");

		return $this->db->insert('transaksi', $transaksi);
		return $keranjang;
	
	}

	public function lakukan_konfirmasi(){

		$session = $this->session->userdata('customer_id');

		$query = $this->db->query("SELECT * FROM transaksi JOIN keranjang, produk WHERE
transaksi.transaksi_keranjang_kode = keranjang.keranjang_kode AND keranjang.keranjang_produk_id = produk.produk_id AND transaksi.transaksi_keranjang_customer_id ='$session' AND transaksi.transaksi_status='0'");

		return $query;
	
	}

	public function ambil_transaksi_kode(){

		$this->db->select('transaksi_kode');
		$this->db->from('transaksi');
		$this->db->where(
			array(
				'transaksi_status' 	=> 0,
				'transaksi_selesai'	=> 0,
				'transaksi_keranjang_customer_id'	=> $this->session->userdata('customer_id')
			)
		);

		return $this->db->get()->row('transaksi_kode');

	}

	public function konfirmasi_pesanan_fix($nama, $email, $alamat, $kecamatan, $kabupaten_kota, $provinsi, $kode_pos, $telepon, $transaksi_kode){

		$this->db->where(
			array(
				'transaksi_kode'					=> $transaksi_kode,
				'transaksi_keranjang_customer_id'	=> $this->session->userdata('customer_id')
			)
		);

		$data = array(
			'transaksi_nama' 			=> $nama,
			'transaksi_email'			=> $email,
			'transaksi_alamat'			=> $alamat,
			'transaksi_kecamatan'		=> $kecamatan,
			'transaksi_kabupaten_kota'	=> $kabupaten_kota,
			'transaksi_provinsi'		=> $provinsi,
			'transaksi_kode_pos'		=> $kode_pos,
			'transaksi_no_hp'			=> $telepon,
			'transaksi_status'			=> 1
		);

		$this->db->update('transaksi', $data);

	}

	public function ambil_data_transaksi($kode){

		$query = $this->db->get_where('transaksi',
			array(
				'transaksi_keranjang_customer_id' 	=> $this->session->userdata('customer_id'),
				'transaksi_kode'					=> $kode,
			)
		);

		return $query;
	
	}

	public function ambil_data_rekening(){

		$query = $this->db->query("SELECT * FROM rekening");

		return $query;
	
	}

	public function jumlah_di_transaksi(){

		$query = $this->db->get_where('transaksi',
			array(
				'transaksi_keranjang_customer_id' 	=> $this->session->userdata('customer_id'),
				'transaksi_status'					=> 0
			)
		);

		return $query->num_rows();
	
	}

	public function total_harga_shipping(){

		$session = $this->session->userdata('customer_id');
		
		$query = $this->db->query("SELECT transaksi_total as 'total' FROM transaksi WHERE transaksi_status = '0' AND transaksi_selesai = '0'");

		return $query->row()->total;

	}

}