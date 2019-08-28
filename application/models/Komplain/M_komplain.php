<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * 
	 */
	class M_komplain extends CI_Model{
		
		function __construct()
		{
			parent::__construct();
		}

		function select_by_id_pembeli($id_pembeli){
			$this->db->select('*');
			$this->db->from('komplain k');
			$this->db->join('pembeli p', 'p.id_pembeli = k.id_pembeli');
			$this->db->join('user u', 'u.id_user = p.id_user');
			$this->db->join('transaksi t', 't.id_transaksi = k.id_transaksi');
			$this->db->where('k.id_pembeli', $id_pembeli);
			$this->db->order_by('k.tgl_komplain', 'desc');
        
        	return $this->db->get();
		}

		function select_by_id_komplain($id_komplain){
			$this->db->select('*')
					 ->from('komplain k')
					 ->join('transaksi t', 't.id_transaksi = k.id_transaksi')
					 ->join('transaksi_detail td', 'td.id_transaksi = t.id_transaksi')
					 ->join('barang b', 'b.id_barang = k.id_barang')
					 ->join('toko tok', 'tok.id_toko = b.id_toko')
					 ->join('foto f', 'f.id_barang = b.id_barang')
					 ->where('k.id_komplain', $id_komplain);
        
        	return $this->db->get();
		}

		function select_by_id_toko($id_toko){
			$this->db->select('*')
					 ->from('komplain k')
					 ->join('transaksi t', 't.id_transaksi = k.id_transaksi')
					 ->join('transaksi_detail td', 'td.id_transaksi = t.id_transaksi')
					 ->join('barang b', 'b.id_barang = k.id_barang')
					 ->join('toko tok', 'tok.id_toko = b.id_toko')
					 ->join('foto f', 'f.id_barang = b.id_barang')
					 ->where('b.id_toko', $id_toko)
					 ->order_by('k.tgl_komplain', 'desc')
					 ->group_by('k.id_komplain');
        
        	return $this->db->get();
		}

		function update_komplain($id_komplain, $komplain){
	        $this->db->where('id_komplain', $id_komplain);
	        $this->db->update('komplain', $komplain);
    	}

		function buat_id()   {    
        $this->db->select('RIGHT(komplain.id_komplain,4) as nourut', FALSE);
        $this->db->order_by('id_komplain','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('komplain');      //cek dulu apakah ada sudah ada kode di tabel.    
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
	      $kodejadi = 'KOM'.$newDate.$kodemax;    
	      return $kodejadi;  
     	}

     	public function insert_komplain($data)
	    {
	      $this->db->insert('komplain', $data);
	    }
	}