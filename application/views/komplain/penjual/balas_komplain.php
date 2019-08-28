<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Detail Komplain</h2>
            <section id="do_action">
                <div class="container col-sm-12">
                    <div style="padding-bottom: 10px">
                        <a href="<?= site_url('komplain/lihat_komplain'); ?>" class="btn btn-outline-brand" ><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="tab-content chose_area">
                        
                        <div class="tab-pane fade active in" id="reviews" style="margin-bottom: 10px" >
                            <div class="table-responsive " style="word-wrap: break-word;">
                                <table id="example" class="table table-striped second table-hover" style="width:100%; margin-left: 10px; margin-right: 50px;">
                                    <tbody>
                                        <?php
                                        $id_barang = "";
                                        foreach ($data_komplain as $item) {
                                        if ($item->id_barang !== $id_barang) {?>
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
                            
                            <?php
                                $id_barang = ""; 
                                foreach($data_komplain as $data){
                                if ($data->id_barang !== $id_barang){
                            ?>
                            <div class="table-responsive " style="word-wrap: break-word;">
                                <hr class="line-title">
                                <table id="example"  style="width:100%; margin-left: 10px; margin-right: 50px;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b>Komplain</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?= date("d F Y, H:i", strtotime($data->tgl_komplain)); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?= $data->komplain; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                            <div class="table-responsive " style="word-wrap: break-word;">
                                <table id="example"  style="width:100%; margin-left: 10px; margin-right: 50px;">
                                    <tbody>
                                        <tr>
                                            <td align="right">
                                                <b>Balasan</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <?php if(is_null($data->tgl_balas)){?>
                                                <td align="right"></td>
                                            <?php }else {?>
                                                <td align="right"><?= date("d F Y, H:i", strtotime($data->tgl_balas)); ?></td>
                                            <?php }?>
                                        </tr>
                                        <tr>
                                            <?php if(is_null($data->balasan)){?>
                                                <td align="right">>>Belum ada balasan<<</td>
                                            <?php }else {?>
                                                <td align="right"><?= $data->balasan; ?></td>
                                            <?php }?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php } $id_barang = $data->id_barang; } ?>

                            <?php if($item->balasan == null){?>
                            <!-- form untuk balas komplain -->
                            <form method="post" action="<?= site_url('Komplain/proses_balas_komplain'); ?>" >
                                <input hidden type="text" name="id_komplain" value="<?= ucwords($item->id_komplain); ?>"/>
                                <textarea name="balasan"></textarea>
                                
                                <div align="right">
                                    <button type="submit" class="btn btn-default">Simpan</button>
                                </div>
                            </form>
                            <?php } ?>                                                    
                        </div>
                        
                    </div>
                </div>
            </section>
    </div><!--features_items-->  
</div> <!-- end col-sm-9 -->