<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('Order_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Halaman Order';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Order_model->getDataUser($email)->row_array();
        $data['kota'] = $this->Order_model->getDataKota()->result_array();
        $data['layanan'] = $this->Order_model->getDataLayanan()->result_array();
        $data['additional'] = $this->Order_model->getDataAdditional()->result_array();

        $this->load->view('templates/templatecustomer/main_header', $data);
        $this->load->view('templates/loaders/loader');
        $this->load->view('templates/templatecustomer/header_menu', $data);
        $this->load->view('templates/templatecustomer/navbar_menu', $data);
        $this->load->view('customer/customerpage/orderpage/view_order', $data);
        $this->load->view('templates/templatecustomer/main_footer');
    }

    public function addOrder()
    {
        $id_customer = decrypt_url(htmlspecialchars($this->input->post('id_customer')));
        $alamat = htmlspecialchars($this->input->post('alamat'));
        $id_kecamatan = htmlspecialchars($this->input->post('kecamatan'));
        $tanggal_order =  htmlspecialchars($this->input->post('tgl_order'));
        $tgl_order = date("Y-m-d", strtotime($tanggal_order));
        $hours = htmlspecialchars($this->input->post('hours'));
        $minutes = htmlspecialchars($this->input->post('minutes'));
        $wkt_order = $hours . ':' . $minutes;
        $phone = htmlspecialchars($this->input->post('phone'));
        $note = htmlspecialchars($this->input->post('note'));
        $voucher = 'kosong';
        $kode_layanan = $this->input->post('layanan');
        $status_order = 0;
        $id_staff = 0;
        $date_created = date('Y-m-d H:i:s');
        $date_updated = date('Y-m-d H:i:s');

        $word = array_merge(range('1', '9'), range('A', 'Z'));
        $acak = shuffle($word);
        $str  = substr(implode($word), 0, 10);
        $kode = $str;

        $data_layanan = $this->Order_model->getDataLayananByKode($kode_layanan)->row_array();
        $harga_layanan = $data_layanan['harga'];
        $additional = $this->input->post('kode_additional');
        $total_harga = 0;

        if ($additional != null) {
            $jumlah_additional = count($additional);
            if ($jumlah_additional > 0) {
                foreach ($additional as $ad) {
                    $data_additional = $this->Order_model->getDataPriceAdditional($ad)->row_array();
                    $harga_additional = $data_additional['harga'];
                    $total_harga += $harga_additional;
                }
            }
        }

        $harga_final = $total_harga + $harga_layanan;
        // var_dump($kode_layanan);
        // die;
        $data = [
            'kode' => $kode,
            'id_customer' => $id_customer,
            'alamat' => $alamat,
            'id_kecamatan' => $id_kecamatan,
            'tgl_order' => $tgl_order,
            'wkt_order' => $wkt_order,
            'phone' => $phone,
            'note' => $note,
            'voucher' => $voucher,
            'harga_final' => $harga_final,
            'kode_layanan' => $kode_layanan,
            'status_order' => $status_order,
            'id_staff' => $id_staff,
            'date_created' => $date_created,
            'date_updated' => $date_updated
        ];

        $this->db->insert('tbl_order', $data);

        $data_order = $this->Order_model->getDataOrder()->row_array();
        $kode_order = $data_order['kode'];

        if ($additional != null) {
            if ($jumlah_additional > 0) {
                $data_nama_additional = array();
                $index = 0;
                for ($row = 1; $row <= $jumlah_additional; $row++) {
                    array_push($data_nama_additional, array(
                        'kode_order' => $kode_order,
                        'kode_additional' => $this->input->post('kode_additional')[$index],
                        'date_created' => date('Y-m-d H:i:s'),
                        'date_updated' => date('Y-m-d H:i:s')
                    ));
                    $index++;
                }
                $this->db->insert_batch('order_additional', $data_nama_additional);
            }
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Order baru telah ditambahkan!</strong></div>');
        redirect('customer/history');
    }


    function ajax_kecamatan($kode_kota)
    {
        $query = $this->db->get_where('kecamatan', array('kode_kota' => $kode_kota));
        $data = "<option disabled selected hidden value=''>- Select Kecamatan -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->kode . "'>" . $value->nama_kecamatan . "</option>";
        }
        echo $data;
    }
}
