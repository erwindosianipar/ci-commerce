<div class="container my-5">

	<div class="row">
		<div class="col-sm-12 col-lg-3 mb-3">
			<div class="list-group shadow-sm">
				<li class="list-group-item text-primary text-uppercase no-border bb-2-gray">
					<b>Kategori</b>
				</li>
				<?php foreach ($kategori_->result_array() as $kategori): ?>
				<a href="<?= base_url('kategori/'.$kategori['kategori_slug']); ?>" class="list-group-item list-group-item-action text-dark no-border">
				  	<?= $kategori['kategori_nama']; ?>
				</a>
			  	<?php endforeach; ?>
			  	<?php if($kategori_->num_rows() < 1): ?>
			  	<a href="#" class="list-group-item list-group-item-action text-dark no-border">
			  		Belum ada kategori
			  	</a>
			  	<?php endif; ?>
			</div>
		</div>

	  	<?php if($carousel_->num_rows() < 1): ?>
	  		<div class="col-sm-12 col-lg-9">
				<div class="card card-body shadow-sm no-border">
					Belum ada carousel
				</div>
	  		</div>
		<?php endif; ?>

		<div class="col-sm-12 col-lg-9">
			<ul class="list-group shadow-sm bg-white text-dark">
				 <li class="list-group">
					<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
					  	<div class="carousel-inner">
					  		<?php $no=0; foreach ($carousel_->result_array() as $carousel): $no++; ?>
						    	<div class="carousel-item<?php if($no==1){echo' active';} ?>">
						      		<img src="<?= base_url('assets/images/carousel/large/'.$carousel['carousel_gambar']); ?>" class="img-fluid d-block rounded-top">
						      		<div class="carousel-caption text-dark c-caption">
						      			<?= $carousel['carousel_judul']; ?>
						      		</div>
						    	</div>
					  		<?php endforeach; ?>
					  	</div>
					  	<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
					    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    	<span class="sr-only">Prev</span>
					  	</a>
					  	<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
					    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
					    	<span class="sr-only">Next</span>
					  	</a>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div class="row my-4">
		<div class="col-sm-12 col-lg-12">
			<div class="card shadow-sm rounded-0">
			  <div class="card-header bg-white text-uppercase text-danger bold">
			    Produk Terlaris
			  </div>
			  <div class="card-body bg-white">
			  </div>
			</div>
		</div>
	</div>

	<div class="row row-p my-2">
	  	<?php if($produk_->num_rows() < 1): ?>
	  		<div class="col-sm-12 col-lg-12 col-p">
				<div class="card card-body shadow-sm no-border">
					Belum ada produk
				</div>
	  		</div>
		<?php endif; ?>

		<?php foreach ($produk_->result_array() as $produk): ?>
		<div class="col-sm-12 col-lg-2 col-p mb-3 col-6">
			<a href="<?= base_url('produk/'.$produk['produk_slug']); ?>" class="no-uline text-dark">
				<div class="card shadow-sm">
					<img src="<?= base_url('assets/images/produk/medium/'.$produk['produk_gambar']) ?>" class="rounded-top">
					<div class="card-p">
						<div class="produk-nama">
							<div class="mb-1"><?= $produk['produk_nama']; ?></div>
						</div>
						<span class="text-danger"><?= '<b>Rp'.rupiah($produk['produk_harga_diskon']).'</b>'; ?></span>
						<span class="float-right text-muted sm">
							<?= $produk['produk_terjual']; ?> terjual
						</span>
					</div>
				</div>
			</a>
		</div>
		<?php endforeach; ?>
	</div>

</div>