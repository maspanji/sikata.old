<?php if($this->session->flashdata('register_success') != NULL) :  ?>
	<div class="alert alert-success alert-dismissible fade show">
		<?php echo $this->session->flashdata('register_success'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
			</button>
	</div>
<?php endif; ?>
<div class="card">
	<div class="card-header card-header-danger">
		Data Akun Keuangan
	</div>
	<div class="card-body">
		<a class="btn btn-sm btn-warning" href="<?php echo base_url('keuangan/register') ?>">Tambah</a>
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
						<td><a class="btn btn-danger btn-sm" onclick="return confirm('Data Akan Dihapus?')" href="<?php echo base_url() ?>keuangan/delete/<?php echo $a['id_keuangan'] ?>">Delete</a>
							<a class="btn btn-success btn-sm" href="<?php echo base_url() ?>keuangan/edit/<?php echo $a['id_keuangan'] ?>">Edit</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>				
	</div>
</div>