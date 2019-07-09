	<h2 class="pt-2 mb-4"><?= $title; ?></h2>
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
				<?= form_open('admin/rekening'); ?>
					<div class="row">
						<div class="col-sm-12 col-lg-6 mb-3">
							<p class="bold">Nama Pemilik</p>
							<input type="text" name="rekening_nama" class="form-control" autocomplete="off">
							<?= form_error('rekening_nama'); ?>
						</div>
						<div class="col-sm-12 col-lg-6">
							<p class="bold">Nama Bank</p>
							<input type="text" name="rekening_bank" class="form-control" autocomplete="off">
							<?= form_error('rekening_bank'); ?>
						</div>
					</div>
					<p class="bold">Nomor Rekening</p>
					<input type="text" name="rekening_nomor" class="form-control" autocomplete="off">
					<?= form_error('rekening_nomor'); ?>
					<button name="submit" class="btn btn-primary mt-4">Simpan</button>
				<?= form_close(); ?>
			</div>
		</div>
		<div class="col-sm-12 col-lg-6 mb-3">
			<div class="list-group shadow-sm">
				<div class="list-group-item">
					<b>Daftar Rekening</b>
				</div>
			  	<?php if($rekening_->num_rows() < 1): ?>
				<div class="list-group-item">
					Belum ada rekening
				</div>
				<?php endif; ?>

				<div class="list-group-item">
					<div class="table-responsive">
						<table class="table table-bordered mb-0">
							<tbody>
								<?php $no=0; foreach ($rekening_->result_array() as $rekening): $no++; ?>
								<tr>
									<td colspan="2"><?= $rekening['rekening_bank']; ?></td>
									<td>
										<?= $rekening['rekening_nomor']; ?><br/>
										A/N: <?= $rekening['rekening_nama']; ?>
									</td>
									<td><a href="#" onclick="hapus<?= $no; ?>()">Hapus</a></td>
								<script type="text/javascript">
									function hapus<?= $no; ?>() {
										var question = confirm("Jalankan tindakan ini?");
										if (question == true) {
											window.location = "<?= base_url('admin/rekening/hapus/'.$rekening['rekening_id']); ?>";
											return true;
										} else {
											window.location = "<?= base_url('admin/rekening'); ?>";
											return false;
										}		
									}
								</script>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </div>