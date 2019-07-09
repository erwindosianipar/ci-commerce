<div class="container my-5">
	<div class="row">
		<div class="col-sm-12 col-lg-8 mb-3">
			<?= form_open('customer/transaksi/shipping'); ?>
				<div class="list-group shadow-sm">
					<div class="list-group-item bold">
						Detail Penerima
					</div>
					<div class="list-group-item">
						<div class="row mb-3">
							<div class="col-sm-12 col-lg-6 mb-2">
								<p class="bold">Nama</p>
								<input type="text" name="nama" value="<?= $profil['nama'] ?>" class="form-control" autocomplete="off">
								<?= form_error('nama'); ?>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Email</p>
								<input type="text" name="email" value="<?= $profil['email'] ?>" class="form-control" autocomplete="off">
								<?= form_error('email'); ?>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-sm-12 col-lg-6 mb-2">
								<p class="bold">Alamat</p>
								<textarea name="alamat" class="form-control"><?= $profil['alamat'] ?></textarea>
								<?= form_error('alamat'); ?>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Kecamatan</p>
								<input type="text" name="kecamatan" value="<?= $profil['kecamatan'] ?>" class="form-control" autocomplete="off">
								<?= form_error('kecamatan'); ?>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-sm-12 col-lg-6 mb-2">
								<p class="bold">Kabupaten / Kota</p>
								<input type="text" name="kabupaten_kota" value="<?= $profil['kabupaten_kota'] ?>" class="form-control" autocomplete="off">
								<?= form_error('kabupaten_kota'); ?>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Provinsi</p>
								<input type="text" name="provinsi" value="<?= $profil['provinsi'] ?>" class="form-control" autocomplete="off">
								<?= form_error('provinsi'); ?>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-sm-12 col-lg-6 mb-2">
								<p class="bold">Kode POS</p>
								<input type="number" name="kode_pos" value="<?= $profil['kode_pos'] ?>" class="form-control" autocomplete="off">
								<?= form_error('kode_pos'); ?>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">No. Telepon</p>
								<input type="number" name="telepon" value="<?= $profil['no_hp'] ?>" class="form-control" autocomplete="off">
								<?= form_error('telepon'); ?>
							</div>
						</div>
						<button name="submit" class="btn btn-primary">Konfirmasi</button>
					</div>
				</div>
			<?= form_close(); ?>
		</div>
		<div class="col-sm-12 col-lg-4">
			<div class="list-group shadow-sm">
				<div class="list-group-item bold">
					Produk Order
				</div>
				<?php foreach ($konfirmasi_->result_array() as $konfirmasi): ?>
				<div class="list-group-item">
					<div class="media">
						<img src="<?= base_url('assets/images/produk/small/'.$konfirmasi['produk_gambar']); ?>" class="mr-3">
						<div class="media-body">
							<?= $konfirmasi['produk_nama']; ?>
							<div class="row mt-2 bold">
								<div class="col-6">
									&times;<?= $konfirmasi['keranjang_kuantitas']; ?>
								</div>
								<div class="col-6">
									<span class="float-right">
										<?= 'Rp'.rupiah($konfirmasi['keranjang_harga']); ?>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="list-group-item bg-light">
					<h4 class="mb-0 bold float-right"><?= 'Rp'.rupiah($total); ?></h4>
				</div>
			</div>
		</div>
	</div>
</div>