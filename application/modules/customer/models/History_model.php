<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataOrder($idCustomer)
    {
        $this->db->select('tbl_order.*');
        $this->db->select('user.name,email');
        $this->db->select('layanan.kode_jenis,nama_layanan,deskripsi');
        $this->db->from('tbl_order');
        $this->db->where('status_order', 0);
        $this->db->where('id_customer', $idCustomer);
        $this->db->join('user', 'user.id = tbl_order.id_customer');
        $this->db->join('layanan', 'layanan.kode = tbl_order.kode_layanan');

        $result = $this->db->get();
        return $result;
    }

    public function getDataOrderDiProses($idCustomer)
    {
        $this->db->select('tbl_order.*');
        $this->db->select('user.name,email');
        $this->db->select('layanan.kode_jenis,nama_layanan,deskripsi');
        $this->db->from('tbl_order');
        $this->db->where('status_order', 1);
        $this->db->where('id_customer', $idCustomer);
        $this->db->join('user', 'user.id = tbl_order.id_customer');
        $this->db->join('layanan', 'layanan.kode = tbl_order.kode_layanan');

        $result = $this->db->get();
        return $result;
    }

    public function getDataOrderMenujuKeLokasi($idCustomer)
    {
        $this->db->select('tbl_order.*');
        $this->db->select('user.name,email');
        $this->db->select('layanan.kode_jenis,nama_layanan,deskripsi');
        $this->db->from('tbl_order');
        $this->db->where('status_order', 2);
        $this->db->or_where('status_order', 3);
        $this->db->where('id_customer', $idCustomer);
        $this->db->join('user', 'user.id = tbl_order.id_customer');
        $this->db->join('layanan', 'layanan.kode = tbl_order.kode_layanan');

        $result = $this->db->get();
        return $result;
    }

    public function getDataOrderSelesai($idCustomer)
    {
        $this->db->select('tbl_order.*');
        $this->db->select('user.name,email');
        $this->db->select('layanan.kode_jenis,nama_layanan,deskripsi');
        $this->db->from('tbl_order');
        $this->db->where('status_order', 4);
        $this->db->where('id_customer', $idCustomer);
        $this->db->join('user', 'user.id = tbl_order.id_customer');
        $this->db->join('layanan', 'layanan.kode = tbl_order.kode_layanan');

        $result = $this->db->get();
        return $result;
    }
}
