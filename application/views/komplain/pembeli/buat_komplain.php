<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Tulis Komplain</h2>

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
                        <div class="tab-pane fade active in" id="reviews" style="margin-bottom: 10px" >
                            <div class="table-responsive " style="word-wrap: break-word;">
                                <table id="example" class="table table-striped second table-hover" style="width:100%; margin-left: 10px; margin-right: 50px;">
                                    <tbody>
                                        <?php
                                        $id_barang = "";
                                        foreach ($detail_produk as $item) {
                                        if ($item->id_barang !== $id_barang) {?>
                                        <tr>
                                            <td colspan="3"><b>Nama Toko : <?= ucwords($item->nama_toko); ?></b></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" colspan="2"><b>Item</b></td>
                                            <td class="text-center"><b>Total Harga</b></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <a href=""><img src="<?php echo base_url() . 'uploads/produk/'.$item->foto; ?>" alt="" height="100px" width="100px"></a>
                                            </td>
                                            <td class="" align="left">
                                                <h4><?php echo ucwords($item->nama_barang); ?></h4>
                                                <p><?php echo 'x'.$item->jumlah;?></p>
                                            </td>
                                            <td class="" align="right">
                                                <h4 class="cart_total_price"><?php echo 'Rp '.number_format($item->harga*$item->jumlah, 0,",",".") ?></h4>
                                            </td>
                                        </tr>
                                        <?php } $id_barang = $item->id_barang; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr class="line-title">
                            <form method="post" action="<?= site_url('Komplain/proses_tambah_komplain'); ?>" >
                                <span>
                                    <input hidden type="text" name="id_transaksi" value="<?= ucwords($item->id_transaksi); ?>"/>
                                    <input hidden type="text" name="id_barang" value="<?= ucwords($item->id_barang); ?>"/>
                                    <input disabled type="text" value="<?= ucwords($item->nama); ?>" />
                                    <input disabled type="email" value="<?= ucwords($item->email); ?>"/>
                                    <input hidden type="email" value="<?= ucwords($item->email); ?>"/>
                                </span>
                                <textarea name="komplain"></textarea>
                                
                                <div align="right">
                                    <button type="submit" class="btn btn-default">Simpan</button>
                                </div>
                            </form>
                            
                        </div>
                        
                    </div>
                </div>
            </section>
    </div><!--features_items-->  
</div> <!-- end col-sm-9 -->