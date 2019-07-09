<div class="container my-5">
	<div class="row">
		<div class="col-sm-12 col-lg-8">
			<?php if ($keranjang_->num_rows() < 1){ ?>
			<div class="list-group shadow-sm mb-3">
				<div class="list-group-item">
					Belum ada produk dalam keranjang
				</div>
			</div>
			<?php } else { ?>
			<?php $no=0; foreach ($keranjang_->result_array() as $produk): $no++; ?>
			<div class="list-group shadow-sm mb-3">
				<div class="list-group-item">
					<div class="row">
						<div class="col-sm-12 col-lg-8">
							<div class="media">
								<img src="<?= base_url('assets/images/produk/small/'.$produk['produk_gambar']); ?>" class="img-fluid mr-3">
								<div class="media">
									<a href="<?= base_url('produk/'.$produk['produk_slug']); ?>" class="no-uline text-dark bold">
										<?= $produk['produk_nama']; ?>
									</a>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-lg-4 bold">
							<div class="d-lg-none"><hr></div>
							<div class="row">
								<div class="col-6">
									&times;<?= $produk['keranjang_kuantitas']; ?>
								</div>
								<div class="col-6">
									<div class="float-right">
										<?= 'Rp'.rupiah($produk['produk_harga_diskon']); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="list-group-item">
					<?= form_open('customer/keranjang/hapus'); ?>
					<input type="hidden" name="keranjang_id" value="<?= $produk['keranjang_id']; ?>">
					<button name="submit" class="btn p-0 float-right text-danger">
						<i class="fa fa-trash"></i> Hapus
					</button>
					<?= form_close(); ?>
				</div>
			</div>
			<?php endforeach; ?>
			<?php } ?>
		</div>
		<div class="col-sm-12 col-lg-4">
			<div class="list-group shadow-sm">
				<div class="list-group-item bold">
					<div class="float-left">Total Harga</div>
					<div class="float-right">
						<h5 class="bold mb-0"><?= 'Rp'.rupiah($total); ?></h5>
					</div>
				</div>
				<div class="list-group-item p-3">
					<?php if ($keranjang_->num_rows() < 1){ ?>
					<button class="btn btn-danger btn-block" disabled="disabled">Checkout</button>
					<?php } else { ?>
					<?= form_open('customer/transaksi/tambah'); ?>
					<input type="hidden" name="keranjang_kode" value="<?= $produk['keranjang_kode']; ?>">
					<input type="hidden" name="keranjang_total" value="<?= $total; ?>">
					<button class="btn btn-danger btn-block">Checkout</button>
					<?= form_close(); ?>
					<?php } ?>
					<div class="mt-2">
						<small>Harga sudah termasuk ongkir</small>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>