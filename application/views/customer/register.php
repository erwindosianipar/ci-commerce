<?php
if(isset($_SESSION['log_customer']) && $_SESSION['log_customer'] === TRUE){
	redirect(base_url('customer/profil'));
}
?>
<div class="container my-5">
	<div class="row">
		<div class="col-sm-12 col-lg-8">
			<div class="card card-body shadow-sm">
				<h5 class="mb-4 bold">Mendaftar</h5>
				<?= form_open('auth/register'); ?>
					<div class="row">
						<div class="col-sm-12 col-lg-6">
							<p class="bold">Nama Lengkap</p>
							<input type="text" name="nama" class="form-control mb-3" autofocus="on" autocomplete="off" required>
							<?= form_error('nama'); ?>
						</div>
						<div class="col-sm-12 col-lg-6">
							<p class="bold">Username</p>
							<input type="text" name="username" class="form-control mb-3" autocomplete="off" required>
							<?= form_error('username'); ?>
						</div>
						<div class="col-sm-12 col-lg-6">
							<p class="bold">Alamat Email</p>
							<input type="email" name="email" class="form-control mb-3" autocomplete="off" required>
							<?= form_error('email'); ?>
						</div>
						<div class="col-sm-12 col-lg-6">
							<p class="bold">Password</p>
							<input type="password" name="password" class="form-control mb-3" autocomplete="off" required>
							<?= form_error('password'); ?>
						</div>
					</div>
					<button class="btn btn-primary mt-3">Mendaftar Sekarang</button>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>