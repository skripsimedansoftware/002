<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $sub_judul; ?></h3>
	</div>
	<form action="<?php echo base_url('pengguna/sunting_akun_bank/'.$akun_bank['id']) ?>" method="post">
		<div class="box-body">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Nomor Rekening</label>
					<input class="form-control" type="text" name="nomor_rekening" placeholder="Nomor Rekening" value="<?php echo $akun_bank['nomor_rekening']; ?>">
				</div>
				<div class="form-group">
					<label>Bank Penerbit</label>
					<select class="form-control" name="bank_penerbit">
						<?php foreach ($bank_penerbit as $value) { ?>
						    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Nama Pemilik</label>
					<input class="form-control" type="text" name="nama_pemilik" placeholder="Nama Pemilik" value="<?php echo $akun_bank['nama_pemilik']; ?>">
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