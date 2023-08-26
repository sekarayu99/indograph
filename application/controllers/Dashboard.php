<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
        $this->load->model('dashboard_model');
        $data = [
            'title'         => 'Dashboard',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'penjualan'       => $this->dashboard_model->countPenjualan(),
            'pembelian'       => $this->dashboard_model->countPembelian(),
            'ppn'              => $this->dashboard_model->countPpn(),
            'isi'           => 'dashboard/list'
        ];
		$this->load->view('layout/wrapper', $data);
    }
}