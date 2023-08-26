<?php

class Ppn extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('login');
		}

		$this->load->library('form_validation');
        $this->load->model('ppn_model');
		
	}

    public function index()
	{
        
        $data = [
            'title'     => 'Hitung PPN',
            'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'ppn'       => $this->db->get('ppn')->result(),
            'beli'      => $this->ppn_model->getJumlah(),
            'jual'      => $this->ppn_model->getJumlahPenjualan(),
            'isi'       => 'ppn/list'
        ];
		$this->load->view('layout/wrapper', $data);
    }

    // pembelian
    
    // public function filter_pembelian()
	// {
    //     $tgl_awal   = $this->input->post('tgl_awal');
    //     $tgl_akhir  = $this->input->post('tgl_akhir');

    //     $this->session->set_userdata('tanggal_awal', $tgl_awal);
    //     $this->session->set_userdata('tanggal_akhir', $tgl_akhir);

    //     if (empty($tgl_awal) || empty($tgl_akhir)) {
    //         $data = [
    //             'title'     => 'Transaksi Pembelian',
    //             'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
    //             'ppn'       => $this->db->get('ppn')->result(),
    //             'beli'      => $this->ppn_model->getJumlah()->result(),
    //             'isi'       => 'ppn/list'
    //         ];
    //     } else {
    //         $data = [
    //             'title'     => 'Transaksi Pembelian',
    //             'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
    //             'ppn'       => $this->db->get('ppn')->result(),
    //             'beli'      => $this->ppn_model->filterJumlah($tgl_awal, $tgl_akhir),
    //             'jual'      => $this->ppn_model->filterJumlahPenjualan($tgl_awal, $tgl_akhir),
    //             'isi'       => 'ppn/list'
    //         ];
    //     }
	// 	$this->load->view('layout/wrapper', $data);
    // }

    // periode
    
    public function filter_periode()
	{
        $tgl_awal   = $this->input->post('tgl_awal');
        $tgl_akhir  = $this->input->post('tgl_akhir');

        $this->session->set_userdata('tanggal_awal', $tgl_awal);
        $this->session->set_userdata('tanggal_akhir', $tgl_akhir);

        if (empty($tgl_awal) || empty($tgl_akhir)) {
            $data = [
                'title'     => 'Transaksi Pembelian',
                'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'ppn'       => $this->db->get('ppn')->result(),
                'beli'      => $this->ppn_model->getJumlah()->result(),
                'jual'      => $this->ppn_model->getJumlahPenjualan()->result(),
                'isi'       => 'ppn/list'
            ];
        } else {
            $data = [
                'title'     => 'Transaksi Pembelian',
                'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'ppn'       => $this->db->get('ppn')->result(),
                'beli'      => $this->ppn_model->filterJumlah($tgl_awal, $tgl_akhir),
                'jual'      => $this->ppn_model->filterJumlahPenjualan($tgl_awal, $tgl_akhir),
                'isi'       => 'ppn/list'
            ];
        }
		$this->load->view('layout/wrapper', $data);
    }

    public function hitung()
    {
        $pajak_keluaran = $this->input->post('pajak_keluaran');
        $pajak_masukan = $this->input->post('pajak_masukan');
        $bayar_pajak = $pajak_keluaran-$pajak_masukan;

        $data = [
            'tanggal'           => $this->input->post('tanggal'),
            'pajak_keluaran'    => $pajak_keluaran,
            'pajak_masukan'     => $pajak_masukan,
            'bayar_pajak'       => $bayar_pajak
            
        ];
        $query = $this->db->insert('ppn', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan!</div>');
        redirect('ppn');


    }

    // cetak
    public function cetak()
    {
        $tgl_awal   = $this->input->post('tgl_awal');
        $tgl_akhir  = $this->input->post('tgl_akhir');

        $label      = 'Periode Tanggal '.$this->session->userdata('tanggal_awal').' s/d '.$this->session->userdata('tanggal_akhir');

        $cetak = date("Y-d-m H:i:s");

        if (empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_akhir'))) {
            $data = [
                'ppn'       => $this->ppn_model->getAllPpn(),
                'label'      => 'Dicetak pada '.$cetak,
                'isi'       => 'ppn/cetak'
            ];
            $this->load->view('ppn/cetak', $data);
        } else {
            $data = [
                'ppn'       => $this->ppn_model->getAllPpn(),
                'label'     => $label,
                'isi'       => 'ppn/cetak'
            ];
            $this->load->view('ppn/cetak', $data);
        }
    }


   
}