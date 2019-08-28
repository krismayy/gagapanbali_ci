<section id="cart_items">
	<div class="container">
		<div class="col-lg-12" >
			<div class="breadcrumbs">
			<ol class="breadcrumb" style="margin-bottom: 50px">
			  <li><a href="#">Home</a></li>
			  <li class="active">Shopping Cart</li>
			</ol>
		</div>
		<?= $this->session->flashdata('stok'); ?>
		<div class="table-responsive cart_info">
			<form action="<?= site_url('transaksi/ubah_cart')?>" method="post" name="frmShopping" id="frmShopping" class="form-horizontal" enctype="multipart/form-data">
			
			<table class="table table-striped table-hover">
				<thead>
					<tr class="cart_menu">
						<th scope="col" class="text-center"> No </th>
						<th scope="col" class="image text-center" colspan="2">Item</th>
						<th scope="col" class="price text-center"> Harga </th>
						<th scope="col" class="quantity text-center"> Qty </th>
						<th scope="col" class="total text-center"> Jumlah </th>
						<th scope="col" class="text-center"> Hapus </th>
					</tr>
				</thead>
				<tbody>
				<?php
				if ($cart = $this->cart->contents()) {
				?>
				<?php
				// Create form and send all values in "shopping/update_cart" function.
				$grand_total = 0;
				$i = 1;
				$toko = "";
				
				foreach ($cart as $key => $item):
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
						<td><?= $i++; ?></td>
						<td class="">
							<a href=""><img src="<?= base_url() . 'uploads/produk/'.$item['gambar']; ?>" alt="" height="100px" width="100px"></a>
						</td>
						<td class="cart_description">
							<h4><a href="<?= site_url('produk/detail_produk/'.$item['id']); ?>"></a><?= strtoupper($item['name']); ?></h4>
							<p></p>
						</td>
						<td class="cart_price text-center bold">
							<p>Rp <?= number_format($item['price'], 0,",","."); ?></p>
						</td>
						<td class="cart_quantity col-sm-2">
							<div class="cart_quantity_button">
								<input type="text" onchange='this.form.submit()' class="form-control cart_quantity_input" name="cart[<?= $item['id'];?>][qty]" value="<?= $item['qty'];?>" size="2" />
							</div>
						</td>
						<td class="cart_price text-center bold">
							<p>Rp <?= number_format($item['subtotal'], 0,",",".") ?></p>
						</td>
						<td class="text-center">
							<a href="<?= site_url('transaksi/hapus/'.$item['rowid']);?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus item?')"><i class="glyphicon glyphicon-remove"></i></a>
						</td>
					</tr>
					<?php $toko = $item['toko']; endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5" align="right">Total</td>
						<td align="right"><b>Rp <?= number_format($grand_total, 0,",","."); ?></b></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="5" align="right">Diskon</td>
						<td align="right"><b>-</b></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="5" align="right">Total Bayar</td>
						<td align="right"><b>Rp <?= number_format($grand_total, 0,",","."); ?></b></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="7" align="right">
						<a href="<?= site_url('transaksi/hapus/all');?>" class='btn btn-sm btn-danger' onclick="return confirm('Yakin kosongkan Shopping Cart?')">Kosongkan Cart</a>
						<button class='btn btn-sm btn-warning'  type="submit">Update Cart</button>
						<a href="<?= site_url('transaksi/checkout')?>"  class ='btn btn-sm btn-success'>Check Out</a>
						</td>
					</tr>
				</tfoot>
				<?php }else{ ?>
					<td colspan="7" class="text-center"><h4>Keranjang belanja masih kosong!</h4></td>	
				<?php } ?>
			</table>
			
			</form>
		</div>
		</div>
	</div>
</section>


