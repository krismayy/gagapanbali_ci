<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Pesanan Dikemas</h2>
        <?= $this->session->flashdata('success');?>

        <?php if(is_null($pembelian)){ ?>
            <div class='alert alert-info'>Belum ada pesanan yang dikemas!</div>
        <?php } else {  
            $id_transaksi ="";

            foreach($pembelian as $item){ ?>
            <section id="do_action">
                <div class="container col-sm-12">
                <div class="table-responsive chose_area" style="word-wrap: break-word;">
                    <table id="example" class="table table-striped second table-hover" style="width:100%; margin-left: 10px; margin-right: 50px;">
                        <tbody>
                            <tr>
                                <label style="margin-left: 10px"><b><?= date('d F Y h:i A', strtotime($item['tgl_transaksi']));?></b></label>
                            </tr>
                            <?php foreach ($item['barang'] as $barang) {?>
                                <tr>
                                    <td class="text-center">
                                        <a href=""><img src="<?= base_url() . 'uploads/produk/'.$barang['foto']; ?>" alt="" height="100px" width="100px"></a>
                                    </td>
                                    <td class="" align="left">
                                        <h4><?= ucwords($barang['nama_barang']); ?></h4>
                                        <p><?= 'x'.$barang['jumlah'];?></p>
                                    </td>
                                    <td colspan="2" class="" align="right">
                                        <p class="cart_total_price"><?= 'Rp '.number_format($barang['harga']*$barang['jumlah'], 0,",",".") ?></p>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="bg-secondary">
                                <td colspan="3" align="right"><h3>Total Pesanan</h3></td>
                                <td align="right"><h3><b>Rp <?= number_format($item['total_harga'], 0,",","."); ?></b></h3></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="row">
                        <div align="right" style="margin-top: 5px">
                            <a href="<?= site_url('pesanan/detail_pesanan/'.$item['id_transaksi']);?>" class="btn btn-default">Detail Pesanan</a>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <?php
                  } 
                } //ini punya else
            ?>
    </div><!--features_items-->  
</div> <!-- end col-sm-9 -->