<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/m_kategori');
		$this->load->model('admin/m_produk');
		$this->load->library('upload');
		$this->load->helper('string');
	}

	public function index(){

		$data = array(
			'title' => 'Produk'
		);

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/navbar');
		$this->load->view('admin/produk/view');
		$this->load->view('template/admin/footer');

	}

	public function tambah(){

		$this->form_validation->set_rules('produk_nama', 'Nama', 'required',
			array('required' => '%s tidak boleh kosong')
		);

		$this->form_validation->set_rules('produk_harga', 'Harga', 'required',
			array('required' => '%s tidak boleh kosong')
		);

		$this->form_validation->set_rules('produk_deskripsi', 'Deskripsi', 'required',
			array('required' => '%s tidak boleh kosong')
		);

		$this->form_validation->set_rules('produk_kategori_id', 'Kategori', 'required',
			array('required' => '%s tidak boleh kosong')
		);

		$this->form_validation->set_rules('produk_stok', 'Stok', 'required',
			array('required' => '%s tidak boleh kosong')
		);

		$this->form_validation->set_rules('produk_diskon', 'Diskon', 'required',
			array('required' => '%s tidak boleh kosong')
		);

		$file_name = $this->session->userdata('admin_id').'_'.time().'_'.date("Ymdhis").'_n';

		$config['upload_path']      = './assets/images/produk/original/';
		$config['allowed_types']    = 'jpg|jpeg|png|gif';
		$config['file_name']        = $file_name;

		$this->upload->initialize($config);

		if ($this->form_validation->run() === TRUE) {

			if (!empty($_FILES['produk_gambar']['name'])) {

				if ($this->upload->do_upload('produk_gambar')) {

					$image = $this->upload->data();
					$this->_thumbnails_image($image['file_name']);

					$produk_gambar 		= $image['file_name'];
					$produk_nama 		= $this->input->post('produk_nama');
					$produk_harga 		= $this->input->post('produk_harga');
					$produk_deskripsi 	= $this->input->post('produk_deskripsi');
					$produk_kategori_id = $this->input->post('produk_kategori_id');
					$produk_stok		= $this->input->post('produk_stok');
					$produk_diskon 		= $this->input->post('produk_diskon');

					$this->m_produk->tambah_produk($produk_gambar, $produk_nama, $produk_harga, $produk_deskripsi, $produk_kategori_id, $produk_stok, $produk_diskon);
					$this->session->set_flashdata('msg', '<i class="fa fa-info-circle"></i> Berhasil Ditambahkan');
					redirect(base_url('admin/produk/tambah'));

				} else {

					$this->session->set_flashdata('msg', '<i class="fa fa-exclamation-triangle"></i> Gambar gagal diupload');
					redirect(base_url('admin/produk/tambah'));

				}

			} else {

				$this->session->set_flashdata('msg', '<i class="fa fa-exclamation-triangle"></i> Gambar tidak boleh kosong');
				redirect(base_url('admin/produk/tambah'));

			}

		} else {

			$data = array(
				'title' 		=> 'Tambah Produk',
				'kategori_'		=> $this->m_kategori->ambil_kategori()

			);

			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/navbar');
			$this->load->view('admin/produk/tambah');
			$this->load->view('template/admin/footer');

		}

	}

	public function _thumbnails_image($file_name){
        $config = array(

            // large image size
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/images/produk/original/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 350,
                'height'        => 350,
                'new_image'     => './assets/images/produk/large/'.$file_name
            ),

            // medium image size
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/images/produk/original/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 200,
                'height'        => 200,
                'new_image'     => './assets/images/produk/medium/'.$file_name
            ),

            // small image size
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/images/produk/original/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 80,
                'height'        => 80,
                'new_image'     => './assets/images/produk/small/'.$file_name
            ));

        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        }
	}

}