<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class M_pembeli extends CI_Model{
    
    public function __construct()
        {
            parent::__construct();
            
        }
    

    function select_all(){
        $this->db->select('*');
        $this->db->from('pembeli');
        $this->db->join('user', 'pembeli.id_user = user.id_user');
        $this->db->order_by('id_pembeli', 'desc');
        
        return $this->db->get();
    }

    function select_id_pembeli(){
        $this->db->select('id_pembeli');
        $this->db->from('pembeli');
        $this->db->order_by('id_pembeli', 'desc');
        $this->db->limit(1);

        return $this->db->get();
    }


    function select_by_id_user($id_user)
    {
        $this->db->select('*');
        $this->db->from('pembeli p');
        $this->db->join('user u', 'u.id_user=p.id_user');
        $this->db->where('p.id_user', $id_user);
        
        return $this->db->get();
    }

    function select_by_id_pembeli($id_pembeli)
    {
        $this->db->select('*');
        $this->db->from('pembeli p');
        $this->db->join('user u', 'u.id_user=p.id_user');
        $this->db->where('p.id_pembeli', $id_pembeli);
        
        return $this->db->get();
    }

    public function update_pembeli($id_pembeli, $data)
    {
       $this->db->where('id_pembeli', $id_pembeli);
       $this->db->update('pembeli', $data);
    }

    function update_user($id_user, $user){
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $user);
    }

    function ubah_alamat($id_pembeli, $data){
        $this->db->where('id_pembeli', $id_pembeli);
        $this->db->update('pembeli', $data);
    }
     
}