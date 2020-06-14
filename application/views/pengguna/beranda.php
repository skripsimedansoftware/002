<div class="row">
	<div class="col-lg-4 col-xs-12">
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3><?php echo $this->pengguna_model->count_all(); ?></h3>
				<p>Total Pengguna</p>
			</div>
			<div class="icon">
				<i class="fa fa-users"></i>
			</div>
			<a href="<?php echo base_url('pengguna') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-4 col-xs-12">
		<div class="small-box bg-green">
			<div class="inner">
				<h3><?php echo $this->transportasi_model->count_all(); ?></h3>
				<p>Total Transportasi</p>
			</div>
			<div class="icon">
				<i class="fa fa-car"></i>
			</div>
			<a href="<?php echo base_url('transportasi') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-4 col-xs-12">
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3><?php echo $this->pesanan_transportasi_model->count_all(); ?></h3>
				<p>Total Pesanan</p>
			</div>
			<div class="icon">
				<i class="fa fa-truck"></i>
			</div>
			<a href="<?php echo base_url('transportasi/pesanan') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>