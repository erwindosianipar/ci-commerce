<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('visitor/m_produk');
		$this->load->model('customer/m_keranjang');
	}

	public function ambil_produk($produk_slug){

		$data['produk'] = $this->m_produk->ambil_produk($produk_slug);

		if (empty($data['produk'])){

            show_404();

        }

		$data['title'] = $data['produk']['produk_nama'].' – Rima Arhyan';
		$data['keranjang'] = $this->m_keranjang->jumlah_di_keranjang();

		$this->load->view('template/visitor/header', $data);
		$this->load->view('template/visitor/navbar');
		$this->load->view('visitor/produk');
		$this->load->view('visitor/keranjang-beli');
		$this->load->view('template/visitor/footer');
	
	}

	public function tambah(){

		if ($this->input->post('produk_id') != NULL && $this->input->post('quantity') != NULL) {

			if (!empty($this->session->userdata('customer_id'))) {

				$produk_id 				= $this->input->post('produk_id');
				$keranjang_kuantitas	= $this->input->post('quantity');

				$data['produk'] 		= $this->m_keranjang->ambil_produk_id($produk_id);

				$keranjang_harga		= $data['produk']['produk_harga_diskon'] * $keranjang_kuantitas;

				if ($this->m_keranjang->cek_di_keranjang($produk_id) < 1) {

					$this->m_keranjang->tambah_keranjang_update_kode($produk_id, $keranjang_kuantitas, $keranjang_harga);
					redirect(base_url('customer/keranjang'));

				} else {

					$this->m_keranjang->double_produk($produk_id, $keranjang_kuantitas, $keranjang_harga);
					redirect(base_url('customer/keranjang'));

				}

			} else {

				echo '
				<script>
				alert("Anda harus login terlebih dahulu");
				window.location = "'.base_url('auth/login').'";
				</script>
				';

			}

		} else {

			show_404();

		}
	
	}

}