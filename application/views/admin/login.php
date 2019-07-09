<?php
if(isset($_SESSION['log_admin']) && $_SESSION['log_admin'] === TRUE){
	redirect(base_url('admin/dashboard'));
}
?>
<div class="container my-5">
	<div class="row">
		<div class="col-sm-12 col-lg-7 float-center">
			<div class="card card-body">
				<?= form_open('admin/login'); ?>
					<div class="row my-3">
						<div class="col-sm-12 col-lg-7 float-center">
							<?php
								if($this->session->flashdata('msg')) {   
									echo '<center>'.$this->session->flashdata('msg').'</center>';
								}
							?>
							<input type="text" name="username" class="form-control mt-4 mb-4" placeholder="Username" required="required" autocomplete="off">
							<input type="password" name="password" class="form-control mb-4" placeholder="Password" required="required" autocomplete="off">
							<button name="submit" class="btn btn-dark btn-block">Login</button>
							<div class="pt-4"></div>
						</div>
					</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>s