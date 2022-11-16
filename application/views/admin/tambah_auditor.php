<div class="container-fluid">
<?= $this->session->flashdata('pesan'); ?>
  <h1 class="h3 mb-4 text-gray-800">Tambah Data Auditor</h1>
  <div class="row">
  	<div class="col-md-10">
		<form method="post">
  			<div class="row">
  				<div class="form-group col-md-8">
					<label for="nama">Nama Lengkap</label>
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap Auditor" autocomplete="off" value="<?= set_value('nama'); ?>">
					<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
				</div>
	  			<div class="form-group col-md">
					<label for="nik">NIK</label>
					<input type="text" class="form-control" id="nik" name="nik" placeholder="Contoh : 0000111122223333" autocomplete="off" value="<?= set_value('nik'); ?>">
					<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
				</div>
  			</div>
  			<div class="row">
  				<div class="form-group col-md">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="Contoh : okeoke@kredittok.com" autocomplete="off" value="<?= set_value('email'); ?>">
					<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group col-md-4">
					<label for="gambar">Foto</label>
					<input type="file" class="custom-file-input" id="gambar" name="gambar">
					<label class="custom-file-label" for="gambar">Pilih Gambar</label>
				</div>
  			</div>
  			<div class="row">
  				<div class="form-group col-md">
					<label for="pass1">Kata Sandi</label>
					<input type="password" class="form-control" id="pass1" name="pass1" placeholder="Masukan Kata Sandi" autocomplete="off">
					<?= form_error('pass1', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group col-md">
					<label for="pass2">Konfirmasi Kata Sandi</label>
					<input type="password" class="form-control" id="pass2" name="pass2" placeholder="Ulangi Kata Sandi" autocomplete="off">
					<?= form_error('pass2', '<small class="text-danger">', '</small>'); ?>
				</div>
  			</div>
			<button type="submit" class="btn btn-primary float-right mt-2">Konfirmasi</button>
  		</form>
  	</div>
  </div>
</div>