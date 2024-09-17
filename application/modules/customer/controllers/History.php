<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('History_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Halaman History';
        $email = $this->session->userdata('email');
        $idCustomer = $this->session->userdata('id');
        $data['user'] = $this->History_model->getDataUser($email)->row_array();

        $data['order'] = $this->History_model->getDataOrder($idCustomer)->result_array();
        $data['order_di_proses'] = $this->History_model->getDataOrderDiProses($idCustomer)->result_array();
        $data['order_menuju_ke_lokasi'] = $this->History_model->getDataOrderMenujuKeLokasi($idCustomer)->result_array();
        $data['order_selesai'] = $this->History_model->getDataOrderSelesai($idCustomer)->result_array();
        // var_dump($data['order_selesai']);
        // die;

        $this->load->view('templates/templatecustomer/main_header', $data);
        $this->load->view('templates/loaders/loader');
        $this->load->view('templates/templatecustomer/header_menu', $data);
        $this->load->view('templates/templatecustomer/navbar_menu', $data);
        $this->load->view('customer/customerpage/historypage/view_history', $data);
        $this->load->view('templates/templatecustomer/main_footer');
    }
}
