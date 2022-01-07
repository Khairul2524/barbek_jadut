<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Submenu extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('idrole') != 2) {
		// 	redirect('auth');
		// }
		$this->load->model('Submenu_model', 'submenu');
		$this->load->model('all_model', 'all');
	}

	public function index()
	{
		// $id = $this->session->userdata('idrole');
		$data = array(
			'judul' => 'Sub Menu',
			'submenu' => $this->submenu->get(),
			'menu' => $this->all->getmenu(),
		);
		// var_dump($data['data']);
		// die();
		$this->load->view('template/head');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$data = array(

			'idmenu' => htmlspecialchars($this->input->post('menu')),
			'submenu' => htmlspecialchars($this->input->post('submenu')),
			'suburl' => htmlspecialchars($this->input->post('url')),
			'suburutan' => htmlspecialchars($this->input->post('urutan')),
			'subaktif' => htmlspecialchars($this->input->post('aktif')),
		);
		// print_r($data);
		// die;
		$cek = $this->db->get_where('submenu', ['submenu' => htmlspecialchars($this->input->post('submenu'))])->row();
		// var_dump($cek);
		if (!$cek) {
			$this->submenu->insert($data);
			// $this->session->set_flashdata('berhasil', 'Role Berhasil Ditambah!');
			redirect('submenu');
		} else {
			// $this->session->set_flashdata('gagal', 'menu Gagal Ditambah!');
			redirect('submenu');
		}
	}
	public function getubah()
	{
		$id = $_POST['id'];
		echo json_encode($this->submenu->getid($id));
	}
	public function ubah()
	{
		$data = array(
			'idsubmenu' => htmlspecialchars($this->input->post('id')),
			'idmenu' => htmlspecialchars($this->input->post('menu')),
			'submenu' => htmlspecialchars($this->input->post('submenu')),
			'suburl' => htmlspecialchars($this->input->post('url')),
			'suburutan' => htmlspecialchars($this->input->post('urutan')),
			'subaktif' => htmlspecialchars($this->input->post('aktif')),
		);
		// print_r($data);
		// die;
		$this->submenu->update(htmlspecialchars($this->input->post('id')), $data);
		// $this->session->set_flashdata('berhasil', 'menu Berhasil Diubah!');
		redirect('submenu');
	}
	public function hapus($id)
	{
		// var_dump($id);
		// die;
		$this->submenu->delete($id);
		$this->session->set_flashdata('berhasil', 'menu Berhasil Dihapus!');
		redirect('submenu');
	}
}
