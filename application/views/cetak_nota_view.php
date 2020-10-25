<!DOCTYPE html>
<html>
<head>
	<title>NOTA</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css">

	<!-- Javascript -->
	<script src="<?php echo base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="nota"></div>

	<script type="text/javascript">

		$("#nota").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/transaksi/get_detil_transaksi_by_id/<?php echo $this->uri->segment(3); ?>',  function(data){
			$("#nota").html(data.show_detil);

			window.print();
		});

	</script>

</body>
</html>