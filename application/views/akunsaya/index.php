<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Akun Saya</h2>
        <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('success'); ?>
            <div class="text-center">
                <img class="img-thumbnail" style="width: 200px; height: 200px; margin-bottom: 35px" src="<?php if($informasi_akun->foto_akun == ""){ echo base_url('uploads/fotoakun/noimage.png');}else{ echo base_url('uploads/fotoakun/'.$informasi_akun->foto_akun);} ?>">
            </div>
            
            
            <div class="table-responsive">
                <table class="table  table-hover" id="dataTables-example">

                    <tr>
                        <td class="col-sm-5">Nama Lengkap</td>
                        <td style="width: 20px">:</td>
                        <td><?php if(is_null($informasi_akun->nama)){echo '-';} else{echo $informasi_akun->nama;} ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php if(is_null($informasi_akun->alamat)){echo '-';} else{ echo $informasi_akun->alamat;} ?></td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>:</td>
                        <td><?php if(is_null($informasi_akun->no_hp_pembeli)){echo '-';} else{echo $informasi_akun->no_hp_pembeli;} ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php if(is_null($informasi_akun->email)){echo '-';} else{echo $informasi_akun->email;} ?></td>
                    </tr>
                        <td>
                            <a href="<?php echo site_url('pembeli/edit_informasi_akun/'.$informasi_akun->id_pembeli);?>" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                </table>
                </div>
            </div>

        </div> <!-- /.col-lg-12 -->       
    </div><!--features_items-->  
</div>
                            