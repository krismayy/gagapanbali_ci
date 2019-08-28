<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjual extends CI_Controller {

    public $user_id;

    function __construct()  {
        parent::__construct();
        $this->load->model(array(
            'Penjual/M_penjual', 'Login/M_login', 'Bank/M_bank'
        ));
       
        $this->load->helper('url');
        $this->load->library(array('form_validation','templatepenjual'));

        if(!$this->session->userdata('user')){
            redirect('login');
        }

        $this->user_id = $this->session->userdata('user')['id_user'];
    }

    public function index()
    {
        $datanull = $this->M_penjual->cek_null($this->user_id)->row();

        if($datanull !== NULL){
            $this->session->set_flashdata('message',"<div class='alert alert-danger'>Silahkan Lengkapi Profil Toko!</div>");
            redirect('penjual/edit_profil');
        } else {
            $data['data_toko'] = $this->M_penjual->select_by_id_user($this->user_id)->row();
            $this->templatepenjual->display('profiltoko/index.php', $data);
        }
    }

    public function edit_profil()
    {
        $data['data_toko'] = $this->M_penjual->select_by_id_user($this->user_id)->row();
        $data['nama_bank'] = $this->M_bank->select_all()->result();

        $this->templatepenjual->display('profiltoko/edit.php', $data);
    }

    public function proses_edit_profil()
    {
        $data['nama_toko'] = $this->input->post('nama_toko');
        $data['alamat_toko'] = $this->input->post('alamat_toko');
        $data['no_hp'] = $this->input->post('no_hp');
        $data['no_rek'] = $this->input->post('no_rek');
        if($this->input->post('bank') !== ''){
            $data['id_bank'] = $this->input->post('bank');
        }
        $data['pemilik_rek'] = $this->input->post('nama_pemilik');
        $data['deskripsi_toko'] = $this->input->post('desk_toko');
        $id_toko = $this->input->post('id_toko');
        $id_user = $this->input->post('id_user');

        //setting konfiguras upload image
        $config['upload_path']     = './uploads/logo/';
        $config['allowed_types']   = 'gif|jpg|png';
        $config['max_size']        = '1000';
        $config['max_width']       = '2000';
        $config['max_height']      = '1024';
        $config['file_name']       = 'logo-'.date('ymd').'-'.substr(md5(rand()),0,10);

        $this->load->library('upload', $config);
        
        if ($_FILES['logo']['name'] !== "") {

            if($this->upload->do_upload('logo')){

                $item = $this->M_penjual->select_by_id_user($this->user_id)->row();
                if($item->logo != null) {
                    $target_file = './uploads/logo/'.$item->logo;
                    unlink($target_file);
                }

                $logo = $this->upload->file_name;
                $data['logo'] = $logo;
            }else{
                $this->session->set_flashdata('notifikasi_error', $this->upload->display_errors());
                $this->edit_profil();
                return;
            }
        } else {
            $logo = null;
        }

        $this->M_penjual->update_toko($id_toko, $data);

        $this->session->set_flashdata('message',"<div class='alert alert-success'>Data berhasil diperbarui!</div>");
        redirect(site_url('penjual'));
    }//end proses edit profil
}