<div class="container my-5">
	<div class="row">
		<div class="col-sm-12 col-lg-7 mb-3">
			<div class="list-group shadow-sm mb-3">
				<div class="list-group-item bold">
					Konfirmasi Order
				</div>
				<div class="list-group-item">
					<p>
						Terima kasih telah bertransaksi.<br/>
						Kode transaksi: <b><?= $transfer['transaksi_kode']; ?></b>
					</p>
					<p>
						Konfirmasi order juga kami kirim ke email anda.<br/>
						Mohon menyelesaikan pembayaran anda sesuai instruksi berikut.
					</p>
					<div class="table-responsive rounded">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Jumlah Pembayaran</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<h4 class="bold mb-0">
											<?= 'Rp'.rupiah($transfer['transaksi_total']); ?>
										</h4>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<a href="<?= base_url('konfirmasi-pembayaran?kode='.$transfer['transaksi_kode'].'&jumlah='.$transfer['transaksi_total']); ?>">
						<div class="btn btn-primary">
							Konfirmasi Pembayaran
						</div>
					</a>
				</div>
			</div>
			<div class="list-group shadow-sm">
				<div class="list-group-item bold">
					Informasi Pemesanan
				</div>
				<div class="list-group-item">

					<div class="list-group-item">
						<div class="bold">Informasi Pembeli</div>
						<div><?= $transfer['transaksi_nama']; ?></div>
						<div><?= $transfer['transaksi_no_hp']; ?></div>
					</div>
					<div class="list-group-item">
						<div class="bold">Email</div>
						<div><?= $transfer['transaksi_email']; ?></div>
					</div>
					<div class="list-group-item">
						<div class="bold">Alamat Pengiriman</div>
						<div><?= $transfer['transaksi_alamat']; ?>, <?= $transfer['transaksi_kecamatan']; ?>, <?= $transfer['transaksi_kabupaten_kota']; ?> <?= $transfer['transaksi_kode_pos']; ?></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-lg-5">
			<div class="list-group shadow-sm">
				<div class="list-group-item bold">
					Tujuan Transfer
				</div>
				<?php foreach ($rekening_->result_array() as $rekening): ?>
				<div class="list-group-item">
					<div class="row">
						<div class="col-4 bold">
							<?= $rekening['rekening_bank']; ?>
						</div>
						<div class="col-8">
							<div class="bold"><?= $rekening['rekening_nomor']; ?></div>
							<div>AN: <?= $rekening['rekening_nama']; ?></div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
