<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Daftar User </h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="<?= site_url('AdminHapusUser');?>" class="breadcrumb-link">Daftar User</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Laporan Transaksi</li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- ============================================================== -->
    <!-- data table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;
                            if($data_user==null){
                            ?>
                            <tr>
                                <td colspan="5" class="text-center"><h5>Belum ada user!</h5></td>
                            </tr>
                            <?php  
                                } else{
                                foreach($data_user as $row){
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->nama; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->status; ?></td>

                                <?php if ($row->status == 'Active'){ ?>
                                <td class="text-center"><a href="<?php echo site_url('AdminHapusUser/proses_hapus_user/' . $row->id_user);?>" class="btn btn-danger">Non Active</a></td>
                                <?php } else { ?>
                                <td class="text-center"><a href="<?php echo site_url('AdminHapusUser/proses_hapus_user/' . $row->id_user);?>" class="btn btn-primary">Active</a></td>
                                <?php } ?>
                            </tr> 
                            <?php
                            }
                            }?>                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--============================================================== -->
    <!-- end data table  -->
    <!-- ============================================================== -->
</div>