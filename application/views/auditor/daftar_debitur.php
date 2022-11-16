<div class="container-fluid">
	<?= $this->session->flashdata('pesan'); ?>
	<h1 class="h3 mb-3 text-gray-800">Daftar Debitur</h1>
	<a href="auditor/tambah_debitur" class="btn btn-primary">Tambah Data Debitur</a>
	<div class="table-responsive mt-2">
		<table class="table table-striped text-center" id="dataTable">
			<thead class="thead-dark">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama</th>
					<th scope="col">NIK</th>
					<th scope="col">Status</th>
					<th scope="col">Pengajuan</th>
					<th scope="col">Detail</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;
				foreach ($debitur as $n) : ?>
					<tr>
						<th scope="row"><?= $i++; ?></th>
						<td><?= $n['nama']; ?></td>
						<td><?= $n['nik']; ?></td>
						<td><?= $n['status']; ?></td>
						<td><?= date('d-m-Y', $n['tgl_pengajuan']); ?></td>
						<td><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal<?= $n['id']; ?>">Detail</button></td>
						<?php $this->load->view('templates/modal_bio_debitur', ['n' => $n]); ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>