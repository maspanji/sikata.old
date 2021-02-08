
<?php $no=1; ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4>Data Mahasiswa TA</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table" id="myTable">
						<thead class="text">
							<th scope="col">No.</th>
							<th scope="col">Nama</th>
							<th scope="col">NIM</th>
							<th scope="col">SMT/Th. Akademik</th>
							<th scope="col">Monitoring Nilai</th>
							<th scope="col">Dosen Pembimbing Terpilih</th>
							<th scope="col">Keterangan</th>
							<th scope="col">Nomor SK</th>
						</thead>
						<tbody>
							<?php foreach ($registrasi_b as $key): ?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $key['nama_mhs'] ?></td>
									<td><?php echo $key['nim_mhs'] ?></td>
									<td class="text-center"><?php echo $key['tahun'] ?></td>
									<td><a href="<?php echo base_url(); ?>/assets/img/<?php echo $key['monitoring'] ?>"><?php echo $key['monitoring'] ?></a></td>
									<td><?php echo $key['nama_dosbim'] ?></td>
									<td><?php echo $key['status_registrasi'] ?></td>
									<td></td>
								</tr>
								<?php $no++; ?>
							<?php endforeach ?>
							<?php foreach ($registrasi_c as $key): ?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $key['nama_mhs'] ?></td>
									<td><?php echo $key['nim_mhs'] ?></td>
									<td class="text-center"><?php echo $key['tahun'] ?></td>
									<td><a href="<?php echo base_url(); ?>/assets/img/<?php echo $key['monitoring'] ?>"><?php echo $key['monitoring'] ?></a></td>
									<td><?php echo $key['nama_dosbim'] ?></td>
									<td><?php echo $key['status_registrasi'] ?></td>
									<td>PKL.<?php echo $key['id_registrasi'] ?>/SK/DEK/FT.AK/IV/2019</td>
								</tr>
								<?php $no++; ?>
							<?php endforeach ?>
							<?php foreach ($registrasi_d as $key): ?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $key['nama_mhs'] ?></td>
									<td><?php echo $key['nim_mhs'] ?></td>
									<td class="text-center"><?php echo $key['tahun'] ?></td>
									<td><a href="<?php echo base_url(); ?>/assets/img/<?php echo $key['monitoring'] ?>"><?php echo $key['monitoring'] ?></a></td>
									<td><?php echo $key['nama_dosbim'] ?></td>
									<td><?php echo $key['status_registrasi'] ?></td>
								</tr>
								<?php $no++; ?>
							<?php endforeach ?>		
						</tbody>
					</table>
					<a class="btn btn-success btn-sm text-center m-1" href="<?php echo base_url()?>kaprodi/cetak_pkl" target="_BLANK">Print</a>
				</div>
			</div>
		</div>
	</div>
</div>
