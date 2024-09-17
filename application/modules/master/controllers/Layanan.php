<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('Layanan_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Layanan Management';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Layanan_model->getDataUser($email)->row_array();

        $data['layanans'] = $this->Layanan_model->getDataLayanans()->result_array();
        $data['jenis_layanans'] = $this->Layanan_model->getDataJenisLayanans()->result_array();

        $this->form_validation->set_rules('kode_jenis', 'Nama Jenis Layanan', 'required', [
            'required' => 'Nama Jenis Layanan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nama_layanan', 'Nama Layanan', 'required', [
            'required' => 'Nama Layanan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Layanan', 'required', [
            'required' => 'Deskripsi Layanan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('harga', 'Harga Layanan', 'required', [
            'required' => 'Harga Layanan tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templateadmin/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templateadmin/header_menu', $data);
            $this->load->view('templates/templateadmin/navbar_menu', $data);
            $this->load->view('master/layananmanagementpage/layananpage/view_layanan', $data);
            $this->load->view('templates/templateadmin/main_footer');
        } else {
            $kode_jenis = htmlspecialchars($this->input->post('kode_jenis'));
            $nama_layanan = htmlspecialchars($this->input->post('nama_layanan'));
            $deskripsi = $this->input->post('deskripsi');
            $harga = htmlspecialchars($this->input->post('harga'));
            $word = array_merge(range('1', '9'), range('A', 'Z'));
            $acak = shuffle($word);
            $str  = substr(implode($word), 0, 10);
            $kode = $str;

            $data = [
                'kode' => $kode,
                'kode_jenis' => $kode_jenis,
                'nama_layanan' => $nama_layanan,
                'deskripsi' => $deskripsi,
                'harga' => $harga
            ];

            $this->Layanan_model->insertDataLayanan($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Layanan baru telah ditambahkan!</strong></div>');
            redirect('master/layanan');
        }
    }

    public function editLayanan()
    {
        $kode = $this->input->post('kode');

        $kode_jenis = htmlspecialchars($this->input->post('kode_jenis'));
        $nama_layanan = htmlspecialchars($this->input->post('nama_layanan'));
        $deskripsi = $this->input->post('deskripsi');
        $harga = htmlspecialchars($this->input->post('harga'));

        $data = [
            'kode_jenis' => $kode_jenis,
            'nama_layanan' => $nama_layanan,
            'deskripsi' => $deskripsi,
            'harga' => $harga
        ];

        $this->Layanan_model->updateDataLayanan($kode, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data layanan telah diubah!</strong></div>');
        redirect('master/layanan');
    }

    public function deleteLayanan($kode)
    {

        $kode = decrypt_url($kode);
        $this->Layanan_model->deleteDataLayanan($kode);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data layanan telah dihapus!</strong></div>');
        redirect('master/layanan');
    }
}
