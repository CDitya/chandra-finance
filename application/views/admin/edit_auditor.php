<div class="container-fluid">
<?= $this->session->flashdata('pesan'); ?>
  <h1 class="h3 mb-4 text-gray-800">Ubah Data Auditor</h1>
  <div class="row">
  	<div class="col-md-10">
		<form method="post">
  			<div class="row">
  				<div class="form-group col-md-8">
					<label for="nama">Nama Lengkap</label>
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap Auditor" value="<?= $auditor['nama']; ?>" autocomplete="off" value="<?= set_value('nama'); ?>">
					<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
				</div>
	  			<div class="form-group col-md">
					<label for="nik">NIK</label>
					<input type="text" class="form-control" id="nik" name="nik" placeholder="Contoh : 0000111122223333" value="<?= $auditor['nik']; ?>" autocomplete="off" value="<?= set_value('nik'); ?>">
					<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
				</div>
  			</div>
  			<div class="row">
  				<div class="form-group col-md-6">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="Contoh : okeoke@kredittok.com" value="<?= $auditor['email']; ?>" readonly>
					<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group col-md-4">
					<label for="gambar">Foto</label>
					<input type="file" class="custom-file-input" id="gambar" name="gambar">
					<label class="custom-file-label" for="gambar">Pilih Gambar</label>
				</div>
				<div class="form-check col-md-1">
					<input class="form-check-input" type="checkbox" id="aktivasi"<?= $auditor['is_active']==1?'checked="checked"':null; ?> name="aktivasi">
					<label class="form-check-label" for="aktivasi">
					Aktivasi
					</label>
				</div>
  			</div>
			<button type="submit" class="btn btn-primary float-right mt-2">Konfirmasi</button>
  		</form>
  	</div>
  </div>
</div>