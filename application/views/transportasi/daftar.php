<?php 
if (!empty($transportasi))
foreach ($transportasi as $data){?>
<div class="col-md-4">
	<div class="box box-widget widget-user">
		<div class="widget-user-header bg-aqua-active">
			<h3 class="widget-user-username">
				<?php
				$sopir = view_user($data['pengemudi']);

				if ($sopir)
				{
					echo $sopir['nama_lengkap'];
				}
				?>
			</h3>
			<h5 class="widget-user-desc"><?php echo ucfirst($sopir['seluler']) ?></h5>
		</div>
		<div class="widget-user-image">
			<?php if ($data['jenis'] == 'pickup') {?>
				<img class="img-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSPjbzqVvt8NYNS2t7-jXG7XphqrbD4eEFwi2PD_cn4hd1tPIPP&usqp=CAU" alt="User Avatar">
			<?php } else {?>
				<img class="img-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQIZQJ5475652NDaTEOy62S9Sm71t5vQB7S3KbXeTgWzRKQVIgj&usqp=CAU" alt="User Avatar">
			<?php } ?>
		</div>
		<input type="hidden" name="transportasi_id" value="<?php echo $data['id'] ?>">
		<div class="box-footer">
			<div class="row">
				<div class="col-sm-4 border-right">
					<div class="description-block">
						<h5 class="description-header">JENIS</h5>
						<span class="description-text"><?php echo $data['jenis'] ?></span>
					</div>
				</div>
				<div class="col-sm-4 border-right">
					<div class="description-block">
						<h5 class="description-header">BEBAN ANGKUT</h5>
						<span class="description-text"><?php echo $data['beban_angkut'] ?> KG</span>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="description-block">
						<h5 class="description-header">NOMOR PLAT</h5>
						<span class="description-text"><?php echo $data['nomor_plat'] ?></span>
					</div>
				</div>
				<div class="col-sm-12">
					<a class="btn btn-success btn-flat btn-block" href="<?php echo base_url('transportasi/pesan/'.$data['id']) ?>">Pesan</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>