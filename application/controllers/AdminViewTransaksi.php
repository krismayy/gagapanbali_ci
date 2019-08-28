<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminViewTransaksi extends CI_Controller {

    function __construct()  {
        parent::__construct();
        $this->load->model(array(
            'Produk/M_produk', 'Pembeli/M_pembeli', 'Transaksi/M_transaksi', 'Bank/M_bank', 'Penjual/M_penjual'
        ));

        $this->load->helper('url');
        $this->load->library(array('form_validation','templateadmin', 'custommailer', 'custommessage')); 

        if(!$this->session->userdata('user')){
            redirect('Admin');
        }

    }
    
    public function index()
    {
        $data['data_transaksi'] = $this->M_transaksi->admin_select_all()->result();
        
        $this->templateadmin->display('backend/view_transaksi/view_transaksi.php', $data);
    }

    public function verifikasi_pembayaran()
    {
        $data['data_transaksi'] = $this->M_transaksi->admin_select_verifikasi()->result();
        $this->templateadmin->display('backend/verifikasi/verifikasi_pembayaran', $data);
    }

    public function detail_transaksi_verifikasi($id_transaksi){
        $data['detail_transaksi'] = $this->M_transaksi->select_data($id_transaksi)->result();
        
        $this->templateadmin->display('backend/verifikasi/detail_transaksi_verifikasi', $data);
    }

    public function detail_transaksi($id_transaksi){
        $data['detail_transaksi'] = $this->M_transaksi->select_data($id_transaksi)->result();
        //die(print_r($data['detail_transaksi']));
        
        $this->templateadmin->display('backend/view_transaksi/admin_detail_transaksi', $data);
    }

    public function proses_edit_detail($id_transaksi){
        $status = $this->input->post('status_bayar');

        $transaksi = $this->M_transaksi->select_data($id_transaksi)->row();

        if($status == 'Bukti Invalid'){
            $target_file = './uploads/buktipembayaran/'.$transaksi->bukti_pembayaran;
            unlink($target_file);

            $data   = array('bukti_pembayaran' => null,
                            'id_bank' => null,
                            'nama_pemilik_rek' => null,
                            'no_rekening' => null,
                            'status_bayar' => $status,
                            'tgl_bayar' => null);
        } else {
            $data   = array('status_bayar' => $status,
                            'status_barang' => 'Diproses');
        }

        $this->M_transaksi->update_transaksi($id_transaksi, $data);

        if ($status == 'Sudah Bayar') {
            //cek berapa transaksi
            $produk = $this->M_transaksi->select_transaksi_detail($id_transaksi)->result();

            //mendapatkan id barang dan jumlah
            foreach ($produk as $item) {
                $id_barang[]=$item->id_barang;
                $jumlah[] = $item->jumlah;
            }

            $this->M_produk->update_stok(count($produk), $id_barang, $jumlah);

            $transaksi = $this->M_transaksi->select_data_user($id_transaksi)->row();
            $toko = $this->M_penjual->select_by_id_toko($transaksi->id_toko)->row();
            //echo "<pre>", die(print_r($toko));

            // --------------- kirim sms ------------------------
            $this->custommessage->sendmsg($transaksi->no_hp_pembeli, 'Pembayaran untuk transaksi '.$transaksi->id_transaksi.' telah kami terima pada '.date('d F Y', strtotime($transaksi->tgl_bayar)).'. Mohon menunggu pengiriman barang.
            ');

            //----------------Kirim email ke pembeli------------------------
            $this->custommailer->send_mail('admin@gagapanbali.com', 'Gagapan Bali', $transaksi->email, 'Pembayaran Berhasil Diverifikasi', '
                    <p><b>Dear '.$transaksi->nama.'</b>,
                    <br><br>Pembayaran untuk transaksi '.$transaksi->id_transaksi.' telah kami terima pada <b>'.date('d F Y', strtotime($transaksi->tgl_bayar)).'</b>. Mohon menunggu pengiriman barang.
                    <br><br>Terimakasih.</p>
                ');
            $this->custommailer->send_mail('admin@gagapanbali.com', 'Gagapan Bali', $toko->email, 'Pembayaran Berhasil Diverifikasi', '
                    <p><b>Dear '.$toko->nama_toko.'</b>,
                    <br><br>Pembayaran untuk transaksi '.$transaksi->id_transaksi.' telah kami terima pada <b>'.date('d F Y', strtotime($transaksi->tgl_bayar)).'</b>. Mohon segera disiapkan barang yang dipesan.
                    <br><br>Terimakasih.</p>
                ');

        }

        $this->session->set_flashdata('verified', "<div class='alert alert-success'>Status bayar berhasil diperbaharui!</div>");
        redirect('adminviewtransaksi');
    }
}