<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
    
    public $user_id;

    function __construct()  {
        parent::__construct();
        $this->load->model(array(
            'Pembeli/M_pembeli', 'Login/M_login', 'Transaksi/M_transaksi'
        ));
       
        $this->load->helper('url');
        $this->load->library(array('form_validation','templatepembeli'));

        if(!$this->session->userdata('user')['email']){
            redirect('login');
        }

        $this->user_id = $this->session->userdata('user')['id_user'];

    }

    function index(){
        $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $pembelian = $this->M_transaksi->select_pesanan_belumbayar($pembeli->id_pembeli)->result_array();

        $data = [];
        $id_transaksi = '';
        $id_barang = '';
        
        if (count($pembelian)) {
            foreach ($pembelian as $item) {
                if ($item['id_transaksi'] !== $id_transaksi) {
                    $data['pembelian'][$item['id_transaksi']] = $item;
                }

                $id_transaksi = $item['id_transaksi'];
            }

            foreach ($pembelian as $item) {
                $data['pembelian'][$item['id_transaksi']]['barang'][] = $item;
            }

            foreach($data['pembelian'] as $p) {
                $id_barang = '';

                foreach($p['barang'] as $key => $barang) {
                    if ($barang['id_barang'] == $id_barang) {
                        unset($data['pembelian'][$p['id_transaksi']]['barang'][$key]);
                    }

                    $id_barang = $barang['id_barang'];
                }
            }
        } else {
            $data['pembelian'] = null;
        }

            
        $this->templatepembeli->display('pesanansaya/view_belum_dikirim.php', $data);

       
        $this->cekBarangDikirim();
    }

    function cekBarangDikirim(){
        $hasiltgl = $this->M_transaksi->getTanggalTransaksi()->result();
        $tgl_sekarang =  date('Y-m-d H:i:s');
        foreach ($hasiltgl as $tgltrans) {
             $tgljatuhtempo =  $tgltrans->tgl_transaksi ;
            

            if ($tgljatuhtempo <= $tgl_sekarang){
                $data = array('status_barang'=> 'Sudah Diterima');
        
                $this->M_transaksi->update_transaksi($tgltrans->id_transaksi, $data);
            }
        }
    }

    function menunggu_verifikasi(){
        $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $pembelian = $this->M_transaksi->select_pesanan_verifikasi($pembeli->id_pembeli)->result_array();

        $data = [];
        $id_transaksi = '';
        $id_barang = '';
        $data['page'] = 'menunggu_verifikasi';

        if (count($pembelian)) {
            foreach ($pembelian as $item) {
                if ($item['id_transaksi'] !== $id_transaksi) {
                    $data['pembelian'][$item['id_transaksi']] = $item;
                }

                $id_transaksi = $item['id_transaksi'];
            }

            foreach ($pembelian as $item) {
                $data['pembelian'][$item['id_transaksi']]['barang'][] = $item;
            }

            foreach($data['pembelian'] as $p) {
                $id_barang = '';

                foreach($p['barang'] as $key => $barang) {
                    if ($barang['id_barang'] == $id_barang) {
                        unset($data['pembelian'][$p['id_transaksi']]['barang'][$key]);
                    }

                    $id_barang = $barang['id_barang'];
                }
            }
        } else {
            $data['pembelian'] = null;
        }


        $this->templatepembeli->display('pesanansaya/view_menunggu_verifikasi.php', $data);
    }

    function dikemas(){
       $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $pembelian = $this->M_transaksi->select_pesanan_dikemas($pembeli->id_pembeli)->result_array();

        $data = [];
        $id_transaksi = '';
        $id_barang = '';
        $data['page'] = 'dikemas';

        if (count($pembelian)) {
            foreach ($pembelian as $item) {
                if ($item['id_transaksi'] !== $id_transaksi) {
                    $data['pembelian'][$item['id_transaksi']] = $item;
                }

                $id_transaksi = $item['id_transaksi'];
            }

            foreach ($pembelian as $item) {
                $data['pembelian'][$item['id_transaksi']]['barang'][] = $item;
            }

            foreach($data['pembelian'] as $p) {
                $id_barang = '';

                foreach($p['barang'] as $key => $barang) {
                    if ($barang['id_barang'] == $id_barang) {
                        unset($data['pembelian'][$p['id_transaksi']]['barang'][$key]);
                    }

                    $id_barang = $barang['id_barang'];
                }
            }
        } else {
            $data['pembelian'] = null;
        }

        $this->templatepembeli->display('pesanansaya/view_dikemas.php', $data);
    }

    function dikirim(){
        $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $pembelian = $this->M_transaksi->select_pesanan_dikirim($pembeli->id_pembeli)->result_array();

        $data = [];
        $id_transaksi = '';
        $id_barang = '';
        $data['page'] = 'dikirim';

        if (count($pembelian)) {
            foreach ($pembelian as $item) {
                if ($item['id_transaksi'] !== $id_transaksi) {
                    $data['pembelian'][$item['id_transaksi']] = $item;
                }

                $id_transaksi = $item['id_transaksi'];
            }

            foreach ($pembelian as $item) {
                $data['pembelian'][$item['id_transaksi']]['barang'][] = $item;
            }

            foreach($data['pembelian'] as $p) {
                $id_barang = '';

                foreach($p['barang'] as $key => $barang) {
                    if ($barang['id_barang'] == $id_barang) {
                        unset($data['pembelian'][$p['id_transaksi']]['barang'][$key]);
                    }

                    $id_barang = $barang['id_barang'];
                }
            }
        } else {
            $data['pembelian'] = null;
        }

        $this->templatepembeli->display('pesanansaya/view_dikirim.php', $data);

    }

    function selesai(){
        $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $pembelian = $this->M_transaksi->select_pesanan_selesai($pembeli->id_pembeli)->result_array();

        $data = [];
        $id_transaksi = '';
        $id_barang = '';
        $data['page'] = 'selesai';

        if (count($pembelian)) {
            foreach ($pembelian as $item) {
                if ($item['id_transaksi'] !== $id_transaksi) {
                    $data['pembelian'][$item['id_transaksi']] = $item;
                }

                $id_transaksi = $item['id_transaksi'];
            }

            foreach ($pembelian as $item) {
                $data['pembelian'][$item['id_transaksi']]['barang'][] = $item;
            }

            foreach($data['pembelian'] as $p) {
                $id_barang = '';

                foreach($p['barang'] as $key => $barang) {
                    if ($barang['id_barang'] == $id_barang) {
                        unset($data['pembelian'][$p['id_transaksi']]['barang'][$key]);
                    }

                    $id_barang = $barang['id_barang'];
                }
            }
        } else {
            $data['pembelian'] = null;
        }
        
        // echo "<pre>", die(print_r($data['pembelian']));
        // die();

        $this->templatepembeli->display('pesanansaya/view_selesai.php', $data);
    }

    public function detail_pesanan($id_transaksi)
    {
        $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $data['transaksi'] = $this->M_transaksi->select_transaksi_user($pembeli->id_pembeli, $id_transaksi)->result();

        //echo '<pre>', die(print_r($data['transaksi']));

        $this->templatepembeli->display('pesanansaya/detail_pesanan.php', $data);
    }

    public function detail_pesanan_selesai($id_transaksi)
    {
        $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $data['transaksi'] = $this->M_transaksi->select_transaksi_user($pembeli->id_pembeli, $id_transaksi)->result();

        //echo '<pre>', die(print_r($data['transaksi']));

        $this->templatepembeli->display('pesanansaya/detail_pesanan_selesai.php', $data);
    }

    public function cetak($id_transaksi)
    {
        $this->load->library('reportpdf');

        $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $data['transaksi'] = $this->M_transaksi->select_transaksi_user($pembeli->id_pembeli, $id_transaksi)->result_array();
        //echo '<pre>', die(print_r($data['transaksi']));

        $this->reportpdf->generate('pesanansaya/detailpesananpdf', $data);
    }

}