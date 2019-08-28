<section>
    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="margin-bottom: 20px">
          <div class="col-md-12">
            <div class="form-search-wrap mb-3" data-aos="fade-up" data-aos-delay="200">
              <form method="get" action="<?= site_url('Home/filter_result');?>">
                <div class="row align-items-center">
                  <div class="col-lg-5 mb-4 mb-xl-0 col-xl-4" style="margin-top: 17px">
                    <input type="text" class="form-control rounded" name="src_input" placeholder="Mau cari oleh-oleh apa?">
                  </div>
                  <div class="col-lg-5 mb-4 mb-xl-0 col-xl-3" style="margin-top: 17px">
                    <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control rounded" name="src_kategori" id="">
                        <option value="0">Semua Kategori</option>
                        <?php foreach($kategori as $menu){?>
                        <option value="<?= $menu->id_kategori; ?>"><?= $menu->nama_kategori; ?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-2 col-xl-2">
                    <input type="submit" class="btn btn-default" style="margin-top: 16px" value="Pencarian">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">   
            <div class="col-sm-12">
                <?php if($data_src) { ?>
                  <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"></h2>
                    <?php
                    $id_barang=""; ?>
                    <?php foreach($data_src as $row){ 
                        // if($row->id_barang !== $id_barang){
                    ?>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="<?php echo site_url('produk/detail_produk/'.$row->id_barang); ?>"><img src="<?php echo base_url('uploads/produk/'.$row->foto);?>" height="300px" width="300px"/></a>
                                    <p style="position: absolute; margin-top: -120%; margin-left: 79%; background: #FE980F; padding: 5px; width: 55px"><i class="fa fa-star"></i><br><?= number_format($row->rating_toko,1);?>/5.0 </p>
                                    <h2><?php echo "Rp ".number_format($row->harga,0,",",".");?></h2>
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
                                    <a class="btn btn-success" href="<?php echo site_url('transaksi/langsung_beli/'.$row->id_barang); ?>">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        // $id_barang = $row->id_barang;
                    } ?>
                </div><!--makanan-->
                <div style="display: block; text-align: center;">
                  <?= $this->pagination->create_links(); ?>
                </div>
                <?php } else { ?>
                  <p>Data tidak ditemukan</p>
                <?php } ?>
            </div>
        </div>

    </div>
</section>