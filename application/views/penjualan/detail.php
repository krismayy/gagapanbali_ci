<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Detail Penjualan Saya</h2>
        <div class="row">
        <div class="col-lg-12">
<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="chose_area">
                    <ul><h3>Gagapanbali.com</h3></ul>
                    <?php
                        $id_cus = "";
                        foreach ($detail_transaksi as $item):
                            if($item->id_pembeli !== $id_cus){
                    ?>
                    <form method="post" action="<?= site_url('Penjualan/proses_edit_detail/'.$item->id_transaksi);?>">
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Kode Transaksi </label>
                        </li>
                        <li class="single_field">
                            <label><?php echo ucwords($item->id_transaksi); ?></label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Nama </label>
                        </li>
                        <li class="single_field">
                            <label><?php echo ucwords($item->nama); ?></label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>No Telepon </label>
                        </li>
                        <li class="single_field">
                            <label><?php echo $item->no_hp_pembeli; ?></label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Alamat </label>
                        </li>
                        <li class="single_field">
                            <label><?php echo ucwords($item->alamat); ?></label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Bukti Pembayaran </label>
                        </li>
                        <li class="single_field">
                            <?php if($item->bukti_pembayaran == null){ ?>
                                <label>Belum Upload Bukti</label>
                            <?php } else { ?>
                            <a href="<?php echo base_url() . 'uploads/buktipembayaran/'.$item->bukti_pembayaran; ?>" data-lightbox="image-1"><img src="<?php echo base_url() . 'uploads/buktipembayaran/'.$item->bukti_pembayaran; ?>" alt="" height="50px" width="50px"></a>
                            <?php } ?>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Status Bayar </label>
                        </li>
                        <li class="single_field">
                            <label><?php echo ucwords($item->status_bayar); ?></label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Status Barang</label>
                        </li>
                        <li class="single_field">
                            <?php if($item->status_bayar == 'Sudah Bayar'){ ?>
                                <select name="status_barang">
                                    <option value="Belum Dikirim" <?php if($item->status_barang == 'Belum Dikirim'){echo 'selected' ;} ?>>Belum Dikirim</option>
                                    <option value="Sudah Dikirim" <?php if($item->status_barang == 'Sudah Dikirim'){echo 'selected' ;} ?>>Sudah Dikirim</option>
                                </select>
                            <?php } else { ?>
                            <label><?php echo ucwords($item->status_barang); ?></label>
                            <?php } ?>
                        </li>
                    </ul>
                    <ul>
                        <?php if($item->status_bayar == 'Sudah Bayar'){ ?>
                            <li class="single_field text-center"><button class="btn btn-danger">Simpan</button></li>
                        <?php } else { ?>
                            <li class="single_field text-center"><button disabled class="btn btn-danger">Simpan</button></li>
                        <?php } ?>
                    </ul>
                    </form>
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
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1; $id_barang = "";
                        foreach ($detail_transaksi as $item):
                            if($item->id_barang !== $id_barang){
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td class="">
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
                                    <p class="cart_total_price"><?php echo 'Rp '.number_format($item->harga, 0,",","."); ?></p>
                                </td>
                            </tr>
                            <?php $id_barang = $item->id_barang;
                                } endforeach;
                            ?>
                        </tbody>
                        <tfoot>
                            <?php
                                $id_cus = "";
                                foreach ($detail_transaksi as $item):
                                    if($item->id_pembeli != $id_cus){
                            ?>
                            <tr>
                                <td colspan="5" align="right">Total</td>
                                <td align="right"><b>Rp <?php echo number_format($item->total_harga, 0,",","."); ?></b></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right">Diskon</td>
                                <td align="right"><b>-</b></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right">Total Bayar</td>
                                <td align="right"><b>Rp <?php echo number_format($item->total_harga, 0,",","."); ?></b></td>
                            </tr>
                            <?php 
                                $id_cus = $item->id_pembeli;
                                } endforeach; 
                            ?>
                        </tfoot>
                        </table>    
                </div>
            </div>
        </div>              
    </div>
</section>
        </div> <!-- /.col-lg-12 -->       
    </div><!--features_items-->  
    </div>
</div>