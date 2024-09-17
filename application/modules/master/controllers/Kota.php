<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kota extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('master/kota_model', 'kotaModel');
    }

    public function index()
    {
        $data['title'] = 'Kota Management';

        $email = $this->session->userdata('email');
        $data['user'] = $this->kotaModel->getDataUser($email)->row_array();

        $data['kota'] = $this->kotaModel->getDataKota()->result_array();

        $this->form_validation->set_rules('kode', 'Kode Kota', 'required', [
            'required' => 'Kode Kota tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('nama_kota', 'Nama Kota', 'required', [
            'required' => 'Nama Kota tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templateadmin/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templateadmin/header_menu', $data);
            $this->load->view('templates/templateadmin/navbar_menu', $data);
            $this->load->view('master/kotapage/view_index', $data);
            $this->load->view('templates/templateadmin/main_footer');
        } else {
            $kode = htmlspecialchars($this->input->post('kode'));
            $nama_kota = htmlspecialchars($this->input->post('nama_kota'));

            $data = [
                'kode' => $kode,
                'nama_kota' => $nama_kota
            ];

            $this->kotaModel->insertDataKota($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Kota baru telah ditambahkan!</strong></div>');
            redirect('master/kota');
        }
    }

    public function deleteKota($kode)
    {
        $kode = decrypt_url($kode);
        $this->kotaModel->deleteDataKota($kode);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data kota telah dihapus!</strong></div>');
        redirect('master/kota');
    }
}