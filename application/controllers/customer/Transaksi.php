<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('customer/m_keranjang');
		$this->load->model('customer/m_transaksi');
		$this->load->model('customer/m_profil');
	}

	public function index(){

		$data = array(
			'title' => 'Profil'
		);
	
	}

	public function shipping(){

		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]|callback_alpha_space',
			array(
				'required' 				=> '%s tidak boleh kosong',
				'min_length'			=> '%s minimal 3 karakter',
				'callback_alpha_space'	=> '%s tidak boleh mengandung simbol dan angka'
			)
		);

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',
			array(
				'required' 		=> '%s tidak boleh kosong',
				'valid_email'	=> '%s tidak valid'
			) 
		);

		$this->form_validation->set_rules('alamat', 'Alamat', 'required',
			array(
				'required'	=> '%s tidak boleh kosong'
			)
		);

		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required',
			array(
				'required'	=> '%s tidak boleh kosong'
			)
		);

		$this->form_validation->set_rules('kabupaten_kota', 'Kabupaten / Kota', 'required',
			array(
				'required'	=> '%s tidak boleh kosong'
			)
		);

		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required',
			array(
				'required'	=> '%s tidak boleh kosong'
			)
		);

		$this->form_validation->set_rules('kode_pos', 'Kode POS', 'required|max_length[5]',
			array(
				'required'		=> '%s tidak boleh kosong',
				'numeric'		=> '%s hanya boleh angka',
				'max_length'	=> '%s maksimal 5 karakter'
			)
		);

		$this->form_validation->set_rules('telepon', 'Telepon', 'required|max_length[15]',
			array(
				'required' 		=> '%s tidak boleh kosong',
				'max_length'	=> '%s maksimal 15 karakter'
			)
		);

		if ($this->form_validation->run() === TRUE) {

			$nama 			= $this->input->post('nama');
			$email 			= $this->input->post('email');
			$alamat 		= $this->input->post('alamat');
			$kecamatan 		= $this->input->post('kecamatan');
			$kabupaten_kota = $this->input->post('kabupaten_kota');
			$provinsi 		= $this->input->post('provinsi');
			$kode_pos 		= $this->input->post('kode_pos');
			$telepon 		= $this->input->post('telepon');
			
			$transaksi_kode = $this->m_transaksi->ambil_transaksi_kode();

			$this->m_transaksi->konfirmasi_pesanan_fix($nama, $email, $alamat, $kecamatan, $kabupaten_kota, $provinsi, $kode_pos, $telepon, $transaksi_kode);
			redirect(base_url('customer/transaksi/konfirmasi?kode='.$transaksi_kode));

		} else {

			if ($this->m_transaksi->jumlah_di_transaksi() > 0) {

				$data = array(
					'title' 		=> 'Shipping',
					'keranjang'		=> $this->m_keranjang->jumlah_di_keranjang(),
					'total'			=> $this->m_transaksi->total_harga_shipping(),	
					'konfirmasi_'	=> $this->m_transaksi->lakukan_konfirmasi(),
					'profil'		=> $this->m_profil->ambil_profil()
				);

				$this->load->view('template/customer/header', $data);
				$this->load->view('template/customer/navbar');
				$this->load->view('customer/shipping');
				$this->load->view('template/customer/footer');

			} else {

				echo '
					<script>
						alert("Lakukan checkout produk terlebih dahulu");
						window.location = "'.base_url('customer/keranjang').'";
					</script>
				';

			}

		}
	
	}

	public function konfirmasi(){

		$transaksi_kode = $this->input->get('kode');

		if ($this->m_transaksi->ambil_data_transaksi($transaksi_kode)->num_rows() < 1) {

			show_404();
		
		} else {

			$data = array(
				'title' 		=> 'konfirmasi Pemesanan',
				'keranjang'		=> $this->m_keranjang->jumlah_di_keranjang(),
				'rekening_'		=> $this->m_transaksi->ambil_data_rekening(),
				'transfer'		=> $this->m_transaksi->ambil_data_transaksi($transaksi_kode)->row_array()
			);

			$this->load->view('template/customer/header', $data);
			$this->load->view('template/customer/navbar');
			$this->load->view('customer/konfirmasi');
			$this->load->view('template/customer/footer');

		}

	}

	public function konfirmasi_pembayaran(){

		$data = array(
			'title' 	=> 'Konfirmasi Pembayaran',
			'keranjang'	=> $this->m_keranjang->jumlah_di_keranjang(),
			'kode'		=> $this->input->get('kode'),
			'jumlah'	=> $this->input->get('jumlah'),
			'rekening_'	=> $this->m_transaksi->ambil_data_rekening(),
			'profil'	=> $this->m_profil->ambil_profil()	
		);

		$this->load->view('template/customer/header', $data);
		$this->load->view('template/customer/navbar');
		$this->load->view('customer/konfirmasi-pembayaran');
		$this->load->view('template/customer/footer');
	
	}

	public function tambah(){

		if ($this->input->post('keranjang_kode') != NULL && $this->input->post('keranjang_total') != NULL) {

			if ($this->m_transaksi->jumlah_di_transaksi() > 0) {

				echo '
					<script>
						alert("Orderan sebelumnya masih belum dikonfirmasi");
						window.location = "'.base_url('customer/transaksi/shipping').'";
					</script>
				';

			} else {

				$kode 	= $this->input->post('keranjang_kode');
				$total 	= $this->input->post('keranjang_total');
				
				$this->m_transaksi->tambah_transaksi($kode, $total);

				redirect(base_url('customer/transaksi/shipping'));

			}
		
		} else {

			show_404();

		}
	
	}

	public function alpha_space($name){

		if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
			$this->form_validation->set_message('alpha_space', 'Nama tidak boleh mengandung simbol dan angka');
			return FALSE;
		} else {
			return TRUE;
		}

	}

}