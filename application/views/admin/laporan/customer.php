    <h2 class="pt-2 mb-4"><?= $title ?></h2>
	<div class="row">
		<div class="col-sm-12 col-lg-12">
			<div class="list-group shadow-sm mb-3">
				<div class="list-group-item">
					<div class="table-responsive">
						<table class="table table-striped table-bordered mb-0">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Email</th>
									<th>Gender</th>
									<th>Telepon</th>
									<th>Terdaftar</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=0; foreach ($laporan_->result_array() as $laporan): ?>
								<tr>
									<td><?= ++$no; ?></td>
									<td><?= $laporan['nama']; ?></td>
									<td><?= $laporan['alamat']; ?>, <?= $laporan['kecamatan']; ?>, <?= $laporan['kabupaten_kota']; ?>, <?= $laporan['provinsi']; ?> <?= $laporan['kode_pos']; ?></td>
									<td><?= $laporan['email']; ?></td>
									<td>
										<?php
										if ($laporan['gender'] == 0) {
											echo "-";
										} elseif ($laporan['gender'] == 1){
											echo "Laki-laki";
										} elseif($laporan['gender'] == 2){
											echo "Perempuan";
										}
										?>
									</td>
									<td><?= $laporan['no_hp']; ?></td>
									<td><?= $laporan['tgl_daftar']; ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<a href="<?= base_url('admin/laporan/customer_print'); ?>">
				<button class="btn btn-primary float-right shadow-sm">
					<i class="fa fa-print"></i> Print laporan
				</button>
			</a>

		</div>
	</div>