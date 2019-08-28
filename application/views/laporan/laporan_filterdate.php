<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Penjualan Saya</h2>
        <div class="row">

        <div class="col-lg-12">
            <form action="<?= site_url('reportpenjualan/filterdate') ?>" method="post">
                <div class="row">
                    <div class="col-xs-3">
                    </div>
                    <div class="col-xs-3" style="padding-left: 0;">
                        <div class="form-group">
                            <input type="date" name="startDate" class="form-control">
                        </div>
                    </div>
                   
                    <div class="col-xs-3" style="padding-left: 0;">
                        <div class="form-group">
                            <input type="date" name="endDate" class="form-control">
                        </div>
                    </div>

                    <div class="col-xs-2" style="padding: 0; margin-top: -25px;">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Transaksi</th>
                            <th>Kode Transaksi</th>
                            <th>Jumlah Harus Dibayar</th>
                            <th>Biaya Admin (10%)</th>
                            <th>Keuntungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id_transaksi=""; $i=1; $total_bersih=0;
                            if($laporan==null){
                        ?>
                        <tr>
                            <td colspan="5" class="text-center"><h5>Belum ada penjualan!</h5></td>
                        </tr>
                        <?php  
                            } else{
                            foreach($laporan as $row){
                            if($row->id_transaksi !== $id_transaksi){
                                $keuntungan = $row->total_harga-($row->total_harga*0.1);
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td class="text-center"><?= date('d F Y', strtotime($row->tgl_transaksi));?></td>
                            <td class="text-center"> <?php echo $row->id_transaksi; ?> </a></td>
                            <td align="right"> <?php echo 'Rp '.number_format($row->total_harga, 0,",",".") ?> </td>
                            <td align="right"> <?php echo 'Rp '.number_format($row->total_harga*0.1, 0,",","."); ?> </td>
                            <td align="right"> <?php echo 'Rp '.number_format($keuntungan, 0,",","."); ?> </td>
                        </tr>
                        <?php $total_bersih = $total_bersih + $keuntungan;
                        $id_transaksi = $row->id_transaksi;
                        }
                        } }?> 
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" align="right"><b>TOTAL</b></td>
                            <td align="right"> <?php echo 'Rp '.number_format($total_bersih, 0,",",".") ?> </td>
                        </tr>
                    </tfoot>
                </table>
                <!-- <button onClick="window.print()">Print this page</button> -->
                <a href="<?= site_url('reportpenjualan/index/'.$this->input->get('startDate').'/'.$this->input->get('endDate'));?>" class="btn btn-info">Export to PDF</a>
            </div>
        </div> <!-- /.col-lg-12 -->       
    </div><!--features_items-->  
    </div>
</div>