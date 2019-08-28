<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Daftar Komplain</h2>
        <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('success'); ?>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal Komplain</th>
                            <th class="text-center">Kode Komplain</th>
                            <th class="text-center">Balasan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($komplain_data == null){
                        ?>
                        <tr>
                            <td colspan="5" class="text-center"><h5>Belum ada komplain!</h5></td>
                        </tr>
                        <?php  
                        } else { 
                            $i = 1;
                            foreach ($komplain_data as $list) { 
                        ?>
                        <tr>
                            <td class="text-center"><?= $i++?></td>
                            <td class="text-center"><?= date('d F Y', strtotime($list->tgl_komplain));?></td>
                            <td class="text-center"><?= $list->id_komplain; ?></td>
                            <?php
                                if($list->balasan !== null){
                            ?>
                                <?php
                                    $jumlah_char = strlen($list->balasan);
                                    if($jumlah_char > 15){
                                      $num_char = 15;
                                      $text = $list->balasan;

                                      $cut_text = substr($text, 0, $num_char);
                                ?>
                                    <td><?= $cut_text.'....'; ?></td>
                                <?php } else { ?>
                                    <td><?= $list->balasan; ?></td>
                                <?php } ?>
                            <?php } else {?>
                                <td><p style="color: #A9A9A9;"><i>belum ada balasan</i></p></td>
                            <?php } ?>
                            
                            <td class="text-center"><a href="<?= site_url('Komplain/detail_komplain_saya/' . $list->id_komplain); ?>" class="btn btn-primary">Detail</a></td>
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