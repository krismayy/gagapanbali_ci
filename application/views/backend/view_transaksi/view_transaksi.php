<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Rekapan Transaksi </h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="<?= site_url('AdminViewTransaksi');?>" class="breadcrumb-link">Rekapan Transaksi</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Laporan Transaksi</li> -->
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
                <?= $this->session->flashdata('verified'); ?>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Transaksi</th>
                                <th>Kode Transaksi</th>
                                <th>Nama Toko</th>
                                <th>Jumlah Harus Dibayar</th>
                                <th>Biaya Admin (10%)</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $id_transaksi=""; $i=1; $total_bersih=0;
                            if($data_transaksi == null){
                            ?>
                            <tr>
                                <td colspan="5" class="text-center"><h5>Belum ada penjualan!</h5></td>
                            </tr>
                            <?php  
                                } else{
                                foreach($data_transaksi as $row){
                                if($row->id_transaksi !== $id_transaksi){
                            ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td class="text-center"><?= date('d F Y', strtotime($row->tgl_transaksi)); ?></td>
                                <td class="text-center"><?= $row->id_transaksi; ?></td>
                                <td><?= $row->nama_toko; ?></td>
                                <td align="right">Rp <?= number_format($row->total_harga, 0,",",".") ?></td>
                                <?php if($row->status_bayar !== 'Sudah Bayar'){?>
                                    <td class="text-center">-</td>
                                <?php } else {
                                    $admin = $row->total_harga*0.1;
                                ?>
                                    <td align="right"><?= 'Rp '.number_format($admin, 0,",","."); ?></td>
                                <?php
                                      $total_bersih = $total_bersih + $admin; }
                                ?>
                                <td><?= $row->status_bayar; ?></td>
                                <td><a href="<?= site_url('AdminViewTransaksi/detail_transaksi/' . $row->id_transaksi);?>" class="btn btn-primary">Detail</a></td>
                            </tr> 
                            <?php 
                            }
                                $id_transaksi = $row->id_transaksi;
                            } }?>                        
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5" align="right">Total Biaya Admin</td>
                            <td align="right"><?= 'Rp '.number_format($total_bersih, 0,",",".") ?> </td>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--============================================================== -->
    <!-- end data table  -->
    <!-- ============================================================== -->
</div>