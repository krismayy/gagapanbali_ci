<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public $user_id;

    function __construct()  {
        parent::__construct();
        $this->load->model(array(
            'Penjual/M_penjual',
            'Login/M_login', 
            'Produk/M_produk', 
            'Kategori/M_kategori',
            'Foto/M_foto',
            'Transaksi/M_transaksi',
            'Review/M_review'
        ));
       
        $this->load->helper('url');
        $this->load->library(array('form_validation','templatepenjual', 'template', 'upload'));

        if(!$this->session->userdata('user')['email']){
            redirect('login');
        }

        $this->user_id = $this->session->userdata('user')['id_user'];
    }

    // //home

    // public function index()
    // {
    //     $id_toko= $this->M_penjual->cek_id_toko($this->user_id)->row();
    //     $data['produk']= $this->M_produk->select_by_id_toko($id_toko->id_toko)->result();
        
    //     $this->templatepenjual->display('produk/index.php', $data);
    // }

//menu penjual
    public function list_produk()
    {
        $datanull = $this->M_penjual->cek_null($this->user_id)->row();

        if($datanull !== NULL){
            $this->session->set_flashdata('message',"<div class='alert alert-danger'>Lengkapi Profil Toko Terlebih Dahulu!</div>");
            redirect('penjual/edit_profil');
        } else {
            $id_toko= $this->M_penjual->cek_id_toko($this->user_id)->row();
            $data['produk']= $this->M_produk->select_by_id_toko($id_toko->id_toko)->result();

            $this->templatepenjual->display('produk/list_produk.php', $data);
        }
    }

    public function tambah_produk()
    {
        $data['data_toko'] = $this->M_penjual->select_by_id_user($this->user_id)->row();
        $data['kategori'] = $this->M_kategori->select_all()->result();

        $this->templatepenjual->display('produk/tambah.php', $data);
    }

    public function proses_tambah_produk()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Produk', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori Produk', 'required');
        $this->form_validation->set_rules('desk_barang', 'Deskripsi Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('berat', 'Berat', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');


        if ($this->form_validation->run() == FALSE){
            $data['data_toko'] = $this->M_penjual->select_by_id_user($this->user_id)->row();
            $data['kategori'] = $this->M_kategori->select_all()->result();

            $this->templatepenjual->display('produk/tambah.php', $data);
        } else {
            $files = $_FILES['gambar'];

            $barang=array(
                'id_barang' => $this->M_produk->buat_id(),
                'nama_barang'=>$this->input->post('nama_barang'),
                'id_kategori'=>$this->input->post('id_kategori'),
                'deskripsi_barang'=>$this->input->post('desk_barang'),
                'harga'=>$this->input->post('harga'),
                'berat'=>$this->input->post('berat'),
                'stok'=>$this->input->post('stok'),
                'id_toko' => $this->input->post('id_toko')
            );

            $id_barang = $this->M_produk->insert_barang($barang);

            foreach ($files['name'] as $key => $value) {
                $extension = pathinfo($value, PATHINFO_EXTENSION);
                $file_name = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10) . '.' . $extension;
                move_uploaded_file($files['tmp_name'][$key], './uploads/produk/' . $file_name);

                $this->M_foto->insert_foto($file_name, $barang['id_barang']);
            }

            $this->session->set_flashdata('success',"<div class='alert alert-success'>Produk berhasil ditambahkan!</div>");
            return redirect('produk/list_produk');
        }
    }

    public function edit_produk($id_barang)
    {
        $data['kategori'] = $this->M_kategori->select_all()->result();
        $data['produk'] = $this->M_produk->select_by_id_barang($id_barang)->row();

        $this->templatepenjual->display('produk/edit.php', $data);
    }

    public function proses_edit_produk($id_barang)
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Produk', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori Produk', 'required');
        $this->form_validation->set_rules('desk_barang', 'Deskripsi Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('berat', 'Berat', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

         if ($this->form_validation->run() == FALSE){
            $data['kategori'] = $this->M_kategori->select_all()->result();
            $data['produk'] = $this->M_produk->select_by_id_barang($id_barang)->row();

            $this->templatepenjual->display('produk/edit.php', $data);
        } else {

            $files = $_FILES['gambar'];

            $barang=array(
                'nama_barang'=>$this->input->post('nama_barang'),
                'id_kategori'=>$this->input->post('id_kategori'),
                'deskripsi_barang'=>$this->input->post('desk_barang'),
                'harga'=>$this->input->post('harga'),
                'berat'=>$this->input->post('berat'),
                'stok'=>$this->input->post('stok'),
                'id_toko' => $this->input->post('id_toko')
            );

            $this->M_produk->update_barang($barang, $id_barang);

            if ($files['name'][0] !== "") {
                $item = $this->M_produk->select_by_id_barang($id_barang)->result();
                foreach($item as $iteM_foto){
                    if($iteM_foto->foto != null) {
                        $target_file = './uploads/produk/'.$iteM_foto->foto;
                        unlink($target_file);
                    }
                }
           
                $this->M_foto->delete_foto($id_barang);

                foreach ($files['name'] as $key => $value) {
                    $extension = pathinfo($value, PATHINFO_EXTENSION);
                    $file_name = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10) . '.' . $extension;
                    move_uploaded_file($files['tmp_name'][$key], './uploads/produk/' . $file_name);

                    $this->M_foto->insert_foto($file_name, $id_barang);
                }
            }

            $this->session->set_flashdata('success',"<div class='alert alert-success'>Produk berhasil diperbarui!</div>");

            return redirect('produk/list_produk');
        }
    }

    public function delete_produk($id_barang)
    {
        $cek_barang = $this->M_transaksi->cek_barang($id_barang);

        if($cek_barang->num_rows() == 1){
            $data = array('stok' => 0);

            $this->M_produk->update_barang($data, $id_barang);

            $this->session->set_flashdata('hapusbarang', '<div class="alert alert-danger" role="alert">Produk tidak dihapus, hanya stoknya saja dikosongkan karena produk sudah masuk diriwayat transaksi!</div>');
        } else {
            $foto = $this->M_produk->select_by_id_barang($id_barang)->result();
            foreach ($foto as $img) {
                $gambar[]=$img->foto;
            }

            $this->M_produk->delete_barang($id_barang, $gambar);

            $this->session->set_flashdata('hapusbarang', '<div class="alert alert-success" role="alert">Produk berhasil dihapus!</div>');
        }

        
        redirect('produk/list_produk');
    }

    public function detail_produk($id_barang)
    {
        
        $data['produk_cover']= $this->M_produk->select_by_id_barang($id_barang)->row();
        $data['produk'] = $this->M_produk->select_by_id_barang($id_barang)->result();
                    

        //membuat rating barang
        $bintang = $this->M_review->select_review_barang($id_barang)->result_array();

        $count = 0;
        foreach ($bintang as $rating) {
            # code...
            $count = $count + $rating['bintang'];
        }

        if($count == null){
            $data['ratings'] = 0.0;
        } else {
          $data['ratings'] = round($count/count($bintang));  
        }
        

        $data['review'] = $this->M_review->select_review_barang($id_barang)->result();

        //echo "<pre>", die(print_r($data['review']));

        $this->template->display('produk/view_detail.php', $data);
    }
}