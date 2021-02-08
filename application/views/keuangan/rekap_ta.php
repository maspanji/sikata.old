
<?php $no=1; ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4>Rekap Mahasiswa TA</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table" id="myTable">
						<thead class="text">
							<th scope="col">No.</th>
							<th scope="col">Nama</th>
							<th scope="col">NIM</th>
							<th scope="col">SMT/Th. Akademik</th>
							<th scope="col">Bukti Bayar</th>
							<th scope="col">Tgl Registrasi</th>
							<th scope="col">Keterangan</th>
						</thead>
						<tbody>
							<?php foreach ($registrasi_a as $key): ?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $key['nama_mhs'] ?></td>
									<td><?php echo $key['nim_mhs'] ?></td>
									<td class="text-center"><?php echo $key['tahun'] ?></td>
									<td><a href="<?php echo base_url(); ?>/assets/img/<?php echo $key['bukti_bayar'] ?>"><?php echo $key['bukti_bayar'] ?></a></td>
									<td><?php echo $key['tanggal_registrasi'] ?></td>
									<td><?php echo $key['status_registrasi'] ?></td>
								</tr>
								<?php $no++; ?>
							<?php endforeach ?>
							<?php foreach ($registrasi_b as $key): ?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $key['nama_mhs'] ?></td>
									<td><?php echo $key['nim_mhs'] ?></td>
									<td class="text-center"><?php echo $key['tahun'] ?></td>
									<td><a href="<?php echo base_url(); ?>/assets/img/<?php echo $key['bukti_bayar'] ?>"><?php echo $key['bukti_bayar'] ?></a></td>
									<td><?php echo $key['tanggal_registrasi'] ?></td>
									<td><?php echo $key['status_registrasi'] ?></td>
								</tr>
								<?php $no++; ?>
							<?php endforeach ?>
							<?php foreach ($registrasi_c as $key): ?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $key['nama_mhs'] ?></td>
									<td><?php echo $key['nim_mhs'] ?></td>
									<td class="text-center"><?php echo $key['tahun'] ?></td>
									<td><a href=""><?php echo $key['bukti_bayar'] ?></a></td>
									<td><?php echo $key['tanggal_registrasi'] ?></td>
									<td><?php echo $key['status_registrasi'] ?></td>
								</tr>
								<?php $no++; ?>
							<?php endforeach ?>
						</tbody>
					</table>
					<a class="btn btn-success btn-sm text-center m-1" href="<?php echo base_url()?>keuangan/cetak_ta" target="_BLANK">Print</a>
				</div>
			</div>
		</div>
	</div>
</div>
