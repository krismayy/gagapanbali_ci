<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {

    function __construct()  {
        parent::__construct();
        $this->load->model(array(
            'Transaksi/M_transaksi', 'Login/M_login'
        ));

        $this->load->helper('url');
        $this->load->library(array('form_validation','templateadmin'));
        
    }

    public function index()
    {
        $data['jumlahTransaksi'] = $this->M_transaksi->countTransaksi()->result();
        $data['jumlahUser'] = $this->M_login->countUser()->result();

        $transaksi = $this->M_transaksi->admin_select_transaksi_selesai()->result();
        // echo "<pre>", die(print_r($transaksi));

        foreach ($transaksi as $cari) {
            # code...
            $untung[] = $cari->total_harga * 0.1;
        }


        $total = 0;
        for ($i=0; $i < count($untung); $i++) { 
            # code...
            $total = $total + $untung[$i];
        }

        $data['totalPendapatan'] = $total;

        $this->templateadmin->display('backend/dashboardadmin.php',$data);
    }
}