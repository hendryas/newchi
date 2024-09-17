<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('Rekening_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Rekening Bank Management';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Rekening_model->getDataUser($email)->row_array();

        $data['banks'] = $this->Rekening_model->getDataBanks()->result_array();

        $data['rekenings'] = $this->Rekening_model->getDataRekenings()->result_array();

        $this->form_validation->set_rules('kode_bank', 'Nama Bank', 'required', [
            'required' => 'Nama Bank tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('no_rekening', 'Nomor Rekening', 'required', [
            'required' => 'Nomor Rekening tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required', [
            'required' => 'Atas Nama Rekening tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templateadmin/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templateadmin/header_menu', $data);
            $this->load->view('templates/templateadmin/navbar_menu', $data);
            $this->load->view('master/rekeningmanagementpage/rekeningpage/view_rekening', $data);
            $this->load->view('templates/templateadmin/main_footer');
        } else {
            $kode_bank = htmlspecialchars($this->input->post('kode_bank'));
            $no_rekening = htmlspecialchars($this->input->post('no_rekening'));
            $atas_nama = htmlspecialchars($this->input->post('atas_nama'));
            $date_created = date('Y-m-d H:i:s');
            $date_updated = date('Y-m-d H:i:s');

            $word = array_merge(range('1', '9'), range('A', 'Z'));
            $acak = shuffle($word);
            $str  = substr(implode($word), 0, 10);
            $kode = $str;

            $data = [
                'kode' => $kode,
                'kode_bank' => $kode_bank,
                'no_rekening' => $no_rekening,
                'atas_nama' => $atas_nama,
                'date_created' => $date_created,
                'date_updated' => $date_updated
            ];

            $this->Rekening_model->insertDataRekening($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Rekening baru telah ditambahkan!</strong></div>');
            redirect('master/rekening');
        }
    }

    public function editRekening()
    {
        $kode = decrypt_url($this->input->post('kode'));

        $kode_bank = htmlspecialchars($this->input->post('kode_bank'));
        $no_rekening = htmlspecialchars($this->input->post('no_rekening'));
        $atas_nama = htmlspecialchars($this->input->post('atas_nama'));
        $date_updated = date('Y-m-d H:i:s');

        $data = [
            'kode_bank' => $kode_bank,
            'no_rekening' => $no_rekening,
            'atas_nama' => $atas_nama,
            'date_updated' => $date_updated
        ];

        $this->Rekening_model->updateDataRekening($kode, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data rekening telah diubah!</strong></div>');
        redirect('master/rekening');
    }

    public function deleteRekening($kode)
    {

        $kode = decrypt_url($kode);
        $this->Rekening_model->deleteDataRekening($kode);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data rekening telah dihapus!</strong></div>');
        redirect('master/rekening');
    }
}
