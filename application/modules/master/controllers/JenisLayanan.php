<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisLayanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('JenisLayanan_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Jenis Layanan Management';
        $email = $this->session->userdata('email');
        $data['user'] = $this->JenisLayanan_model->getDataUser($email)->row_array();

        $data['jenis_layanans'] = $this->JenisLayanan_model->getDataJenisLayanans()->result_array();

        $this->form_validation->set_rules('nama_jenis_layanan', 'Nama Jenis Layanan', 'required', [
            'required' => 'Nama Jenis Layanan tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templateadmin/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templateadmin/header_menu', $data);
            $this->load->view('templates/templateadmin/navbar_menu', $data);
            $this->load->view('master/jenislayananmanagementpage/jenislayananpage/view_jenislayanan', $data);
            $this->load->view('templates/templateadmin/main_footer');
        } else {
            $nama_jenis_layanan = htmlspecialchars($this->input->post('nama_jenis_layanan'));

            // Generate Kode
            $word = array_merge(range('1', '9'), range('A', 'Z'));
            $acak = shuffle($word);
            $str  = substr(implode($word), 0, 10);
            $kode = $str;

            $data = [
                'kode' => $kode,
                'nama_jenis_layanan' => $nama_jenis_layanan
            ];
            $this->JenisLayanan_model->insertDataJenisLayanan($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Jenis Layanan baru telah ditambahkan!</strong></div>');
            redirect('master/jenislayanan');
        }
    }

    public function editjenislayanan()
    {
        $kode = $this->input->post('kode');

        $nama_jenis_layanan = htmlspecialchars($this->input->post('nama_jenis_layanan'));

        $data = [
            'nama_jenis_layanan' => $nama_jenis_layanan
        ];

        $this->JenisLayanan_model->updateDataJenisLayanan($kode, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data jenis layanan telah diubah!</strong></div>');
        redirect('master/jenislayanan');
    }

    public function deletejenislayanan($kode)
    {

        $kode = decrypt_url($kode);
        $this->JenisLayanan_model->deleteDataJenisLayanan($kode);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data jenis layanan telah dihapus!</strong></div>');
        redirect('master/jenislayanan');
    }
}
