<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('Dashboard_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Welcome to Dashboard Newchi';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Dashboard_model->getDataUser($email)->row_array();

        $this->load->view('templates/templatecustomer/main_header', $data);
        $this->load->view('templates/loaders/loader');
        $this->load->view('templates/templatecustomer/header_menu', $data);
        $this->load->view('templates/templatecustomer/navbar_menu', $data);
        $this->load->view('customer/customerpage/dashboardpage/view_dashboard', $data);
        $this->load->view('templates/templatecustomer/main_footer');
    }
}
