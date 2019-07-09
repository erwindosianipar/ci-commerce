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
				<p class="bold">Kategori</p>
				<?= form_open('admin/kategori/tambah'); ?>
					<input type="text" name="nama" class="form-control mb-3" autocomplete="off" autofocus="on">
					<?= form_error('nama'); ?>
					<button name="submit" class="btn btn-primary">Submit</button>
				<?= form_close(); ?>
			</div>
		</div>
		<div class="col-sm-12 col-lg-6">
			<div class="card">
				<div class="card-body shadow-sm">
					<?php foreach ($kategori_->result_array() as $kategori): ?>
						<a href="<?= base_url('kategori/'.$kategori['kategori_slug']) ?>">
							<div class="btn btn-outline-primary btn-sm my-1">
								<i class="fa fa-tag"></i> <?= $kategori['kategori_nama']; ?>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>