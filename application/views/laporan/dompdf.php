<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet">

	<title>Laporan Penjualan</title>

</head>
<body>
	<img src="assets/images/home/logo.png" style="position: absolute; width: 185px; height: auto;">
	<table style="width: 100%">
		<tr>
            <?php $id_toko="";
                foreach($laporan as $detail_toko){
                if($detail_toko['id_toko'] !== $id_toko){
            ?>
			<td align="center">
				<span style="line-height: 1.6">
					<b>LAPORAN PENJUALAN</b>
					<br>Toko <?php echo $detail_toko['nama_toko']; ?>
					<br>Alamat : <?php echo $detail_toko['alamat_toko']; ?>
				</span>
			</td>
            <?php $id_toko = $detail_toko['id_toko']; } } ?>
		</tr>
	</table>

	<hr class="line-title">

    <div>
        Periode : <?php echo date('d F Y', strtotime($date[0])).' - '.date('d F Y', strtotime($date[1])); ?>
    </div>
    <table id="example" class="table table-striped table-bordered second" style="width:100%">
        <thead>
            <tr>
                <th class="text-center align-middle" valign="middle">No</th>
                <th class="text-center">Tanggal Transaksi</th>
                <th class="text-center">Kode Transaksi</th>
                <th class="text-center">Jumlah Harus Dibayar</th>
                <th class="text-center">Biaya Admin (10%)</th>
                <th class="text-center">Keuntungan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 1; $id_transaksi=""; $total_bersih=0;
                foreach($laporan as $row){
                    if($row['id_transaksi'] !== $id_transaksi){
                    $keuntungan = $row['total_harga']-($row['total_harga']*0.1);
            ?>
            <tr>
                <td class="text-center"><?php echo $i++; ?></td>
                <td><?= date('d F Y', strtotime($row['tgl_transaksi']));?></td>
                <td> <?php echo $row['id_transaksi']; ?> </a></td>
                <td align="right"> <?php echo 'Rp '.number_format($row['total_harga'], 0,",",".") ?> </td>
                <td align="right"> <?php echo 'Rp '.number_format($row['total_harga']*0.1, 0,",","."); ?> </td>
                <td align="right"> <?php echo 'Rp '.number_format($keuntungan, 0,",","."); ?> </td>
            </tr>
            <?php $total_bersih = $total_bersih + $keuntungan;
            $id_transaksi = $row['id_transaksi']; } }?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" align="right"><b>TOTAL</b></td>
                <td align="right"> <?php echo 'Rp '.number_format($total_bersih, 0,",",".") ?> </td>
            </tr>
        </tfoot>
    </table>

	
</body>
</html>