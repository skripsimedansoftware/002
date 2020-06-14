<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $sub_judul; ?></h3>
	</div>
	<form action="<?php echo base_url('transportasi/tambah') ?>" method="post">
		<div class="box-body">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Jenis</label>
					<select class="form-control" name="jenis">
						<option value="pickup">Pickup</option>
						<option value="truck">Truk</option>
					</select>
					<?php echo form_error('jenis', '<span class="help-block error">', '</span>'); ?>
				</div>
				<div class="form-group">
					<label>Nomor Plat</label>
					<input class="form-control" type="text" name="nomor_plat" placeholder="Nomor Plat" value="<?php echo set_value('nomor_plat') ?>">
					<?php echo form_error('nomor_plat', '<span class="help-block error">', '</span>'); ?>
				</div>
				<div class="form-group">
					<label>Beban Angkut (Kilogram)</label>
					<input class="form-control" type="text" name="beban_angkut" placeholder="Beban Angkut" value="<?php echo set_value('beban_angkut') ?>">
					<?php echo form_error('beban_angkut', '<span class="help-block error">', '</span>'); ?>
				</div>
				<div class="form-group">
					<label>Sopir</label>
					<select class="form-control" name="sopir">
						<?php foreach ($sopir as $data) {?>
							<option value="<?php echo $data['id'] ?>"><?php echo $data['nama_lengkap']; ?></option>
						<?php } ?>
					</select>
					<?php echo form_error('sopir', '<span class="help-block error">', '</span>'); ?>
				</div>
				<div class="form-group">
					<label>Status</label>
					<select class="form-control" name="status">
						<option value="tersedia">Tersedia</option>
						<option value="tidak-tersedia">Tidak Tersedia</option>
					</select>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<a  class="btn btn-default btn-flat" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> Kembali</a>
			&nbsp;&nbsp;
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</form>
</div>