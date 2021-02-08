<!DOCTYPE html>
<html>
<head>
	<title>Status Surat Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://demos.creative-tim.com/material-kit/assets/css/material-kit.min.css?v=2.0.5">
</head>

<body>
	<div class="container">
		<a class="btn btn-success btn-sm text-center mt-3" href="<?php echo base_url() ?>"><i class="material-icons">home</i></a>	
	</div>
	
	<div class="container my-5">

		<div class="card">
			<div class="card-header card-header-info">
				Status Surat Mahasiswa PKL
			</div>
			<div class="card-body">
				<table class="table table-bordered table-striped mt-3">
					<thead class="thead-dark text-center">
						<tr>
							<th scope="col">Nama</th>
							<th scope="col">NIM</th>
							<th scope="col">Prodi</th>
							<th scope="col">Status</th>
							<th schope="col">Keterangan</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<tr>
							<td><?php echo $registrasi['nama_mhs'] ?></td>
							<td><?php echo $registrasi['nim_mhs'] ?></td>
							<td><?php echo $registrasi['nama_prodi'] ?></td>
							<td><?php echo $registrasi['status_registrasi'] ?>

						</td>
						<td>
							<?php echo $registrasi['alasan_batal'] ?>
							<?php if($registrasi['status_registrasi'] == 'Telah disetujui oleh Dekan. Surat dapat dicetak') : ?>
								<a class="btn btn-success btn-sm text-center m-1" href="<?php echo base_url()?>home/surat/<?php echo $registrasi['id_registrasi'] ?>" target="_BLANK"><i class="material-icons">print</i></a>
							<?php endif; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>			
	</div>
	<div class="card my-5">
		<div class="card-header card-header-warning">
			Status Surat Mahasiswa TA
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped mt-3">
				<thead class="thead-dark text-center">
					<tr>
						<th scope="col">Nama</th>
						<th scope="col">NIM</th>
						<th scope="col">Prodi</th>
						<th scope="col">Status</th>
						<th schope="col">Keterangan</th>
					</tr>
				</thead>
				<tbody class="text-center">
					<tr>
						<td><?php echo $registrasi_ta['nama_mhs'] ?></td>
						<td><?php echo $registrasi_ta['nim_mhs'] ?></td>
						<td><?php echo $registrasi_ta['nama_prodi'] ?></td>
						<td><?php echo $registrasi_ta['status_registrasi'] ?></td>
						<td>
							<?php echo $registrasi_ta['alasan_batal'] ?>
							<?php if($registrasi_ta['status_registrasi'] == 'Telah disetujui oleh Dekan. Surat dapat dicetak') : ?>
								<a class="btn btn-success btn-sm text-center m-1" href="<?php echo base_url()?>home/surat_ta/<?php echo $registrasi_ta['id_registrasi'] ?>" target="_BLANK"><i class="material-icons">print</i></a>
							<?php endif; ?>
						</td>
					</tr>
				</tbody>
			</table>			
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
