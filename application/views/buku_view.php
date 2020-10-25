<div class="main-content">
	<div class="container-fluid">
		<h3 class="page-title">Data Buku</h3>
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

						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah_buku">Tambah Buku</button>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Cover</th>
									<th>Judul</th>
									<th>Kategori</th>
									<th>Tahun</th>
									<th>Penulis</th>
									<th>Penerbit</th>
									<th>Stok</th>
									<th>Harga</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$no = 1;
								foreach ($buku as $b) {
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$b->kode_buku.'</td>
											<td><img src="'.base_url().'assets/cover_buku/'.$b->foto.'" width="50px" /></td>
											<td>'.$b->judul.'</td>
											<td>'.$b->nama_kat.'</td>
											<td>'.$b->tahun.'</td>
											<td>'.$b->penulis.'</td>
											<td>'.$b->penerbit.'</td>
											<td>'.$b->stok.'</td>
											<td>Rp '.$b->harga.',-</td>
											<td>
												<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_buku" onclick="prepare_ubah_buku('.$b->id_buku.')">Ubah</a>
												<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_buku" onclick="prepare_hapus_buku('.$b->id_buku.')">hapus</a>
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
<div id="modal_tambah_buku" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Buku</h4>
      </div>
      <form action="<?php echo base_url('index.php/buku/tambah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	      		<input type="text" class="form-control" placeholder="Kode_buku" name="kode_buku">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Judul" name="judul">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Tahun" name="tahun">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Penulis" name="penulis">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Penerbit" name="penerbit">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Stok" name="stok">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Harga" name="harga">
	        	<br>
	        	<select name="kategori" class="form-control">
					<?php
						foreach ($kategori as $k) {
							echo '
								<option value="'.$k->id_kat.'">'.$k->nama_kat.'</option>
							';
						}
					?>	        		
	        	</select>
	        	<br>
	        	<input type="file" class="form-control" placeholder="Foto" name="foto">

	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>

  </div>
</div>

<div id="modal_ubah_buku" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Buku</h4>
      </div>
      <form action="<?php echo base_url('index.php/buku/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	<input type="hidden" name="ubah_id_buku"  id="ubah_id_buku">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Kode Buku" name="ubah_kode_buku"  id="ubah_kode_buku">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Judul" name="ubah_judul"  id="ubah_judul">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Tahun" name="ubah_tahun" id="ubah_tahun">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Penulis" name="ubah_penulis" id="ubah_penulis">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Penerbit" name="ubah_penerbit" id="ubah_penerbit">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Stok" name="ubah_stok" id="ubah_stok">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Harga" name="ubah_harga" id="ubah_harga">
	        	<br>
	        	<select name="ubah_kategori" id="ubah_kategori" class="form-control">
					<?php
						foreach ($kategori as $k) {
							echo '
								<option value="'.$k->id_kat.'">'.$k->nama_kat.'</option>
							';
						}
					?>	        		
	        	</select>
	        	<br>
	        	<div id="data_foto"></div>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_hapus_buku" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus Buku</h4>
      </div>
      <form action="<?php echo base_url('index.php/buku/hapus'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="hidden" name="hapus_id_buku"  id="hapus_id_buku">
	        	<p>Apakah anda yakin menghapus buku <b><span id="hapus_judul"></span></b> ?</p>
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
	
	function prepare_ubah_buku(id)
	{
		$("#ubah_id_buku").empty();
		$("#ubah_kode_buku").empty();
		$("#ubah_judul").empty();
		$("#ubah_tahun").empty();
		$("#ubah_penulis").empty();
		$("#ubah_penerbit").empty();
		$("#ubah_kategori").val();
		$("#ubah_stok").empty();
		$("#ubah_harga").empty();
		$("#data_foto").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/buku/get_data_buku_by_id/' + id,  function(data){
			$("#ubah_id_buku").val(data.id_buku);
			$("#ubah_kode_buku").val(data.kode_buku);
			$("#ubah_judul").val(data.judul);
			$("#ubah_tahun").val(data.tahun);
			$("#ubah_penulis").val(data.penulis);
			$("#ubah_penerbit").val(data.penerbit);
			$("#ubah_kategori").val(data.id_kat);
			$("#ubah_stok").val(data.stok);
			$("#ubah_harga").val(data.harga);
			$("#data_foto").html('<img src="<?php echo base_url(); ?>assets/cover_buku/' + data.foto + '" width="50px" >');
		});
	}

	function prepare_hapus_buku(id)
	{
		$("#hapus_id_buku").empty();
		$("#hapus_judul").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/buku/get_data_buku_by_id/' + id,  function(data){
			$("#hapus_id_buku").val(data.id_buku);
			$("#hapus_judul").text(data.judul);
		});
	}
</script>
