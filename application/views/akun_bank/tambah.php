<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $sub_judul; ?></h3>
	</div>
	<form action="<?php echo base_url('pengguna/tambah_akun_bank/') ?>" method="post">
		<div class="box-body">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Nomor Rekening</label>
					<input class="form-control" type="text" name="nomor_rekening" placeholder="Nomor Rekening" value="<?php echo set_value('nomor_rekening') ?>">
					<?php echo form_error('nomor_rekening', '<span class="help-block error">', '</span>'); ?>
				</div>
				<div class="form-group">
					<label>Bank Penerbit</label>
					<select class="form-control" name="bank_penerbit">
						<?php foreach ($bank_penerbit as $value) { ?>
						    <option value="<?php echo $value; ?>" <?php echo set_value('nomor_rekening') == $value?'selected':'' ?>><?php echo $value; ?></option>
						<?php } ?>
					</select>
					<?php echo form_error('bank_penerbit', '<span class="help-block error">', '</span>'); ?>
				</div>
				<div class="form-group">
					<label>Nama Pemilik</label>
					<input class="form-control" type="text" name="nama_pemilik" placeholder="Nama Pemilik" value="<?php echo set_value('nama_pemilik') ?>">
					<?php echo form_error('nama_pemilik', '<span class="help-block error">', '</span>'); ?>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<a  class="btn btn-default btn-flat" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> Kembali</a>
			&nbsp;&nbsp;
			<button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</form>
</div>