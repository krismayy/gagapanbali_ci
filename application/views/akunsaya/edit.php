<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Edit Data Diri</h2>
        <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
                <form action="<?php echo site_url('pembeli/proses_edit_akun'); ?>" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Nama Lengkap</label>
                        <input id="inputText3" name="nama" type="text" class="form-control" value="<?php echo $informasi_akun->nama;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Alamat</label>
                        <input id="inputText3" name="alamat" type="text" class="form-control" value="<?php echo $informasi_akun->alamat;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Nomor Telepon</label>
                        <input id="inputText3" name="no_hp_pembeli" type="text" class="form-control" value="<?php echo $informasi_akun->no_hp_pembeli;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Email</label>
                        <input id="inputText3" name="email" type="text" class="form-control" value="<?php echo $informasi_akun->email;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Password</label>
                        <input id="inputText3" name="password" type="password" class="form-control">
                    </div>
                    <?= $this->session->flashdata('notifikasi_error'); ?>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Foto</label>
                        <?php
                            if($informasi_akun->foto_akun != ""){ ?>
                                <div>
                                    <img class="img-thumbnail" style="width: 200px; height: 200px; margin-bottom: 35px" src="<?= base_url('uploads/fotoakun/'.$informasi_akun->foto_akun) ?>">
                                </div>
                        <?php } ?>
                        <input id="inputText3" name="foto_akun" type="file">
                    </div>
        
                    <div class="form-group">
                        <input type="hidden" name="id_pembeli" value="<?php echo $informasi_akun->id_pembeli; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_user" value="<?php echo $informasi_akun->id_user; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="status" value="<?php echo $informasi_akun->status; ?>">
                    </div>

                    <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group pad" style="margin-top: 13px">
                                <a href="<?php echo site_url('pembeli'); ?>">Back</a>
                            </div>
                            </div>
                        </div>
                    
                </form>
            </div>
        </div> <!-- /.col-lg-12 -->       
    </div><!--features_items-->  
</div> 