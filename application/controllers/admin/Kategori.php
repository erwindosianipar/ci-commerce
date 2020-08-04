<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/m_kategori');
	}

	public function index(){

		$data = array(
			'title' => 'Kategori'
		);

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/navbar');
		$this->load->view('admin/kategori/view');
		$this->load->view('template/admin/footer');

	}

	public function tambah(){

		$this->form_validation->set_rules('nama', 'Nama kategori', 'required',
			array('required' => '%s tidak boleh kosong')
		);

		if ($this->form_validation->run() === TRUE) {

			$nama = $this->input->post('nama');
			$this->m_kategori->tambah_kategori($nama);

			$this->session->set_flashdata('msg', '<i class="fa fa-info-circle"></i> Berhasil Ditambahkan');
			redirect(base_url('admin/kategori/tambah'));


		} else {

			$data = array(
				'title' 	=> 'Tambah Kategori',
				'kategori_'	=> $this->m_kategori->ambil_kategori()
			);

			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/navbar');
			$this->load->view('admin/kategori/tambah');
			$this->load->view('template/admin/footer');

		}

	}

}