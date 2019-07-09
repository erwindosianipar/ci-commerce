<?php
if(isset($_SESSION['log_customer']) && $_SESSION['log_customer'] === TRUE){
	redirect(base_url('customer/profil'));
}
?>
<div class="container my-5">
	<div class="row">
		<div class="col-sm-12 col-lg-7 float-center">
			<?php
				if($this->session->flashdata('msg')) {
					echo '<div class="alert alert-primary shadow-sm" role="alert">';
					echo $this->session->flashdata('msg');
					echo '</div>';
				}
			?>

			<div class="card card-body shadow-sm">
				<center><h4 class="bold mt-3">Lupa Password</h4></center>
				<?= form_open('auth/forget'); ?>
					<div class="row my-3">
						<div class="col-sm-12 col-lg-7 float-center">
							<input type="text" name="email" class="form-control" placeholder="Email" autocomplete="off" autofocus="on">
							<?= form_error('email') ?>
							<button name="submit" class="btn btn-dark btn-block mt-4 mb-4">Reset Password</button>
							<a href="<?= base_url('auth/register'); ?>">Mendaftar Akun</a>
							<span class="float-right">
								<a href="<?= base_url('auth/login'); ?>">
									Login Akun
								</a>
							</span>
							<div class="pt-4"></div>
						</div>
					</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>