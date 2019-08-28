<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Laporan Barang Terjual</h2>
        <div class="row">

        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;
                            if($laporan==null){
                        ?>
                        <tr>
                            <td colspan="3" class="text-center"><h5>Belum ada barang terjual!</h5></td>
                        </tr>
                        <?php  
                            } else{
                            foreach($laporan as $row){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td> <?php echo ucwords($row->nama_barang); ?> </td>
                            <td align="right"> <?php echo $row->terjual; ?> </td>
                        </tr>
                        <?php
                        } 
                    }?> 
                    </tbody>
                </table>
                <!-- <button onClick="window.print()">Print this page</button> -->
                <a href="<?= site_url('reportbarang/cetak');?>" class="btn btn-info">Export to PDF</a>
            </div>
        </div> <!-- /.col-lg-12 -->       
    </div><!--features_items-->  
    </div>
</div>