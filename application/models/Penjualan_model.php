<?php

class Penjualan_model extends CI_Model
{

    public function get_data_barang()
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('barang', 'penjualan.id_barang = barang.id_barang');
        return $this->db->get();
    }
    
    public function edit($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('penjualan')->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('penjualan', $data);
        
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penjualan');
    }

    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        return $this->db->get()->result();
    }

    public function filterData($tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->select('sum(total) as jumlah, sum(ppn) as total_ppn');
        $this->db->from('penjualan');
        $this->db->where('penjualan.tanggal >=', $tgl_awal);
        $this->db->where('penjualan.tanggal <=', $tgl_akhir);
        return $this->db->get()->result();
    }

    public function getJumlah()
    {
        return $this->db->query("SELECT sum(total) AS jumlah,sum(ppn) AS total_ppn from penjualan");
     }

}