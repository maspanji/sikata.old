<?php $no=1; ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4>Data Mahasiswa KP</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table" id="myTable">
						<thead class="text">
							<th scope="col">No.</th>
							<th scope="col">Nama</th>
							<th scope="col">NIM</th>
							<th scope="col">SMT/Th. Akademik</th>
							<th scope="col">Program Studi</th>
							<th scope="col">Keterangan</th>
							<th scope="col">No. SK</th>
						</thead>
						<tbody>
							<?php foreach ($registrasi_ta as $key): ?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $key['nama_mhs'] ?></td>
									<td><?php echo $key['nim_mhs'] ?></td>
									<td class="text-center"><?php echo $key['tahun'] ?></td>
									<td><?php echo $key['nama_prodi'] ?></td>
									<td><?php echo $key['status_registrasi'] ?></td>
									<td>TA.<?php echo $key['id_registrasi'] ?>/SK/DEK/FT.AK/IV/2019</td>
								</tr>
								<?php $no++; ?>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
