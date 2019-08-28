<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Edit Profil Toko</h2>
        <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?php echo site_url('penjual/proses_edit_profil'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Nama Toko</label>
                        <input id="inputText3" name="nama_toko" type="text" class="form-control" value="<?php echo $data_toko->nama_toko;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Alamat Toko</label>
                        <input id="inputText3" name="alamat_toko" type="text" class="form-control" value="<?php echo $data_toko->alamat_toko;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Nomor Telepon</label>
                        <input id="inputText3" name="no_hp" type="text" class="form-control" value="<?php echo $data_toko->no_hp;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Nomor Rekening</label>
                        <input id="inputText3" name="no_rek" type="text" class="form-control" value="<?php echo $data_toko->no_rek;?>">
                    </div>
                    <div class="form-group">
                        <label for="input-select">Bank</label>
                        <select class="form-control" name="bank">
                            <option value="<?php echo NULL; ?>">Pilih Nama Bank</option>
                            <?php foreach ($nama_bank as $bank) : ?>
                                <option <?php if($bank->id_bank == $data_toko->id_bank) {echo 'selected'; } ?> value="<?= $bank->id_bank; ?>"><?= $bank->nama_bank; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Nama Pemilik Rekening</label>
                        <input id="inputText3" name="nama_pemilik" type="text" class="form-control" value="<?php echo $data_toko->pemilik_rek;?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Deskripsi Toko</label>
                        <textarea class="form-control" name="desk_toko" rows="3"><?php echo $data_toko->deskripsi_toko;?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Logo</label>
                        <?php
                            if($data_toko->logo != ""){ ?>
                                <div>
                                    <img class="img-thumbnail" style="width: 200px; height: 200px; margin-bottom: 35px" src="<?= base_url('uploads/logo/'.$data_toko->logo) ?>">
                                </div>
                        <?php } ?>
                        <input id="inputText3" name="logo" type="file">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_toko" value="<?php echo $data_toko->id_toko; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_user" value="<?php echo $data_toko->id_user; ?>">
                    </div>
                    <div class="row">
                        
                            <div class="col-lg-3">
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group" style="margin-top: 15px">
                                <a href="<?php echo site_url('penjual'); ?>">Back</a>
                            </div>
                            </div>
                        </div>
                    
                </form>
            </div>
        </div> <!-- /.col-lg-12 -->       
    </div><!--features_items-->  
</div> 