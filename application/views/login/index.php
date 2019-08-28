<!--form-->
<div class="container" style="margin-top: 15px; margin-bottom: 100px">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-2">
             <?php echo $this->session->flashdata('notification');?>
             <?php echo $this->session->flashdata('status');?>
             <?php echo $this->session->flashdata('ubahpassword');?>
            <div class="login-form"><!--login form-->
                <h2>Login dengan Akun Anda!</h2>
                <form action="<?php echo site_url('Login/proses'); ?>" method="post">
                    <input type="email" class="form-control" placeholder="Email Anda *" name="email" />

                    <input type="password" class="form-control" placeholder="Password Anda *" name="password"  />

                    <span>
                        <a href="<?= site_url('Login/ubah_password');?>">Lupa Password?</a>
                    </span>
                    <button type="submit" name="action" value="Login" class="btn btn-default">Login</button>
                </form>
            </div><!--/login form-->
        </div>
        <div class="col-sm-1">
            <h2 class="or">OR</h2>
        </div>
        <div class="col-sm-4">
            <div class="signup-form"><!--sign up form-->
                <h2>Pengguna Baru Silahkan Daftar!</h2>
                <form action="<?php echo site_url('Login/proses'); ?>" method="post">

                    <?= form_error('nama', ' <small class="text-danger pl-3">', '</small>'); ?>
                    <input type="text" class="form-control" placeholder="Nama Lengkap Anda *" name="nama" />

                    <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
                    <input type="email" class="form-control" placeholder="Email Anda *" name="email"  />
                   
                    <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>
                    <input type="password" class="form-control" placeholder="Password Anda *" name="password" value=""  />
                    
                    <input type="password" class="form-control" placeholder="Masukan Ulang Password Anda *" name="password2" value=""  />
                    

                    <button type="submit" name="action" value="Register" class="btn btn-default">Register</button>
                </form>
            </div><!--/sign up form-->
        </div>
    </div>
</div>
<!--/form-->