<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class M_penjual extends CI_Model{
    
    public function __construct()
        {
            parent::__construct();
            
        }
    

    public function select_all(){
        $this->db->select('*');
        $this->db->from('toko');
        $this->db->order_by('id_toko', 'desc');
        
        return $this->db->get();
    }

    public function select_by_id_user($id_user)
    {
        $this->db->select('t.*, b.nama_bank, u.id_user');
        $this->db->from('toko t');
        $this->db->join('user u', 'u.id_user=t.id_user');
        $this->db->join('bank b', 'b.id_bank=t.id_bank', 'left outer');
        $this->db->where('t.id_user', $id_user);
        
        return $this->db->get();
    }

    public function select_by_id_toko($id_toko){
        $this->db->select('t.*, b.nama_bank, u.*');
        $this->db->from('toko t');
        $this->db->join('user u', 'u.id_user=t.id_user');
        $this->db->join('bank b', 'b.id_bank=t.id_bank', 'left outer');
        $this->db->where('t.id_toko', $id_toko);
        
        return $this->db->get();
    }

    public function select_id_toko(){
        $this->db->select('id_toko');
        $this->db->from('toko');
        $this->db->order_by('id_toko', 'desc');
        $this->db->limit(1);

        return $this->db->get();
    }

    public function cek_null($user_id){
        $this->db->select('*');
        $this->db->from('toko');
        $array = array('id_user' => $user_id, 'nama_toko' => NULL, 'alamat_toko' => NULL, 'no_hp' => NULL, 'deskripsi_toko' => NULL, 'id_bank' => NULL, 'pemilik_rek' => NULL, 'no_rek' => NULL, 'rating_toko' => NULL);
        $this->db->where($array);

        return $this->db->get();
    }

    public function cek_id_toko($user_id){
        $this->db->select('id_toko');
        $this->db->from('toko');
        $this->db->where('id_user', $user_id);

        return $this->db->get();
    }

    public function delete_toko($id_toko) {
        $this->db->where('id_toko', $id_toko);
        $this->db->delete('toko');
    }

    public function update_toko($id_toko, $toko){
        $this->db->where('id_toko', $id_toko);
        $this->db->update('toko', $toko);
    }

    public function insert_toko($data){
        $this->db->insert('toko', $data);
    }     
}