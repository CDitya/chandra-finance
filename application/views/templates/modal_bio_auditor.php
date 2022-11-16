<div class="modal fade" id="cek<?= $a['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Biodata Auditor</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4 mb-3">
						<img class="gambar-modal" src="<?= base_url('assets/img/profil/'.$a['gambar']); ?>">
					</div>
					<div class="col-md">
						<div class="row">
							<div class="col-2 mr-5">Nama</div>
							<div class="col-1">:</div>
							<div class="col"><?= $a['nama']; ?></div>
						</div>
						<div class="row">
							<div class="col-2 mr-5">NIK</div>
							<div class="col-1">:</div>
							<div class="col"><?= $a['nik']; ?></div>
						</div>
						<div class="row">
							<div class="col-2 mr-5">Email</div>
							<div class="col-1">:</div>
							<div class="col"><?= $a['email']; ?></div>
						</div>
						<div class="row">
							<div class="col-2 mr-5">Bergabung</div>
							<div class="col-1">:</div>
							<div class="col"><?= date('d-m-Y', $a['tgl_dibuat']); ?></div>
						</div>
						<div class="row">
							<div class="col-2 mr-5">Aktivasi</div>
							<div class="col-1">:</div>
							<div class="col"><?= $a['is_active']==1?'Aktif':'Non Aktif'; ?></div>
						</div>
					</div>	
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>