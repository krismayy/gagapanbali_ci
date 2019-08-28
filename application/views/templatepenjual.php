<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gagapanbali</title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/lightbox.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/dataTables/datatables.min.css" rel="stylesheet">

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
    
    <!--Content-->
    <section>
        <div class="container" style="margin-top: 50px">
            <div class="row">
                <?php echo $_sidebarpenjual; ?>
                
                <?php echo $_content; ?>
            </div>
        </div>
    </section>
        
    <!--/Content-->

    <!--Footer-->
        <?php echo $_footer; ?>
    <!--/Footer-->
    

  
    <!-- <script src="<?php echo base_url();?>assets/js/jquery.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/range-date.js"></script>
    <script src="<?php echo base_url();?>assets/js/lightbox-plus-jquery.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/price-range.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <script src="<?php echo base_url();?>assets/dataTables/datatables.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/script.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>