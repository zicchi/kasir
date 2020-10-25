<!doctype html>
<html lang="en">

<head>
	<title>KASIR TOGAMEDIA</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>/assets/img/favicon.png">

	<!-- Javascript -->
	<script src="<?php echo base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/scripts/klorofil-common.js"></script>

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand"><h3>TOGAMEDIA</h3>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url(); ?>/assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $this->session->userdata('username'); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('index.php/login/logout'); ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<?php
							if($this->session->userdata('level') == 'admin'){
								?>
									<li><a href="<?php echo base_url('index.php/dashboard'); ?>" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
									<li><a href="<?php echo base_url('index.php/kategori'); ?>" class=""><i class="lnr lnr-code"></i> <span>Data Kategori Buku</span></a></li>
									<li><a href="<?php echo base_url('index.php/buku'); ?>" class=""><i class="lnr lnr-code"></i> <span>Data Buku</span></a></li>
									<li><a href="<?php echo base_url('index.php/pengguna'); ?>" class=""><i class="lnr lnr-chart-bars"></i> <span>Data Pengguna</span></a></li>
									<li><a href="<?php echo base_url('index.php/transaksi'); ?>" class=""><i class="lnr lnr-cog"></i> <span>Transaksi</span></a></li>
									<li><a href="<?php echo base_url('index.php/transaksi/riwayat'); ?>" class=""><i class="lnr lnr-cog"></i> <span>Riwayat Transaksi</span></a></li>
								<?php
							} else {
								?>
									<li><a href="<?php echo base_url('index.php/transaksi'); ?>" class=""><i class="lnr lnr-cog"></i> <span>Transaksi</span></a></li>
									<li><a href="<?php echo base_url('index.php/transaksi/riwayat'); ?>" class=""><i class="lnr lnr-cog"></i> <span>Riwayat Transaksi</span></a></li>
								<?php
							}
						?>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<?php
				$this->load->view($main_view);
			?>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
