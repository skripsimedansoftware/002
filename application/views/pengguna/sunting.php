<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $sub_judul; ?></h3>
	</div>
	<form action="<?php echo base_url('pengguna/sunting/'.$pengguna['id']) ?>" method="post">
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

				if (aktif_sesi()['role'] == 'admin') {
				?>
					<div class="form-group">
						<label>Role</label>
						<select class="form-control" name="role">
							<option value="admin" <?php echo ($pengguna['role'] == 'admin')?'selected':'' ?>>Admin</option>
							<option value="sopir" <?php echo ($pengguna['role'] == 'sopir')?'selected':'' ?>>Sopir</option>
							<option value="petani" <?php echo ($pengguna['role'] == 'petani')?'selected':'' ?>>Petani</option>
						</select>
						<?php echo form_error('status', '<span class="help-block error">', '</span>'); ?>
					</div>
				<?php } ?>
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input class="form-control" type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo set_value('nama_lengkap', $pengguna['nama_lengkap']) ?>">
					<?php echo form_error('nama_lengkap', '<span class="help-block error">', '</span>'); ?>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="text" name="email" placeholder="Email" value="<?php echo set_value('email', $pengguna['email']) ?>">
					<?php echo form_error('email', '<span class="help-block error">', '</span>'); ?>
				</div>
				<div class="form-group">
					<label>Seluler</label>
					<input class="form-control" type="text" name="seluler" placeholder="Seluler" value="<?php echo set_value('seluler', $pengguna['seluler']) ?>">
					<?php echo form_error('seluler', '<span class="help-block error">', '</span>'); ?>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="text" name="password" placeholder="Password" value="<?php echo set_value('password') ?>">
					<?php echo form_error('password', '<span class="help-block error">', '</span>'); ?>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" placeholder="Alamat" value="<?php echo set_value('alamat', $pengguna['alamat']) ?>"></textarea>
					<?php echo form_error('alamat', '<span class="help-block error">', '</span>'); ?>
				</div>
				<div class="form-group">
					<label>Status</label>
					<select class="form-control" name="status">
						<option value="aktif" <?php echo ($pengguna['status'] == 'aktif')?'selected':'' ?>>Aktif</option>
						<option value="non-aktif" <?php echo ($pengguna['status'] == 'non-aktif')?'selected':'' ?>>Non-aktif</option>
						<option value="blokir" <?php echo ($pengguna['status'] == 'blokir')?'selected':'' ?>>Blokir</option>
					</select>
					<?php echo form_error('status', '<span class="help-block error">', '</span>'); ?>
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