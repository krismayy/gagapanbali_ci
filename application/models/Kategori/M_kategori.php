<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * 
	 */
	class M_kategori extends CI_Model{
		
		function __construct()
		{
			parent::__construct();
		}

		function select_all(){
			$this->db->select('*');
			$this->db->from('kategori');
			$this->db->order_by('nama_kategori', 'ASC');

			return $this->db->get();
		}

		public function insert_kategori($data){
			$this->db->insert('kategori', $data);
		}

		public function update_kategori($id_kategori, $data){
			$this->db->where('id_kategori', $id_kategori);
        	$this->db->update('kategori', $data);
		}

		public function delete_kategori($id_kategori){
			$this->db->where('id_kategori', $id_kategori);
        	$this->db->delete('kategori');
		}
	}