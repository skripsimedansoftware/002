<div class="col-lg-6">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo $sub_judul; ?></h3>
		</div>
		<div class="box-body">
			<table class="table table-striped table-hover table-bordered">
				<tr>
					<td>Nama</td><td><?php echo $pengguna['nama_lengkap'] ?></td>
				</tr>
				<tr>
					<td>Email</td><td><?php echo $pengguna['email'] ?></td>
				</tr>
				<tr>
					<td>Seluler</td><td><?php echo $pengguna['seluler'] ?></td>
				</tr>
				<tr>
					<td>Alamat</td><td><?php echo $pengguna['alamat'] ?></td>
				</tr>
				<tr>
					<td>Status</td><td><?php echo $pengguna['status'] ?></td>
				</tr>
			</table>
		</div>
		<div class="box-footer">
			<a  class="btn btn-default btn-flat" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> Kembali</a>
			&nbsp;&nbsp;
			<a class="btn btn-primary btn-flat" href="<?php echo base_url('pengguna/sunting/'.$pengguna['id']) ?>"><i class="fa fa-edit"></i> Sunting</a>
		</div>
	</div>
</div>
<?php if ($pengguna['role'] == 'petani') :?>
<div class="col-lg-6">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Nomor Rekening</h3>
		</div>
		<div class="box-body">
			<table class="table table-hover table-striped">
				<thead>
					<th>No</th>
					<th>Bank Penerbit</th>
					<th>Nomor Rekening</th>
					<th>Nama Pemilik</th>
				</thead>
				<tbody>
					<?php
					if (!empty($akun_bank)) {
						foreach ($akun_bank as $key => $value) {
					?>
					<tr>
						<td><?php echo $key+=1; ?></td>
						<td><?php echo $value['bank_penerbit']; ?></td>
						<td><?php echo ucfirst($value['nomor_rekening']); ?></td>
						<td><?php echo $value['nama_pemilik']; ?></td>
					</tr>
				<?php 
					}
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php endif ?>