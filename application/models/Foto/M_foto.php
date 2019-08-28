<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * 
	 */
	class M_foto extends CI_Model{
		
		function __construct()
		{
			parent::__construct();
		}

		function insert_foto($nama_foto, $id_barang){

        $this->db->insert('foto', [
            'foto' => $nama_foto,
            'id_barang' => $id_barang
        ]);
        
	    }

	    public function delete_foto($id_barang){
	        $this->db->where('id_barang', $id_barang);
	        $this->db->delete('foto');
	    }


	}