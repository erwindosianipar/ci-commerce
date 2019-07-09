			<div class="col-sm-12 col-lg-9">
				<?php
					if($this->session->flashdata('msg')) {   
					echo '<div class="alert alert-primary shadow-sm" role="alert">';
					echo $this->session->flashdata('msg');
					echo '</div>';
					}
				?>
				<div class="card card-body shadow-sm">
					<?= form_open('customer/profil'); ?>
						<div class="row">
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Nama Lengkap</p>
								<input type="text" name="nama" class="form-control mb-3" value="<?= $profil['nama']; ?>">
								<?= form_error('nama'); ?>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Gender</p>
								<select name="gender" class="form-control">
									<option value="0"<?php if($profil['gender'] == '0'){echo' selected';} ?>>
										Tidak Dipilih
									</option>
									<option value="1"<?php if($profil['gender'] == '1'){echo' selected';} ?>>
										Laki-laki
									</option>
									<option value="2"<?php if($profil['gender'] == '2'){echo' selected';} ?>>
										Perempuan
									</option>
								</select>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Alamat</p>
								<input type="text" name="alamat" class="form-control mb-3" value="<?= $profil['alamat']; ?>">
								<?= form_error('alamat'); ?>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Kecamatan</p>
								<input type="text" name="kecamatan" class="form-control mb-3" value="<?= $profil['kecamatan']; ?>">
								<?= form_error('kecamatan'); ?>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Kabupaten / Kota</p>
								<input type="text" name="kabupaten_kota" class="form-control mb-3" value="<?= $profil['kabupaten_kota']; ?>">
								<?= form_error('kabupaten_kota'); ?>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Provinsi</p>
								<input type="text" name="provinsi" class="form-control mb-3" value="<?= $profil['provinsi']; ?>">
								<?= form_error('provinsi'); ?>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Kode POS</p>
								<input type="number" name="kode_pos" class="form-control mb-3" value="<?= $profil['kode_pos']; ?>">
								<?= form_error('kode_pos'); ?>
							</div>
							<div class="col-sm-12 col-lg-6">
								<p class="bold">Nomor Telepon</p>
								<input type="text" name="no_hp" class="form-control mb-3" value="<?= $profil['no_hp']; ?>">
								<?= form_error('no_hp'); ?>
							</div>
						</div>
						<button class="btn btn-primary">Update Profil</button>
					<?= form_close(); ?>
				</div>
			</div>
