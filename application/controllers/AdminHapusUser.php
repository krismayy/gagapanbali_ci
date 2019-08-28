<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHapusUser extends CI_Controller {

    function __construct()  {
        parent::__construct();
        $this->load->model(array(
            'Login/M_login'
        ));

        $this->load->helper('url');
        $this->load->library(array('form_validation','templateadmin')); 

        if(!$this->session->userdata('user')){
            redirect('Admin');
        }

    }
    
    public function index()
    {
        $data['data_user'] = $this->M_login->select_all()->result();
        $this->templateadmin->display('backend/hapus_user/daftar_user.php', $data);
    }

    public function proses_hapus_user($id_user)
    {
        $user = $this->M_login->select_by_id_user($id_user)->row();

        if($user->status == 'Active'){
            $data = array('status' => 'Non Active');
        } else {
            $data = array('status' => 'Active');
        }
        
        $this->M_login->update_user($id_user, $data);

        redirect('AdminHapusUser');
    }
}