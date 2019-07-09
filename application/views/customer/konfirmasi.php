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
					<?php if ($transfer['transaksi_selesai'] == 1) {
						echo "<b>Pembayaran untuk order ini telah diterima</b>";
					} else { ?>
					<a href="<?= base_url('konfirmasi-pembayaran?kode='.$transfer['transaksi_kode'].'&jumlah='.$transfer['transaksi_total']); ?>">
						<div class="btn btn-primary">
							Konfirmasi Pembayaran
						</div>
					</a>
				<?php } ?>
				</div>
			</div>
			<div class="list-group shadow-sm mb-3">
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
					<div class="table-responsive mt-3 rounded">
						<table class="table table-bordered table-striped mb-0">
							<thead>
								<tr>
									<th>Gambar</th>
									<th>Nama Produk</th>
									<th>Kuantitas</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($produk_->result_array() as $produk): ?>
								<tr>
									<td>
										<img src="<?= base_url('assets/images/produk/small/'.$produk['produk_gambar']); ?>" class="img-fluid">
									</td>
									<td>
										<?= $produk['produk_nama']; ?>
									</td>
									<td>
										&times;<?= $produk['keranjang_kuantitas']; ?>
									</td>
									<td>
										<a href="<?= base_url('customer/rating/produk/'.$produk['produk_id']); ?>">
											Rating
										</a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="list-group shadow-sm">
				<div class="list-group-item bold">
					Status Pengiriman
				</div>
				<div class="list-group-item">
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<tbody>
								<tr>
									<td>Nama Pengiriman</td>
									<td><?= $pengiriman['pengiriman_nama']; ?></td>
								</tr>
								<tr>
									<td>Nomor Resi</td>
									<td><?= $pengiriman['pengiriman_kode']; ?></td>
								</tr>
								<tr>
									<td>Tanggal Kirim</td>
									<td><?= $pengiriman['pengiriman_tanggal']; ?></td>
								</tr>
							</tbody>
						</table>
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
