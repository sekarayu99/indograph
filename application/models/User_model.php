<?php

class User_model extends CI_Model
{
    public function edit($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('user')->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}