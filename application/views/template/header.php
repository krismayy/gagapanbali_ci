<header id="header">
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +62 361 775 220</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@gagapanbali.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="<?php echo site_url('home');?>"><img src="<?php echo base_url()?>assets/images/home/logo.png" alt="" height="50px" width="200px" style="margin-top: -5%;" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="mainmenu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo site_url('penjual');?>"><i class="fa fa-user"></i> Menu Penjual</a></li>
                                <li><a href="<?= site_url('transaksi/tampil_cart') ?>"><i class="fa fa-shopping-cart"></i> <?= $this->cart->total_items(); ?> item</a></li>
                                <?php
                                    if(!$this->session->userdata('user')){
                                ?>
                                    <li><a href="<?php echo site_url('login'); ?>"><i class="fa fa-lock"></i> Login | Registrasi</a></li>
                                <?php  
                                    } else {
                                        $name = trim($this->session->userdata('user')['nama']);
                                        $last_name = (strpos($name, ' ') === false) ? $name : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
                                ?>
                                <li class="dropdown"><a href="#"><?php echo 'Welcome '.$last_name.'!'; ?><i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?php echo site_url('pembeli'); ?>">Akun Saya</a></li>
                                        <li><a href="<?php echo site_url('pesanan'); ?>">Pesanan Saya</a></li>
                                        <li><a href="<?php echo site_url('login/logout'); ?>">Logout</a></li> 
                                    </ul>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <!-- <div class="header-bottom"><!--header-bottom-->
            <!-- <div class="container">
                <div class="row">
                </div>
            </div> -->
        <!-- </div>/header-bottom -->
    </header>