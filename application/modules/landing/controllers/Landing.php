<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
	//Method default yang selalu dijalankan ketika mengakses controller Auth
	public function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'Asia/Jakarta');
		$email = $this->session->userdata('email');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		//ini untuk menghindari jika kembali ke auth,untuk tiap rolenya nanti di tambahkan jika perlu
		// var_dump($this->session->userdata('nik'));
		// die;

		if ($this->session->userdata('email')) {
			if ($user['role_id'] == 1) {
				redirect('admin');
			} elseif ($user['role_id'] == 2) {
				redirect('user');
			} elseif ($user['role_id'] == 3) {
				redirect('pegawai');
			} elseif ($user['role_id'] == 4) {
				redirect('keuangan');
			} elseif ($user['role_id'] == 5) {
				redirect('narasumber');
			}
		}
	}

	public function index()
	{
		$data['title'] = 'NEWCHI - Keep it clean';
		$this->load->view('templates/templatelandingpage/header', $data);
		$this->load->view('templates/templatelandingpage/nav');
		$this->load->view('landing/landingpage/view_index', $data);
		$this->load->view('templates/templatelandingpage/footer_home');
	}

	public function feature()
	{
		$data['title'] = 'NEWCHI - Keep it clean';
		$this->load->view('templates/templatelandingpage/header', $data);
		$this->load->view('templates/templatelandingpage/nav');
		$this->load->view('landing/featurepage/feature', $data);
		$this->load->view('templates/templatelandingpage/footer');
	}

	public function carapesan()
	{
		$data['title'] = 'NEWCHI - Keep it clean';
		$this->load->view('templates/templatelandingpage/header', $data);
		$this->load->view('templates/templatelandingpage/nav');
		$this->load->view('landing/carapesanpage/carapesan', $data);
		$this->load->view('templates/templatelandingpage/footer');
	}

	public function harga()
	{
		$data['title'] = 'NEWCHI - Keep it clean';
		$this->load->view('templates/templatelandingpage/header', $data);
		$this->load->view('templates/templatelandingpage/nav');
		$this->load->view('landing/hargapage/harga', $data);
		$this->load->view('templates/templatelandingpage/footer');
	}

	public function blog()
	{
		$data['title'] = 'NEWCHI - Keep it clean';
		$this->load->view('templates/templatelandingpage/header', $data);
		$this->load->view('templates/templatelandingpage/nav');
		$this->load->view('landing/blogpage/blog', $data);
		$this->load->view('templates/templatelandingpage/footer');
	}

	public function kontak()
	{
		$data['title'] = 'NEWCHI - Keep it clean';
		$this->load->view('templates/templatelandingpage/header', $data);
		$this->load->view('templates/templatelandingpage/nav');
		$this->load->view('landing/contactpage/contact', $data);
		$this->load->view('templates/templatelandingpage/footer');
	}
}
