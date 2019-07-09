		<div class="col-sm-12 col-lg-6 mb-3">
			<?php
				if($this->session->flashdata('msg')) {
					echo '<div class="alert alert-primary shadow-sm" role="alert">';
					echo $this->session->flashdata('msg');
					echo '</div>';
				}
			?>
			<div class="card card-body shadow-sm">
				<?= form_open('customer/profil/password'); ?>
					<p class="bold">Password lama</p>
					<input type="password" name="passwordold" class="form-control">
					<?= form_error('passwordold'); ?>

					<p class="bold mt-3">Password baru</p>
					<input type="password" name="passwordnew" class="form-control">
					<?= form_error('passwordnew'); ?>

					<p class="bold mt-3">Konfirmasi password baru</p>
					<input type="password" name="passconfnew" class="form-control">
					<?= form_error('passconfnew'); ?>
					
					<button name="submit" class="btn btn-primary mt-3">Perbarui</button>
				<?= form_close(); ?>
			</div>
		</div>
