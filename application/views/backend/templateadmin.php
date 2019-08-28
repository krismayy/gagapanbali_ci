<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url();?>assets/backend/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/vendor/datatables/css/fixedHeader.bootstrap4.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/dataTables/datatables.min.css"> 
     <link href="<?php echo base_url();?>assets/css/lightbox.css" rel="stylesheet">

    <title>Admin Gagapanbali</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php echo $_header;?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php echo $_sidebar;?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <?php echo $_content;?>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php echo $_footer;?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="<?php echo base_url();?>assets/backend/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="<?php echo base_url();?>assets/backend/libs/js/main-js.js"></script>
    <script src="<?php echo base_url();?>assets/backend/libs/js/dashboard-ecommerce.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="<?php echo base_url();?>assets/backend/libs/js/main-js.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/datatables/js/data-table.js"></script>
     <script src="<?php echo base_url();?>assets/backend/dataTables/datatables.min.js"></script> 
     <script src="<?php echo base_url();?>assets/js/lightbox-plus-jquery.js"></script>

</body>
 
</html>