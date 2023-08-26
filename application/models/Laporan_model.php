<?php

class Laporan_model extends CI_Model {

    // pembelian

    public function get_data_barang()
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('barang', 'pembelian.id_barang = barang.id_barang');
        return $this->db->get();
    }
    
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
        return $this->db->query("SELECT sum(total) AS jumlah,sum(ppn) AS total_ppn from pembelian");
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

    public function get_data_allbarang()
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('barang', 'penjualan.id_barang = barang.id_barang');
        return $this->db->get();
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
        return $this->db->query("SELECT sum(total) AS jumlah,sum(ppn) AS total_ppn from penjualan");
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