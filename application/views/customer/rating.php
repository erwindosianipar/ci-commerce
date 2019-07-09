			<div class="col-sm-12 col-lg-9">
				<?php
					if($this->session->flashdata('msg')) {   
					echo '<div class="alert alert-primary shadow-sm" role="alert">';
					echo $this->session->flashdata('msg');
					echo '</div>';
					}
				?>
				<div class="card card-body shadow-sm">
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Gambar Produk</th>
									<th>Nama Produk</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><img src="<?= base_url('assets/images/produk/small/'.$produk['produk_gambar']); ?>"></td>
									<td><?= $produk['produk_nama']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<?= form_open('customer/rating/produk/'.$produk['produk_id']); ?>
						<div class="row">
							<div class="col-sm-12 col-lg-4 mb-3">
								<p class="bold">Nilai Rating (1-5)</p>
								<input type="number" name="rating" class="form-control">
								<?= form_error('rating'); ?>
							</div>
							<div class="col-sm-12 col-lg-12">
								<p class="bold">Keterangan</p>
								<textarea name="keterangan" class="form-control" placeholder="Pendapat anda tentang produk ini..."></textarea>	
								<?= form_error('keterangan'); ?>
							</div>
						</div>
						<button class="btn btn-primary mt-4">Simpan</button>
					<?= form_close(); ?>
				</div>
			</div>
