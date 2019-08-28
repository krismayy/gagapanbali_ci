<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Detail Pesanan</h2>
        <section id="do_action">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div style="padding-bottom: 10px">
                            <a href="<?= site_url('pesanan'); ?>" class="btn btn-outline-brand" ><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        
                        <div class="chose_area">
                            <ul><h3>Gagapanbali.com</h3></ul>
                            <?php
                                $id_cus = "";
                                foreach ($transaksi as $item):
                                    if($item->id_pembeli != $id_cus){
                            ?>
                            <ul class="user_info">
                                <li class="single_field">
                                    <label><?php echo ucwords($item->nama); ?> - <?php echo $item->no_hp_pembeli; ?></label>
                                </li>
                                <li class="single_field">
                                    <label><?php echo ucwords($item->alamat); ?></label>
                                </li>
                            </ul>
                            <?php 
                                $id_cus = $item->id_pembeli;
                                } endforeach; 
                            ?>
                            <ul class="user_info">
                                <li class="single_field">
                                <label>Pesanan :</label>
                                </li>
                            </ul>
                                <table class="table table-striped table-hover" style="margin-left: 10px" >
                                <thead>
                                    <tr class="cart_menu">
                                        <th scope="col" class="text-center"> No </th>
                                        <th scope="col" class="image text-center" colspan="2">Item</th>
                                        <th scope="col" class="price text-center"> Harga </th>
                                        <th scope="col" class="quantity text-center"> Qty </th>
                                        <th scope="col" class="total text-center"> Jumlah </th>
                                        <th scope="col" class="total text-center"> Aksi </th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php
                                $i = 1; $id_barang = "";

                                foreach ($transaksi as $item):
                                    if($item->id_barang != $id_barang){
                                ?>
                                <form method="get" action="<?= site_url('komplain/tulis/'.$item->id_barang);?>">
                                    <tr>
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td>
                                            <a href=""><img src="<?php echo base_url() . 'uploads/produk/'.$item->foto; ?>" alt="" height="100px" width="100px"></a>
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href=""></a><?php echo ucwords($item->nama_barang); ?></h4>
                                            <p></p>
                                        </td>
                                        <td class="cart_price text-center">
                                            <p><?php echo number_format($item->harga, 0,",","."); ?></p>
                                        </td>
                                        <td class="cart_quantity text-center">
                                                <p><?php echo $item->jumlah;?></p>
                                        </td>
                                        <td class="cart_total" align="right">
                                            <p class="cart_total_price"><?php echo number_format($item->harga*$item->jumlah, 0,",",".") ?></p>
                                        </td>
                                       
                                        <td class="cart_price text-center">
                                            <input hidden type="text" name="id_barang" value="<?= $item->id_barang;?>">
                                            <input hidden type="text" name="uri_segmen" value="<?= $this->uri->segment(2);?>">
                                            <input hidden type="text" name="id_transaksi" value="<?= $item->id_transaksi;?>">
                                            <button name="action" value="Komplain" type="submit" class="btn btn-danger btn-xs">Komplain</button>
                                        </td>
                                        
                                    </tr>
                                    </form>
                                    <?php
                                    $id_barang = $item->id_barang;
                                        } endforeach; 
                                    ?>
                                </tbody>
                                
                                <tfoot>
                                    <?php
                                        $id_cus = "";
                                        foreach ($transaksi as $item):
                                            if($item->id_pembeli != $id_cus){
                                    ?>
                                    <tr>
                                        <td colspan="5" align="right">Total</td>
                                        <td align="right"><b>Rp <?php echo number_format($item->total_harga, 0,",","."); ?></b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" align="right">Diskon</td>
                                        <td align="right"><b>-</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" align="right">Total Bayar</td>
                                        <td align="right"><b>Rp <?php echo number_format($item->total_harga, 0,",","."); ?></b></td>
                                        <td></td>
                                    </tr>
                                    <?php 
                                        $id_cus = $item->id_pembeli;
                                        } endforeach; 
                                    ?>
                                </tfoot>
                                </table>  
                                <div style="margin-left: 15px">
                                    <a href="<?= site_url('pesanan/cetak/'.$item->id_transaksi);?>" class="btn btn-info">Export to PDF</a> 
                                </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div><!--features_items-->  
</div> <!-- end col-sm-9 -->