<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * 
	 */
	class M_bank extends CI_Model{
		
		function __construct()
		{
			parent::__construct();
		}

		public function select_all(){
			$this->db->select('*');
			$this->db->from('bank');
			$this->db->order_by('nama_bank', 'ASC');

			return $this->db->get();
		}

		public function insert_bank($data){
			$this->db->insert('bank', $data);
		}

		public function update_bank($id_bank, $data){
			$this->db->where('id_bank', $id_bank);
        	$this->db->update('bank', $data);
		}

		public function delete_bank($id_bank){
			$this->db->where('id_bank', $id_bank);
        	$this->db->delete('bank');
		}


	}