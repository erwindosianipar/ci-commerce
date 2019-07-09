<div class="container my-5">
	<div class="row">
		<div class="col-sm-12 col-lg-6">
			<div class="list-group shadow-sm">
				<div class="list-group-item bold">
					Konfirmasi Pembayaran
				</div>
				<?= form_open_multipart('konfirmasi-pembayaran'); ?>
					<div class="list-group-item">
						<div class="row">
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Kode Transaksi</p>
								<input type="text" name="kode" value="<?= $kode; ?>" class="form-control mb-3" autocomplete="off">
								<?= form_error('kode'); ?>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Jumlah Transfer</p>
								<input type="number" name="jumlah" value="<?= $jumlah; ?>" class="form-control mb-3" autocomplete="off">
								<?= form_error('jumlah'); ?>
							</div>
						</div>
						<p class="bold">Rekening Tujuan</p>
						<select name="rekening_tujuan" class="form-control mb-3">
							<?php foreach ($rekening_->result_array() as $rekening): ?>
								<option value="<?= $rekening['rekening_bank']; ?> <?= $rekening['rekening_nomor']; ?> - A/N: <?= $rekening['rekening_nama']; ?>">
									<?= $rekening['rekening_bank']; ?> <?= $rekening['rekening_nomor']; ?> - A/N: <?= $rekening['rekening_nama']; ?>
								</option>
							<?php endforeach; ?>
						</select>
						<?= form_error('rekening_tujuan'); ?>
						<div class="row">
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Bank Asal</p>
								<input type="text" name="bank" class="form-control mb-3" autocomplete="off">
								<?= form_error('bank'); ?>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Nomor Rekening</p>
								<input type="text" name="rekening_asal" class="form-control mb-3" autocomplete="off">
								<?= form_error('rekening_asal'); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Nama Pemilik Rekening</p>
								<input type="text" name="atas_nama" value="<?= $profil['nama']; ?>" class="form-control mb-3" autocomplete="off">
								<?= form_error('atas_nama'); ?>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Gambar (Optional)</p>
								<input type="file" name="gambar">
								<p><small>Agar lebih cepat kami proses</small></p>
							</div>
						</div>
						<p class="bold">Catatan Lainnya (Optional)</p>
						<textarea name="catatan" class="form-control mb-4"></textarea>
						<?= form_error('catatan'); ?>
						<button class="btn btn-primary">Konfirmasi Pembayaran</button>
					</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>