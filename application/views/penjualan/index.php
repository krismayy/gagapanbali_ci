<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Penjualan Saya</h2>
        <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('success'); ?>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Transaksi</th>
                            <th>Kode Transaksi</th>
                            <th>Jumlah Harus Dibayar</th>
                            <th>Status Bayar</th>
                            <th>Status Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id_transaksi=""; $i=1;
                            if($penjualan==null){
                        ?>
                        <tr>
                            <td colspan="7" class="text-center"><h5>Belum ada penjualan!</h5></td>
                        </tr>
                        <?php  
                            } else{
                            foreach($penjualan as $row){
                            if($row->id_transaksi!= $id_transaksi){
                        ?>
                        <tr>
                            <td class="text-center"><?= $i++; ?></td>
                            <td class="text-center"><?= date('d F Y', strtotime($row->tgl_transaksi));?></td>
                            <td><?= $row->id_transaksi; ?></a></td>
                            <td align="right"><?= 'Rp '.number_format($row->total_harga, 0,",",".") ?></td>
                            <td class="text-center"><?= $row->status_bayar ?></td>
                            <td class="text-center"><?= $row->status_barang ?></td>
                            <td><a href="<?= site_url('Penjualan/detail_transaksi/' . $row->id_transaksi);?>" class="btn btn-primary">Detail</a></td>
                        </tr>
                        <?php }
                        $id_transaksi = $row->id_transaksi;
                        } }?>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div> <!-- /.col-lg-12 -->       
    </div><!--features_items-->  
    </div>
</div>