    <h2 class="pt-2 mb-4"><?= $title ?></h2>
	<div class="row">
		<div class="col-sm-12 col-lg-8 mb-0">
			<div class="list-group shadow-sm">
				<div class="list-group-item">
					<b><?= $transaksi['transaksi_kode']; ?></b>
					<span class="float-right">
						<?= $transaksi['konfirmasi_tanggal']; ?>
					</span>
				</div>
				<div class="list-group-item">
					<div class="table-responsive">
						<table class="table table-bordered table-striped mb-0">
							<tbody>
								<tr>
									<td>Dari Rekening</td>
									<td><b><?= $transaksi['bank']; ?></b> - <?= $transaksi['rekening_asal']; ?> A/N:<?= $transaksi['atas_nama']; ?></td>
								</tr>
								<tr>
									<td>Rekening Tujuan</td>
									<td><?= $transaksi['rekening_tujuan']; ?></td>
								</tr>
								<tr>
									<td>Jumlah Transfer</td>
									<td><?= 'Rp'.rupiah($transaksi['jumlah_transfer']); ?></td>
								</tr>
								<tr>
									<td>Total Belanja</td>
									<td><?= 'Rp'.rupiah($transaksi['transaksi_total']); ?></td>
								</tr>
								<tr>
									<td>No. Telepon</td>
									<td><?= $transaksi['transaksi_no_hp']; ?></td>
								</tr>
								<tr>
									<td>Alamat Email</td>
									<td><?= $transaksi['transaksi_email']; ?></td>
								</tr>
								<tr>
									<td>Catatan</td>
									<td><?= $transaksi['catatan']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="list-group-item">
				<?php if ($transaksi['transaksi_selesai'] == 1) {
					echo "Transaksi ini telah dikonfirmasi oleh admin";
				} else { ?>
					<a href="<?= base_url('admin/transaksi/konfirmasi/'.$transaksi['transaksi_kode']); ?>">
						<button class="btn btn-primary btn-sm float-right">
							Konfirmasi Transaksi
						</button>
					</a>
				<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-lg-4">
			<div class="card card-body shadow-sm">
				<img src="<?= base_url('assets/images/transaksi/'.$transaksi['konfirmasi_gambar']); ?>" class="img-fluid">
			</div>
			<a href="<?= base_url('assets/images/transaksi/'.$transaksi['konfirmasi_gambar']); ?>" target="_blank">
				<button class="mt-3 btn btn-primary btn-sm">Lihat Ukuran Asli</button>
			</a>
		</div>
	</div>