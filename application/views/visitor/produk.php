<div class="container my-5">
	<p><a href="<?= base_url(); ?>">Home</a> > <a href="<?= base_url('kategori/'.$kategori_slug); ?>"><?= $kategori_name; ?></a> > <?= $produk['produk_nama']; ?></p>
	<div class="card card-body shadow-sm no-border mb-4">
		<div class="row">
			<div class="col-sm-12 col-lg-4 mb-3">
				<img src="<?= base_url('assets/images/produk/large/'.$produk['produk_gambar']); ?>" class="img-fluid">
			</div>
			<div class="col-sm-12 col-lg-8">
				<h1 class="bold"><?= $produk['produk_nama']; ?></h1>
				<div class="my-3"><?= $produk['produk_terjual']; ?> Terjual</div>

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
				        <div class="table-responsive mt-4">
				        	<table class="table table-bordered table-striped">
				        		<tbody>
				        			<tr>
				        				<td>Nama Produk</td>
				        				<td><?= $produk['produk_nama']; ?></td>
				        			</tr>
				        			<tr>
				        				<td>kategori</td>
				        				<td><?= $kategori_name; ?></td>
				        			</tr>
				        			<tr>
				        				<td>Diskon</td>
				        				<td><?= $produk['produk_diskon'].'%'; ?></td>
				        			</tr>
				        			<tr>
				        				<td>Harga</td>
				        				<td>
				        					<b><?= 'Rp'.rupiah($produk['produk_harga_diskon']); ?></b>
				        					<s><?= 'Rp'.rupiah($produk['produk_harga']); ?></s>
				        				</td>
				        			</tr>
				        			<tr>
				        				<td>Stok</td>
				        				<td><?= $produk['produk_stok']; ?></td>
				        			</tr>
				        		</tbody>
				        	</table>
				        </div>
				    </div>

				    <div class="tab-pane fade" id="deskripsi" role="tabpanel" aria-labelledby="deskripsi-tab">
				    	<div class="mt-3">
					        <?= $produk['produk_deskripsi']; ?>
					    </div>
				    </div>

				    <div class="tab-pane fade" id="ulasan" role="tabpanel" aria-labelledby="ulasan-tab">
				  	<?php if($rating_->num_rows() < 1): ?>
				  		<p class="mt-4">Belum ada ulasan</p>
				  	<?php endif; ?>

				    	<?php foreach ($rating_->result_array() as $rating): ?>
				    		<div class="media mt-3">
				    			<img src="<?= base_url('assets/images/avatar/1.png'); ?>" class="img-fluid rounded-circle mt-1">
				    			<div class="media-body ml-2">
						    		<?= $rating['nama']; ?><br/>
						    		<small><?= $rating['tanggal']; ?></small>
				    			</div>
				    		</div>
				    		<div class="mt-2"><p><?= $rating['keterangan']; ?></p></div>
				    		<div>
				    			<?php
				    			if ($rating['rating'] == 5) {
				    				echo '
				    				<i class="fa fa-star"></i>
				    				<i class="fa fa-star"></i>
				    				<i class="fa fa-star"></i>
				    				<i class="fa fa-star"></i>
				    				<i class="fa fa-star"></i>
				    				';
				    			} elseif ($rating['rating'] == 4){
				    				echo '
				    				<i class="fa fa-star"></i>
				    				<i class="fa fa-star"></i>
				    				<i class="fa fa-star"></i>
				    				<i class="fa fa-star"></i>
				    				';
				    			} elseif ($rating['rating'] == 3){
				    				echo '
				    				<i class="fa fa-star"></i>
				    				<i class="fa fa-star"></i>
				    				<i class="fa fa-star"></i>
				    				';
				    			} elseif ($rating['rating'] == 2){
				    				echo '
				    				<i class="fa fa-star"></i>
				    				<i class="fa fa-star"></i>
				    				';
				    			} else {
				    				echo '
				    				<i class="fa fa-star"></i>
				    				';
				    			} 
				    			?>
				    		</div>
				    	<?php endforeach; ?>
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
