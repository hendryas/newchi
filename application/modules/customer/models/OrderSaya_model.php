<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderSaya_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataRekeningBankNewchi()
    {
        $this->db->select('rekening.*');
        $this->db->select('bank.nama_bank');
        $this->db->from('rekening');
        $this->db->join('bank', 'bank.kode = rekening.kode_bank');

        $result = $this->db->get();
        return $result;
    }

    public function detDataDetailOrder($kode)
    {
        $this->db->select('tbl_order.*');
        $this->db->from('tbl_order');
        $this->db->where('kode', $kode);

        $result = $this->db->get();
        return $result;
    }
}
