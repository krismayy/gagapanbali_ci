<section id="do_action">
	<div class="container">
		<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="<?= site_url('home');?>">Home</a></li>
		  <li class="active">Checkout</li>
		</ol>
		</div>
		<div class="heading">
			<?= $this->session->flashdata('berhasil'); ?>
			<?= $this->session->flashdata('kosong'); ?>
			<?php if($identitas->alamat == "" | $identitas->no_hp_pembeli == ""){ ?>
				<div class='alert alert-danger'><i class='fa fa-info-circle'></i> Mohon isi data dengan lengkap terlebih dahulu <a href="<?= site_url('pembeli') ?>">disini</a>!</div>
			<?php } ?>
			<h3>Alamat Pembeli</h3>
			<p></p>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="chose_area" style="margin-bottom: 0px">
					<ul class="user_info">
						<li class="single_field">
							<label><?= ucwords($identitas->nama); ?> - <?= $identitas->no_hp_pembeli; ?></label>
						</li>
						<li class="single_field">
							<label><?= ucwords($identitas->alamat); ?></label>
						</li>
						<li class="single_field">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ubah Alamat</button>
						</li>
					</ul>
				</div>
			</div>
			
		</div>
	</div>
</section>
<section id="cart_items">
	<div class="container">
		<div class="table-responsive cart_info">
			
			<table class="table table-striped" style="border: 1px">
				<thead>
					<tr class="cart_menu">
						<th scope="col" class="text-center"> No </th>
						<th scope="col" class="image text-center" colspan="2">Item</th>
						<th scope="col" class="price text-center"> Harga </th>
						<th scope="col" class="quantity text-center"> Qty </th>
						<th scope="col" class="total text-center"> Jumlah </th>
					</tr>
				</thead>
				<tbody>
				<?php
				$grand_total = 0;
				$cart = $this->cart->contents();
				if ($cart){
					// Create form and send all values in "shopping/update_cart" function.
					
					$i = 1;
					$toko = "";

					foreach ($cart as $item):
						$grand_total = $grand_total + $item['subtotal'];
				?>
					<input type="hidden" name="cart[<?= $item['id'];?>][id]" value="<?= $item['id'];?>" />
					<input type="hidden" name="cart[<?= $item['id'];?>][rowid]" value="<?= $item['rowid'];?>" />
					<input type="hidden" name="cart[<?= $item['id'];?>][name]" value="<?= $item['name'];?>" />
					<input type="hidden" name="cart[<?= $item['id'];?>][price]" value="<?= $item['price'];?>" />
					<input type="hidden" name="cart[<?= $item['id'];?>][gambar]" value="<?= $item['gambar'];?>" />
					<input type="hidden" name="cart[<?= $item['id'];?>][qty]" value="<?= $item['qty'];?>" />
					<tr>
					<?php if($item['toko'] !== $toko) { ?>
						<td colspan="7">
							<p><b><?= ucwords($item['toko']); ?></b></p>
						</td>
					<?php } ?>
					</tr>
					<tr>
						<td class="text-center"><?= $i++; ?></td>
						<td class="">
							<a href=""><img src="<?= base_url() . 'uploads/produk/'.$item['gambar']; ?>" alt="" height="100px" width="100px"></a>
						</td>
						<td class="cart_description">
							<h4><a href="<?= site_url('produk/detail_produk/'.$item['id']); ?>"></a><?= strtoupper($item['name']); ?></h4>
							<p></p>
						</td>
						<td class="cart_price text-center bold">
							<p><?= 'Rp '.number_format($item['price'], 0,",","."); ?></p>
						</td>
						<td class="cart_quantity text-center bold">
								<p><?= $item['qty'];?></p>
						</td>
						<td class="cart_price text-center bold">
							<p><?= 'Rp '.number_format($item['subtotal'], 0,",",".") ?></p>
						</td>
					</tr>
					<?php $toko = $item['toko']; endforeach; ?>
				</tbody>
				<?php }else{ ?>
					<td colspan="7" class="text-center"><h4>Keranjang belanja masih kosong!</h4></td>	
				<?php } ?>
			</table>
		</div>
	</div>
</section>
<section id="do_action">
	<div class="container">
		<div class="row">
			<div class="col-lg-6"></div>
			<div class="col-lg-6">
				<div class="total_area">
					<div class='alert alert-info' style="margin-left: 30px">Data Nomer Rekening dan Jumlah Transfer akan dikirim melalui Email.
						<br>Untuk memudahkan pengecekan maka jumlah transfer akan ditambahkan nomor unik. Misal Rp. 25.018
						
						<br><br>Transfer harus sesuai dengan <b>Jumlah Transfer</b></div>
					<?php if($grand_total == 0){?>
					<ul>
						<li>Total <span>-</span></li>
						<li>Diskon <span>-</span></li>
						<li>Total Bayar <span>-</span></li>
					</ul>
					<?php } else { ?>
					<ul>
						<li>Total <span>Rp <?= number_format($grand_total, 0,",","."); ?></span></li>
						<li>Diskon <span>-</span></li>
						<li>Total Bayar <span>Rp <?= number_format($grand_total, 0,",","."); ?></span></li>
					</ul>
						<?php if($identitas->alamat !== "" && $identitas->no_hp_pembeli !== ""){	?>
							<a class="btn btn-default check_out" style="margin-left: 43px" href="<?= site_url('transaksi/proses_order/'.$identitas->id_pembeli);?>">Buat Pesanan</a>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Ubah Alamat</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="post" action="<?= site_url('pembeli/ubah_alamat'); ?>">
	          <div class="form-group">
	            <label for="message-text" class="col-form-label">Alamat:</label>
	            <textarea class="form-control" id="message-text" name="alamat"><?= $identitas->alamat?></textarea>

	            <!-- Hidden file yang tidak di edit -->
	            <input type="hidden" class="form-control" name="nama"
				value="<?= $identitas->nama;?>">
				<input id="inputText3" name="no_hp_pembeli" type="hidden" class="form-control" value="<?= $identitas->no_hp_pembeli;?>">
				<input type="hidden" name="id_pembeli" value="<?= $identitas->id_pembeli; ?>">
				<input type="hidden" name="id_user" value="<?= $identitas->id_user; ?>">
	          </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>
<!-- End Modal -->