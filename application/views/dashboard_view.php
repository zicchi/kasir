
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Dashboard Togamedia</h3>
							<p class="panel-subtitle">Period: <?php echo date('D, d M Y') ?></p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-book"></i></span>
										<p>
											<span class="number"><?php echo $jml_buku->jml_buku; ?></span>
											<span class="title">Buku</span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number"><?php echo $jml_transaksi->jml_transaksi; ?></span>
											<span class="title">Transaksi</span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number"><?php echo $jml_pengguna->jml_pengguna; ?></span>
											<span class="title">Pengguna</span>
										</p>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>