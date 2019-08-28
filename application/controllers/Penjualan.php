<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    public $user_id;
    
    function __construct()  {
        parent::__construct();
        $this->load->model(array('Penjual/M_penjual', 
                                 'Login/M_login',
                                 'Transaksi/M_transaksi', 
                                 'Pembeli/M_pembeli',
                                 'Produk/M_produk'
                                ));
       
        $this->load->helper('url');
        $this->load->library(array('form_validation','templatepenjual', 'custommailer'));

        if(!$this->session->userdata('user')['email']){
            redirect('login');
        }

        $this->user_id = $this->session->userdata('user')['id_user'];

    }

    public function index(){
        $data['toko'] = $this->M_penjual->select_by_id_user($this->user_id)->row();
        
        $toko = $this->M_penjual->cek_id_toko($this->user_id)->row();
        $data['penjualan'] = $this->M_transaksi->select_penjualan_toko($toko->id_toko)->result();
        //echo '<pre>', die(print_r($data['penjualan']));
        $this->templatepenjual->display('penjualan/index.php', $data);
    }

    public function detail_transaksi($id_transaksi){
    $data['detail_transaksi'] = $this->M_transaksi->select_data($id_transaksi)->result();

    // $toko = $this->M_penjual->select_by_id_user($this->user_id)->row();

    // $data['detail_transaksi'] = $this->M_transaksi->select_data_detail($id_transaksi, $toko->id_toko)->result();

        $this->templatepenjual->display('penjualan/detail.php', $data);
    }

    public function proses_edit_detail($id_transaksi){
        $status = $this->input->post('status_barang');
        $data = array('status_barang' => $status);
        $this->M_transaksi->update_transaksi($id_transaksi, $data);        
        
        $transaksi = $this->M_transaksi->select_transaksi($id_transaksi)->row();
        $data = $this->M_pembeli->select_by_id_pembeli($transaksi->id_pembeli)->row();

         //----------------Kirim email ke pembeli------------------------
        if($status == 'Sudah Dikirim'){
            $this->custommailer->send_mail('admin@gagapanbali.com', 'Gagapan Bali', $data->email, 'Pesanan Dikirim', '
                <p><b>Dear '.$data->nama.'</b>,
                <br><br>Pesanan Anda dengan kode transaksi '.$id_transaksi.' sudah dikirim.
                <br><br>Terimakasih.</p>
            ');
        } elseif ($status == 'Diproses') {
            # code...
            $this->custommailer->send_mail('admin@gagapanbali.com', 'Gagapan Bali', $data->email, 'Pesanan Diproses', '
                <p><b>Dear '.$data->nama.'</b>,
                <br><br>Pesanan Anda dengan kode transaksi '.$id_transaksi.' sudah diproses, mohon menunggu konfirmasi pengiriman.
                <br><br>Terimakasih.</p>
            ');
        }
        

        $this->session->set_flashdata('success', "<div class='alert alert-success'><i class='fa fa-fw fa-check-circle'></i> Status barang berhasil diperbaharui!</div>");
        redirect('Penjualan');
    }
}