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
				<th>Jenis</th>
				<th>Nomor Plat</th>
				<th>Beban Angkut</th>
				<th>Pengemudi</th>
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
					<td><?php echo ucfirst($value['jenis']); ?></td>
					<td><?php echo $value['nomor_plat']; ?></td>
					<td><?php echo $value['beban_angkut']; ?> KG</td>
					<td><?php echo view_user($value['pengemudi'])['nama_lengkap']; ?></td>
					<td>
						<?php
						switch ($value['status']) {
							case 'tersedia':
								echo "<button class='btn btn-xs btn-success'>Tersedia</button>";
							break;

							case 'tidak-tersedia':
								echo "<button class='btn btn-xs btn-default'>Tidak Tersedia</button>";
							break;
							
							default:
								echo "<button class='btn btn-xs btn-danger'>error</button>";
							break;
						}
						?>
					</td>
					<td>
						<a class="btn btn-sm btn-flat btn-primary" href="<?php echo base_url('transportasi/sunting/'.$value['id']) ?>">Sunting</a>
						<a class="btn btn-sm btn-flat btn-danger" href="<?php echo base_url('transportasi/hapus/'.$value['id']) ?>">Hapus</a>
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
		<a class="btn btn-primary btn-flat" href="<?php echo base_url('transportasi/tambah') ?>"><i class="fa fa-plus"></i> Tambah</a>
		&nbsp;
		<a class="btn bg-navy btn-flat" href="<?php echo base_url('transportasi/pesanan') ?>"><i class="fa fa-eye"></i> Lihat Semua Pesanan</a>
	</div>
</div>