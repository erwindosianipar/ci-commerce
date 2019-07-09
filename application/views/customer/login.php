<?php
if(isset($_SESSION['log_customer']) && $_SESSION['log_customer'] === TRUE){
	redirect(base_url('customer/profil'));
}
?>
<div class="container my-5">
	<div class="row">
		<div class="col-sm-12 col-lg-7 float-center">
			<div class="card card-body shadow-sm">
				<center><i class="fa fa-users fa-5x"></i></center>
				<?= form_open('auth/login'); ?>
					<div class="row my-3">
						<div class="col-sm-12 col-lg-7 float-center">
							<?php
								if($this->session->flashdata('msg')) {   
									echo '<center>'.$this->session->flashdata('msg').'</center>';
								}
							?>
							<input type="text" name="username" class="form-control mt-4 mb-4" placeholder="Username" required="required" autocomplete="off" autofocus="on">
							<input type="password" name="password" class="form-control mb-4" placeholder="Password" required="required" autocomplete="off">
							<button name="submit" class="btn btn-dark btn-block mb-4">Login</button>
							<a href="<?= base_url('auth/forget'); ?>">Lupa password</a>
							<span class="float-right">
								<a href="<?= base_url('auth/register'); ?>">
									Mendaftar Akun
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