<!-- Begin Page Content -->
<div class="container-fluid mb-3">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Profil</h1>
	<div class="row mt-5">
		<div class="col-md">
			<div class="card">
				<div class="row">
					<div class="col-md-4">
						<img src="<?= base_url('/assets/img/profil/'.$user['gambar']); ?>" class="card-img-top" alt="<?= $user['gambar']; ?>">
					</div>
					<div class="col-md">
						<div class="judul">
							<h5><?= $user['nama']; ?></h5>
						</div>
						<table class="mt-md-5">
							<tr>
								<td>NIK</td>
								<td class="px-3">:</td>
								<td><?= $user['nik']; ?></td>
							</tr>
							<tr>
								<td>Alamat Email</td>
								<td class="px-3">:</td>
								<td><?= $user['email']; ?></td>
							</tr>
							<tr>
								<td>Bergabung</td>
								<td class="px-3">:</td>
								<td><?= date('d-m-Y', $user['tgl_dibuat']); ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->