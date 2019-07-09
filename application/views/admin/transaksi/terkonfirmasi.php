    <h2 class="pt-2 mb-4"><?= $title ?></h2>
	<div class="row">
		<div class="col-sm-12 col-lg-6">
			<?php $no=0; foreach ($terkonfirmasi_->result_array() as $konfirmasi): $no++; ?>
			<div class="list-group shadow-sm mb-3">
				<div class="list-group-item">
					<span class="bold"><?= $konfirmasi['konfirmasi_transaksi_kode']; ?></span>
					<span class="float-right text-muted"><?= $konfirmasi['konfirmasi_tanggal']; ?></span>
				</div>
				<div class="list-group-item">
					<h4 class="mb-0"><?= 'Rp'.rupiah($konfirmasi['jumlah_transfer']); ?></h4>
				</div>
				<div class="list-group-item">
					<a href="<?= base_url('admin/transaksi/produk/'.$konfirmasi['konfirmasi_transaksi_kode']); ?>">
						Buat Pengiriman
					</a>
					<a href="<?= base_url('admin/transaksi/detail/'.$konfirmasi['konfirmasi_id']); ?>">
						<div class="btn btn-primary btn-sm float-right">Detail Transaksi</div>
					</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>