<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Akun Saya</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                <div class="panel-heading ">
                    <h4 class="panel-title"><a href="<?php echo site_url('pembeli');?>">Informasi Akun</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#pesanan">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        Pesanan</a>
                    </h4>
                </div>
                <div id="pesanan" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li><a href="<?= site_url('pesanan');?>">Belum Dikirim </a></li>
                            <li><a href="<?= site_url('pesanan/menunggu_verifikasi');?>">Menunggu Verifikasi</a></li>
                            <li><a href="<?= site_url('pesanan/dikemas');?>">Dikemas</a></li>
                            <li><a href="<?= site_url('pesanan/dikirim');?>">Dikirim</a></li>
                            <li><a href="<?= site_url('pesanan/selesai');?>">Selesai</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="<?php echo site_url('Komplain/komplain_saya');?>">Keluhan Saya</a></h4>
                </div>
            </div>
        </div><!--/category-products-->                  
    </div>
</div>