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
				<center><h4 class="bold mt-3">Perbaharui Password</h4></center>
				<?= form_open('auth/password_reset/'.$hash.'?email='.$email.''); ?>
					<div class="row my-3">
						<div class="col-sm-12 col-lg-7 float-center">
							<input type="hidden" name="email" value="<?= $email; ?>">
							<input type="password" name="password" class="form-control" placeholder="Password Baru" autocomplete="off" autofocus="on">
							<?= form_error('password') ?>
							<input type="password" name="passconf" class="form-control mt-3" placeholder="Konfirmasi Password" autocomplete="off" autofocus="on">
							<?= form_error('passconf') ?>
							<button name="submit" class="btn btn-dark btn-block mt-3 mb-4">Reset Password</button>
						</div>
					</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>