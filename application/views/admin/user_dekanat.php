<div class="card">
	<div class="card-header card-header-success">
		Data Akun Dekanat
	</div>
	<div class="card-body">
		<a class="btn btn-sm btn-warning" href="<?php echo base_url('dekanat/register') ?>">Tambah</a>
		<table class="table">
			<thead>
				<tr>
					<th>Username</th>
					<th>Password</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($account as $a) :?>
					<tr>
						<td><?php echo $a['username'] ?></td>
						<td><?php echo $a['password'] ?></td>
						<td><a class="btn btn-danger btn-sm" onclick="return confirm('Data Akan Dihapus?')" href="<?php echo base_url() ?>dekanat/delete/<?php echo $a['id_dekanat'] ?>">Delete</a>
							<a class="btn btn-success btn-sm" href="<?php echo base_url() ?>dekanat/edit/<?php echo $a['id_dekanat'] ?>">Edit</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>				
	</div>
</div>