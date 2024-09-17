<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Additional extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('Additional_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Layanan Tambahan Management';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Additional_model->getDataUser($email)->row_array();

        $data['additionals'] = $this->Additional_model->getDataAdditionals()->result_array();

        $this->form_validation->set_rules('nama', 'Nama Layanan Tambahan', 'required', [
            'required' => 'Nama Layanan Tambahan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('harga', 'Harga Layanan Tambahan', 'required', [
            'required' => 'Harga Layanan Tambahan tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templateadmin/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templateadmin/header_menu', $data);
            $this->load->view('templates/templateadmin/navbar_menu', $data);
            $this->load->view('master/additionalmanagementpage/additionalpage/view_additional', $data);
            $this->load->view('templates/templateadmin/main_footer');
        } else {
            $nama = htmlspecialchars($this->input->post('nama'));
            $harga = htmlspecialchars($this->input->post('harga'));
            $date_created = date('Y-m-d H:i:s');
            $date_updated = date('Y-m-d H:i:s');

            // Generate Kode
            $word = array_merge(range('1', '9'), range('A', 'Z'));
            $acak = shuffle($word);
            $str  = substr(implode($word), 0, 10);
            $kode = $str;

            $data = [
                'kode' => $kode,
                'nama' => $nama,
                'harga' => $harga,
                'date_created' => $date_created,
                'date_updated' => $date_updated
            ];
            $this->Additional_model->insertDataAdditional($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Additional baru telah ditambahkan!</strong></div>');
            redirect('master/additional');
        }
    }

    public function editAdditional()
    {
        $kode = decrypt_url($this->input->post('kode'));

        $nama = htmlspecialchars($this->input->post('nama'));
        $harga = htmlspecialchars($this->input->post('harga'));
        $date_updated = date('Y-m-d H:i:s');

        $data = [
            'kode' => $kode,
            'nama' => $nama,
            'harga' => $harga,
            'date_updated' => $date_updated
        ];

        $this->Additional_model->updateDataAdditional($kode, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data layanan tambahan telah diubah!</strong></div>');
        redirect('master/additional');
    }

    public function deleteAdditional($kode)
    {
        $kode = decrypt_url($kode);
        $this->Additional_model->deleteDataAdditional($kode);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data layanan tambahan telah dihapus!</strong></div>');
        redirect('master/additional');
    }
}
