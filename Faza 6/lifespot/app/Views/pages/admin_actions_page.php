<?php $this->extend('template') ?>


<?php $this->section('htmlhead') ?>
<link rel="stylesheet" type="text/css" href="<?= site_url("./assets/DataTables/datatables.min.css")?>">
<link rel="stylesheet" type="text/css" href="<?= site_url("./assets/DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css")?>">

<script type="text/javascript" src="<?= site_url("./assets/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js")?>"></script>
<script type="text/javascript" src="<?= site_url("./assets/DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js")?>"></script>



<script>
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>
<?php $this->endSection() ?>

<?php $this->section('content') ?>
<div class="row">
	<div class="offset-2 col-8">
		<h1>&nbsp;</h1>
	</div>
</div>    
<div class="row">
	<div class="offset-2 col-8">
		<?php echo($this->include('modules/datatable'));?>
	</div>
</div>    
<?php $this->endSection() ?>
