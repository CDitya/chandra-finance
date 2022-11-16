<!-- Begin Page Content -->
<div class="container-fluid">
	<?= $this->session->flashdata('pesan'); ?>
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Tambah Data Debitur</h1>
	<div class="row">
		<div class="col-lg-8">
			<form method="post" action="<?= base_url('auditor/tambah_debitur'); ?>">
				<div class="form-group">
					<div class="row">
						<div class="col-md-8">
							<label for="nama">Nama Lengkap</label>
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama lengkap debitur" value="<?= set_value('nama'); ?>">
							<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="col-md">
							<label for="nik">NIK</label>
							<input type="text" class="form-control" id="nik" name="nik" placeholder="1234567812345678" value="<?= set_value('nik'); ?>">
							<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
						</div>
				</div>
					<div class="form-group row">
						<div class="col-md">
							<label for="karakter">Karakter</label>
							<select class="form-control" id="karakter" name="karakter">
								<option value="">~ Pilih salah satu ~</option>
								<?php foreach($karakter as $k) : ?>
									<option value="<?= $k; ?>" <?= set_select('karakter', $k); ?>><?= $k; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('karakter', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="col-md">
							<label for="pendidikan">Pendidikan</label>
							<select class="form-control" id="pendidikan" name="pendidikan">
								<option value="">~ Pilih salah satu ~</option>
								<?php foreach($pendidikan as $p) : ?>
									<option value="<?= $p; ?>" <?= set_select('pendidikan', $p); ?>><?= $p; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('pendidikan', '<small class="text-danger">', '</small>'); ?>
						</div>
				</div>
				<div class="form-group row">
					<div class="col-md">
						<label for="pekerjaan">Pekerjaan</label>
						<select class="form-control" id="pekerjaan" name="pekerjaan">
							<option value="">~ Pilih salah satu ~</option>
							<?php foreach($pekerjaan as $pk) : ?>
								<option value="<?= $pk; ?>" <?= set_select('pekerjaan', $pk); ?>><?= $pk; ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="col-md">
						<label for="tanggungan">Tanggungan</label>
						<select class="form-control" id="tanggungan" name="tanggungan">
							<option value="">~ Pilih salah satu ~</option>
							<?php foreach($tanggungan as $tg) : ?>
								<option value="<?= $tg; ?>" <?= set_select('tanggungan', $tg); ?>><?= $tg; ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('tanggungan', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="form-group">
						<div class="row">
							<div class="col-md">
								<label for="rumah">Rumah</label>
								<select class="form-control" id="rumah" name="rumah">
									<option value="">~ Pilih salah satu ~</option>
									<?php foreach($rumah as $r) : ?>
										<option value="<?= $r; ?>" <?= set_select('rumah', $r); ?>><?= $r; ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('rumah', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="col-md">
								<label for="pendapatan">Pendapatan</label>
								<select class="form-control" id="pendapatan" name="pendapatan">
									<option value="">~ Pilih salah satu ~</option>
									<?php foreach($pendapatan as $pp) : ?>
										<option value="<?= $pp; ?>" <?= set_select('pendapatan', $pp); ?>><?= $pp; ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('pendapatan', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary btn-block mt-4">Konfirmasi</button>
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid --> 