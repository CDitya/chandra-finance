<div class="modal fade" id="exampleModal<?= $n['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Biodata</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-2 mr-3">Nama</div>
					<div class="col-1">:</div>
					<div class="col"><?= $n['nama']; ?></div>
				</div>
				<div class="row">
					<div class="col-2 mr-3">NIK</div>
					<div class="col-1">:</div>
					<div class="col"><?= $n['nik']; ?></div>
				</div>
				<div class="row">
					<div class="col-2 mr-3">Karakter</div>
					<div class="col-1">:</div>
					<div class="col"><?= $n['karakter']; ?></div>
				</div>
				<div class="row">
					<div class="col-2 mr-3">Pendidikan</div>
					<div class="col-1">:</div>
					<div class="col"><?= $n['pendidikan']; ?></div>
				</div>
				<div class="row">
					<div class="col-2 mr-3">Pekerjaan</div>
					<div class="col-1">:</div>
					<div class="col"><?= $n['pekerjaan']; ?></div>
				</div>
				<div class="row">
					<div class="col-2 mr-3">Tanggungan</div>
					<div class="col-1">:</div>
					<div class="col"><?= $n['tanggungan']; ?></div>
				</div>
				<div class="row">
					<div class="col-2 mr-3">Rumah</div>
					<div class="col-1">:</div>
					<div class="col"><?= $n['rumah']; ?></div>
				</div>
				<div class="row">
					<div class="col-2 mr-3">Pendapatan</div>
					<div class="col-1">:</div>
					<div class="col"><?= $n['pendapatan']; ?></div>
				</div>
				<div class="row">
					<div class="col-2 mr-3">Status</div>
					<div class="col-1">:</div>
					<div class="col"><?= $n['status']; ?></div>
				</div>
				<div class="row">
					<div class="col-2 mr-3">Pengajuan</div>
					<div class="col-1">:</div>
					<div class="col"><?= date('d-m-Y', $n['tgl_pengajuan']); ?></div>
				</div>
				<?php if ($this->uri->segment(1) == 'admin') : ?>
					<div class="row">
						<div class="col-2 mr-3">Auditor</div>
						<div class="col-1">:</div>
						<div class="col"><?= $n['nama']; ?></div>
					</div>
				<?php endif; ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>