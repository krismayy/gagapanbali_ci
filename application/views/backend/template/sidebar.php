<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('AdminDashboard');?>" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('AdminHapusUser');?>" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-fw fa-table"></i>Daftar User</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('AdminViewTransaksi');?>" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Rekapan Transaksi</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('AdminViewTransaksi/verifikasi_pembayaran');?>" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Verifikasi Pembayaran</a>
                    </li>
                    <!-- <li class="nav-divider">
                        Data Master
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Data Kategori </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-columns"></i>Data Bank</a>
                    </li> -->
                </ul>
            </div>
        </nav>
    </div>
</div>