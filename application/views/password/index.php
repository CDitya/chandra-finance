<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Ubah Kata Sandi</h1>
  <div class="row">
  	<div class="col-lg-5">
  		<?= $this->session->flashdata('pesan'); ?>
  		<form method="post" action="<?= base_url('password'); ?>">
  			<div class="form-group">
				<label for="pw1">Kata sandi lama</label>
				<input type="password" class="form-control" id="pw1" aria-describedby="emailHelp" name="pw1" placeholder="Masukan kata sandi yang sedang digunakan">
				<?= form_error('pw1', '<small class="text-danger">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label for="pw2">Kata sandi baru</label>
				<input type="password" class="form-control" id="pw2" aria-describedby="emailHelp" name="pw2" placeholder="Masukan kata sandi baru">
				<?= form_error('pw2', '<small class="text-danger">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label for="pw3">Konfirmasi kata sandi</label>
				<input type="password" class="form-control" id="pw3" aria-describedby="emailHelp" name="pw3" placeholder="Ulangi kembali kata sandi baru">
				<?= form_error('pw2', '<small class="text-danger">', '</small>'); ?>
			</div>
			<button type="submit" class="btn btn-primary float-right mt-2">Konfirmasi</button>
  		</form>
  	</div>
  </div>
</div>