<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderSaya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('OrderSaya_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function bayar($kode)
    {
        $data['title'] = 'Halaman Bayar Order';
        $email = $this->session->userdata('email');
        $data['user'] = $this->OrderSaya_model->getDataUser($email)->row_array();
        $data['DataRekeningBankNewchi'] = $this->OrderSaya_model->getDataRekeningBankNewchi()->result_array();
        $kode = decrypt_url($kode);
        $data['DataDetailOrder'] = $this->OrderSaya_model->detDataDetailOrder($kode)->row_array();

        $this->form_validation->set_rules('nama_rekening_customer', 'Atas Nama Pemilik Rekening', 'required|trim', [
            'required' => 'Atas Nama Pemilik Rekening tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('nama_bank_customer', 'Nama Bank', 'required|trim', [
            'required' => 'Nama Bank tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('no_rekening_customer', 'Nomor Rekening', 'required|trim', [
            'required' => 'Nomor Rekening Tidak boleh Kosong!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templatecustomer/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templatecustomer/header_menu', $data);
            $this->load->view('templates/templatecustomer/navbar_menu', $data);
            $this->load->view('customer/customerpage/ordersayapage/view_ordersaya', $data);
            $this->load->view('templates/templatecustomer/main_footer');
        } else {
            $kode_order = htmlspecialchars($this->input->post('kode_order', true));
            $nama_rekening_customer = htmlspecialchars($this->input->post('nama_rekening_customer', true));
            $nama_bank_customer = htmlspecialchars($this->input->post('nama_bank_customer', true));
            $no_rekening_customer = htmlspecialchars($this->input->post('no_rekening_customer', true));
            $image = $_FILES['image']['name'];
            $date_created = date('Y-m-d H:i:s');
            $date_updated = date('Y-m-d H:i:s');

            $dname = explode(".", $_FILES['image']['name']);
            $ext = end($dname);
            $new_image = $_FILES['image']['name'] = strtolower('bukti_bayar' .  '_'  . $kode_order . '.' . $ext);

            if ($image) {
                $file_name1 = 'bukti_bayar' .  '_'  . $kode_order . '.' . $ext;
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '3048';
                $config['upload_path'] = './assets/images/bukti_bayar/';
                $config['remove_space'] = TRUE;
                $config['file_name'] = $file_name1;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $this->upload->data();
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('customer/ordersaya/bayar/') . $kode_order;
                }
            }

            $data = [
                'kode_order' => $kode_order,
                'nama_rekening_customer' => $nama_rekening_customer,
                'nama_bank_customer' => $nama_bank_customer,
                'no_rekening_customer' => $no_rekening_customer,
                'bukti_bayar_customer' => $new_image,
                'date_created' => $date_created,
                'date_updated' => $date_updated,
            ];

            $data2 = [
                'status_pembayaran' => 1
            ];

            $this->db->where('kode', $kode_order);
            $this->db->update('tbl_order', $data2);

            $this->db->insert('rekap_pembayaran_customer', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Bukti Pembayaran Berhasil di Upload!.</div>');
            redirect('customer/history');
        }
    }
}
