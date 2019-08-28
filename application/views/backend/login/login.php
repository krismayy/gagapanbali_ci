<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url();?>assets/backend/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <?php echo $this->session->flashdata('notification');?>
            <?php echo $this->session->flashdata('status');?>
            <div class="card-header text-center"><img class="logo-img" height="75px" width="250px" src="<?php echo base_url();?>assets/backend/images/logo.png" alt="logo"></a><span class="splash-description">Login</span></div>
            <div class="card-body">
                <form method="post" action="<?= site_url('Admin/proses');?>">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="email" type="text" placeholder="Email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" type="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>