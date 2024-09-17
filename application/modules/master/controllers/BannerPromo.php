<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BannerPromo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('BannerPromo_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Banner Promo';
        $email = $this->session->userdata('email');
        $data['user'] = $this->BannerPromo_model->getDataUser($email)->row_array();

        $data['banner_promos'] = $this->BannerPromo_model->getDataBannerPromo()->result_array();

        $this->load->view('templates/templateadmin/main_header', $data);
        $this->load->view('templates/loaders/loader');
        $this->load->view('templates/templateadmin/header_menu', $data);
        $this->load->view('templates/templateadmin/navbar_menu', $data);
        $this->load->view('master/bannerpromomanagementpage/bannerpromopage/view_bannerpromo', $data);
        $this->load->view('templates/templateadmin/main_footer');
    }

    public function inputBannerPromo()
    {
        $image = $_FILES['image']['name'];

        if ($image) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/banner_promo/';
            $config['remove_space'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = [
            'image' => $image,
            'date_created' => date('Y-m-d H:i:s'),
            'date_updated' => date('Y-m-d H:i:s')
        ];

        $this->BannerPromo_model->insertDataBannerPromo($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Banner Promo baru sudah di tambahkan!</strong></div>');
        redirect('master/bannerpromo');
    }

    public function editBannerPromo()
    {
        $id_banner_promo = $this->input->post('id');
        $date_updated = date('Y-m-d H:i:s');
        $image = $_FILES['image']['name'];

        $data['banner_promo_data'] = $this->db->get_where('banner_promo', ['id' => $id_banner_promo])->row_array();

        if ($image) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/banner_promo/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['banner_promo_data']['image'];
                if ($old_image != 'default.png') {
                    unlink(FCPATH . 'assets/images/banner_promo/' . $old_image); //unlink untuk menghapus gambar yang ada di path
                }

                $new_image = $this->upload->data('file_name'); //ini file yang sudah di upload,beserta semua isinya

                $this->db->set('image', $new_image);
                $this->db->set('date_updated', $date_updated);
                $this->db->where('id', $id_banner_promo);
                $this->db->update('banner_promo');

                $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                <strong>Banner Promo berhasil diubah!</strong></div>');
                redirect('master/bannerpromo');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('master/bannerpromo');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Format Gambar Banner salah, silahkan gunakan format JPG/PNG!</strong></div>');

            redirect('master/bannerpromo');
        }
    }

    public function deleteBannerPromo($id_banner)
    {
        $id_banner = decrypt_url($id_banner);

        $data['banner_promo_data'] = $this->db->get_where('banner_promo', ['id' => $id_banner])->row_array();

        $old_image = $data['banner_promo_data']['image'];
        unlink(FCPATH . 'assets/images/banner_promo/' . $old_image); //unlink untuk menghapus gambar yang ada di path

        $this->db->where('id', $id_banner);
        $this->db->delete('banner_promo');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Banner Promo berhasil dihapus!</strong></div>');
        redirect('master/bannerpromo');
    }
}
