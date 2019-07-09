			<div class="col-sm-12 col-lg-6">
			  	<?php if($transaksi_->num_rows() < 1): ?>
			  		<div class="col-sm-12 col-lg-12 col-p">
						<div class="card card-body shadow-sm no-border">
							Belum ada produk
						</div>
			  		</div>
				<?php endif; ?>

				<?php foreach ($transaksi_->result_array() as $transaksi): ?>
				<div class="list-group shadow-sm mb-3">
					<div class="list-group-item">
						<?php if ($transaksi['transaksi_status'] == 1 && $transaksi['transaksi_selesai'] == 1) { ?>
							<span class="btn btn-primary btn-sm">
								Transaksi Berhasil
							</span>
						<?php } elseif($transaksi['transaksi_status'] == 1 && $transaksi['transaksi_selesai'] == 0) { ?>
							<span class="btn btn-secondary btn-sm">
								Proses Konfirmasi
							</span>
						<?php } else { ?>
							<span class="btn btn-danger btn-sm">
								Data Belum Lengkap
							</span>
						<?php } ?>
						<span class="float-right">
							<small><?= $transaksi['transaksi_tanggal']; ?></small>
						</span>
					</div>
					<div class="list-group-item">
						<div class="table-responsive">
							<table class="table table-bordered table-striped mb-0">
								<tbody>
									<tr>
										<td>Kode</td>
										<td><?= $transaksi['transaksi_kode']; ?></td>
									</tr>
									<tr>
										<td>Total</td>
										<td><?= 'Rp'.rupiah($transaksi['transaksi_total']); ?></td>
									</tr>
									<tr>
										<td>Email</td>
										<td><?= $transaksi['transaksi_email']; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="list-group-item">
						<?php if ($transaksi['transaksi_selesai'] == 2) { ?>
							<a href="<?= base_url('customer/transaksi/retur?kode='.$transaksi['transaksi_kode']); ?>" class="btn btn-outline-secondary btn-sm">
								Ajukan Retur
							</a>
						<?php } ?>
						
						<?php if ($transaksi['transaksi_status'] == 0) { ?>
							<a href="<?= base_url('customer/transaksi/shipping'); ?>" class="btn btn-primary btn-sm float-right">
								Konfirmasi Order
							</a>
						<?php } else { ?>
						<a href="<?= base_url('customer/transaksi/konfirmasi?kode=').$transaksi['transaksi_kode']; ?>" class="btn btn-outline-primary btn-sm float-right">
							Lihat Detail Order
						</a>
						<?php } ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>