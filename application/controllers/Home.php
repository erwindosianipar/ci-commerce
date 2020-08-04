<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('visitor/m_produk');
		$this->load->model('customer/m_keranjang');
		$this->load->model('admin/m_kategori');
		$this->load->model('admin/m_carousel');
	}

	public function index(){

		$data = array(
			'title' 	=> 'Home – Rima Arhyan',
			'produk_'	=> $this->m_produk->ambil_produk(),
			'kategori_'	=> $this->m_kategori->ambil_kategori(),
			'carousel_'	=> $this->m_carousel->ambil_carousel(),
			'keranjang'	=> $this->m_keranjang->jumlah_di_keranjang()
		);

		$this->load->view('template/visitor/header', $data);
		$this->load->view('template/visitor/navbar');
		$this->load->view('home');
		$this->load->view('template/visitor/footer');
	
	}

}
