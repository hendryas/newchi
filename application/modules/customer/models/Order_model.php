<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataKota()
    {
        $this->db->select('kota.*');
        $this->db->from('kota');

        $result = $this->db->get();
        return $result;
    }

    public function getDataLayanan()
    {
        $this->db->select('layanan.*');
        $this->db->select('jenis_layanan.nama_jenis_layanan');
        $this->db->from('layanan');
        $this->db->join('jenis_layanan', 'jenis_layanan.kode = layanan.kode_jenis');

        $result = $this->db->get();
        return $result;
    }

    public function getDataAdditional()
    {
        $this->db->select('additional.*');
        $this->db->from('additional');

        $result = $this->db->get();
        return $result;
    }

    public function getDataLayananByKode($kode_layanan)
    {
        $this->db->select('layanan.*');
        $this->db->from('layanan');
        $this->db->where('kode', $kode_layanan);

        $result = $this->db->get();
        return $result;
    }

    public function getDataPriceAdditional($kode)
    {
        $this->db->select('additional.*');
        $this->db->from('additional');
        $this->db->where('kode', $kode);

        $result = $this->db->get();
        return $result;
    }

    public function getDataOrder()
    {
        $this->db->select('tbl_order.*');
        $this->db->from('tbl_order');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);

        $result = $this->db->get();
        return $result;
    }
}
