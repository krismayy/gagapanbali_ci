<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet">

    <title>Detail Pesanan</title>

</head>
<body>
    <div class="row">
        <div class="col-sm-9">
    <div class="chose_area">
        <ul><h3>Gagapanbali.com</h3></ul>
    <?php
        $id_cus = "";
        foreach ($transaksi as $item):
            if($item['id_pembeli'] !== $id_cus){
    ?>
    <table style="margin-left: 30px" >
        <tr>
            <td>Kode Transaksi</label></td>
            <td><?php echo ucwords($item['id_transaksi']); ?></td>
        </tr>
    
        <tr>
            <td>
                Nama 
            </td>
            <td>
                <?php echo ucwords($item['nama']); ?>
            </td>
        </tr>
        <tr>
            <td>
                No Telepon 
            </td>
            <td>
                <?php echo $item['no_hp_pembeli']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Alamat 
            </td>
            <td>
                <?php echo ucwords($item['alamat']); ?>
            </td>
        </tr>
        <tr>
            <td>
                Bukti Pembayaran 
            </td>
            <td>
                <?php if($item['bukti_pembayaran'] == null){ ?>
                    Belum Upload Bukti
                <?php } else { ?>
                <img src="<?php echo 'uploads/buktipembayaran/'.$item['bukti_pembayaran']; ?>" alt="" height="50px" width="50px">
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>
                Status Bayar 
            </td>
            <td>
                <?php echo ucwords($item['status_bayar']); ?>
            </td>
        </tr>
        <tr>
            <td>
                Status Barang
            </td>
            <td>
                <?php echo ucwords($item['status_barang']); ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <label style="margin-left: 30px">Nb: Transfer ke Rekening BNI 1022102312 a.n Gagapan Bali sesuai dengan Total Bayar</label>
        </tr>
    </table>
    <?php 
        $id_cus = $item['id_pembeli'];
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
            if($item['id_barang'] !== $id_barang){

        ?>
            <tr>
                <td class="text-center"><?php echo $i++; ?></td>
                <td>
                    <img src="<?php echo 'uploads/produk/'.$item['foto']; ?>" alt="" height="100px" width="100px">
                </td>
                <td class="cart_description">
                    <h4><a href=""></a><?php echo ucwords($item['nama_barang']); ?></h4>
                    <p></p>
                </td>
                <td class="cart_price text-center">
                    <p><?php echo number_format($item['harga'], 0,",","."); ?></p>
                </td>
                <td class="cart_quantity text-center">
                        <p><?php echo $item['jumlah'];?></p>
                </td>
                <td class="cart_total" align="right">
                    <p class="cart_total_price"><?php echo number_format($item['harga']*$item['jumlah'], 0,",",".") ?></p>
                </td>                  
            </tr>
            <?php
            $id_barang = $item['id_barang'];
                } endforeach; 
            ?>
        </tbody>
        
        <tfoot>
            <?php
                $id_cus = "";
                foreach ($transaksi as $item):
                    if($item['id_pembeli'] != $id_cus){
            ?>
            <tr>
                <td colspan="5" align="right">Total</td>
                <td align="right"><b>Rp <?php echo number_format($item['total_harga'], 0,",","."); ?></b></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5" align="right">Diskon</td>
                <td align="right"><b>-</b></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5" align="right">Total Bayar</td>
                <td align="right"><b>Rp <?php echo number_format($item['total_harga'], 0,",","."); ?></b></td>
                <td></td>
            </tr>
            <?php 
                $id_cus = $item['id_pembeli'];
                } endforeach; 
            ?>
        </tfoot>
        </table>  
    </div>
</div>
</div>
</body>
</html>