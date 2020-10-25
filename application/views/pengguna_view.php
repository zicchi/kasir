<div class="main-content">
	<div class="container-fluid">
		<h3 class="page-title">Data Pengguna</h3>
		<?php
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
					<div class="alert alert-danger">'.$notif.'</div>
				';
			}
		?>
		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">

						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah_pengguna">Tambah Pengguna</button>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Level</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$no = 1;
								foreach ($pengguna as $b) {
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$b->nama.'</td>
											<td>'.$b->username.'</td>
											<td>'.$b->level.'</td>
											<td>
												<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_pengguna" onclick="prepare_ubah_pengguna('.$b->id.')">Ubah</a>
												<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_pengguna" onclick="prepare_hapus_pengguna('.$b->id.')">Hapus</a>
											</td>
										</tr>
									';
									$no++;
								}
							?>
							</tbody>
						</table>

					</div>
				</div>
				<!-- END TABLE STRIPED -->
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="modal_tambah_pengguna" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah pengguna</h4>
      </div>
      <form action="<?php echo base_url('index.php/pengguna/tambah'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="text" class="form-control" placeholder="Nama" name="nama">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Username" name="username">
	        	<br>
	        	<input type="password" class="form-control" placeholder="Password" name="password">
	        	<br>
	        	<select class="form-control" name="level">
	        		<option value="admin">Admin</option>
	        		<option value="kasir">kasir</option>
	        	</select>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_ubah_pengguna" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah pengguna</h4>
      </div>
      <form action="<?php echo base_url('index.php/pengguna/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	<input type="hidden" name="ubah_id" id="ubah_id">
	        	<input type="text" class="form-control" placeholder="Nama" name="ubah_nama" id="ubah_nama">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Username" name="ubah_username" id="ubah_username">
	        	<br>
	        	<input type="password" class="form-control" placeholder="Password" name="ubah_password" id="ubah_password">
	        	<br>
	        	<select class="form-control" name="ubah_level" id="ubah_level">
	        		<option value="admin">Admin</option>
	        		<option value="kasir">kasir</option>
	        	</select>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_hapus_pengguna" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus pengguna</h4>
      </div>
      <form action="<?php echo base_url('index.php/pengguna/hapus'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="hidden" name="hapus_id"  id="hapus_id">
	        	<p>Apakah anda yakin menghapus pengguna <b><span id="hapus_nama"></span></b> ?</p>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
	
	function prepare_ubah_pengguna(id)
	{
		$("#ubah_id").empty();
		$("#ubah_nama").empty();
		$("#ubah_username").empty();
		$("#ubah_password").empty();
		$("#ubah_level").val();

		$.getJSON('<?php echo base_url(); ?>index.php/pengguna/get_data_pengguna_by_id/' + id,  function(data){
			$("#ubah_id").val(data.id);
			$("#ubah_nama").val(data.nama);
			$("#ubah_username").val(data.username);
			$("#ubah_password").val(data.password);
			$("#ubah_level").val(data.level);
		});
	}

	function prepare_hapus_pengguna(id)
	{
		$("#hapus_id").empty();
		$("#hapus_nama").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/pengguna/get_data_pengguna_by_id/' + id,  function(data){
			$("#hapus_id").val(data.id);
			$("#hapus_nama").text(data.nama);
		});
	}
</script>
