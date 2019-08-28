<!--form-->
<div class="container" style="margin-top: 15px; margin-bottom: 100px">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-offset-4">
            <div class="login-form"><!--login form-->
                <h2>Reset Password</h2>
                <div class='alert alert-info'>Masukkan alamat email yang terdaftar di Gagapan Bali dan Password Baru!</div>
                <?= $this->session->flashdata('passwordsama'); ?>
                <?= $this->session->flashdata('emailsalah'); ?>
                <form action="<?= site_url('login/proses_ubah_password'); ?>" method="post">
                    <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
                    <input type="email" class="form-control" placeholder="Email Anda *" name="email" />

                    <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>
                    <input type="password" class="form-control" placeholder="Password Baru *" name="password"  />

                    <input type="password" class="form-control" placeholder="Ulangi Password Baru *" name="password2"  />

                    <button type="submit" value="Ubah" class="btn btn-default">Lanjutkan</button>
                </form>
            </div><!--/login form-->
        </div>
    </div>
</div>
<!--/form-->