<div class="col-md-12 padding-right">
	<div class="product-details"><!--product-details-->
		<div class="col-md-5">
			<div class="view-product">
				<img id="expandedImg" style="width:100%" src="<?= base_url('uploads/produk/'.$produk_cover->foto);?>" alt="" />

				<div class="row" style="margin-left: 7px">
					<?php foreach($produk as $foto){ ?>
					<div class="columnn">
						<img  id="imgsrc" src="<?= base_url('uploads/produk/'.$foto->foto);?>" onclick="myFunction(this);">
					</div>
					<?php }?>		  
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="product-information"><!--/product-information-->
				<?php 
				$id_barang = "";
				foreach($produk as $item){ 
					if($item->id_barang !== $id_barang){
				?>
				<h2><?= ucwords($item->nama_barang);?></h2>
				<div>
					<img src="<?= base_url();?>assets/images/product-details/rating.png" alt="" />
					<span style="font-size: 12px"> <?= ' / '.$ratings; ?> </span>
				</div>
				<span>
					<span><?= "Rp ".number_format($item->harga,0,",",".");?></span>
					
					<a href="<?= site_url('transaksi/add_to_cart/'.$item->id_barang);?>" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Add to cart
					</a>
				</span>
				<p><b>Stock:</b> <?= $item->stok;?></p>
				<p><b>Deskripsi:</b> <?= $item->deskripsi_barang;?></p>
				<p><b>Berat:</b> <?= $item->berat." Kg";?></p>
				<p><b>Kategori:</b> <?= $item->nama_kategori;?></p>
				<p><b>Nama Toko:</b> <?= $item->nama_toko;?></p>
				<?php } $id_barang = $item->id_barang; }?>
			</div><!--/product-information-->
		</div>
	</div><!--/product-details-->
	
	<div class="category-tab shop-details-tab"><!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li><a href="#reviews" data-toggle="tab">Reviews</a></li>
			</ul>
		</div>
		
		<div class="tab-content">
			<div class="tab-pane fade active in" id="reviews" >
				<?php if(!count($review)){ ?>
					<div class="col-sm-12" id="content">
						<p style="color: #A9A9A9;"><i>Belum ada penilaian untuk produk ini</i></p>
					</div>
				<?php } else {
					foreach($review as $konten){
				?>
					<div class="col-sm-12 box-hidden" id="content">
						<ul>
							<li>
								<a href=""><i class="fa fa-user"></i>
									<?php $name = trim($konten->nama);
	                                      $last_name = (strpos($name, ' ') === false) ? $name : preg_replace('#.*\s([\w-]*)$#', '$1', $name);

	                                      echo ucwords($last_name);
	                                ?>
								</a>
							</li>
							<li>
								<a href=""><i class="fa fa-clock-o"></i>
									<?= date("h:i A", strtotime($konten->tgl_review)); ?>
								</a>
							</li>
							<li>
								<a href=""><i class="fa fa-calendar-o"></i>
									<?= date("d F Y", strtotime($konten->tgl_review)); ?>
								</a>
							</li>
						</ul>
						<div class="col-sm-12">
							<div class="ratings">
								<?php $i=1;
									for ($i=1; $i <= $konten->bintang; $i++) {
								?>
									<input type="radio" id="star" checked><label for="star"></label>  
								<?php } ?>
							</div>
						</div>
						<?php if($konten->ulasan == null){ ?>
							<p style="color: #A9A9A9;"><i>tidak ada ulasan</i></p>
						<?php } else { ?>
							<p><?= $konten->ulasan; ?></p>
						<?php } ?>
						<hr class="line-title">
					</div>
						<?php } ?>
				<div class="row text-center wrap-button">
					<a href="#" id="loadMore">Load more</a>
				</div>
				<?php } ?>
			</div>			
		</div>
	</div><!--/category-tab-->
</div>

<script>
	function myFunction(imgs) {
	  var expandImg = document.getElementById("expandedImg");
	  var imgText = document.getElementById("imgtext");
	  expandImg.src = imgs.src;
	  imgText.innerHTML = imgs.alt;
	  expandImg.parentElement.style.display = "block";
	}
</script>
