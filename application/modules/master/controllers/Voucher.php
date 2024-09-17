<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voucher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('Voucher_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Voucher Management';

        $email = $this->session->userdata('email');
        $data['user'] = $this->Voucher_model->getDataUser($email)->row_array();

        $data['vouchers'] = $this->Voucher_model->getDataVouchers()->result_array();

        $this->form_validation->set_rules('nama_voucher', 'Nama Voucher', 'required', [
            'required' => 'Nama Voucher tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('kode_voucher', 'Kode Voucher', 'required', [
            'required' => 'Kode Voucher tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('diskon_voucher', 'Diskon Voucher', 'required', [
            'required' => 'Diskon Voucher tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templateadmin/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templateadmin/header_menu', $data);
            $this->load->view('templates/templateadmin/navbar_menu', $data);
            $this->load->view('master/vouchermanagementpage/voucherpage/view_voucher', $data);
            $this->load->view('templates/templateadmin/main_footer');
        } else {
            $nama_voucher = htmlspecialchars($this->input->post('nama_voucher'));
            $kode_voucher = htmlspecialchars($this->input->post('kode_voucher'));
            $diskon_voucher = htmlspecialchars($this->input->post('diskon_voucher'));

            $data = [
                'nama_voucher' => $nama_voucher,
                'kode_voucher' => $kode_voucher,
                'diskon_voucher' => $diskon_voucher,
                'date_created' => date('Y-m-d H:i:s'),
                'date_updated' => date('Y-m-d H:i:s')
            ];

            $this->Voucher_model->insertDataVoucher($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Voucher baru telah ditambahkan!</strong></div>');
            redirect('master/voucher');
        }
    }

    public function editVoucher()
    {
        $id_voucher = $this->input->post('id');

        $nama_voucher = htmlspecialchars($this->input->post('nama_voucher'));
        $kode_voucher = htmlspecialchars($this->input->post('kode_voucher'));
        $diskon_voucher = htmlspecialchars($this->input->post('diskon_voucher'));
        $data = [
            'nama_voucher' => $nama_voucher,
            'kode_voucher' => $kode_voucher,
            'diskon_voucher' => $diskon_voucher,
            'date_updated' => date('Y-m-d H:i:s')
        ];

        $this->Voucher_model->updateDataVoucher($id_voucher, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data voucher telah diubah!</strong></div>');
        redirect('master/voucher');
    }

    public function deleteVoucher($id_voucher)
    {
        $id_voucher = decrypt_url($id_voucher);
        $this->Voucher_model->deleteDataVoucher($id_voucher);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data voucher telah dihapus!</strong></div>');
        redirect('master/voucher');
    }
}
