<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        $this->load->view('backend/login/login.php');
    }

    public function proses(){
       
        $email        = $this->input->post('email');
        $password     = md5($this->input->post('password'));
        $temp_account = $this->M_login->cek($email, $password);
        $data_user    = $this->M_login->select_by_email($email)->row();

        if($temp_account->num_rows() == 1){ /*hasil query efektif 1 row */
            if($data_user->status == 'Active'){
                $array_items= array('nama'=>$temp_account->row()->nama,
                                    'email'=>$temp_account->row()->email,
                                    'id_user'=>$temp_account->row()->id_user,
                                    'logged_in'=> true);

                $this->session->set_userdata('user', $array_items);
                redirect(site_url('AdminDashboard'));
            } else {
                $this->session->set_flashdata('status',"<div class='alert alert-danger'>Akun Anda Sudah Tidak Aktif!</div>");
                redirect(site_url('Admin'));
            }

        } else { /* hasil query efektif <> 1 row */
            $this->session->set_flashdata('notification',"<div class='alert alert-danger'>Email atau Password Salah</div>");
            redirect(site_url('Admin'));
        } //end hasil kueri   
    }

    function logout(){
        $this->session->unset_userdata('user');
        
        redirect('Admin');
    }
}