<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarang extends CI_Controller {

    public $user_id;

    function __construct()  {
        parent::__construct();
        $this->load->library('templatepenjual');
        $this->load->model(array('Penjual/M_penjual', 
                                 'Login/M_login',
                                 'Transaksi/M_transaksi', 
                                 'Pembeli/M_pembeli'
                                ));
        $this->user_id = $this->session->userdata('user')['id_user'];
    }

    public function index(){ //tampilan all barang by tanggal
        $data['laporan'] = $this->M_transaksi->sumBarangByToko($this->user_id)->result();

        $this->templatepenjual->display('laporan/laporan_barang', $data);
    }

    public function cetak(){ //cetak pdf laporan
        $this->load->library('reportpdf');

        $data['laporan'] = $this->M_transaksi->sumBarangByToko($this->user_id)->result_array();
        
        //echo "<pre>", die(print_r($data['laporan']));
        $this->reportpdf->generate('laporan/reportbarang', $data);
    }
}