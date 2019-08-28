<div class="col-sm-9 padding-right" >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Produk Saya</h2>
        <div class="row">
            <a href="<?php echo site_url('produk/tambah_produk'); ?>" class="btn btn-rounded btn-rounded" style="margin-bottom: 12px; margin-left: 15px"><li class="fa fa-plus"></li> Tambah Produk</a>
        </div>
        <?= $this->session->flashdata('success'); ?>    
        <?= $this->session->flashdata('hapusbarang'); ?>         
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Foto Produk</th>
                <th class="text-center">Nama Produk</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $id_barang=""; $i=1;
                if($produk==null){
            ?>
            <tr>
                <td colspan="5" class="text-center"><h5>Belum ada produk!</h5></td>
            </tr>
            <?php  
                } else{
                foreach($produk as $row){
                if($row->id_barang!= $id_barang){
            ?>
            <tr>
                <td class="text-center"><?php echo $i++; ?></td>
                <td class="text-center">
                    <a href="<?= site_url('produk/detail_produk/'.$row->id_barang); ?>"><img src="<?php echo base_url('uploads/produk/'.$row->foto);?>" alt="" height="100px" width="100px"/></a>
                </td>
                <td>
                    <h4><a href="<?php echo site_url('produk/detail_produk/'.$row->id_barang); ?>"><?php echo ucwords($row->nama_barang);?></a></h4>
                    <p>Stok : <?php echo $row->stok;?></p>
                </td>
                <td class="text-center">
                    <p><?php echo "Rp ".number_format($row->harga,0,",",".");?></p>
                <td class="text-center">
                    <div class="btn btn-md">
                        <a href="<?php echo site_url('produk/edit_produk/'.$row->id_barang); ?>"><i class="fa fa-lg fa-edit"></i></a>
                    </div>
                    <div class="btn btn-md">
                        <a href="<?php echo site_url('produk/delete_produk/'.$row->id_barang); ?>" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-times"></i></a>
                    </div>
                    
                </td>
            </tr>
             <?php }
                $id_barang = $row->id_barang;
                 } }?>
        </tbody>
    </table>
    </div><!--features_items-->  
</div>