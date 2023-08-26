<?php

class Pembelian extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('login');
		}

		$this->load->library('form_validation');
        $this->load->model('pembelian_model');
        $this->load->model('barang_model');
        $this->load->helper('tgl_indo_helper');
		
	}

    public function index()
	{
        $data = [
            'title'         => 'Transaksi Pembelian',
            'user'          => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'jumlah'        => $this->pembelian_model->getJumlah()->result(),
            'pembelian'        => $this->pembelian_model->get_data_barang(),
            'isi'           => 'pembelian/list'
        ];
		$this->load->view('layout/wrapper', $data);
    }

    public function tambah()
    {
        $data = [
            'title'      => 'Tambah Data Pembelian',
            'user'       => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'barang' => $this->db->get('barang')->result(),
            'isi'        => 'pembelian/tambah'
        ];
        $this->load->view('layout/wrapper', $data);
    }
    
    public function simpan()
    {
        // total
        $harga   = $this->input->post('harga');
        $qty     = $this->input->post('qty');
        $diskon = $this->input->post('diskon');
        $total_harga   = $harga*$qty;
        
        // jika tidak diskon 
        if(empty($diskon))
        {
            $ppn = $total_harga*0.11;

            // jika diskon
        } else {
            $total_akhir = $total_harga-($total_harga*($diskon/100));
            $ppn = $total_akhir*0.11;
        }

        $data = [
            'tanggal'   => $this->input->post('tanggal'),
            'nama'      => $this->input->post('nama'),
            'npwp'      => $this->input->post('npwp'),
            'id_barang'    => $this->input->post('id_barang'),
            'harga'     => $harga,
            'qty'       => $qty,
            'total'     => $total_harga,
            'diskon'    => $diskon,
            'ppn'       => $ppn
            
        ];
        $query = $this->db->insert('pembelian', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan!</div>');
        redirect('pembelian');
    }

    public function edit($id)
    {
        $data = [
            'title'      => 'Edit Data Pembelian',
            'user'       => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'pembelian'  => $this->pembelian_model->edit($id),
            'barang' => $this->db->get('barang')->result(),
            'isi'        => 'pembelian/edit'
        ];
        $this->load->view('layout/wrapper', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        
       // total
       $harga   = $this->input->post('harga');
       $qty     = $this->input->post('qty');
       $diskon = $this->input->post('diskon');
       $total_harga   = $harga*$qty;
       
       // jika tidak diskon 
       if(empty($diskon))
       {
           $ppn = $total_harga*0.11;

           // jika diskon
       } else {
           $total_akhir = $total_harga-($total_harga*($diskon/100));
           $ppn = $total_akhir*0.11;
       }
        
        $data = [
            'tanggal'   => $this->input->post('tanggal'),
            'nama'      => $this->input->post('nama'),
            'npwp'      => $this->input->post('npwp'),
            'id_barang'    => $this->input->post('id_barang'),
            'harga'     => $harga,
            'qty'       => $qty,
            'total'     => $total_harga,
            'diskon'    => $diskon,
            'ppn'       => $ppn
            
        ];
        $query = $this->db->insert('pembelian', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan!</div>');
        redirect('pembelian');
    }


    public function hapus($id)
    {
        $query = $this->pembelian_model->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>');
        redirect('pembelian');
    }

    // public function filter()
	// {

    //     $tgl_awal   = $this->input->post('tgl_awal');
    //     $tgl_akhir  = $this->input->post('tgl_akhir');
    //     $label      = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;

    //     $this->session->set_userdata('tanggal_awal', $tgl_awal);
    //     $this->session->set_userdata('tanggal_akhir', $tgl_akhir);

    //     if (empty($tgl_awal) || empty($tgl_akhir)) {
    //         $data = [
    //             'title'         => 'Laporan Pembelian',
    //             'user'          => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
    //             'pembelian'     => $this->pembelian_model->getAllData(),
    //             'label'         => $label,
    //             'isi'           => 'pembelian/list'
    //         ];
    //     } else {
    //         $data = [
    //             'title'         => 'Laporan Pembelian',
    //             'user'          => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
    //             'pembelian'     => $this->pembelian_model->getAllData(),
    //             'jumlah'        => $this->pembelian_model->filterData($tgl_awal, $tgl_akhir),
    //             'label'         => $label,
    //             'isi'           => 'pembelian/list'
    //         ];
    //     }
	// 	$this->load->view('layout/wrapper', $data);
    // }

    // public function print()
    // {
    //     $tgl_awal   = $this->input->post('tgl_awal');
    //     $tgl_akhir  = $this->input->post('tgl_akhir');
    //     $label      = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;

    //     $this->session->set_userdata('tanggal_awal', $tgl_awal);
    //     $this->session->set_userdata('tanggal_akhir', $tgl_akhir);

    //     if (empty($tgl_awal) || empty($tgl_akhir)) {
    //         $data = [
    //             'title'         => 'Laporan Pembelian',
    //             'pembelian'     => $this->pembelian_model->getAllData(),
    //             'isi'           => 'pembelian/list'
    //         ];
    //         $this->load->view('pembelian/print', $data);
    //     } else {
    //         $data = [
    //             'title'         => 'Laporan Pembelian',
    //             'pembelian'     => $this->pembelian_model->filterData($this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_akhir')),
    //             'label'         => $label,
    //             'isi'           => 'pembelian/list'
    //         ];
    //         $this->load->view('pembelian/print', $data);
    //     }
	// 	$this->load->view('layout/wrapper', $data);
    // }

    // public function print()
    // {
        
    //     $tgl_awal   = $this->session->userdata('tanggal_awal');
    //     $tgl_akhir  = $this->session->userdata('tanggal_akhir');
    //     $label      = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;

    //     if (empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_akhir'))) {
    //         $data = [
    //             'pembelian'     => $this->pembelian_model->getAllData(),
    //             'jumlah'        => $this->pembelian_model->getJumlah()->result(),
    //             'label'         => $label,
    //             'isi'           => 'pembelian/list'
    //         ];
    //         $this->load->view('pembelian/print', $data);
    //     } else {
    //         $data = [
    //             'pembelian'     => $this->pembelian_model->filterData($this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_akhir')),
    //             'label'         => $label,
    //             'jumlah'        => $this->pembelian_model->filterData($tgl_awal, $tgl_akhir),
    //             'isi'           => 'pembelian/list'
    //         ];
    //         $this->load->view('pembelian/print', $data);
    //     }
    // }


}