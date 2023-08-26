<?php

class Pembelian_model extends CI_Model
{

    public function get_data_barang()
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('barang', 'pembelian.id_barang = barang.id_barang');
        return $this->db->get();
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('barang', 'pembelian.id_barang = barang.id_barang');
        $this->db->where('pembelian.id', $id);
        return $this->db->get()->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pembelian', $data);
        
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pembelian');
    }

    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        return $this->db->get()->result();
    }

    public function filterpem($tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->where('pembelian.tanggal >=', $tgl_awal);
        $this->db->where('pembelian.tanggal <=', $tgl_akhir);
        return $this->db->get()->result();
    }

    public function filterData($tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->select('sum(total) as jumlah, sum(ppn) as total_ppn');
        $this->db->from('pembelian');
        $this->db->where('pembelian.tanggal >=', $tgl_awal);
        $this->db->where('pembelian.tanggal <=', $tgl_akhir);
        return $this->db->get()->result();
    }

    public function getJumlah()
    {
        return $this->db->query("SELECT sum(total) AS jumlah,sum(ppn) AS total_ppn from pembelian");
     }

}