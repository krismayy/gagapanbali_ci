<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    

    function __construct()  {
        parent::__construct();
        $this->load->model(array(
            'Produk/M_produk', 'Kategori/M_kategori', 'Penjual/M_penjual', 'Review/M_review'
        ));

        $this->load->helper('url');
        $this->load->library(array('form_validation','templatehome', 'pagination', 'template'));
        
    }
    public function index($offset = 0)
    {
        $perpage = 4;
        $config = array(
            'base_url' => site_url('Home/index'),
            'total_rows' => count($this->M_produk->select_all()->result()),
            'per_page' => $perpage,
        );

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;

        $data['kategori'] = $this->M_kategori->select_all()->result();
        $data['data_src'] = $this->M_produk->select_all($limit)->result();
        
        $this->templatehome->display('home/home.php', $data);
    }

    public function filter_result($offset = 0){
        $filter_input    = $this->input->get('src_input');
        $filter_kategori = $this->input->get('src_kategori');

        $query = [
            'src_kategori' => $filter_kategori,
            'src_input'    => $filter_input
        ];
        
        $baseUrl = 'Home/filter_result?' . http_build_query($query);

        $perpage = 4;
        $config = array(
            'base_url' => site_url($baseUrl),
            'total_rows' => count($this->M_produk->search_allinput(array(), $filter_kategori, $filter_input)->result()),
            'per_page' => $perpage,
            'page_query_string' => true,
        );

        $config['full_tag_open'] = '<ul class="pagination pagging-custom">';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $this->input->get('per_page') ?: 0;

        $data['kategori'] = $this->M_kategori->select_all()->result();
        $data['data_src'] = $this->M_produk->search_allinput($limit, $filter_kategori, $filter_input)->result();

        $this->templatehome->display('home/filter_result.php', $data);         
    }

    public function detail_produk($id_barang)
    {
        
        $data['produk_cover']= $this->M_produk->select_by_id_barang($id_barang)->row();
        $data['produk'] = $this->M_produk->select_by_id_barang($id_barang)->result();
                    

        //membuat rating barang
        $bintang = $this->M_review->select_review_barang($id_barang)->result_array();

        $count = 0;
        foreach ($bintang as $rating) {
            # code...
            $count = $count + $rating['bintang'];
        }

        if($count == null){
            $data['ratings'] = 0.0;
        } else {
          $data['ratings'] = round($count/count($bintang));  
        }
        

        $data['review'] = $this->M_review->select_review_barang($id_barang)->result();

        //echo "<pre>", die(print_r($data['review']));

        $this->template->display('produk/view_detail.php', $data);
    }

    public function detail_toko($id_toko)
    {

        $data['kategori'] = $this->M_kategori->select_all()->result();
        $data['data_toko'] = $this->M_penjual->select_by_id_toko($id_toko)->row();
        $data['data_src'] = $this->M_produk->select_fordetail($id_toko)->result();
        //echo "<pre>", die(print_r($data['data_src']));

        $this->template->display('home/detail_toko.php', $data);
    }
}