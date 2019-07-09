    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <img src="<?= base_url('assets/images/logo/logo.png'); ?>">
            </a>

            <button class="btn bg-secondary navbar-toggler" type="button" data-toggle="collapse" data-target="#nvc" aria-controls="nvc" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa-1x"></span>
            </button>

            <div class="collapse navbar-collapse" id="nvc">
                <div class="my-4 d-lg-none"></div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="form-inline input-group">
                            <input type="text" class="form-control bg-light no-border" placeholder="Pencarian" aria-label="Pencarian" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-secondary">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-3 d-lg-none"></div>

                <?php if (isset($_SESSION['log_customer']) && $_SESSION['log_customer'] === TRUE){ ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="text-white no-uline" href="<?= base_url('customer/keranjang'); ?>">
                            <i class="fa fa-shopping-cart fa-2x"></i>
                            <span class="badge badge-pill badge-danger"><?= $keranjang; ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="topbar-dividers d-none d-sm-block mb-0"></div>
                    </li>
                    <div class="my-2 d-lg-none"></div>
                    <li class="nav-item mt-2">
                        <a class="text-white no-uline text-uppercase" href="<?= base_url('customer/profil'); ?>">
                            <?= $this->session->userdata('username'); ?>
                        </a>
                    </li>
                    <div class="mb-2 d-lg-none"></div>
                </ul>                
                <?php } else { ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-outline-secondary text-white mr-2" href="<?= base_url('auth/register'); ?>">
                            Mendaftar Akun
                        </a>
                    </li>
                    <div class="my-2 d-lg-none"></div>
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="<?= base_url('auth/login'); ?>">Login</a>
                    </li>
                </ul>
                <?php } ?>

            </div>
        </div>
    </nav>
