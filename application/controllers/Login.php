<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()  {
        parent::__construct();
        $this->load->model(array('Login/M_login', 'Pembeli/M_pembeli', 'Penjual/M_penjual'));
        $this->load->helper('url');
        $this->load->library(array('form_validation','template', 'session')); 
    }

    public function index(){

        $this->template->display('login/index.php');
    }

    public function ubah_password(){

        $this->template->display('login/ubah_password.php');
    }    

    public function proses_ubah_password(){

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]', [
                'matches' => 'Password dont match!',
                'min_length' => 'Password too short. Min. 8 character!'
            ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == FALSE){
            $this->template->display('login/ubah_password.php');
        } else {
            $email     = $this->input->post('email');
            $password  = md5($this->input->post('password'));
            $status    = 'Active';

            $data_user = $this->M_login->select_by_email($email)->row();
            $checking  = $this->M_login->select_by_email($email);

            if($checking->num_rows() == 1){
                if($data_user->password !== $password){
                    $data_password = array('nama'     => $data_user->nama,
                                           'email'    => $data_user->email,
                                           'id_user'  => $data_user->id_user,
                                           'foto_akun'=> $data_user->foto_akun,
                                           'password' => $password,
                                           'status'   => $status);

                    $this->M_login->update_user($data_password['id_user'], $data_password);

                    $this->session->set_flashdata('ubahpassword', "<div class='alert alert-success'><i class='fa fa-fw fa-check-circle'></i> Reset Password Berhasil, Silahkan Login!</div>");
                    redirect('login');
                } else {
                    $this->session->set_flashdata('passwordsama', "<div class='alert alert-danger'><i class='fa fa-info-circle'></i> Password Sudah Digunakan!</div>");
                    $this->template->display('login/ubah_password.php');
                } //end checking password
            } else {
                $this->session->set_flashdata('emailsalah', "<div class='alert alert-danger'><i class='fa fa-info-circle'></i> Email Tidak Ditemukan!</div>");
                $this->template->display('login/ubah_password.php');
            } //end checking num_rows()
        } //end validation
    } //end function

    public function proses(){
        
        $action = $this->input->post('action');

        if($action == 'Login') { // check button submit
            $email        = $this->input->post('email');
            $password     = md5($this->input->post('password'));
            $temp_account = $this->M_login->cek($email, $password);
            $data_user    = $this->M_login->select_by_email($email)->row();

            if($temp_account->num_rows() == 1){ /*hasil query efektif 1 row */
                if($data_user->status == 'Active'){
                    $temp_session= $this->session->userdata('shopping_cart_temp');
                    if ($temp_account->row()->id_user == $temp_session['id_user']){
                        foreach ($temp_session['cart'] as $cart_item) {
                            $this->cart->insert($cart_item);
                        }

                        $this->session->unset_userdata('shopping_cart_temp');
                    }

                    $array_items= array('nama'=>$temp_account->row()->nama,
                                        'email'=>$temp_account->row()->email,
                                        'id_user'=>$temp_account->row()->id_user,
                                        'logged_in'=> true);

                    $this->session->set_userdata('user', $array_items);
                    redirect(site_url('home'));
                } else {
                    $this->session->set_flashdata('status',"<div class='alert alert-danger'>Akun Anda Sudah Tidak Aktif!</div>");
                    redirect(site_url('login'));
                }

            } else { /* hasil query efektif <> 1 row */
                $this->session->set_flashdata('notification',"<div class='alert alert-danger'>Email atau Password Salah</div>");
                redirect(site_url('login'));
            } //end hasil kueri   
        }
    
        if($action == 'Register') {

            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
                'is_unique' => 'This email has already registered!'
            ]);

            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]', [
                'matches' => 'Password dont match!',
                'min_length' => 'Password too short. Min. 8 character!'
            ]);

            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

            if ($this->form_validation->run() == FALSE){
                $this->template->display('login/index.php');
            } else {
            $user       = array();
            $data       = array();
            $datapenj   = array();

            $user['nama']     = $this->input->post('nama');
            $user['email']    = $this->input->post('email');
            $user['password'] = md5($this->input->post('password'));
            $user['status']   = 'Active';

            $data['id_pembeli']  = $this->M_login->buat_id_pembeli();
            $datapenj['id_toko'] = $this->M_login->buat_id_penjual();
            
            $this->M_login->insert_new_user($user, $datapenj, $data);
            $new_login = $this->M_login->select_user()->row();

            $array_items = array('nama'  => $new_login->nama,
                                'email'  => $new_login->email,
                                'id_user'=> $new_login->id_user,
                                'status' => $new_login->status,
                                'logged_in'=> true);

            $this->session->set_userdata('user', $array_items);
            $this->session->set_flashdata('notification',"<div class='alert alert-success'>Berhasil registrasi!</div>");
            redirect(site_url('home'));
            }
        }
    }

    function logout(){
        $user         = $this->session->userdata('user');
        $user['cart'] = $this->cart->contents();

        $this->session->unset_userdata('user');
        $this->cart->destroy();

        $this->session->set_userdata('shopping_cart_temp', $user);

        redirect('home');
    }
}
