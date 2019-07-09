    <h2 class="pt-2 mb-4"><?= $title ?></h2>
	<div class="row mb-5">
		<div class="col-sm-12 col-lg-12">
			<div class="list-group shadow-sm mb-3">
				<div class="list-group-item">
					<div class="table-responsive">
						<table class="table table-striped table-bordered mb-0">
							<thead>
								<tr>
									<th>No</th>
									<th>Gambar</th>
									<th>Nama Produk</th>
									<th>Diskon</th>
									<th>Harga</th>
									<th>Terjual</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=0; foreach ($laporan_->result_array() as $laporan): ?>
								<tr>
									<td><?= ++$no; ?></td>
									<td><img src="<?= base_url('assets/images/produk/small/'.$laporan['produk_gambar']); ?>" class="img-fluid"></td>
									<td><?= $laporan['produk_nama']; ?></td>
									<td><?= $laporan['produk_diskon'].'%'; ?></td>
									<td><?= 'Rp'.rupiah($laporan['produk_harga_diskon']); ?></td>
									<td><?= $laporan['kuantitas']; ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<a href="<?= base_url('admin/laporan/penjualan_print'); ?>">
				<button class="btn btn-primary float-right shadow-sm">
					<i class="fa fa-print"></i> Print laporan
				</button>
			</a>

		</div>
	</div>