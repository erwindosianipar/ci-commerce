    <div class="container my-5">
        <div class="row">
            <div class="col-sm-12 col-lg-3 mb-3">
                <div class="list-group">
                    <a href="<?= base_url('customer/keranjang'); ?>" class="list-group-item list-group-item-action shadow-sm text-dark no-uline">
                        Keranjang Saya
                    </a>
                    <!--<a href="<?= base_url(); ?>" class="list-group-item list-group-item-action shadow-sm text-dark no-uline">
                        Ubah Email
                    </a>--> 
                    <a href="<?= base_url('customer/profil/password'); ?>" class="list-group-item list-group-item-action shadow-sm text-dark no-uline">
                        Ubah Password
                    </a>
                    <a href="<?= base_url('customer/transaksi'); ?>" class="list-group-item list-group-item-action shadow-sm text-dark no-uline">
                        Riwayat Transaksi
                    </a>
                    <a href="<?= base_url('auth/logout'); ?>" class="list-group-item list-group-item-action shadow-sm text-dark no-uline">
                        Keluar (<?= '@'.$this->session->userdata('username'); ?>)
                    </a>
                </div>
            </div>
