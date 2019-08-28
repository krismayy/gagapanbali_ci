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
                    <b>Toko <?php echo $detail_toko['nama_toko']; ?></b>
                    <br>Alamat : <?php echo $detail_toko['alamat_toko']; ?>
                </span>
            </td>
            <?php $id_toko = $detail_toko['id_toko']; } } ?>
        </tr>
    </table>

    <hr class="line-title">

    <table style="width: 100%">
        <tr>
            <td align="center">
                <b>LAPORAN JUMLAH BARANG TERJUAL</b>
                <br>
                <br>
            </td>
        </tr>
    </table>

    <table id="example" class="table table-striped table-bordered second" style="width:100%">
        <thead>
            <tr>
                <th class="text-center align-middle" valign="middle">No</th>
                <th class="text-center">Nama Barang</th>
                <th class="text-center">Jumlah Terjual</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                foreach($laporan as $row){
            ?>
            <tr>
                <td class="text-center"><?php echo $i++; ?></td>
                <td> <?= strtoupper($row['nama_barang']); ?> </td>
                <td align="right"> <?= $row['terjual'].' Buah'; ?> </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>