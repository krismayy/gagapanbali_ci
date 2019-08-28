<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h3 class="text-center">Welcome Admin!</h3>
    </div>
</div>

<div class="row">
    <!-- ============================================================== -->
    <!-- four widgets   -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- total views   -->
    <!-- ============================================================== -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Total Transaksi</h5>
                    <h2 class="mb-0"><?php foreach ($jumlahTransaksi as $transaksi) {
                    	echo $transaksi->jumlah; 
                    } ?></h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                    <i class="fa fa-credit-card fa-fw fa-sm text-info"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end total views   -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- total followers   -->
    <!-- ============================================================== -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Total User</h5>
                    <h2 class="mb-0"><?php foreach ($jumlahUser as $user) {
                    	echo $user->jumlah; 
                    } ?></h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end total followers   -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- total earned   -->
    <!-- ============================================================== -->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Total Pendapatan</h5>
                    <h2 class="mb-0"> <?= 'Rp '.number_format($totalPendapatan, 0,",","."); ?></h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                    <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end total earned   -->
    <!-- ============================================================== -->
</div>