<div class="card">
	<div class="card-header card-header-info">
		Data Akun Kaprodi
	</div>
	<div class="card-body">
		<a class="btn btn-sm btn-warning" href="<?php echo base_url('kaprodi/register') ?>">Tambah</a>
		<table class="table">
			<thead>
				<tr>
					<th>Username</th>
					<th>Password</th>
					<th>Nama</th>
					<th>Program Studi</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($account as $a) :?>
					<tr>
						<td><?php echo $a['username'] ?></td>
						<td><?php echo $a['password'] ?></td>
						<td><?php echo $a['nama_kaprodi'] ?></td>
						<td><?php echo $a['nama_prodi'] ?></td>
						<td><a class="btn btn-danger btn-sm" onclick="return confirm('Data Akan Dihapus?')" href="<?php echo base_url() ?>kaprodi/delete/<?php echo $a['id_kaprodi'] ?>">Delete</a>
							<a class="btn btn-success btn-sm" href="<?php echo base_url() ?>kaprodi/edit/<?php echo $a['id_kaprodi'] ?>">Edit</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>				
	</div>
</div>