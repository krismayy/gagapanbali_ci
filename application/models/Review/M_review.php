<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * 
	 */
	class M_review extends CI_Model{
		
		function __construct()
		{
			parent::__construct();
		}

		function select_review_toko($id_toko){
			$this->db->select('*')
					 ->from('review r')
					 ->join('barang b', 'b.id_barang = r.id_barang')
					 ->join('toko tok', 'tok.id_toko = b.id_toko')
					 ->where('b.id_toko', $id_toko);
					        
        	return $this->db->get();
		}

		function select_review_barang($id_barang){
			$this->db->select('*')
					 ->from('review r')
					 ->join('pembeli p', 'p.id_pembeli = r.id_pembeli')
					 ->join('user u', 'u.id_user = p.id_user')
					 ->join('barang b', 'b.id_barang = r.id_barang')
					 ->join('toko tok', 'tok.id_toko = b.id_toko')
					 ->where('b.id_barang', $id_barang)
					 ->order_by('r.tgl_review', 'DESC');
					        
        	return $this->db->get();
		}

		public function insert_review($data)
	    {
	      $this->db->insert('review', $data);
	    }

		function buat_id()   {    
        $this->db->select('RIGHT(review.id_review,4) as nourut', FALSE);
        $this->db->order_by('id_review','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('review');      //cek dulu apakah ada sudah ada kode di tabel.    
            if($query->num_rows() <> 0){      
                //jika kode ternyata sudah ada.      
                $data = $query->row();      
                $kode = intval($data->nourut) + 1;    
            }
            else{
            //jika kode belum ada      
       			$kode = 1;    
      		}
	      $tanggalFormat = str_replace('-', '', date("Y-m-d"));
	      $newDate = date('Ymd');

	      $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);    
	      $kodejadi = 'REV'.$newDate.$kodemax;    
	      return $kodejadi;  
     	}
	}