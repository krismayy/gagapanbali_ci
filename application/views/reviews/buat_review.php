<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Tulis Penilaian</h2>
            <section id="do_action">
                <div class="container col-sm-12">
                    <div style="padding-bottom: 10px">
                        <?php
                            $id_barang = "";
                            foreach ($detail_produk as $item) {
                            if ($item->id_barang !== $id_barang) {
                        ?>
                        <a href="<?= site_url('pesanan/'.$uri.'/'.$item->id_transaksi); ?>" class="btn btn-outline-brand" ><i class="fa fa-arrow-left"></i> Back</a>
                        <?php } $id_barang = $item->id_barang; } ?>
                    </div>
                    <div class="tab-content chose_area">
                        <?php
                            $id_barang = "";
                            foreach ($detail_produk as $item) {
                            if ($item->id_barang !== $id_barang) {?>
                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="table-responsive " style="word-wrap: break-word;">
                                <table id="example" class="table table-striped second table-hover" style="width:100%; margin-left: 10px; margin-right: 50px;">
                                    <tbody>
                                        <tr>
                                            <div class="alert alert-warning">
                                              <p>Penilaian diberikan kepada penjual produk yang dibeli</p>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <a href=""><img src="<?php echo base_url() . 'uploads/logo/'.$item->logo; ?>" alt="" height="100px" width="100px"></a>
                                            </td>
                                            <td class="" align="left">
                                                <h4><?php echo ucwords($item->nama_toko); ?></h4>
                                                <p><?php echo $item->alamat_toko;?></p>
                                            </td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <form action="<?= site_url('review/proses_simpan_review'); ?>" method="post">
                                <span>
                                    <input disabled type="text" value="<?= ucwords($item->nama); ?>" />
                                    <input disabled type="email" value="<?= ucwords($item->email); ?>"/>
                                    <input hidden type="text" name="id_toko" value="<?= ucwords($item->id_toko); ?>"/>
                                    <input hidden type="text" name="id_barang" value="<?= ucwords($item->id_barang); ?>"/>
                                    <input hidden type="text" name="id_transaksi" value="<?= ucwords($item->id_transaksi); ?>"/>
                                </span>
                                <textarea name="review"></textarea>
                                <div class="rating">
                                    <input type="radio" name="star" value="5" id="star5"><label for="star5"></label>
                                    <input type="radio" name="star" value="4" id="star4"><label for="star4"></label>
                                    <input type="radio" name="star" value="3" id="star3"><label for="star3"></label>
                                    <input type="radio" name="star" value="2" id="star2"><label for="star2"></label>
                                    <input type="radio" name="star" value="1" id="star1"><label for="star1"></label>
                                </div>
                                <div align="right">
                                    <button type="submit" class="btn btn-default">Simpan</button>
                                </div>
                            </form>
                            
                        </div>
                        <?php } $id_barang = $item->id_barang; } ?>
                    </div>
                </div>
            </section>
    </div><!--features_items-->  
</div> <!-- end col-sm-9 -->