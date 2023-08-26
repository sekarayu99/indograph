<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_model');
    }

	public function index()
	{
        $data = [
            'title'     => 'Daftar Data Barang',
            'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'barang'  => $this->db->get('barang')->result(),
            'isi'       => 'barang/list'
        ];
		$this->load->view('layout/wrapper', $data);
    }

    public function tambah()
    {
        $data = [
            'title'     => 'Tambah Data Barang',
            'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'isi'       => 'barang/tambah'
        ];
        $this->load->view('layout/wrapper', $data);
    }

    public function simpan()
    {
        $data = [
            'nama_barang_barang' => $this->input->post('nama_barang_barang')
        ];
        $query = $this->db->insert('barang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan!</div>');
        redirect('barang');
    }

    public function edit($id_barang)
    {
        $data = [
            'title'     => 'Edit Data Barang',
            'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'barang'  => $this->barang_model->edit($id_barang),
            'isi'       => 'barang/edit'
        ];
        $this->load->view('layout/wrapper', $data);
    }

    public function update()
    {
        $id_barang = $this->input->post('id_barang');
        $data = [
            'nama_barang' => $this->input->post('nama_barang')
        ];
        $query = $this->barang_model->update($id_barang, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!</div>');
        redirect('barang');
    }

    public function hapus($id_barang)
    {
        $query = $this->barang_model->hapus($id_barang);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>');
        redirect('barang');
    }


    
}