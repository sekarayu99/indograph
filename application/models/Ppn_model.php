<?php

class Ppn_model extends CI_Model
{
    // ppn

    public function getAllPpn()
    {
        $this->db->select('*');
        $this->db->from('ppn');
        return $this->db->get()->result();
    }

    // pembelian
    
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        return $this->db->get()->result();
    }

    public function filterData($tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->where('pembelian.tanggal >=', $tgl_awal);
        $this->db->where('pembelian.tanggal <=', $tgl_akhir);
        return $this->db->get()->result();
    }

    public function getJumlah()
    {
        $this->db->select('sum(total) as jumlah, sum(ppn) as total_ppn');
        $this->db->from('pembelian');
        return $this->db->get()->result();
    }

    public function filterJumlah($tgl_awal, $tgl_akhir)
    {
        
        $this->db->select('sum(total) as jumlah, sum(ppn) as total_ppn');
        $this->db->from('pembelian');
        $this->db->where('pembelian.tanggal >=', $tgl_awal);
        $this->db->where('pembelian.tanggal <=', $tgl_akhir);
        return $this->db->get()->result();
    }

    // penjualan

    public function getAllDataPenjualan()
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        return $this->db->get()->result();
    }

    public function filterDataPenjualan($tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->where('penjualan.tanggal >=', $tgl_awal);
        $this->db->where('penjualan.tanggal <=', $tgl_akhir);
        return $this->db->get()->result();
    }

    public function getJumlahPenjualan()
    {
        $this->db->select('sum(total) as jumlah, sum(ppn) as total_ppn');
        $this->db->from('penjualan');
        return $this->db->get()->result();
    }

    public function filterJumlahPenjualan($tgl_awal, $tgl_akhir)
    {
        
        $this->db->select('sum(total) as jumlah, sum(ppn) as total_ppn');
        $this->db->from('penjualan');
        $this->db->where('penjualan.tanggal >=', $tgl_awal);
        $this->db->where('penjualan.tanggal <=', $tgl_akhir);
        return $this->db->get()->result();
    }


}