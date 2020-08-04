    <h2 class="pt-2 mb-4"><?= $title ?></h2>
	<div class="row">
		<div class="col-sm-12 col-lg-6 mb-3">
		<?= form_open_multipart('admin/produk/tambah'); ?>
			<?php
				if($this->session->flashdata('msg')) {   
					echo '<div class="alert alert-primary shadow-sm" role="alert">';
					echo $this->session->flashdata('msg');
					echo '</div>';
				}
			?>
			<div class="card card-body shadow-sm">
				<p class="bold">Nama</p>
				<input type="text" name="produk_nama" class="form-control mb-3" autocomplete="off" autofocus="on">
				<?= form_error('produk_nama'); ?>
				<p class="bold">Harga</p>
				<input type="number" name="produk_harga" value="0" class="form-control mb-3" autocomplete="off">
				<?= form_error('produk_harga'); ?>
				<p class="bold">Deskripsi</p>
				<textarea name="produk_deskripsi" class="form-control mb-3"></textarea>
				<?= form_error('produk_deskripsi'); ?>
			</div>
		</div>
		<div class="col-sm-12 col-lg-6">
			<div class="card">
				<div class="card-body shadow-sm">
					<p class="bold">Kategori</p>
					<select name="produk_kategori_id" class="form-control mb-3">
						<option disabled>Tidak ada kategori</option>
						<?php foreach ($kategori_->result_array() as $kategori): ?>
						<option value="<?= $kategori['kategori_id']; ?>">
							<?= $kategori['kategori_nama']; ?>
						</option>
						<?php endforeach; ?>
					</select>
					<?= form_error('produk_kategori_id'); ?>
					<p class="bold">Gambar</p>
					<input type="file" name="produk_gambar" class="mb-3">
					<?= form_error('produk_gambar'); ?>
					<p class="bold">Stok</p>
					<input type="number" name="produk_stok" value="0" class="form-control mb-3" autocomplete="off">
					<?= form_error('produk_stok'); ?>
					<p class="bold">Diskon</p>
					<input type="number" name="produk_diskon" value="0" class="form-control mb-3" autocomplete="off">
					<?= form_error('produk_diskon'); ?>
					<button name="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		<?= form_close(); ?>
		</div>
	</div>