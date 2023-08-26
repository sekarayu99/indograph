<?php

class User extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('login');
		}

		$this->load->library('form_validation');
        $this->load->model('user_model');
		
	}

    public function index()
	{
        $data = [
            'title'     => 'Daftar Data User',
            'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'admin'      => $this->db->get('user')->result(),
            'isi'       => 'user/list'
        ];
		$this->load->view('layout/wrapper', $data);
    }

    public function tambah_user()
    {
        $data = [
            'title'         => 'Tambah Data User',
            'user'          => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'role'          => $this->db->get('user_role')->result(),
            'isi'           => 'user/tambah'
        ];
        $this->load->view('layout/wrapper', $data);
    }

    public function simpan()
    {
        $data = [
            'nama' 		        => $this->input->post('nama'),
            'email' 			=> $this->input->post('email'),
            'password' 			=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' 			=> $this->input->post('role_id'),
            'status' 			=> '1'
        ];
		$query = $this->db->insert('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan!</div>');
        redirect('user');
	}

    public function edit($id)
    {
        $data = [
            'title'         => 'Edit Data User',
            'user'          => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'role'          => $this->db->get('user_role')->result(),
            'user'          => $this->user_model->edit($id),
            'isi'           => 'user/edit'
        ];
        $this->load->view('layout/wrapper', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' 		        => $this->input->post('nama'),
            'email' 			=> $this->input->post('email'),
            'password' 			=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' 			=> $this->input->post('role_id'),
            'status' 			=> '1'
        ];
		$query = $this->user_model->update($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!</div>');
        redirect('user');
	}

    public function hapus($id)
    {
        $query = $this->user_model->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>');
        redirect('user');
    }



}