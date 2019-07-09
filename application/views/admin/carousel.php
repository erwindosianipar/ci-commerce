    <h2 class="pt-2 mb-4"><?= $title ?></h2>
	<div class="row">
		<div class="col-sm-12 col-lg-6 mb-4">
			<?php
				if($this->session->flashdata('msg')) {   
					echo '<div class="alert alert-primary shadow-sm" role="alert">';
					echo $this->session->flashdata('msg');
					echo '</div>';
				}
			?>
        	<div class="card shadow-sm">
            	<div class="card-body">
            		<?= form_open_multipart('admin/carousel'); ?>
            			<p class="bold">Gambar</p>
            			<input type="file" name="carousel_gambar" class="mb-3">
            			<p class="sm">Disarankan gambar dengan ukuran 350x850 pixel</p>
            			<p class="bold">Judul</p>
            			<textarea name="carousel_judul" class="form-control mb-3"></textarea>
            			<?= form_error('carousel_judul'); ?>
            			<button name="submit" class="btn btn-primary">Submit</button>
            		<?= form_close(); ?>
                </div>
             </div>
        </div>
	</div>