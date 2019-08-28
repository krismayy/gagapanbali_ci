<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komplain extends CI_Controller {

    public $user_id;

    function __construct()  {
        parent::__construct();
        $this->load->model(array('Login/M_login',
                                 'Pembeli/M_pembeli',
                                 'Penjual/M_penjual',
                                 'Transaksi/M_transaksi',
                                 'Komplain/M_komplain',
                                 'Produk/M_produk'
                                ));

        $this->load->helper('url');
        $this->load->library(array('form_validation','templatepenjual', 'templatepembeli')); 

        $this->user_id = $this->session->userdata('user')['id_user'];
    }
    
    public function lihat_komplain()
    {
        $toko = $this->M_penjual->select_by_id_user($this->user_id)->row();

        $data['daftar_komplain'] = $this->M_komplain->select_by_id_toko($toko->id_toko)->result();

        // echo "<pre>", die(print_r($data['daftar_komplain']));

        $this->templatepenjual->display('komplain/penjual/list_komplain.php', $data);
    }

    public function balas_komplain($id_komplain)
    {
        $data['data_komplain'] = $this->M_komplain->select_by_id_komplain($id_komplain)->result();

        foreach ($data['data_komplain'] as $komplain) {
            # code...
            $status_read = $komplain->status_read; //mendapatkan status read
        }
        
        if($status_read == 'Belum Dibaca'){
            $ubah['status_read'] = 'Sudah Dibaca';
            $this->M_komplain->update_komplain($id_komplain, $ubah);
        }

        $this->templatepenjual->display('komplain/penjual/balas_komplain.php', $data);
    }

    public function proses_balas_komplain()
    {
        $id_komplain = $this->input->post('id_komplain');
        
        $data_balasan = array('balasan' => $this->input->post('balasan'),
                              'status_read' => 'Sudah Dibalas');

        $this->M_komplain->update_komplain($id_komplain, $data_balasan);

        $this->session->set_flashdata('balaskomplain', '<div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-circle"></i> Balasan komplain berhasil dikirim!</div>');

        redirect('komplain/lihat_komplain');
    }

    public function komplain_saya()
    {
        $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $data['komplain_data'] = $this->M_komplain->select_by_id_pembeli($pembeli->id_pembeli)->result();
        

        $this->templatepembeli->display('komplain/pembeli/komplain_saya.php', $data);
    }
    
    public function detail_komplain_saya($id_komplain)
    {
        $data['data_komplain'] = $this->M_komplain->select_by_id_komplain($id_komplain)->result();
        //echo "<pre>", die(print_r($data['data_komplain']));

        $this->templatepembeli->display('komplain/pembeli/lihat_detail.php', $data);
    }

    public function tulis($id_barang)
    {
        $action = $this->input->get('action');
        $data['uri'] = $this->input->get('uri_segmen');

        if($action == 'Komplain'){
            $id_transaksi = $this->input->get('id_transaksi');

            $data['detail_produk'] = $this->M_transaksi->select_transaksi_barang($id_transaksi, $id_barang)->result();

            $this->templatepembeli->display('komplain/pembeli/buat_komplain.php', $data);
        } else {
            $id_transaksi = $this->input->get('id_transaksi');

            $data['detail_produk'] = $this->M_transaksi->select_transaksi_barang($id_transaksi, $id_barang)->result();
            //die(print_r($data['detail_produk']));

            $this->templatepembeli->display('reviews/buat_review.php', $data);
        }
    }

    public function proses_tambah_komplain()
    {
        $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();

        $data = array('id_komplain'  => $this->M_komplain->buat_id(),
                      'komplain'     => $this->input->post('komplain'),
                      'id_transaksi' => $this->input->post('id_transaksi'),
                      'id_pembeli'   => $pembeli->id_pembeli,
                      'id_barang'    => $this->input->post('id_barang'),
                      'status_read'  => 'Belum Dibalas');

        $tes = $this->M_komplain->insert_komplain($data);

        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Komplain berhasil dikirim!</div>');

        redirect('komplain/komplain_saya');
    }
}
