    <h2 class="pt-2 mb-4"><?= $title ?></h2>
	<div class="row">
		<div class="col-sm-12 col-lg-12 mb-3">
			<div class="card card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Stok</th>
								<th>Diskon</th>
								<th>Harga</th>
								<th>Tanggal</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($produk_->result_array() as $produk): ?>
							<tr>
								<td><?= $produk['produk_nama']; ?></td>
								<td><?= $produk['produk_stok']; ?></td>
								<td><?= $produk['produk_diskon'].'%'; ?></td>
								<td><?= 'Rp'.rupiah($produk['produk_harga']); ?></td>
								<td><?= $produk['produk_tanggal']; ?></td>
								<td>
									<a href="<?= base_url('admin/produk/edit/'.$produk['produk_id']); ?>">
									<button class="btn btn-primary btn-sm">Edit</button>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>