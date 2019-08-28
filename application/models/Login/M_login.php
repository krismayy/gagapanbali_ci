<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * 
	 */
	class M_login extends CI_Model{
		
		function __construct()
		{
			parent::__construct();
		}

		function countUser()
		{
			$this->db->select('count(id_user) as jumlah')
               ->from('user');

      		return $this->db->get();
		}

		function select_all(){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->order_by('id_user','asc');

			return $this->db->get();
		}

		function cek($email, $password){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('email', $email);
			$this->db->where('password', $password);

			return $this->db->get();
		}

		function select_user(){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->order_by('id_user','DESC');
			$this->db->limit(1);

			return $this->db->get();
		}

		function select_by_email($email){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('email', $email);

			return $this->db->get();
		}

		function select_by_id_user($id_user){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('id_user', $id_user);

			return $this->db->get();
		}

		function update_user($id_user, $data){
			$this->db->where('id_user', $id_user);
        	$this->db->update('user', $data);
		}

		function insert_new_user($user, $datapenj, $data){

			$this->db->trans_start();

			$this->db->insert('user', $user);
			$id_user = $this->db->insert_id();

			//insert into table toko
	        $datapenj['id_user'] = $id_user;
	        $this->db->insert('toko', $datapenj);

	        //insert into table pembeli
	        $data['id_user'] = $id_user;
	        $this->db->insert('pembeli', $data);

	        $this->db->trans_complete();
	        return $user_id = $this->db->insert_id();

	        
		}

		function buat_id_pembeli()   {    
	        $this->db->select('RIGHT(pembeli.id_pembeli,6) as nourut', FALSE);
	        $this->db->order_by('id_pembeli','DESC');    
	        $this->db->limit(1);    
	        $query = $this->db->get('pembeli');      //cek dulu apakah ada sudah ada kode di tabel.    
	            if($query->num_rows() <> 0){      
	                //jika kode ternyata sudah ada.      
	                $data = $query->row();      
	                $kode = intval($data->nourut) + 1;    
	            }
	                else{      
	       	//jika kode belum ada      
	       		$kode = 1;    
	      	}
	      	$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT);    
	      	$kodejadi = 'CUS'.$kodemax;    
	      	return $kodejadi;  
    	}

    	function buat_id_penjual()   {    
	        $this->db->select('RIGHT(toko.id_toko,6) as nourut', FALSE);
	        $this->db->order_by('id_toko','DESC');    
	        $this->db->limit(1);    
	        $query = $this->db->get('toko');      //cek dulu apakah ada sudah ada kode di tabel.    
	            if($query->num_rows() <> 0){      
	                //jika kode ternyata sudah ada.      
	                $data = $query->row();      
	                $kode = intval($data->nourut) + 1;    
	            }
	                else{      
	       	//jika kode belum ada      
	       		$kode = 1;    
	      	}
	      	$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT);    
	      	$kodejadi = 'TOK'.$kodemax;    
	      	return $kodejadi;  
    	}
	}