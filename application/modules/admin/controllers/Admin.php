<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('idrole')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$this->load->view('template/head');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('index');
		$this->load->view('template/footer');
	}
}
