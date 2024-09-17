<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('StaffDashboard_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Welcome to Dashboard Newchi';
        $email = $this->session->userdata('email');
        $data['user'] = $this->StaffDashboard_model->getDataUser($email)->row_array();

        $this->load->view('templates/templatestaff/main_header', $data);
        $this->load->view('templates/loaders/loader');
        $this->load->view('templates/templatestaff/header_menu', $data);
        $this->load->view('templates/templatestaff/navbar_menu', $data);
        $this->load->view('staff/staffpage/dashboardpage/view_dashboard', $data);
        $this->load->view('templates/templatestaff/main_footer');
    }
}
