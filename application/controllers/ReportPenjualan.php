<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportPenjualan extends CI_Controller {

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

    public function index($startDate, $endDate){
        $this->load->library('reportpdf');

        $data['date'] = array($startDate, $endDate);

        $data['laporan'] = $this->M_transaksi->select_pesanan_byDate($startDate, $endDate)->result_array();
    
        $this->reportpdf->generate('laporan/dompdf', $data);
    }

    public function filterDate(){

        $startDate = $this->input->get('startDate');
        $endDate = $this->input->get('endDate');

        $data['laporan'] = $this->M_transaksi->select_pesanan_byDate($startDate, $endDate)->result();

        $this->templatepenjual->display('laporan/laporan_filterdate', $data);
    }

    public function laporan_penjualan(){
        $data['laporan'] = $this->M_transaksi->select_transaksi_selesai($this->user_id)->result();

        $this->templatepenjual->display('laporan/laporan_penjualan', $data);
        
    }

    public function cetak()
    {
        $this->load->library('reportpdf');

        $data['laporan'] = $this->M_transaksi->select_transaksi_selesai($this->user_id)->result_array();

        //echo "<pre>", die(print_r($data['laporan']));
    
        $this->reportpdf->generate('laporan/dompdf2', $data);
    }
}