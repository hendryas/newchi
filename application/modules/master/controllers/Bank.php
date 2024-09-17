<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('Bank_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Bank Management';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Bank_model->getDataUser($email)->row_array();

        $data['banks'] = $this->Bank_model->getDataBanks()->result_array();

        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required', [
            'required' => 'Nama Bank tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templateadmin/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templateadmin/header_menu', $data);
            $this->load->view('templates/templateadmin/navbar_menu', $data);
            $this->load->view('master/bankmanagementpage/bankpage/view_bank', $data);
            $this->load->view('templates/templateadmin/main_footer');
        } else {
            $nama_bank = htmlspecialchars($this->input->post('nama_bank'));
            $date_created = date('Y-m-d H:i:s');
            $date_updated = date('Y-m-d H:i:s');
            $word = array_merge(range('1', '9'), range('A', 'Z'));
            $acak = shuffle($word);
            $str  = substr(implode($word), 0, 10);
            $kode = $str;

            $data = [
                'kode' => $kode,
                'nama_bank' => $nama_bank,
                'date_created' => $date_created,
                'date_updated' => $date_updated
            ];

            $this->Bank_model->insertDataBank($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Bank baru telah ditambahkan!</strong></div>');
            redirect('master/bank');
        }
    }

    public function editBank()
    {
        $kode = decrypt_url($this->input->post('kode'));

        $nama_bank = htmlspecialchars($this->input->post('nama_bank'));
        $date_updated = date('Y-m-d H:i:s');

        $data = [
            'nama_bank' => $nama_bank,
            'date_updated' => $date_updated
        ];

        $this->Bank_model->updateDataBank($kode, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data bank telah diubah!</strong></div>');
        redirect('master/bank');
    }

    public function deleteBank($kode)
    {

        $kode = decrypt_url($kode);
        $this->Bank_model->deleteDataBank($kode);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data bank telah dihapus!</strong></div>');
        redirect('master/bank');
    }
}
