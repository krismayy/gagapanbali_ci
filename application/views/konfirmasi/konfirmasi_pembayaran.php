<section id="do_action">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb" style="margin-bottom: 15px">
        <li><a href="<?= site_url('home');?>">Home</a></li>
        <li class="active">Konfirmasi Pembayaran</li>
      </ol>
    </div>
    <div class="heading">
      <h3>Konfirmasi Pembayaran</h3>
      <p></p>
    </div>
    <div class="row">
      <div class="col-md-7">
        <div class="chose_area">
          <form action="<?php echo site_url('transaksi/proses_konfirmasi'); ?>" method="post" enctype="multipart/form-data" style="margin-left: 12px">
            <?= $this->session->flashdata('kosong'); ?>
            <?= $this->session->flashdata('success'); ?>
            <!-- hidden field transaksi -->
            <input type="hidden" class="form-control" name="tgl_transaksi" value="<?= $transaksi->tgl_transaksi;?>">
            <input type="hidden" class="form-control" name="id_pembeli" value="<?= $transaksi->id_pembeli;?>">
            <!-- end hidden field -->
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Kode Transaksi</label>
              <div class="col-sm-8">
                <input hidden type="text" name="id_transaksi" value="<?= $transaksi->id_transaksi;?>">
                <input type="text" readonly class="form-control" value="<?= $transaksi->id_transaksi;?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Bank Anda</label>
              <div class="col-sm-8">
                <select class="form-control" name="bank">
                  <option value="<?php echo NULL; ?>">Pilih Nama Bank</option>
                  <?php foreach($bank as $item){?>
                  <option value="<?= $item->id_bank; ?>"><?php echo $item->nama_bank;?></option>
                  <?php };?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">No. Rekening</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="no_rekening">
              </div>
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Nama Pemilik Rekening</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nama_pemilik_rek">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Total Bayar</label>
              <div class="col-sm-8">
                <input type="hidden" class="form-control" name="total_harga" value="<?= $transaksi->total_harga;?>">
                <input type="text" disabled class="form-control" value="<?= 'Rp '.number_format($transaksi->total_harga, 0,",",".");?>">               
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Tanggal Bayar</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" name="tgl_bayar">
              </div>
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Bukti Pembayaran</label>
              <div class="col-sm-8">
                <input type="file" class="form-control-plaintext" name="bukti_pembayaran">
              </div>
            </div>
            <div class="form-group">
              <div align="right">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-5">
        <div class="alert alert-warning">
          <p>Konfirmasi pembayaran yang kami terima setelah jam 11.00 WIB (hari kerja Senin s/d Jum'at), pesanan akan kami proses keesokan harinya (hari kerja Senin s/d Jum'at).</p>
        </div>

        <div class="alert alert-info">
          <h4>Jadwal Layanan GagapanBali</h4>
            <p style="font-size: 15px">Senin s/d Jumat: jam 09.00 – 18.00 WIB <br>
              Telepon: +62 361 775 220 <br>
              Email: info@gagapanbali.com atau Hubungi Kami <br> <br>

              Sabtu/Minggu/Hari Libur, hubungi email. <br><br>

              Proses pemesanan pada hari Sabtu/Minggu/Libur akan dilakukan pada hari kerja berikutnya. Pemesanan pada hari raya akan memiliki kondisi khusus.</p>
        </div>

        <div class="alert alert-info">
          <p style="font-size: 15px">Untuk customer yang gagal dalam mengupload bukti bayar, Silakan mengirimkan bukti pembayaran anda ke alamat email info@gagapanbali.com dengan mencantumkan kode transaksi. </p>
        </div>
      </div>
    </div>
  </div>
</section>
