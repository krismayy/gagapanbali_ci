<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Edit Produk</h2>
        <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
                <form action="<?php echo site_url('produk/proses_edit_produk/'.$produk->id_barang); ?>" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <?= form_error('nama_barang', ' <small class="text-danger pl-3">', '</small>'); ?>
                        <label for="inputText3" class="col-form-label">Nama Produk</label>
                        <input id="inputText3" name="nama_barang" type="text" class="form-control" value="<?php echo $produk->nama_barang;?>">
                    </div>
                    <div class="form-group">
                        <label for="input-select">Kategori Produk</label>
                        <?= form_error('id_kategori', ' <small class="text-danger pl-3">', '</small>'); ?>
                        <select class="form-control" id="input-select" name="id_kategori">
                            <?php foreach ($kategori as $kat) : ?>
                                <option <?php if($kat->id_kategori == $produk->id_kategori) {echo 'selected'; } ?> value="<?= $kat->id_kategori; ?>"><?= $kat->nama_kategori; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Deskripsi Produk</label>
                        <?= form_error('desk_barang', ' <small class="text-danger pl-3">', '</small>'); ?>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="desk_barang" rows="3"><?php echo $produk->deskripsi_barang;?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputText4" class="col-form-label">Harga</label>
                        <?= form_error('harga', ' <small class="text-danger pl-3">', '</small>'); ?>
                        <input id="inputText4" name="harga" type="text" class="form-control" value="<?php echo $produk->harga;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputText5" class="col-form-label">Berat</label>
                        <?= form_error('berat', ' <small class="text-danger pl-3">', '</small>'); ?>
                        <input id="inputText5" name="berat" type="text" class="form-control" value="<?php echo $produk->berat;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputText5" class="col-form-label">Stok</label>
                        <?= form_error('stok', ' <small class="text-danger pl-3">', '</small>'); ?>
                        <input id="inputText5" name="stok" type="text" class="form-control" value="<?php echo $produk->stok;?>">
                    </div>
                    <?php echo form_error('gambar'); ?>
                    <div class="form-group">
                        <div class="custom-file mb-3">
                            <label for="inputText5" class="col-form-label">Gambar Produk</label>
                            <div class="row col-xl-12">
                                <div class="col-md-12" style="margin-right: 5px">
                                    <input type="file" class="custom-file-input" id="customFile1" name="gambar[]" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input name="id_toko" type="hidden" class="form-control" value="<?php echo $produk->id_toko; ?>">
                    <input name="id_barang" type="hidden" class="form-control" value="<?php echo $produk->id_barang; ?>">
                    <div class="col-lg-3">
                        <div class="form-group">      
                            <input type="submit" class="btn btn-primary btn-lg btn-block" name="simpan" value="Simpan">
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- /.col-lg-12 -->       
    </div><!--features_items-->  
</div> 