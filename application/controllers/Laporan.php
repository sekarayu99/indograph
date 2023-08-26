<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model');
        $this->load->helper('tgl_indo_helper');
    }

    // pembelian

    public function pembelian()
	{
        
        $tgl_awal   = $this->input->post('tgl_awal');
        $tgl_akhir  = $this->input->post('tgl_akhir');

        $this->session->set_userdata('tanggal_awal', $tgl_awal);
        $this->session->set_userdata('tanggal_akhir', $tgl_akhir);

        if (empty($tgl_awal) || empty($tgl_akhir)) {
            $data = [
                'title'     => 'Laporan Transaksi Pembelian',
                'user'       => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'pembelian'        => $this->laporan_model->get_data_barang(),
                'jumlah'        => $this->laporan_model->getJumlah()->result(),
                'isi'       => 'laporan/pembelian'
            ];
        } else {
            $data = [
                'title'     => 'Laporan Transaksi Pembelian',
                'user'       => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'pembelian'   => $this->laporan_model->filterData($tgl_awal, $tgl_akhir),
                'jumlah'        => $this->laporan_model->filterJumlah($tgl_awal, $tgl_akhir),
                'isi'       => 'laporan/pembelian'
            ];
        }
		$this->load->view('layout/wrapper', $data);
    }

    public function printpembelian()
    {
        
        $label      = 'Periode Tanggal '.$this->session->userdata('tanggal_awal').' s/d '.$this->session->userdata('tanggal_akhir');
        
        $cetak = date("Y-d-m H:i:s");
        

        if (empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_akhir'))) {
            $data = [
                'pembelian'        => $this->laporan_model->get_data_barang(),
                'jumlah'        => $this->laporan_model->getJumlah()->result(),
                'label'      => 'Dicetak pada '.$cetak,
                'isi'       => 'laporan/printpembelian'
            ];
            $this->load->view('laporan/printpembelian', $data);
        } else {
            $data = [
                'pembelian'   => $this->laporan_model->filterData($this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_akhir')),
                'jumlah'        => $this->laporan_model->filterJumlah($this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_akhir')),
                'label'     => $label,
                'isi'       => 'laporan/printpembelian'
            ];
            $this->load->view('laporan/printpembelian', $data);
        }
    }

    // penjualan

    public function penjualan()
	{
        
        $tgl_awal   = $this->input->post('tgl_awal');
        $tgl_akhir  = $this->input->post('tgl_akhir');

        $this->session->set_userdata('tanggal_awal', $tgl_awal);
        $this->session->set_userdata('tanggal_akhir', $tgl_akhir);

        if (empty($tgl_awal) || empty($tgl_akhir)) {
            $data = [
                'title'     => 'Laporan Transaksi Penjualan',
                'user'       => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'penjualan'        => $this->laporan_model->get_data_allbarang(),
                'jumlah'        => $this->laporan_model->getJumlahPenjualan()->result(),
                'isi'       => 'laporan/penjualan'
            ];
        } else {
            $data = [
                'title'     => 'Laporan Transaksi Penjualan',
                'user'       => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'penjualan'   => $this->laporan_model->filterDataPenjualan($tgl_awal, $tgl_akhir),
                'jumlah'        => $this->laporan_model->filterJumlahPenjualan($tgl_awal, $tgl_akhir),
                'isi'       => 'laporan/penjualan'
            ];
        }
		$this->load->view('layout/wrapper', $data);
    }

    public function printpenjualan()
    {
        $label      = 'Periode Tanggal '.$this->session->userdata('tanggal_awal').' s/d '.$this->session->userdata('tanggal_akhir');

        $cetak = date("Y-d-m H:i:s");

        if (empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_akhir'))) {
            $data = [
                'penjualan'        => $this->laporan_model->get_data_allbarang(),
                'jumlah'        => $this->laporan_model->getJumlahPenjualan()->result(),
                'label'      => 'Dicetak pada '.$cetak,
                'isi'       => 'laporan/printpenjualan'
            ];
            $this->load->view('laporan/printpenjualan', $data);
        } else {
            $data = [
                'penjualan'   => $this->laporan_model->filterDataPenjualan($this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_akhir')),
                'jumlah'        => $this->laporan_model->filterJumlahPenjualan($this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_akhir')),
                'label'     => $label,
                'isi'       => 'laporan/printpenjualan'
            ];
            $this->load->view('laporan/printpenjualan', $data);
        }
    }


}