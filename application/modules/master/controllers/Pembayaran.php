<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('Pembayaran_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Pembayaran Management';

        $email = $this->session->userdata('email');
        $data['user'] = $this->Pembayaran_model->getDataUser($email)->row_array();

        $data['pembayarans'] = $this->Pembayaran_model->getDataPembayarans()->result_array();

        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required', [
            'required' => 'Nama Bank tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'required', [
            'required' => 'Nomor Rekening tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templateadmin/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templateadmin/header_menu', $data);
            $this->load->view('templates/templateadmin/navbar_menu', $data);
            $this->load->view('master/pembayaranmanagementpage/pembayaranpage/view_pembayaran', $data);
            $this->load->view('templates/templateadmin/main_footer');
        } else {
            $nama_bank = htmlspecialchars($this->input->post('nama_bank'));
            $nomor_rekening = htmlspecialchars($this->input->post('nomor_rekening'));

            $data = [
                'nama_bank' => $nama_bank,
                'nomor_rekening' => $nomor_rekening,
                'date_created' => date('Y-m-d H:i:s'),
                'date_updated' => date('Y-m-d H:i:s')
            ];

            $this->Pembayaran_model->insertDataPembayaran($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Pembayaran baru telah ditambahkan!</strong></div>');
            redirect('master/pembayaran');
        }
    }

    public function editPembayaran()
    {
        $id_pembayaran = $this->input->post('id');

        $nama_bank = htmlspecialchars($this->input->post('nama_bank'));
        $nomor_rekening = htmlspecialchars($this->input->post('nomor_rekening'));
        $data = [
            'nama_bank' => $nama_bank,
            'nomor_rekening' => $nomor_rekening,
            'date_updated' => date('Y-m-d H:i:s')
        ];

        $this->Pembayaran_model->updateDataPembayaran($id_pembayaran, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data pembayaran telah diubah!</strong></div>');
        redirect('master/pembayaran');
    }

    public function deletePembayaran($id_pembayaran)
    {
        $id_pembayaran = decrypt_url($id_pembayaran);
        $this->Pembayaran_model->deleteDataPembayaran($id_pembayaran);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data pembayaran telah dihapus!</strong></div>');
        redirect('master/pembayaran');
    }
}
