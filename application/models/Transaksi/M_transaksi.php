<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class M_transaksi extends CI_Model{
    
    public function __construct()
        {
            parent::__construct();            
        }
    

    function countTransaksi()
    {
      $this->db->select('count(id_transaksi) as jumlah')
               ->from('transaksi');

      return $this->db->get();
    }

    // function sumBarangByBarang($id_toko, $startDate, $endDate)
    // {
    //   $this->db->select('t.id_transaksi, t.tgl_transaksi, td.jumlah, td.id_barang, b.nama_barang, tok.nama_toko, tok.id_toko, sum(td.jumlah) as terjual')
    //            ->from('transaksi t')
    //            ->join('transaksi_detail td', 'td.id_transaksi = t.id_transaksi')
    //            ->join('barang b', 'b.id_barang = td.id_barang')
    //            ->join('toko tok', 'tok.id_toko = b.id_toko')
    //            ->where('tok.id_toko', $id_toko)
    //            ->where('DATE_FORMAT(t.tgl_transaksi, "%Y-%m-%d") >=', $startDate)
    //            ->where('DATE_FORMAT(t.tgl_transaksi, "%Y-%m-%d") <=', $endDate)
    //            ->group_by('td.id_barang');
               
    //   return $this->db->get();
    // }

    function sumBarangByToko($id_user)
    {
      $this->db->select('t.status_bayar, t.id_transaksi, t.tgl_transaksi, td.jumlah, td.id_barang, b.nama_barang, tok.*, sum(td.jumlah) as terjual')
               ->from('transaksi t')
               ->join('transaksi_detail td', 'td.id_transaksi = t.id_transaksi')
               ->join('barang b', 'b.id_barang = td.id_barang')
               ->join('toko tok', 'tok.id_toko = b.id_toko')
               ->join('user u', 'u.id_user = tok.id_user')
               ->where('u.id_user', $id_user)
               ->where('t.status_bayar', 'Sudah Bayar')
               ->group_by('td.id_barang');
               
      return $this->db->get();
    }

    function admin_select_all()
    {
      $this->db->select('*')
               ->from('transaksi t')
               ->join('pembeli p', 'p.id_pembeli = t.id_pembeli')
               ->join('user u', 'u.id_user = p.id_user')
               ->join('transaksi_detail td', 'td.id_transaksi = t.id_transaksi')
               ->join('barang b', 'b.id_barang = td.id_barang')
               ->join('toko tok', 'b.id_toko = tok.id_toko')
               ->join('foto f', 'f.id_barang = b.id_barang')
               ->group_by('t.id_transaksi');

     return $this->db->get();
    }

    function select_all()
    {
      $this->db->select('*')
               ->from('transaksi t')
               ->join('pembeli p', 'p.id_pembeli=t.id_pembeli')
               ->join('user u', 'u.id_user=p.id_user')
               ->join('transaksi_detail td', 'td.id_transaksi=t.id_transaksi')
               ->join('barang b', 'b.id_barang=td.id_barang')
               ->join('toko tok', 'b.id_toko=tok.id_toko')
               ->join('foto f', 'f.id_barang=b.id_barang');

     return $this->db->get();
    }

    function admin_select_transaksi_selesai()
    {
      $this->db->select('*')
               ->from('transaksi t')
               ->join('pembeli p', 'p.id_pembeli=t.id_pembeli')
               ->join('user u', 'u.id_user=p.id_user')
               ->join('transaksi_detail td', 'td.id_transaksi=t.id_transaksi')
               ->join('barang b', 'b.id_barang=td.id_barang')
               ->join('toko tok', 'b.id_toko=tok.id_toko')
               ->join('foto f', 'f.id_barang=b.id_barang')
               ->where('t.status_bayar', 'Sudah Bayar')
               ->group_by('t.id_transaksi');

     return $this->db->get();
    }

    function admin_select_verifikasi()
    {
      $this->db->select('*')
               ->from('transaksi t')
               ->join('pembeli p', 'p.id_pembeli=t.id_pembeli')
               ->join('user u', 'u.id_user=p.id_user')
               ->join('transaksi_detail td', 'td.id_transaksi=t.id_transaksi')
               ->join('barang b', 'b.id_barang=td.id_barang')
               ->join('toko tok', 'b.id_toko=tok.id_toko')
               ->join('foto f', 'f.id_barang=b.id_barang')
               ->where('t.status_bayar', 'Sudah Upload Bukti')
               ->group_by('t.id_transaksi');

     return $this->db->get();
    }

    function select_data($id_transaksi)
    {
      $this->db->select('*')
               ->from('transaksi t')
               ->join('bank ba', 'ba.id_bank = t.id_bank', 'left outer')
               ->join('pembeli p', 'p.id_pembeli=t.id_pembeli')
               ->join('user u', 'u.id_user=p.id_user')
               ->join('transaksi_detail td', 'td.id_transaksi=t.id_transaksi')
               ->join('barang b', 'b.id_barang=td.id_barang')
               ->join('toko tok', 'b.id_toko=tok.id_toko')
               ->join('foto f', 'f.id_barang=b.id_barang')
               ->where('t.id_transaksi', $id_transaksi);


     return $this->db->get();
    }

    function select_data_detail($id_transaksi, $id_toko)
    {
      $this->db->select('*')
               ->from('transaksi t')
               ->join('bank ba', 'ba.id_bank = t.id_bank', 'left outer')
               ->join('pembeli p', 'p.id_pembeli=t.id_pembeli')
               ->join('user u', 'u.id_user=p.id_user')
               ->join('transaksi_detail td', 'td.id_transaksi=t.id_transaksi')
               ->join('barang b', 'b.id_barang=td.id_barang')
               ->join('toko tok', 'b.id_toko=tok.id_toko')
               ->join('foto f', 'f.id_barang=b.id_barang')
               ->where('t.id_transaksi', $id_transaksi)
               ->where('tok.id_toko', $id_toko);


     return $this->db->get();
    }

    function select_transaksi($id_transaksi)
    {
      $this->db->select('*')
               ->from('transaksi t')
               ->join('pembeli p', 'p.id_pembeli=t.id_pembeli')
               ->join('user u', 'u.id_user=p.id_user')
               ->where('t.id_transaksi', $id_transaksi);

     return $this->db->get();
    }

    function select_data_user($id_transaksi)
    {
      $this->db->select('*')
               ->from('transaksi t')
               ->join('bank ba', 'ba.id_bank = t.id_bank')
               ->join('pembeli p', 'p.id_pembeli=t.id_pembeli')
               ->join('user u', 'u.id_user=p.id_user')
               ->join('transaksi_detail td', 'td.id_transaksi=t.id_transaksi')
               ->join('barang b', 'b.id_barang=td.id_barang')
               ->join('foto f', 'f.id_barang=b.id_barang')
               ->where('t.id_transaksi', $id_transaksi);


     return $this->db->get();
    }

    function cek_barang($id_barang)
    {
      $this->db->select('*')
               ->from('transaksi_detail')
               ->where('id_barang', $id_barang);

      return $this->db->get();
    }

    function select_transaksi_barang($id_transaksi, $id_barang)
    {
      $this->db->select('*')
               ->from('transaksi_detail td')
               ->join('transaksi t', 'td.id_transaksi=t.id_transaksi')
               ->join('pembeli p', 'p.id_pembeli=t.id_pembeli')
               ->join('user u', 'u.id_user=p.id_user')
               ->join('barang b', 'b.id_barang=td.id_barang')
               ->join('toko tok', 'b.id_toko=tok.id_toko')
               ->join('foto f', 'f.id_barang=b.id_barang')
               ->where('td.id_transaksi', $id_transaksi)
               ->where('td.id_barang', $id_barang);

      return $this->db->get();
    }

    function select_transaksi_detail($id_transaksi)
    {
      $this->db->select('*')
               ->from('transaksi_detail td')
               ->join('transaksi t', 'td.id_transaksi=t.id_transaksi')
               ->join('pembeli p', 'p.id_pembeli=t.id_pembeli')
               ->join('user u', 'u.id_user=p.id_user')
               ->join('barang b', 'b.id_barang=td.id_barang')
               ->join('toko tok', 'b.id_toko=tok.id_toko')
               ->join('foto f', 'f.id_barang=b.id_barang')
               ->where('td.id_transaksi', $id_transaksi);

      return $this->db->get();
    }

    function select_transaksi_selesai($id_user)
    {
      $this->db->select('*');
      $this->db->from('transaksi t');
      $this->db->join('pembeli p', 'p.id_pembeli=t.id_pembeli');
      $this->db->join('user u', 'u.id_user=p.id_user');
      $this->db->join('transaksi_detail td', 'td.id_transaksi=t.id_transaksi');
      $this->db->join('barang b', 'b.id_barang=td.id_barang');
      $this->db->join('toko tok', 'b.id_toko=tok.id_toko');
      $this->db->join('foto f', 'f.id_barang=b.id_barang');
      $array = array('tok.id_user' => $id_user, 't.status_bayar' => 'Sudah Bayar');
      $this->db->where($array);
      $this->db->group_by('t.id_transaksi');
      $this->db->order_by('t.tgl_transaksi', 'asc');


     return $this->db->get();
    }


    function transaksi_terakhir($id_pembeli)
    {
      $this->db->distinct()
               ->from('transaksi')
               ->where('id_pembeli', $id_pembeli)
               ->order_by('tgl_transaksi', 'DESC')
               ->limit(1);

      return $this->db->get();
    }

    function select_transaksi_user($id_pembeli, $id_transaksi)
    {
      $this->db->select('*');
      $this->db->from('transaksi t');
      $this->db->join('pembeli p', 'p.id_pembeli=t.id_pembeli');
      $this->db->join('user u', 'u.id_user=p.id_user');
      $this->db->join('transaksi_detail td', 'td.id_transaksi=t.id_transaksi');
      $this->db->join('barang b', 'b.id_barang=td.id_barang');
      $this->db->join('foto f', 'f.id_barang=b.id_barang');
      $array = array('t.id_pembeli' => $id_pembeli, 't.id_transaksi' => $id_transaksi);
      $this->db->where($array);

     return $this->db->get();
    }

    function select_transaksi_usergroup($id_pembeli, $id_transaksi)
    {
      $this->db->select('*');
      $this->db->from('transaksi t');
      $this->db->join('pembeli p', 'p.id_pembeli=t.id_pembeli');
      $this->db->join('user u', 'u.id_user=p.id_user');
      $this->db->join('transaksi_detail td', 'td.id_transaksi=t.id_transaksi');
      $this->db->join('barang b', 'b.id_barang=td.id_barang');
      $this->db->join('foto f', 'f.id_barang=b.id_barang');
      $array = array('t.id_pembeli' => $id_pembeli, 't.id_transaksi' => $id_transaksi);
      $this->db->where($array);
      $this->db->group_by('p.id_pembeli');

     return $this->db->get();
    }

    function select_penjualan_toko($id_toko)
     {
      $this->db->select('*')
               ->from('transaksi_detail td')
               ->join('transaksi t', 't.id_transaksi=td.id_transaksi')
               ->join('barang b', 'b.id_barang=td.id_barang')
               ->join('toko tok', 'tok.id_toko=b.id_toko')
               ->join('user u', 'tok.id_user=u.id_user')
               ->where('b.id_toko', $id_toko)
               ->order_by('t.tgl_transaksi');

        return $this->db->get();
    }

    function select_pesanan_belumbayar($id_pembeli)
    {
      $this->db->select('*')
               ->from('transaksi t')
               ->join('transaksi_detail td', 't.id_transaksi=td.id_transaksi')
               ->join('barang b', 'b.id_barang=td.id_barang')
               ->join('foto f', 'f.id_barang=b.id_barang')
               ->join('toko tok', 'tok.id_toko=b.id_toko')
               ->join('user u', 'tok.id_user=u.id_user')
               ->where('t.id_pembeli',$id_pembeli)
               ->group_start()
                 ->where('t.status_barang','Belum Dikirim')
                 ->or_where('t.status_bayar', 'Bukti Invalid')
               ->group_end()
               ->order_by('t.id_transaksi', 'DESC');

        return $this->db->get();
    }
    
    function getTanggalTransaksi()
    {
      $this->db->select('DATE_ADD(tgl_transaksi,INTERVAL 10 DAY) as tgl_transaksi, id_transaksi')
               ->from('transaksi t')
               ->where('t.status_barang','Sudah Dikirim');
             

        return $this->db->get();
    }

    function select_pesanan_verifikasi($id_pembeli)
    {
      $this->db->select('*');
      $this->db->from('transaksi t');
      $this->db->join('transaksi_detail td', 't.id_transaksi=td.id_transaksi');
      $this->db->join('barang b', 'b.id_barang=td.id_barang');
      $this->db->join('foto f', 'f.id_barang=b.id_barang');
      $this->db->join('toko tok', 'tok.id_toko=b.id_toko');
      $this->db->join('user u', 'tok.id_user=u.id_user');
              $array = array('t.id_pembeli' => $id_pembeli, 't.status_bayar' =>'Sudah Upload Bukti');
      $this->db->where($array);
      $this->db->order_by('t.tgl_bayar', 'DESC');

        return $this->db->get();
    }


    function select_pesanan_dikemas($id_pembeli)
    {
      $this->db->select('*');
      $this->db->from('transaksi t');
      $this->db->join('transaksi_detail td', 't.id_transaksi=td.id_transaksi');
      $this->db->join('barang b', 'b.id_barang=td.id_barang');
      $this->db->join('foto f', 'f.id_barang=b.id_barang');
      $this->db->join('toko tok', 'tok.id_toko=b.id_toko');
      $this->db->join('user u', 'tok.id_user=u.id_user');
              $array = array('t.id_pembeli' => $id_pembeli, 't.status_barang' => 'Dikemas');
      $this->db->where($array);
      $this->db->order_by('t.id_transaksi', 'DESC');

        return $this->db->get();
    }

    function select_pesanan_dikirim($id_pembeli)
    {
      $this->db->select('*');
      $this->db->from('transaksi t');
      $this->db->join('transaksi_detail td', 't.id_transaksi=td.id_transaksi');
      $this->db->join('barang b', 'b.id_barang=td.id_barang');
      $this->db->join('foto f', 'f.id_barang=b.id_barang');
      $this->db->join('toko tok', 'tok.id_toko=b.id_toko');
      $this->db->join('user u', 'tok.id_user=u.id_user');
              $array = array('t.id_pembeli' => $id_pembeli, 't.status_barang' => 'Sudah Dikirim');
      $this->db->where($array);
      $this->db->order_by('t.id_transaksi', 'DESC');

        return $this->db->get();
    }

    function select_pesanan_selesai($id_pembeli)
    {
      $this->db->select('*');
      $this->db->from('transaksi t');
      $this->db->join('transaksi_detail td', 't.id_transaksi=td.id_transaksi');
      $this->db->join('barang b', 'b.id_barang=td.id_barang');
      $this->db->join('foto f', 'f.id_barang=b.id_barang');
      $this->db->join('toko tok', 'tok.id_toko=b.id_toko');
      $this->db->join('user u', 'tok.id_user=u.id_user');
              $array = array('t.id_pembeli' => $id_pembeli, 't.status_barang' => 'Sudah Diterima');
      $this->db->where($array);
      $this->db->order_by('t.id_transaksi', 'DESC');

        return $this->db->get();
    }

    function select_pesanan_byDate($startDate, $endDate)
    {
      $this->db->select('*')
               ->from('transaksi t')
               ->join('transaksi_detail td', 'td.id_transaksi=t.id_transaksi')
               ->join('barang b', 'b.id_barang=td.id_barang')
               ->join('foto f', 'f.id_barang=b.id_barang')
               ->join('toko tok', 'tok.id_toko=b.id_toko')
               ->join('user u', 'tok.id_user=u.id_user')
               ->where('u.id_user', $this->session->userdata('user')['id_user'])
               ->where('t.status_bayar', 'Sudah Bayar')
               ->where('DATE_FORMAT(t.tgl_transaksi, "%Y-%m-%d") >=', $startDate)
               ->where('DATE_FORMAT(t.tgl_transaksi, "%Y-%m-%d") <=', $endDate)
               ->group_by('t.id_transaksi')
               ->order_by('t.tgl_transaksi', 'asc');

        return $this->db->get();
    }

    public function insert_transaksi($data)
    {
      $this->db->insert('transaksi', $data);
      $id = $this->db->insert_id();
      return (isset($id)) ? $id : FALSE;
    }
    
    public function insert_transaksidetail($data)
    {
      $this->db->insert('transaksi_detail', $data);
    }

    function update_transaksi($id_transaksi, $transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $transaksi);
    }

    function buat_id()   
    {    
        $this->db->select('RIGHT(transaksi.id_transaksi,4) as nourut', FALSE);
        $this->db->order_by('id_transaksi','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('transaksi');      //cek dulu apakah ada sudah ada kode di tabel.    
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
      $kodejadi = 'TR'.$newDate.$kodemax;    
      return $kodejadi;  
     }
}