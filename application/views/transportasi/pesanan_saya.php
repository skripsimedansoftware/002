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
					<th>Penjualan</th>
					<th>Upah Angkut</th>
					<th>Total Pendapatan</th>
					<th>Catatan</th>
					<th>Status</th>
					<th>Opsi</th>
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
						<td>Rp.<?php echo number_format($data['penjualan'], 0, ',', '.') ?></td>
						<td>Rp.<?php echo number_format($data['upah_angkut'], 0, ',', '.') ?></td>
						<td>Rp.<?php echo number_format($data['total_pendapatan'], 0, ',', '.') ?></td>
						<td><?php echo $data['catatan'] ?></td>
						<td>
							<?php
							switch ($data['status'])
							{
								case 'pesan':
									?><a class="btn bg-maroon">Menunggu Konfirmasi</a><?php
								break;

								case 'konfirmasi':
									?><a class="btn bg-purple">Telah Dikonfirmasi</a><?php
								break;

								case 'batal':
									?><a class="btn btn-danger">Telah Dibatalkan</a><?php
								break;

								case 'proses':
									?><a class="btn bg-navy">Sedang Diproses</a><?php
								break;

								case 'selesai':
									?><a class="btn btn-success">Selesai</a><?php
								break;
								
								default:
								break;
							}
							?>
						</td>
						<td>
							<?php
							// tidak di izinkan membatalkan pesanan jika statusnya seperti berikut
							if (!in_array($data['status'], ['konfirmasi', 'proses', 'selesai', 'batal']))
							{
								?>
								<a class="btn btn-danger" href="<?php echo base_url('transportasi/ubah_status_pesanan/'.$data['id'].'/'.'batal'.'?redirect_to='.base_url('transportasi/pesanan_saya')) ?>">Batalkan Pesanan</a>
								<?php
							}
							else
							{
								?>
								<center>-</center>
								<?php
							}
							?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="box-footer">
			<a class="btn btn-primary" href="<?php echo base_url('transportasi/pesan') ?>"><i class="fa fa-car"></i> Pesan Transportasi</a>
		</div>
	</form>
</div>