<?php $this->extend('template') ?>

<?php $this->section('htmlhead') ?>
<link rel="stylesheet" type="text/css" href="<?= site_url("./assets/DataTables/datatables.min.css")?>">
<script type="text/javascript" src="<?= site_url("./assets/DataTables/datatables.min.js")?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>
<?php $this->endSection() ?>



<?php $this->section('content') ?>
<div class='container-fluid '>   
	<div class="row">
		<div class=" col-sm-12 text-center ">
		<?php
                    echo $this->include('modules/datatable');
		?>
		</div>
	</div>

</div>
<?php $this->endSection() ?>
