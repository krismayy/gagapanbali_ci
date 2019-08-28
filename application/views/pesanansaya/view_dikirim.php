<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Pesanan Dikirim</h2>
        <?= $this->session->flashdata('success');?>

        <?php if(is_null($pembelian)){ ?>
            <div class='alert alert-info'>Belum ada pesanan untuk dikirim!</div>
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
                        <div class="col-xs-10" style="padding: 0" align="right">
                        <a href="<?= site_url('transaksi/proses_sudah_diterima/'.$item['id_transaksi']);?>" class="btn btn-primary" onclick="return confirm('Pesanan sudah diterima? jika sudah kami akan mengkonfirmasi kepada penjual bahwa produk sudah sampai!')" style="margin-top: 0">Sudah Diterima</a>
                        </div>
                        <div class="col-xs-2" align="right" style="margin-top: 0">
                            <a href="<?= site_url('pesanan/detail_pesanan/'.$item['id_transaksi']);?>" class="btn btn-default" style="margin-top: 0">Detail Pesanan</a>
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