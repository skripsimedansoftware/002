<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $sub_judul; ?></h3>
	</div>
	<form action="<?php echo base_url('setting') ?>" method="post">
		<div class="box-body">
			<div class="col-lg-6">
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
				<div class="form-group">
					<label>Upah Angkut</label>
					<input class="form-control" type="text" name="upah_angkut" placeholder="Upah Angkut" value="<?php echo set_value('upah_angkut', $upah_angkut['value']) ?>">
					<?php echo form_error('upah_angkut', '<span class="help-block error">', '</span>'); ?>
				</div>
				<div class="form-group">
					<label>Harga Sawit</label>
					<input class="form-control" type="text" name="harga_sawit" placeholder="Harga Sawit" value="<?php echo set_value('harga_sawit', $harga_sawit['value']) ?>">
					<?php echo form_error('harga_sawit', '<span class="help-block error">', '</span>'); ?>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<a  class="btn btn-default btn-flat" href="<?php echo base_url(); ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
			&nbsp;&nbsp;
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</form>
</div>