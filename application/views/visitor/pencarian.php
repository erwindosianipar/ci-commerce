<div class="container my-5">
	<h4 class="mb-4 bold">Pencarian: <?= $q; ?></h4>
	<div class="row row-p my-2">
	  	<?php if($results->num_rows() < 1): ?>
	  		<div class="col-sm-12 col-lg-12 col-p">
				<div class="card card-body shadow-sm no-border">
					Belum ada produk
				</div>
	  		</div>
		<?php endif; ?>

		<?php foreach ($results->result_array() as $result): ?>
		<div class="col-sm-12 col-lg-2 col-p mb-3 col-6">
			<a href="<?= base_url('produk/'.$result['produk_slug']); ?>" class="no-uline text-dark">
				<div class="card shadow-sm">
					<img src="<?= base_url('assets/images/produk/medium/'.$result['produk_gambar']) ?>" class="rounded-top">
					<div class="card-p">
						<div class="produk-nama">
							<div class="mb-1"><?= $result['produk_nama']; ?></div>
						</div>
						<span class="text-danger"><?= '<b>Rp'.rupiah($result['produk_harga_diskon']).'</b>'; ?></span>
						<span class="float-right text-muted sm">
							<?= $result['produk_terjual']; ?> terjual
						</span>
					</div>
				</div>
			</a>
		</div>
		<?php endforeach; ?>
	</div>
</div>
