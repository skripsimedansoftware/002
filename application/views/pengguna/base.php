<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo isset($sub_judul)?APP_INFO['name'].' - '.$sub_judul:APP_INFO['name']; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>bower_components/jvectormap/jquery-jvectormap.css">
	<!-- DateTime Picker -->
	<link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
			folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>dist/css/skins/_all-skins.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<style type="text/css">
		.help-block.error {
			color: red;
		}

		.box-body {
			overflow-y: scroll;
		}
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<header class="main-header">

		<!-- Logo -->
		<a href="<?php echo base_url() ?>" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>A</b>LT</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b><?php echo APP_INFO['name']; ?></b></span>
		</a>

		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>
			<!-- Navbar Right Menu -->
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url('assets/pengguna/') ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
							<span class="hidden-xs"><?php echo aktif_sesi()['nama_lengkap']; ?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="<?php echo base_url('assets/pengguna/') ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

								<p>
									<?php echo aktif_sesi()['nama_lengkap'].' - '.ucfirst(aktif_sesi()['role']); ?>
								</p>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="<?php echo base_url('pengguna/profil') ?>" class="btn btn-default btn-flat">Profil</a>
								</div>
								<div class="pull-right">
									<a href="<?php echo base_url('pengguna/keluar') ?>" class="btn btn-default btn-flat">Keluar</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>

		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?php echo base_url('assets/pengguna/') ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?php echo aktif_sesi()['nama_lengkap']; ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu" data-widget="tree" style="margin-top: 2%;">
				<li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
				<?php if (aktif_sesi()['role'] == 'admin') {?>
					<li><a href="<?php echo base_url('pengguna/semua') ?>"><i class="fa fa-users"></i> <span>Pengguna</span></a></li>
					<li><a href="<?php echo base_url('transportasi') ?>"><i class="fa fa-car"></i> <span>Transportasi</span></a></li>
					<li><a href="<?php echo base_url('setting') ?>"><i class="fa fa-cogs"></i> <span>Pengaturan</span></a></li>
				<?php } ?>
				<?php if (aktif_sesi()['role'] == 'petani') {?>
					<li class="header">Transportasi</li>
					<li><a href="<?php echo base_url('pengguna/akun_bank') ?>"><i class="fa fa-bank"></i> <span>Akun Bank</span></a></li>
					<li><a href="<?php echo base_url('transportasi/pesan') ?>"><i class="fa fa-truck"></i> <span>Pesan Transportasi</span></a></li>
					<li><a href="<?php echo base_url('transportasi/pesanan_saya') ?>"><i class="fa fa-shopping-cart"></i> <span>Pesanan Saya</span></a></li>
					<li><a href="https://api.whatsapp.com/send?phone=082167368585&text=Hai admin, %0ASaya butuh bantuan"><i class="fa fa-whatsapp"></i> <span>Hubungi Admin (WhatsApp)</span></a></li>
				<?php } ?>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo APP_INFO['name']; ?>
				<small>Version <?php echo APP_INFO['version']; ?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<?php echo $page; ?>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 2.4.0
		</div>
		<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo base_url() ?>"><?php echo APP_INFO['name']; ?></a>.</strong> All rights
		reserved.
	</footer>

	<!-- Add the sidebar's background. This div must be placed
			immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/pengguna/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/pengguna/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/pengguna/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/pengguna/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/pengguna/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/pengguna/') ?>dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/pengguna/') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url('assets/pengguna/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/pengguna/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/pengguna/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/pengguna/') ?>bower_components/chart.js/Chart.js"></script>


<script type="text/javascript" src="<?php echo base_url('assets/pengguna/') ?>bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/pengguna/') ?>bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	 $('#jadwal_angkut').datetimepicker({
	 	inline: true,
	 	sideBySide: true,
		// viewMode: 'years',
		format: 'YYYY-MM-DD hh:mm A'
	 });

	 $('table.datatable').DataTable();
});
</script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
</body>
</html>