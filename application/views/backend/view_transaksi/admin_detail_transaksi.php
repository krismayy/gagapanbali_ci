<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Detail Transaksi </h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('AdminViewTransaksi');?>" class="breadcrumb-link">Rekapan Transaksi</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="<?= site_url('AdminViewTransaksi');?>" class="breadcrumb-link">Detail Transaksi</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- ============================================================== -->
    <!-- data table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12"><h3>Gagapanbali.com</h3></div>
                    <?php
                        $id_cus = "";
                        foreach ($detail_transaksi as $item):
                            if($item->id_pembeli != $id_cus){
                    ?>
                    <div class="col-sm-12">
                        <form method="post" action="<?= site_url('AdminViewTransaksi/proses_edit_detail/'.$item->id_transaksi);?>">
                            <table>
                                <tr>
                                    <td class="col-sm-3">
                                        <label>Nama </label>
                                    </td>
                                    <td class="single_field">
                                        <label><?php echo ucwords($item->nama); ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3">
                                        <label>No Telepon </label>
                                    </td>
                                    <td>
                                        <label><?php echo $item->no_hp_pembeli; ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3">
                                        <label>Alamat </label>
                                    </td>
                                    <td>
                                        <label><?php echo ucwords($item->alamat); ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3">
                                        <label>Jumlah Bayar </label>
                                    </td>
                                    <td>
                                        <label>Rp <?php echo number_format($item->total_harga, 0,",","."); ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3">
                                        <label>Nama Pemilik Rekening </label>
                                    </td>
                                    <td>
                                        <label><?php echo ucwords($item->nama_pemilik_rek); ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3">
                                        <label>Nomor Rekening </label>
                                    </td>
                                    <td>
                                        <label><?php echo ucwords($item->no_rekening); ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3">
                                        <label>Bank </label>
                                    </td>
                                    <td>
                                        <label><?php echo ucwords($item->nama_bank); ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3">
                                        <label>Bukti Pembayaran </label>
                                    </td>
                                    <td>
                                        <?php if($item->bukti_pembayaran == null){ ?>
                                            <label>Belum Upload Bukti</label>
                                        <?php } else { ?>
                                        <a href="<?php echo base_url() . 'uploads/buktipembayaran/'.$item->bukti_pembayaran; ?>" data-lightbox="image-1"><img src="<?php echo base_url() . 'uploads/buktipembayaran/'.$item->bukti_pembayaran; ?>" alt="" height="50px" width="50px"></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3">
                                        <label>Status Bayar </label>
                                    </td>
                                    <td>
                                        <?php if($item->status_bayar == 'Sudah Upload Bukti'){ ?>
                                            <select name="status_bayar">
                                                <option></option>
                                                <option value="Sudah Bayar">Verifikasi</option>
                                                <option value="Bukti Invalid">Bukti Invalid</option>
                                            </select>
                                        <?php } else {; ?>
                                        <label><?php echo ucwords($item->status_bayar); ?></label>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table> 
                        </form>
                    </div>
                    <?php 
                        $id_cus = $item->id_pembeli;
                        } endforeach; 
                    ?>
                    <div class="col-sm-12">
                        <tr>
                            <td>
                                <label>Pesanan :</label>
                            </td>
                        </tr>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-striped table-hover col-sm-12" style="margin-left: 10px" >
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
                                    if($item->id_barang != $id_barang){
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
    </div>
    <!--============================================================== -->
    <!-- end data table  -->
    <!-- ============================================================== -->
</div>