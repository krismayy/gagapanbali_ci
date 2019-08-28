<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gagapanbali</title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/DataTables/datatables.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

    <!--header-->
    <?php echo $_header; ?>
    <!--/header-->
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?= $this->session->flashdata('notification'); ?>
            </div>
        </div>
    </div>
    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>Gagapan</span>Bali</h1>
                                    <h2>Kacang Koro</h2>
                                    <p>Jika Anda berkunjung ke Bali, jangan lewatkan untuk merasakan kelezatan dan kerenyahan Kacang Koro Sri Ganesh. Sajikan kerenyahannya untuk semakin menyempurnakan waktu santai Anda bersama keluarga. </p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="<?php echo base_url();?>assets/images/home/slider1.jpg" class="girl img-responsive" alt="" style="width: 384px; height: 341px; margin-top: 25%" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Gagapan</span>Bali</h1>
                                    <h2>Pie Susu Kacang</h2>
                                    <p>Oleh -oleh khas Bali yang banyak diburu wisatawan ini. Teksturnya yang lembut dan rasa manis yang khas membuat Pie Susu Kacangl ini cocok untuk disantap saat waktu luang ataupun berkumpul bersama keluarga anda.</p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="<?php echo base_url();?>assets/images/home/slider2.jpg" class="girl img-responsive" alt="" style="width: 384px; height: 341px; margin-top: 25%" />
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Gagapan</span>Bali</h1>
                                    <h2>Sambal Naknan</h2>
                                    <p>Bagi pecinta sambal dan makanan pedas wajib nih cobain sambal naknan ini. Diolah dengan menggunakan bahan-bahan yang berkualitas dan cabai yang bermutu tinggi menjadikan sambal naknan ini memiliki rasa pedas yang nikmat dan bikin nagih.</p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="<?php echo base_url();?>assets/images/home/slider3.jpg" class="girl img-responsive" alt="" style="width: 384px; height: 341px; margin-top: 25%" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!--/slider-->
    
    <!--Content-->
        <?php echo $_content; ?>
    <!--/Content-->

    <!--Footer-->
        <?php echo $_footer; ?>
    <!--/Footer-->
    

  
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/price-range.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <script src="<?php echo base_url();?>assets/DataTables/datatables.min.js"></script>
</body>
</html>