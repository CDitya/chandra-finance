<div class="text-center">
    <?= $this->session->flashdata('pesan'); ?>
</div>
<div class="container-fluid">
	<h1 class="h3 mb-3 text-gray-800">Daftar Auditor</h1>
	<a href="tambah_auditor" class="btn btn-primary">Tambah Auditor</a>
	<div class="table-responsive mt-2">
		<table class="table table-striped text-center" id="dataTable">
			<thead class="thead-dark">
				<tr>
					<th scope="col">No</th>
					<th scope="col">NIK</th>
					<th scope="col">Nama</th>
					<th scope="col">Email</th>
					<th scope="col">Bergabung</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;
				foreach($auditor as $a): ?>
					<tr>
						<th scope="row"><?= $i++; ?></th>
						<td><?= $a['nik']; ?></td>
						<td><?= $a['nama']; ?></td>
						<td><?= $a['email']; ?></td>
						<td><?= date('d-m-Y', $a['tgl_dibuat']); ?></td>
						<td>
							<a href="<?= base_url('admin/edit_auditor?id='.$a['id']); ?>" class="btn btn-primary"><i class="fas fa-fw fa-edit"></i></a>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cek<?= $a['id']; ?>"><i class="fas fa-fw fa-eye"></i></button>
						</td>
						<?php $this->load->view('templates/modal_bio_auditor', ['a' => $a]); ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>