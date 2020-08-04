<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){

		$data = array(
			'title' => 'Dashboard'
		);

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/navbar');
		$this->load->view('admin/dashboard');
		$this->load->view('template/admin/footer');

	}

}