<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('customer/m_keranjang');
	}

	public function index(){

		$data = array(
			'title' 		=> 'Keranjang',
			'keranjang'		=> $this->m_keranjang->jumlah_di_keranjang(),
			'keranjang_'	=> $this->m_keranjang->produk_di_keranjang(),
			'total'			=> $this->m_keranjang->total_belanja()
		);

		$this->load->view('template/customer/header', $data);
		$this->load->view('template/customer/navbar');
		$this->load->view('customer/keranjang');
		$this->load->view('template/customer/footer');
	
	}

	public function hapus(){

		if ($this->input->post('keranjang_id') != NULL) {
		
			$this->m_keranjang->hapus_produk_dari_keranjang($this->input->post('keranjang_id'));
			redirect(base_url('customer/keranjang'));
		
		} else {

			show_404();

		}
	
	}

}