<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('master/kecamatan_model', 'kecamatanModel');
    }

    public function index()
    {
        $data['title'] = 'Kecamatan Management';

        $email = $this->session->userdata('email');
        $data['user'] = $this->kecamatanModel->getDataUser($email)->row_array();

        $data['kecamatan'] = $this->kecamatanModel->getDataKecamatan()->result_array();
        $data['kota'] = $this->kecamatanModel->getDataKota()->result_array();
        $data['admin'] = $this->kecamatanModel->getDataAdmin(2)->result_array();

        $this->form_validation->set_rules('kode', 'Kode Kecamatan', 'required', [
            'required' => 'Kode Kecamatan tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('kode_kota', 'Nama Kota', 'required', [
            'required' => 'Nama Kota tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('kode_admin', 'Nama Admin', 'required', [
            'required' => 'Nama Admin tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required', [
            'required' => 'Nama Kecamatan tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templateadmin/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templateadmin/header_menu', $data);
            $this->load->view('templates/templateadmin/navbar_menu', $data);
            $this->load->view('master/kecamatanpage/view_index', $data);
            $this->load->view('templates/templateadmin/main_footer');
        } else {
            $kode = htmlspecialchars($this->input->post('kode'));
            $kode_kota = htmlspecialchars($this->input->post('kode_kota'));
            $kode_admin = htmlspecialchars($this->input->post('kode_admin'));
            $nama_kecamatan = htmlspecialchars($this->input->post('nama_kecamatan'));

            $data = [
                'kode' => $kode,
                'kode_kota' => $kode_kota,
                'kode_admin' => $kode_admin,
                'nama_kecamatan' => $nama_kecamatan
            ];

            $this->kecamatanModel->insertDataKecamatan($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Kecamatan baru telah ditambahkan!</strong></div>');
            redirect('master/kecamatan');
        }
    }

    public function deleteKecamatan($kode)
    {
        $kode = decrypt_url($kode);
        $this->kecamatanModel->deleteDataKecamatan($kode);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data Kecamatan telah dihapus!</strong></div>');
        redirect('master/kecamatan');
    }
}