<?php

class Barang_model extends CI_Model {
    

    public function edit($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        return $this->db->get('barang')->row_array();
    }

    public function update($id_barang, $data)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang', $data);
        
    }

    public function hapus($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('barang');
    }
    
}