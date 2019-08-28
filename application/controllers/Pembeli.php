<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli extends CI_Controller {

    public $user_id;

    function __construct()  {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(array('form_validation','templatepembeli'));
        $this->load->model(array(
            'Pembeli/M_pembeli'
        )); 

        if(!$this->session->userdata('user')['email']){
            redirect('login');
        }
        
        $this->user_id = $this->session->userdata('user')['id_user'];
        
    }

    public function index()
    {
        $data['informasi_akun'] = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $this->templatepembeli->display('akunsaya/index.php', $data);     
    }

    public function edit_informasi_akun()
    {
        $data['informasi_akun'] = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $this->templatepembeli->display('akunsaya/edit.php', $data);
    }

    public function proses_edit_akun()
    {
        $user=array(
            'nama'    =>$this->input->post('nama'),
            'email'   =>$this->input->post('email'),
            'status'    =>$this->input->post('status'),
            'id_user' => $this->input->post('id_user')
        );

        $password = $this->input->post('password');

        if($password !== ""){
            $user['password'] = $password;
        }

        //setting konfiguras upload image
        $config['upload_path']     = './uploads/fotoakun/';
        $config['allowed_types']   = 'gif|jpg|png';
        $config['max_size']        = '1000';
        $config['max_width']       = '2000';
        $config['max_height']      = '1024';
        $config['file_name']       = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);

        $this->load->library('upload', $config);
        
        if ($_FILES['foto_akun']['name'] !== "") {

            if($this->upload->do_upload('foto_akun')){

                $item = $this->M_pembeli->select_by_id_user($this->user_id)->row();
                if($item->foto_akun != null) {
                    $target_file = './uploads/fotoakun/'.$item->foto_akun;
                    unlink($target_file);
                }

                $foto_akun = $this->upload->file_name;
                $user['foto_akun'] = $foto_akun;
            }else{
                $this->session->set_flashdata('notifikasi_error', $this->upload->display_errors());
                $this->edit_informasi_akun();
                return;
            }
        } else {
            $foto_akun = null;
        }


        $this->M_pembeli->update_user($user['id_user'], $user);

        $data=array(
            'alamat'=>$this->input->post('alamat'),
            'no_hp_pembeli'=>$this->input->post('no_hp_pembeli'),
            'id_pembeli'=>$this->input->post('id_pembeli')
        );

        $this->M_pembeli->update_pembeli($data['id_pembeli'],$data);

        $this->session->set_flashdata('success', "<div class='alert alert-success'><i class='fa fa-fw fa-check-circle'></i> Data diri berhasil diperbaharui!</div>");

        redirect('pembeli');
    }

    public function ubah_alamat(){
        $data=array(
            'alamat'=>$this->input->post('alamat'),
            'no_hp_pembeli'=>$this->input->post('no_hp_pembeli'),
            'id_pembeli'=>$this->input->post('id_pembeli'),
            'id_user' =>$this->input->post('id_user'),
        );

        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('kosong', "<div class='alert alert-danger'><i class='fa fa-info-circle'></i> Alamat tidak boleh kosong!</div>");
        } else {
            $this->M_pembeli->ubah_alamat($data['id_pembeli'], $data);

            $this->session->set_flashdata('berhasil', "<div class='alert alert-success'><i class='fa fa-fw fa-check-circle'></i> Alamat berhasil diubah!</div>");
        }
        
        redirect('transaksi/checkout');
    }
}
