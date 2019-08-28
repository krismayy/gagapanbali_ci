<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class M_produk extends CI_Model{
    
    public function __construct()
        {
            parent::__construct();            
        }
    
    public function select_all($limit=array())
    {
        $this->db->select('*, kategori.nama_kategori');
        $this->db->from('barang');
        $this->db->join('foto', 'foto.id_barang = barang.id_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $this->db->join('toko', 'toko.id_toko =barang.id_toko');
        $this->db->where('stok !=', 0);
        $this->db->group_by('barang.id_barang');

        if ($limit != NULL) {
            # code...
            $this->db->limit($limit['perpage'], $limit['offset']);
        }
        
        return $this->db->get();
    }

    public function select_produk($id_barang)
    {
        $this->db->select('*, kategori.nama_kategori');
        $this->db->from('barang');
        $this->db->join('foto', 'foto.id_barang = barang.id_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $this->db->join('toko', 'toko.id_toko =barang.id_toko');
        $this->db->where('barang.id_barang', $id_barang);
        
        return $this->db->get();
    }

    function select_id_barang(){
        $this->db->select('id_barang');
        $this->db->from('barang');
        $this->db->order_by('id_barang', 'desc');
        $this->db->limit(1);

        return $this->db->get();
    }

    function search_input($limit=array(), $src_input){
        
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('foto', 'foto.id_barang = barang.id_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $this->db->join('toko', 'toko.id_toko =barang.id_toko');
        $this->db->like('barang.nama_barang', $src_input);
        $this->db->where('stok !=', 0);
        $this->db->group_by('barang.id_barang');

        return $this->db->get();
    }

    function search_kategori($limit=array(), $src_kategori){
        
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('foto', 'foto.id_barang = barang.id_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $this->db->join('toko', 'toko.id_toko =barang.id_toko');
        // $array = array('barang.id_kategori'=> $src_kategori, 'barang.stok !=' => 0);
        // $this->db->where($array);
        $this->db->where('barang.id_kategori', $src_kategori);
        $this->db->where('barang.stok !=', 0);
        $this->db->group_by('barang.id_barang');

        return $this->db->get();
    }

    function search_allinput($limit=array(), $src_kategori, $src_input){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('foto', 'foto.id_barang = barang.id_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $this->db->join('toko', 'toko.id_toko =barang.id_toko');

        if ($src_kategori !== "0") {
            $this->db->where('barang.id_kategori', $src_kategori);
        }

        $this->db->where('barang.stok !=', 0);

        if($src_input !== "") {
            $this->db->like('barang.nama_barang', $src_input);
        }

        $this->db->group_by('barang.id_barang');

        if ($limit != NULL) {
            $this->db->limit($limit['perpage'], $limit['offset']);
        }

        return $this->db->get();
    }

    function select_by_id_barang($id_barang){
        $this->db->select('*, kategori.nama_kategori');
        $this->db->from('barang');
        $this->db->join('foto', 'foto.id_barang = barang.id_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $this->db->join('toko', 'toko.id_toko =barang.id_toko');
        $this->db->where('barang.id_barang', $id_barang);

        return $this->db->get();
    }

    function select_by_id_toko($id_toko){
        $this->db->select('barang.*, foto.*');
        $this->db->from('barang');
        $this->db->join('foto', 'foto.id_barang = barang.id_barang');
        $this->db->join('toko', 'toko.id_toko =barang.id_toko');
        $this->db->where('barang.id_toko', $id_toko);

        return $this->db->get();
    }

    function select_fordetail($id_toko){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('foto', 'foto.id_barang = barang.id_barang');
        $this->db->join('toko', 'toko.id_toko =barang.id_toko');
        $this->db->where('barang.id_toko', $id_toko);

        return $this->db->get();
    }

    function insert_barang($barang){

        $this->db->insert('barang', $barang);

        return $this->db->insert_id();
    }

    public function delete_barang($id_barang, $gambar)
    {
        $this->db->where('id_barang', $id_barang);
        foreach ($gambar as $key => $value) {
            unlink("uploads/produk/".$value);
        }
        $this->db->delete('barang');
    }

    public function update_barang($data, $id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang', $data);
    }

    public function update_stok($count, $id_barang, $jumlah)
    {
        for ($i=0; $i < $count; $i++) { 
            $produk = $this->M_produk->select_produk($id_barang[$i])->row();
            $stok_akhir = array('stok' => $produk->stok - $jumlah[$i]);

            $this->db->where('id_barang', $id_barang[$i]);
            $this->db->update('barang', $stok_akhir);
        }
    }


    function buat_id()   {
        $this->db->select('RIGHT(barang.id_barang,6) as kode', FALSE);
        $this->db->order_by('id_barang','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('barang');
             //cek dulu apakah ada sudah ada kode di tabel.    
            if($query->num_rows() <> 0){      //jika kode ternyata sudah ada.  
                $data = $query->row();      
                $kode = intval($data->kode) + 1;    
            }
                else{      
       //jika kode belum ada      
       $kode = 1;    
      }
      $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT);    
      $kodejadi = "PR".$kodemax;    
      return $kodejadi;  
     } 
}