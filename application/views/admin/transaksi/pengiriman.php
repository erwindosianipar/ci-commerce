    <h2 class="pt-2 mb-4"><?= $title ?></h2>
	<div class="row">
		<div class="col-sm-12 col-lg-6 mb-3">
			<?php
				if($this->session->flashdata('msg')) {
					echo '<div class="alert alert-primary shadow-sm" role="alert">';
					echo $this->session->flashdata('msg');
					echo '</div>';
				}
			?>
			<div class="card card-body shadow-sm">
				<div class="table-responsive mb-3">
					<table class="table table-striped table-bordered">
						<tbody>
							<tr>
								<td>Alamat</td>
								<td><?= $receiver['transaksi_alamat'] ?>, <?= $receiver['transaksi_kecamatan'] ?>, <?= $receiver['transaksi_kabupaten_kota'] ?>, <?= $receiver['transaksi_provinsi'] ?> <?= $receiver['transaksi_kode_pos'] ?></td>
							</tr>
							<tr>
								<td>Telepon</td>
								<td><?= $receiver['transaksi_no_hp'] ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?= $receiver['transaksi_email'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?= form_open('admin/transaksi/pengiriman'); ?>
					<input type="hidden" name="transaksi_kode" value="<?= $receiver['transaksi_kode']; ?>">
					<input type="hidden" name="transaksi_id" value="<?= $receiver['transaksi_id']; ?>">
					<div class="row mb-2">
						<div class="col-sm-12 col-lg-6 mb-3">
							<p class="bold">Nama Pengiriman</p>
							<input type="text" name="pengiriman_nama" class="form-control">
						</div>
						<div class="col-sm-12 col-lg-6">
							<p class="bold">Nomor Resi</p>
							<input type="text" name="pengiriman_kode" class="form-control">
						</div>
					</div>
					<button class="btn btn-primary">Simpan</button>
				<?= form_close(); ?>
			</div>
		</div>
		<div class="col-sm-12 col-lg-6 mb-3">
			<div class="list-group shadow-sm">
				<?php foreach ($produk_->result_array() as $produk): ?>
				<div class="list-group-item">
					<div class="media">
						<img src="<?= base_url('assets/images/produk/small/'.$produk['produk_gambar']) ?>" class="img-fluid">
						<div class="media-body ml-3">
							<div class="table-responsive">
								<table class="table table-striped table-bordered">
									<tbody>
										<tr>
											<td>Produk</td>
											<td><?= $produk['produk_nama']; ?></td>
										</tr>
										<tr>
											<td>Kuantitas</td>
											<td><?= $detail['keranjang_kuantitas']; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="col-sm-12 col-lg-6 mb-4">
			<div class="list-group shadow-sm">
				<div class="list-group-item">
					<div class="table-responsive">
						<table class="table table-bordered table-striped mb-0">
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
	</div>