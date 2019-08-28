<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Produk Saya</h2>
        <div class="row">
            <a href="<?php echo site_url('produk/tambah_produk'); ?>" class="btn btn-rounded btn-primary" style="margin-bottom: 12px; margin-left: 15px">Tambah Produk</a>
        </div>
        <div class="row">
        <div class="col-lg-12">
            <?php $id_barang=""; ?>
            <?php foreach($produk as $row){ 
                if($row->id_barang!= $id_barang){

                ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            
                            <img src="<?php echo base_url('uploads/produk/'.$row->foto);?>" height="300px" width="300px"/>
                            <h2><?php echo "Rp ".number_format($row->harga,0,",",".");?></h2>
                            <a href="<?php echo site_url('produk/detail_produk/'.$row->id_barang); ?>"><p><?php echo ucwords($row->nama_barang);?></p></a>
                            <a href="<?php echo site_url('produk/edit_produk/'.$row->id_barang); ?>" class="btn btn-default">Edit Produk</a>
                            <a class="btn btn-danger"href="<?php echo site_url('produk/delete_produk/'.$row->id_barang); ?>" onclick="return confirm('Apakah anda yakin?')">Delete Produk</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                $id_barang = $row->id_barang;
            } } ?>
        </div> <!-- /.col-lg-12 -->       
    </div><!--features_items-->  
</div>