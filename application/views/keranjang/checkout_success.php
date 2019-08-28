<section id="do_action">
	<div class="container">
		<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="<?= site_url('home');?>">Home</a></li>
		  <li class="active">Checkout</li>
		</ol>
		</div>
		<!-- <?php
			$id_cus = "";
			foreach ($transaksi as $item):
				if($item->id_pembeli != $id_cus){
					$tgl = $item->tgl_transaksi;
					$id_transaksi = $item->id_transaksi;
					$id_cus = $item->id_pembeli;
				}
			endforeach;

			$date = new DateTime($tgl);
			$date->add(new DateInterval('PT48H'));
			$tgl_pembayaran = $date->format('Y-m-d H:i:s');
		?> -->
		<div class="jumbotron">
		  <h3 class="display-4">Transaksi Berhasil!</h3>
		  <p class="lead">Terimakasih sudah melakukan pemesanan. Silahkan lakukan pembayaran ke <b>No. Rekening : 12345678 BNI a.n Gagapan Bali</b>. <!-- Batas pembayaran <?php echo $tgl_pembayaran;?>.</p> -->
		  <hr class="my-4">
		  <a class="btn btn-primary btn-lg" href="<?= site_url('pesanan');?>" role="button">Konfirmasi Pembayaran</a>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="chose_area">
					<ul><h3>Gagapanbali.com</h3></ul>
					<?php
						$id_cus = "";
						foreach ($transaksi as $item):
							if($item->id_pembeli != $id_cus){
					?>
					<ul class="user_info">
						<li class="single_field">
							<label><?php echo ucwords($item->nama); ?> - <?php echo $item->no_hp_pembeli; ?></label>
						</li>
						<li class="single_field">
							<label><?php echo ucwords($item->alamat); ?></label>
						</li>
					</ul>
					<?php 
						$id_cus = $item->id_pembeli;
						} endforeach; 
					?>
					<ul class="user_info">
						<li class="single_field">
						<label>Pesanan :</label>
						</li>
					</ul>
						<table class="table table-striped table-hover" style="margin-left: 10px" >
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
						$i = 1; $id_barang = "";

						foreach ($transaksi as $item):
							if($item->id_barang != $id_barang){
						?>
							<tr>
								<td class="text-center"><?php echo $i++; ?></td>
								<td>
									<a href=""><img src="<?php echo base_url() . 'uploads/produk/'.$item->foto; ?>" alt="" height="100px" width="100px"></a>
								</td>
								<td class="cart_description">
									<h4><a href=""></a><?php echo ucwords($item->nama_barang); ?></h4>
									<p></p>
								</td>
								<td class="cart_price text-center">
									<p><?php echo number_format($item->harga, 0,",","."); ?></p>
								</td>
								<td class="cart_quantity text-center">
										<p><?php echo $item->jumlah;?></p>
								</td>
								<td class="cart_total" align="right">
									<p class="cart_total_price"><?php echo number_format($item->harga*$item->jumlah, 0,",",".") ?></p>
								</td>
							</tr>
							<?php
							$id_barang = $item->id_barang;
                                } endforeach; 
							?>
						</tbody>
						<tfoot>
							<?php
								$id_cus = "";
								foreach ($transaksi as $item):
									if($item->id_pembeli != $id_cus){
							?>
							<tr>
								<td colspan="5" align="right">Total</td>
								<td align="right"><b>Rp <?php echo number_format($item->total_harga, 0,",","."); ?></b></td>
							</tr>
							<tr>
								<td colspan="5" align="right">Kode Unik</td>
								<td align="right"><b>Rp <?php echo number_format($item->kode_unik, 0,",","."); ?></b></td>
							</tr>
							<tr>
								<td colspan="5" align="right">Total Bayar</td>
								<td align="right"><b>Rp <?php echo number_format($item->total_harga+$item->kode_unik, 0,",","."); ?></b></td>
							</tr>
							<?php 
								$id_cus = $item->id_pembeli;
								} endforeach; 
							?>
						</tfoot>
						</table>	
				</div>
			</div>
		</div>				
	</div>
</section>