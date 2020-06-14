<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $sub_judul; ?></h3>
	</div>
	<div class="box-body">
		<?php 
		if ($this->session->userdata('flash_message'))
		{
			?>
				<div class="alert alert-<?php echo $this->session->userdata('flash_message')['status'] ?> alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php echo $this->session->userdata('flash_message')['message'] ?>
				</div>
			<?php
		}
		?>
		<table class="table table-hover table-striped datatable">
			<thead>
				<th>No</th>
				<th>Role</th>
				<th>Nama Lengkap</th>
				<th>Email</th>
				<th>Status</th>
				<th>Opsi</th>
			</thead>
			<tbody>
				<?php
				if (!empty($pengguna)) {
					foreach ($pengguna as $key => $value) {
				?>
				<tr>
					<td><?php echo $key+=1; ?></td>
					<td><?php echo ucfirst($value['role']); ?></td>
					<td><?php echo $value['nama_lengkap']; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td>
						<?php
						switch ($value['status']) {
							case 'aktif':
								echo "<button class='btn btn-xs btn-success'>aktif</button>";
							break;

							case 'non-aktif':
								echo "<button class='btn btn-xs btn-warning'>non-aktif</button>";
							break;
							
							default:
								echo "<button class='btn btn-xs btn-danger'>blokir</button>";
							break;
						}
						?>
					</td>
					<td>
						<a class="btn btn-sm btn-flat btn-success" href="<?php echo base_url('pengguna/profil/'.$value['id']) ?>">Lihat</a>
						<a class="btn btn-sm btn-flat btn-primary" href="<?php echo base_url('pengguna/sunting/'.$value['id']) ?>">Sunting</a>
						<a class="btn btn-sm btn-flat btn-danger" href="<?php echo base_url('pengguna/hapus/'.$value['id']) ?>" onclick="return confirm('Konfirmasi penghapusan')">Hapus</a>
					</td>
				</tr>
			<?php 
				}
			}
			?>
			</tbody>
		</table>
	</div>
	<div class="box-footer">
		<a class="btn btn-primary btn-flat" href="<?php echo base_url('pengguna/tambah') ?>"><i class="fa fa-plus"></i> Tambah</a>
	</div>
</div>