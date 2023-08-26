<?php

class Dashboard_model extends CI_Model {
    
    public function countPenjualan()
    {
        return $this->db->count_all('penjualan');
    }

    public function countPembelian()
    {
        return $this->db->count_all('pembelian');
    }

    public function countPpn()
    {
        return $this->db->count_all('ppn');
    }
}