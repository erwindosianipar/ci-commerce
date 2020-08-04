<div class="container my-5">
	<div class="card card-body shadow-sm no-border mb-4">
		<div class="row">
			<div class="col-sm-12 col-lg-4 mb-3">
				<img src="<?= base_url('assets/images/produk/large/'.$produk['produk_gambar']); ?>" class="img-fluid">
			</div>
			<div class="col-sm-12 col-lg-8">
				<h1 class="bold"><?= $produk['produk_nama']; ?></h1>
				<div class="my-3">1312 Ulasan | <?= $produk['produk_terjual']; ?> Terjual</div>

				<div class="my-3"></div>

				<div class="row mb-4">
					<div class="col-sm-12 col-lg-3 bold mb-3">
						Harga
					</div>
					<div class="col-sm-12 col-lg-6">
						<?php if ($produk['produk_diskon'] > 0){ ?>
							<h3 class="bold text-danger" style="margin-bottom: 0px;">
								<?= 'Rp'.rupiah($produk['produk_harga_diskon']); ?>
							</h3>
							<span class="text-muted" style="text-decoration: line-through;">
								<?= 'Rp'.rupiah($produk['produk_harga']); ?>
							</span>
							<b><?= $produk['produk_diskon'].'%'; ?></b>
						<?php } else { ?>
							<h3 class="bold text-danger" style="margin-bottom: 0px;">
								<?= 'Rp'.rupiah($produk['produk_harga_diskon']); ?>
							</h3>
						<?php } ?>
					</div>
				</div>
				
				<?= form_open('produk/tambah'); ?>
				<div class="row">
					<div class="col-sm-12 col-lg-3 bold mb-3">
						Jumlah
					</div>
					<div class="col-sm-12 col-lg-4">
						<div class="input-group">
						 	<div class="input-group-button">
								<button type="button" class="btn btn-primary" data-quantity="minus" data-field="quantity">
									<i class="fa fa-minus" aria-hidden="true"></i>
								</button>
						  	</div>
						  	<input type="hidden" name="produk_id" value="<?= $produk['produk_id']; ?>">
							<input class="ml-2 mr-2 form-control rounded bg-white" type="number" name="quantity" value="1" readonly>
						  	<div class="input-group-button">
								<button type="button" class="btn btn-danger" data-quantity="plus" data-field="quantity">
						    		<i class="fa fa-plus" aria-hidden="true"></i>
						    	</button>
						  	</div>
						</div>
					</div>
				</div>

				<div class="d-none d-lg-block mt-5">
					<div class="row">
						<div class="col-sm-12 col-lg-4">
							<button name="submit" class="btn bg-primary text-white">
								<i class="fa fa-shopping-cart"></i> Masukan ke keranjang
							</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-lg-8 mb-3">
			<div class="card card-body no-border shadow-sm">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				    <li class="nav-item">
				        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
				            Detail
				        </a>
				    </li>
				    <li class="nav-item">
				        <a class="nav-link" id="deskripsi-tab" data-toggle="tab" href="#deskripsi" role="tab" aria-controls="deskripsi" aria-selected="false">
				            Deskripsi
				        </a>
				    </li>
				    <li class="nav-item">
				        <a class="nav-link" id="ulasan-tab" data-toggle="tab" href="#ulasan" role="tab" aria-controls="ulasan" aria-selected="false">
				            Ulasan
				        </a>
				    </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				    
				    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				        ...
				    </div>

				    <div class="tab-pane fade" id="deskripsi" role="tabpanel" aria-labelledby="deskripsi-tab">
				    	<div class="mt-3">
					        <?= $produk['produk_deskripsi']; ?>
					    </div>
				    </div>

				    <div class="tab-pane fade" id="ulasan" role="tabpanel" aria-labelledby="ulasan-tab">
				    	
						<div class="media mt-4 mb-2">
							<img src="<?= base_url('assets/images/avatar/1.png') ?>" class="rounded-circle mr-3">
							<div class="media-body">
								Customer setia 1<br/>
								<span class="text-muted">29 April 2019</span>
							</div>
						</div>
						<p>ssss</p>
						<p>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</p>

						<div class="media mb-2">
							<img src="<?= base_url('assets/images/avatar/1.png') ?>" class="rounded-circle mr-3">
							<div class="media-body">
								Customer setia 2<br/>
								<span class="text-muted">29 April 2019</span>
							</div>
						</div>
						<p>sasda</p>
						<p>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</p>

				    </div>
				</div>				
			</div>
		</div>
		<div class="col-sm-12 col-lg-4">
			<div class="card card-body no-border shadow-sm">
				<p class="text-muted"><b>Voucher</b></p>
				<p class="text-muted">Belum ada voucher.</p>
			</div>
		</div>
	</div>

</div>
