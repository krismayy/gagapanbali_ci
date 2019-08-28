<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Profil Toko</h2>
        <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="text-center">
                <img class="img-thumbnail" style="width: 200px; height: 200px; margin-bottom: 35px" src="<?php if($data_toko->logo == ""){ echo base_url('uploads/logo/noimg.png');}else{ echo base_url('uploads/logo/'.$data_toko->logo);} ?>">
            </div>
            <div class="table-responsive">
                <table class="table  table-hover" id="dataTables-example">
                        <tr>
                            <td class="col-sm-5">Nama Toko</td>
                            <td style="width: 20px">:</td>
                            <td><?php if(is_null($data_toko->nama_toko)){echo '-';} else{echo $data_toko->nama_toko;} ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Toko</td>
                            <td>:</td>
                            <td><?php if(is_null($data_toko->alamat_toko)){echo '-';} else{ echo $data_toko->alamat_toko;} ?></td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td>:</td>
                            <td><?php if(is_null($data_toko->no_hp)){echo '-';} else{echo $data_toko->no_hp;} ?></td>
                        </tr>
                        <tr>
                            <td>Nama Bank</td>
                            <td>:</td>
                            <td><?php if(is_null($data_toko->nama_bank)){echo '-';} else{echo $data_toko->nama_bank;} ?></td>
                        </tr>
                        <tr>
                            <td>No Rekening</td>
                            <td>:</td>
                            <td><?php if(is_null($data_toko->no_rek)){echo '-';} else{echo $data_toko->no_rek;} ?></td>
                        </tr>
                        
                        <tr>
                            <td>Nama Pemilik Rekening</td>
                            <td>:</td>
                            <td><?php if(is_null($data_toko->pemilik_rek)) {echo '-';} else{echo $data_toko->pemilik_rek;} ?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi Toko</td>
                            <td>:</td>
                            <td><?php if(is_null($data_toko->deskripsi_toko)){echo '-';} else{echo $data_toko->deskripsi_toko;} ?></td>
                        </tr>
                        <tr>
                            <td>Rating Toko</td>
                            <td>:</td>
                            <td><?php if(is_null($data_toko->rating_toko)){echo '-';} else{echo $data_toko->rating_toko;} ?></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="<?php echo site_url('penjual/edit_profil/'.$data_toko->id_toko);?>" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                </table>
                </div>
            </div>
        </div> <!-- /.col-lg-12 -->       
    </div><!--features_items-->  
</div>
                            