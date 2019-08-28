<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

    public $user_id;

    function __construct()  {
        parent::__construct();
        $this->load->model(array('Login/M_login', 'Pembeli/M_pembeli', 'Penjual/M_penjual', 'Transaksi/M_transaksi', 'Review/M_review'));
        $this->load->helper('url');
        $this->load->library(array('form_validation','templatepembeli')); 

        $this->user_id = $this->session->userdata('user')['id_user'];
    }
    
    public function tulis_review()
    {
        $id_transaksi = 'TR201907070004';
        $id_barang = 'PR000003';

        $data['detail_produk'] = $this->M_transaksi->select_transaksi_barang($id_transaksi, $id_barang)->result();

        $this->templatepembeli->display('reviews/buat_review.php', $data);
    }

    public function proses_simpan_review()
    {
        $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $id_toko = $this->input->post('id_toko');

        $data = array('id_review'    => $this->M_review->buat_id(),
                      'ulasan'       => $this->input->post('review'),
                      'status_terima'=> 1,
                      'bintang'      => $this->input->post('star'),
                      'id_barang'    => $this->input->post('id_barang'),
                      'id_transaksi' => $this->input->post('id_transaksi'),
                      'id_pembeli'   => $pembeli->id_pembeli);

        $this->M_review->insert_review($data);

        //membuat rating toko
        $bintang = $this->M_review->select_review_toko($id_toko)->result_array();

        $count = 0;
        foreach ($bintang as $rating) {
            # code...
            $count = $count + $rating['bintang'];
        }

        $ratings = array('rating_toko' => $count/count($bintang));

        $this->M_penjual->update_toko($id_toko, $ratings);

        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Review berhasil dikirim!</div>');

        redirect('pesanan/selesai');
    }
}
