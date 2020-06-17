<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $sub_judul; ?></h3>
	</div>
	<form action="<?php echo base_url('transportasi/pesan/'.$this->uri->segment(3)) ?>" method="post">
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
			<table class="table table-hover table-striped table-bordered datatable">
				<thead>
					<th>No</th>
					<th>Tanggal Pemesanan</th>
					<th>Atas Nama</th>
					<th>Kontak</th>
					<th>Jadwal Angkut</th>
					<th>Lokasi Angkut</th>
					<th>Catatan</th>
					<th>Status</th>
				</thead>
				<tbody>
					<?php 
					foreach ($pesanan_transportasi as $key => $data) { ?>
					<tr>
						<td><?php echo $key+=1 ?></td>
						<td><?php echo lang('cal_'.strtolower(nice_date($data['tanggal_pemesanan'], 'l'))).', '.nice_date($data['tanggal_pemesanan'], 'd-m-Y | H:i A') ?></td>
						<td><?php echo $data['nama_lengkap'] ?></td>
						<td><?php echo $data['seluler'] ?></td>
						<td><?php echo lang('cal_'.strtolower(nice_date($data['jadwal_angkut'], 'l'))).', '.nice_date($data['jadwal_angkut'], 'd-m-Y | H:i A') ?></td>
						<td><?php echo $data['penjemputan'] ?></td>
						<td><?php echo $data['catatan'] ?></td>
						<td>
							<?php
							switch ($data['status']) 
							{
								case 'konfirmasi':
									?><a class="btn bg-purple" href="<?php echo base_url('transportasi/ubah_status_pesanan/'.$data['id'].'/'.'proses'.'?redirect_to='.base_url()) ?>">Proses Pesanan</a><?php
								break;

								case 'proses':
									?><a class="btn bg-navy" href="<?php echo base_url('transportasi/ubah_status_pesanan/'.$data['id'].'/'.'selesai'.'?redirect_to='.base_url()) ?>">Konfirmasi Sudah Sampai</a><?php
								break;

								case 'selesai':
									?><a class="btn btn-success">Selesai</a><?php
								break;
								
								default:
									?><a class="btn btn-danger">Tidak Diketahui</a><?php
								break;
							}
							?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</form>
</div>