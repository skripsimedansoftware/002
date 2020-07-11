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
				<th>Nomor Rekening</th>
				<th>Bank Penerbit</th>
				<th>Opsi</th>
			</thead>
			<tbody>
				<?php
				if (!empty($akun_bank)) {
					foreach ($akun_bank as $key => $value) {
				?>
				<tr>
					<td><?php echo $key+=1; ?></td>
					<td><?php echo ucfirst($value['nomor_rekening']); ?></td>
					<td><?php echo $value['bank_penerbit']; ?></td>
				
					<td>
						<a class="btn btn-sm btn-flat btn-success" href="<?php echo base_url('pengguna/akun_bank/'.$value['id']) ?>">Lihat</a>
						<a class="btn btn-sm btn-flat btn-primary" href="<?php echo base_url('pengguna/sunting_akun_bank/'.$value['id']) ?>">Sunting</a>
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