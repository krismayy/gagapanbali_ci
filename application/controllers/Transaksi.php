<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public $user_id;

    function __construct()  {
        parent::__construct();
        $this->load->model(array(
            'Produk/M_produk', 'Pembeli/M_pembeli', 'Transaksi/M_transaksi', 'Bank/M_bank', 'Penjual/M_penjual'
        ));

        $this->load->helper('url');
        $this->load->library(array('form_validation','template','custommailer','custommessage')); 

        if(!$this->session->userdata('user')){
            redirect('login');
        }

        $this->user_id = $this->session->userdata('user')['id_user'];
    }
    
    public function tampil_cart()
    {
        $this->template->display('keranjang/tampil_cart.php');
    }

    public function langsung_beli($id_barang)
    {
        $this->load->library('cart');
        $produk = $this->M_produk->select_by_id_barang($id_barang)->row();

        $data = array(
            'id'        => $id_barang,
            'qty'       => 1,
            'price'     => $produk->harga,
            'name'      => $produk->nama_barang,
            'gambar'    => $produk->foto,
            'toko'      => $produk->nama_toko
        );


        $this->cart->insert($data);   
        redirect('transaksi/tampil_cart');
    }
    
    public function checkout()
    {
        $data['identitas'] = $this->M_pembeli->select_by_id_user($this->user_id)->row();

        $this->template->display('keranjang/checkout.php', $data);
    }

    public function checkout_success()
    {
        $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $transaksi = $this->M_transaksi->transaksi_terakhir($pembeli->id_pembeli)->row();
        $data['transaksi'] = $this->M_transaksi->select_transaksi_user($pembeli->id_pembeli, $transaksi->id_transaksi)->result();

        //echo '<pre>', die(print_r($data['transaksi']));

        $this->template->display('keranjang/checkout_success.php', $data);
    }

    public function konfirmasi_pembayaran($id_transaksi){
        $data['bank'] = $this->M_bank->select_all()->result();
        $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        
        $data['transaksi'] = $this->M_transaksi->select_transaksi_user($pembeli->id_pembeli, $id_transaksi)->row();

        // echo '<pre>', die(print_r($data['transaksi']));


        $this->template->display('konfirmasi/konfirmasi_pembayaran.php', $data);
    }

    public function proses_konfirmasi()
    {
        $staba = 'Sudah Upload Bukti';
        $starang = 'Belum Dikirim';

        $konfirmasi=array(
            'id_transaksi'=>$this->input->post('id_transaksi'),
            'id_pembeli'=>$this->input->post('id_pembeli'),
            'tgl_transaksi'=>$this->input->post('tgl_transaksi'),
            'total_harga'=> $this->input->post('total_harga'),
            'id_bank' => $this->input->post('bank'),
            'nama_pemilik_rek' => $this->input->post('nama_pemilik_rek'),
            'no_rekening' => $this->input->post('no_rekening'),
            'tgl_bayar' => $this->input->post('tgl_bayar'),
            'status_bayar' => $staba,
            'status_barang' => $starang
        );

        //setting konfiguras upload image
        $config['upload_path']     = './uploads/buktipembayaran/';
        $config['allowed_types']   = 'jpeg|jpg|png';
        $config['max_height']      = '1000';
        $config['max_width']       = '2000';
        $config['max_size']        = '1024';
        $config['file_name']       = 'bukti-'.date('ymd').'-'.substr(md5(rand()),0,10);

        $this->load->library('upload', $config);

        if ($_FILES['bukti_pembayaran']['name'] !== "") { //if gambarnya tidak kosong maka

            if($this->upload->do_upload('bukti_pembayaran')){ //if dilakukan upload

                $item = $this->M_transaksi->select_transaksi_user($this->user_id, $konfirmasi['id_transaksi'])->row();
                if($item['bukti_pembayaran'] !== null) {
                    $target_file = './uploads/buktipembayaran/'.$item->bukti_pembayaran;
                    unlink($target_file);
                }

                $bukti_pembayaran = $this->upload->file_name;
                $konfirmasi['bukti_pembayaran'] = $bukti_pembayaran;
            }else{
                $this->form_validation->set_message('validate_image',$this->upload->display_errors());

                redirect(site_url('transaksi/konfirmasi_pembayaran/'.$konfirmasi['id_transaksi']));
            }
        }


        if($konfirmasi['id_bank'] == null | $konfirmasi['no_rekening'] == null | $konfirmasi['nama_pemilik_rek'] == null){
            $this->session->set_flashdata('kosong', '<div class="alert alert-danger" role="alert"><li class="fa fa-info-circle"></li> Mohon jangan ada data yang kosong!</div>');

            redirect(site_url('transaksi/konfirmasi_pembayaran/'.$konfirmasi['id_transaksi']));
        }
        


        $this->M_transaksi->update_transaksi($konfirmasi['id_transaksi'], $konfirmasi);
        
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Bukti Pembayaran Berhasil Diupload</div>');


            redirect('pesanan/menunggu_verifikasi');
    }       
    

    public function add_to_cart($id_barang)
    {
        $this->load->library('cart');
        $produk = $this->M_produk->select_by_id_barang($id_barang)->row();
        $data = array(
            'id'        => $id_barang,
            'qty'       => 1,
            'price'     => $produk->harga,
            'name'      => $produk->nama_barang,
            'gambar'    => $produk->foto,
            'toko'      => $produk->nama_toko
        );

        $this->cart->insert($data);
        redirect('home');
    }

    function hapus($rowid) 
    {
        if ($rowid=="all")
            {
                $this->cart->destroy();
            }
        else
            {
                $data = array('rowid' => $rowid,
                              'qty' =>0);
                $this->cart->update($data);
            }
        redirect('transaksi/tampil_cart');
    }

    function ubah_cart()
    {
        $cart_info = $_POST['cart'];

        foreach( $cart_info as $id => $cart)
        {
            $id = $cart['id'];
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $gambar = $cart['gambar'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];

            $produk = $this->M_produk->select_by_id_barang($id)->row();

            //cek apakah stok mencukupi
            if($qty > $produk->stok){
                $this->session->set_flashdata('stok', '<div class="alert alert-danger" role="alert"><li class="fa fa-info-circle"></li> Maaf, stok tidak mencukupi!</div>');
            } else {
                $data = array('rowid' => $rowid,
                            'price' => $price,
                            'gambar' => $gambar,
                            'amount' => $amount,
                            'qty' => $qty);
                $this->cart->update($data);
            }
        }

        
        redirect('transaksi/tampil_cart');
    }

    public function proses_order($id_pembeli)
    {
        $staba = 'Belum Bayar';
        $starang = 'Belum Dikirim';

        $data = $this->M_pembeli->select_by_id_pembeli($id_pembeli)->row();

        //insert ke table transaksi
        $id_transaksi = $this->M_transaksi->buat_id();
        $kode_unik = rand(0,200);

        $data_transaksi = array('id_transaksi' => $id_transaksi,
                            'total_harga' =>  $this->cart->total(),
                            'status_bayar' => $staba,
                            'status_barang' => $starang,
                            'kode_unik' => $kode_unik,
                            'id_pembeli' => $id_pembeli);

        $this->M_transaksi->insert_transaksi($data_transaksi);

        $transaksi = $this->M_transaksi->select_transaksi($id_transaksi)->row();
        
        //insert ke table transaksi_detail
        if ($cart = $this->cart->contents())
            {
                foreach ($cart as $item)
                    {
                        $data_detail = array('id_transaksi' =>$id_transaksi,
                                        'id_barang' => $item['id'],
                                        'jumlah' => $item['qty']);

                        $proses = $this->M_transaksi->insert_transaksidetail($data_detail);
                    }
            }

        // --------------- kirim sms ------------------------
        $this->custommessage->sendmsg($data->no_hp_pembeli, 'Pesanan Anda dengan kode transaksi '.$data_transaksi['id_transaksi'].' sudah berhasil dilakukan pada '.date('d F Y H:i', strtotime($transaksi->tgl_transaksi)).'. Mohon lakukan pembayaran sejumlah Rp '.number_format($data_transaksi['total_harga'], 0,",",".").' + Rp '.number_format($data_transaksi['kode_unik'], 0,",",".").' = Rp '.number_format($data_transaksi['kode_unik']+$data_transaksi['total_harga'], 0,",",".").' ke No.Rek:12345678 BNI a.n Gagapan Bali.
            ');

        //----------------Kirim email ke pembeli------------------------
        $body = '<p><b>Dear '.$data->nama.'</b>,<br><br>Pesanan Anda dengan kode transaksi '.$data_transaksi['id_transaksi'].' sudah berhasil dilakukan pada <b>'.date('d F Y H:i', strtotime($transaksi->tgl_transaksi)).'</b>. Mohon lakukan pembayaran sejumlah Rp '.number_format($data_transaksi['kode_unik']+$data_transaksi['total_harga'], 0,",",".").' ke No.Rek:12345678 BNI a.n Gagapan Bali.<br><br><b>note: tiga angka dibelakang jumlah bayar merupakan kode unik</b>.</p><br>';
        $body .= '<html>';
        $body .= '<body>';
        $body .= '<table rules="all" style="border : 1px solid #DDD"; cellpadding :"10">';
        $body .= '<thead>';
        $body .= '<tr><th>No</th><th>Item</th><th>Harga</th><th>Qty</th><th>Jumlah</th></tr>';
        $body .= '</thead>';
        $body .= '<tbody>';
        $body .= $this->tablebody();
        $body .= '</tbody>';
        // $body .= '<tfoot>';
        // $body .= $this->tablefoot();
        // $body .= '</tfoot>';
        $body .= '</table>';
        $body .= '</body>';
        $body .= '</html>';
        $body .= '<br><br>Terimakasih.';

        $this->custommailer->send_mail('admin@gagapanbali.com', 'Gagapan Bali', $data->email, 'Transaksi Berhasil Silahkan Konfirmasi Pembayaran', $body);

        //-----------------Hapus shopping cart--------------------------        
        $this->cart->destroy();
        redirect('transaksi/checkout_success');
    }

    function tablebody(){
        $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
        $transaksi = $this->M_transaksi->transaksi_terakhir($pembeli->id_pembeli)->row();
        $datatransaksi = $this->M_transaksi->select_transaksi_user($pembeli->id_pembeli, $transaksi->id_transaksi)->result();

        $i = 1;
        $id_barang = "";

        foreach ($datatransaksi as $item){
            if($item->id_barang !== $id_barang){
        
            $val .= '<tr>';
            $val .= '<td>'. $i++ .'</td>';
            $val .= '<td>'. ucwords($item->nama_barang) .'</td>';
            $val .= '<td>'. number_format($item->harga, 0,",",".") .'</td>';
            $val .= '<td>'. $item->jumlah .'</td>';           
            $val .= '<td>'. number_format($item->harga*$item->jumlah, 0,",",".") .'</td>';
            $val .= '</tr>';
     
            $id_barang = $item->id_barang;
                } 
            };

        return $val;
    }

    // function tablefoot(){
    //     $pembeli = $this->M_pembeli->select_by_id_user($this->user_id)->row();
    //     $transaksi = $this->M_transaksi->transaksi_terakhir($pembeli->id_pembeli)->row();
    //     $datatransaksi = $this->M_transaksi->select_transaksi_usergroup($pembeli->id_pembeli, $transaksi->id_transaksi)->result();
    //     // die(print_r($datatransaksi));

    //     $id_cus = "";
    //     foreach ($datatransaksi as $item){
    //         // if($item->id_pembeli !== $id_cus){
        
    //         $val2 .= '<tr>';
    //         $val2 .= '<td colspan="4" align="right">Total</td>';
    //         $val2 .= '<td align="right"><b>Rp '.number_format($item->total_harga, 0,",",".") .'</b></td>';
    //         $val2 .= '</tr>';
    //         $val2 .= '<tr>';
    //         $val2 .= '<td colspan="4" align="right">Kode Unik</td>';
    //         $val2 .= '<td align="right"><b>Rp '.number_format($item->kode_unik, 0,",",".") .'</b></td>';
    //         $val2 .= '</tr>';
    //         $val2 .= '<tr>';
    //         $val2 .= '<td colspan="4" align="right">Total Bayar</td>';
    //         $val2 .= '<td align="right"><b>Rp '.number_format($item->total_harga+$item->kode_unik, 0,",",".") .'</b></td>';
    //         $val2 .= '</tr>';
     
    //         $id_cus = $item->id_pembeli;
    //             // } 
    //         };

    //     return $val2;
    // }
    public function proses_sudah_diterima($id_transaksi)
    {
        $status = 'Sudah Diterima';
        $data_update = array('status_barang'=>$status);

        $this->M_transaksi->update_transaksi($id_transaksi, $data_update);

        $transaksi = $this->M_transaksi->select_transaksi($id_transaksi)->row();

        // $this->custommailer->send_mail('admin@gagapanbali.com', 'Gagapan Bali', $data->email, 'Transaksi Berhasil Silahkan Konfirmasi Pembayaran', '
        //         <p><b>Dear Seller</b>,
        //         <br><br>Pesanan dengan kode transaksi '.$id_transaksi.' sudah diterima oleh pembeli.
        //         <br><br>Terimakasih.</p>
        //     ');

        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-circle"></i> Pesanan sudah diterima, silahkan berikan review untuk produk yang sudah dibeli. </div>');

        redirect('pesanan/selesai');
    }
}
