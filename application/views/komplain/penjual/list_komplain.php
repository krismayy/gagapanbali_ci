<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Daftar Komplain</h2>
        <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('balaskomplain');?>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal Komplain</th>
                            <th class="text-center">Kode Komplain</th>
                            <th class="text-center">Komplain</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                              if($daftar_komplain == null){
                        ?>
                        <tr>
                            <td colspan="6" class="text-center"><h5>Belum ada komplain!</h5></td>
                        </tr>
                        <?php  
                           }  else {
                              $i=1;
                              foreach($daftar_komplain as $data){
                        ?>
                        <tr>
                            <td class="text-center"><?= $i++; ?></td>
                            <td class="text-center"><?= date('d F Y', strtotime($data->tgl_komplain));?></td>
                            <td class="text-center"><?= $data->id_komplain; ?></td>
                            <?php
                                $jumlah_char = strlen($data->komplain);
                                if($jumlah_char > 15){
                                  $num_char = 15;
                                  $text = $data->komplain;

                                  $cut_text = substr($text, 0, $num_char);
                            ?>
                                <td><?= $cut_text.'....'; ?></td>
                            <?php } else { ?>
                                <td><?= $data->komplain; ?></td>
                            <?php } ?> 
                            <td><?= $data->status_read; ?></td>
                            <td class="text-center"><a href="<?= site_url('Komplain/balas_komplain/' . $data->id_komplain); ?>" class="btn btn-primary">Detail</a></td>
                        </tr>
                        <?php
                          }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /.col-lg-12 -->       
    </div><!--features_items-->  
    </div>
</div>