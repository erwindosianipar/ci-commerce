    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard'); ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-1">Administrator</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>Produk</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/produk/tambah'); ?>">Tambah Produk</a>
                        <a class="collapse-item" href="<?= base_url('admin/produk'); ?>">Lihat List Produk</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTR" aria-expanded="true" aria-controls="collapseUtilities">
                    <span>Transaksi</span>
                </a>
                <div id="collapseTR" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/transaksi'); ?>">Transaksi Penjualan</a>
                        <a class="collapse-item" href="<?= base_url('admin/transaksi/terkonfirmasi'); ?>">Transaksi Terkonfirmasi</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/kategori/tambah'); ?>">
                    <span>Kategori Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/laporan/customer'); ?>">
                    <span>Data Customer</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/laporan/penjualan'); ?>">
                    <span>Laporan Penjualan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/rekening'); ?>">
                    <span>Nomor Rekening</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/carousel'); ?>">
                    <span>Carousel Slide</span>
                </a>
            </li>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm pl-1 pr-1">
                    <button id="sidebarToggleTop" class="btn d-md-none bg-primary text-white ml-3">
                        <span class="fa fa-bars"></span>
                    </button>
                    <!--<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 p-3" placeholder="Cari" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary pl-3 pr-3 p-0" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>-->

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 p-3" placeholder="Cari" aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary pl-3 pr-3 p-0" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle fa-2x"></i>
                                <span class="ml-2 d-none d-lg-inline text-gray-600 small">
                                    <?= '@'.$this->session->userdata('username'); ?>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('admin/profil/password'); ?>">
                                    Ganti Password
                                </a>
                                <a class="dropdown-item" href="<?= base_url('admin/logout'); ?>">
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
