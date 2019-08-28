<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Verifikasi Pembayaran</h2>
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
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Transaksi</th>
                                <th>Kode Transaksi</th>
                                <th>Nama Toko</th>
                                <th>Jumlah Harus Dibayar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $id_transaksi=""; $i=1;
                            if($data_transaksi == null){
                            ?>
                            <tr>
                                <td colspan="7" class="text-center"><h5>Belum ada pembayaran yang perlu diverifikasi!</h5></td>
                            </tr>
                            <?php  
                                } else{
                                foreach($data_transaksi as $row){
                                if($row->id_transaksi !== $id_transaksi){
                                    $keuntungan = $row->total_harga-($row->total_harga*0.1);
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td class="text-center"><?= date('d F Y h:i:A', strtotime($row->tgl_transaksi));?></td>
                                <td><?php echo $row->id_transaksi; ?></td>
                                <td><?php echo $row->nama_toko; ?></td>
                                <td align="right">Rp <?php echo number_format($row->total_harga, 0,",",".") ?></td>
                                <td><?php echo $row->status_bayar; ?></td>
                                <td><a href="<?php echo site_url('AdminViewTransaksi/detail_transaksi_verifikasi/' . $row->id_transaksi);?>" class="btn btn-primary">Detail</a></td>
                            </tr> 
                            <?php
                            }
                                $id_transaksi = $row->id_transaksi;
                            } }?>                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--============================================================== -->
    <!-- end data table  -->
    <!-- ============================================================== -->
</div>