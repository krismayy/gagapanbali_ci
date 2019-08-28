<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Menu Penjual</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="<?php echo site_url('penjual');?>">Profil Toko</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="<?php echo site_url('produk/list_produk');?>">Produk Saya</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="<?php echo site_url('penjualan');?>">Penjualan Saya</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#laporan">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        Laporan</a>
                    </h4>
                </div>
                <div id="laporan" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li><a href="<?php echo site_url('reportPenjualan/laporan_penjualan');?>">Laporan Penjualan </a></li>
                            <li><a href="<?php echo site_url('reportbarang');?>">Laporan Barang</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="<?php echo site_url('komplain/lihat_komplain');?>">Daftar Komplain</a></h4>
                </div>
            </div>
        </div><!--/category-products-->                  
    </div>
</div>