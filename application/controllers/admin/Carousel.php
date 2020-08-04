<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/m_carousel');
		$this->load->library('upload');

	}

	public function index(){

		$this->form_validation->set_rules('carousel_judul', 'Judul', 'required',
			array('required' => '%s tidak boleh kosong')
		);

		$file_name = $this->session->userdata('admin_id').'_'.time().'_'.date("Ymdhis").'_n';

		$config['upload_path']      = './assets/images/carousel/original/';
		$config['allowed_types']    = 'jpg|jpeg|png|gif';
		$config['file_name']        = $file_name;

		$this->upload->initialize($config);

		if ($this->form_validation->run() === TRUE) {

			if (!empty($_FILES['carousel_gambar']['name'])) {

				if ($this->upload->do_upload('carousel_gambar')) {

					$image = $this->upload->data();
					$this->_thumbnails_image($image['file_name']);

					$carousel_gambar	= $image['file_name'];
					$carousel_judul		= $this->input->post('carousel_judul');

					$this->m_carousel->tambah_carousel($carousel_judul, $carousel_gambar);

					$this->session->set_flashdata('msg', '<i class="fa fa-info-circle"></i> Berhasil Ditambahkan');
					redirect(base_url('admin/carousel'));

				} else {

					$this->session->set_flashdata('msg', '<i class="fa fa-exclamation-triangle"></i> Gambar gagal diupload');
					redirect(base_url('admin/carousel'));

				}

			} else {

				$this->session->set_flashdata('msg', '<i class="fa fa-exclamation-triangle"></i> Gambar tidak boleh kosong');
				redirect(base_url('admin/carousel'));

			}

		} else {

			$data = array(
				'title' => 'Carousel Slide'
			);

			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/navbar');
			$this->load->view('admin/carousel');
			$this->load->view('template/admin/footer');

		}

	}

	public function _thumbnails_image($file_name){
        $config = array(

            // large image size
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/images/carousel/original/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 850,
                'height'        => 350,
                'new_image'     => './assets/images/carousel/large/'.$file_name
            ),

            // small image size
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/images/carousel/original/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 150,
                'height'        => 100,
                'new_image'     => './assets/images/carousel/small/'.$file_name
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