<div class="col-md-12 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="row">
            <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="text-center">
                <img class="img-thumbnail" style="width: 200px; height: 200px; margin-bottom: 35px" src="<?php if($data_toko->logo == ""){ echo base_url('uploads/logo/noimg.png');}else{ echo base_url('uploads/logo/'.$data_toko->logo);} ?>">
            </div>
            <div class="table-responsive">
                <table class="table  table-hover" id="dataTables-example">
                    <tr>
                        <td class="col-sm-5">Nama Toko</td>
                        <td style="width: 20px">:</td>
                        <td><?php if(is_null($data_toko->nama_toko)){echo '-';} else{echo $data_toko->nama_toko;} ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Toko</td>
                        <td>:</td>
                        <td><?php if(is_null($data_toko->alamat_toko)){echo '-';} else{ echo $data_toko->alamat_toko;} ?></td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td>:</td>
                        <td><?php if(is_null($data_toko->no_hp)){echo '-';} else{echo $data_toko->no_hp;} ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi Toko</td>
                        <td>:</td>
                        <td><?php if(is_null($data_toko->deskripsi_toko)){echo '-';} else{echo $data_toko->deskripsi_toko;} ?></td>
                    </tr>
                    <tr>
                        <td>Rating Toko</td>
                        <td>:</td>
                        <td><?php if(is_null($data_toko->rating_toko)){echo '-';} else{echo number_format($data_toko->rating_toko,1);} ?>/5.0</td>
                    </tr>
                </table>
            </div>
        </div> <!-- /.col-lg-12 --> 
        </div>     
    </div><!--/product-details-->
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#reviews" data-toggle="tab">Produk</a></li>
            </ul>
        </div>
        
        <div class="tab-content">
            <div class="tab-pane fade active in" id="reviews" >
              <div class="row">   
            <div class="col-sm-12">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"></h2>
                    <?php
                    $id_barang=""; ?>
                    <?php foreach($data_src as $row){ 
                         if($row->id_barang !== $id_barang){
                    ?>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="<?= site_url('home/detail_produk/'.$row->id_barang); ?>"><img src="<?= base_url('uploads/produk/'.$row->foto);?>" height="300px" width="300px"/></a>
                                    <p style="position: absolute; margin-top: -120%; margin-left: 79%; background: #FE980F; padding: 5px; width: 55px"><i class="fa fa-star"></i><br><?= number_format($row->rating_toko,1);?>/5.0 </p>
                                    <h2><?= "Rp ".number_format($row->harga,0,",",".");?></h2>
                                    <?php
                                        $jumlah_char = strlen($row->nama_barang);
                                        if($jumlah_char > 25){
                                          $num_char = 25;
                                          $text = $row->nama_barang;

                                          $cut_text = substr($text, 0, $num_char);
                                    ?>
                                      <a href="<?= site_url('home/detail_produk/'.$row->id_barang.'/'); ?>"><p><?= strtoupper($cut_text).'...';?></p></a>
                                    <?php } else { ?>
                                      <a href="<?= site_url('home/detail_produk/'.$row->id_barang); ?>"><p><?= strtoupper($row->nama_barang);?></p></a>
                                    <?php } ?>

                                    <?php
                                        $jumlah_char = strlen($row->nama_toko);
                                        if($jumlah_char > 25){
                                          $num_char = 25;
                                          $text = $row->nama_toko;

                                          $cut_text = substr($text, 0, $num_char);
                                      ?>
                                        <a style="color: #FE980F" href="<?= site_url('home/detail_toko/'.$row->id_toko.'/'); ?>"><p><?= strtoupper($cut_text).'...';?></p></a>
                                    <?php } else { ?>
                                      <a style="color: #FE980F" href="<?= site_url('home/detail_toko/'.$row->id_toko); ?>"><p><?= strtoupper($row->nama_toko);?></p></a>
                                    <?php } ?>
                                    
                                    <a href="<?= site_url('transaksi/add_to_cart/'.$row->id_barang);?>" class="btn btn-default add-to-cart mar"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    <a class="btn btn-success" href="<?= site_url('transaksi/langsung_beli/'.$row->id_barang); ?>">Checkout</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                         $id_barang = $row->id_barang;
                    }} ?>
                </div><!--makanan-->
                <div style="display: block; text-align: center;">
                  <?= $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>  
            </div>          
        </div>
    </div><!--/category-tab-->
    
</div>