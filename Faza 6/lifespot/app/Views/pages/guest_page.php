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
<div class="row">
	<div class="col-12">
		<h2>&nbsp;</h2>
	</div>
</div>    

<form name="search" action="<?= site_url($config->searchFormSubmit) ?>">
	<div class="row">
		<div class="offset-4 col-4">
			<?=$this-> include('modules/autocomplete');?>
		</div>
		<div class="col-2">
			<button class="btn btn-success" type="submit">Search</button> 
		</div>
	</div>    
</form>


<div class="row">
	<div class="col-12">
		<?php if($config->showResultsMap) echo($this->include('modules/resultsmap'));?>
	</div>
</div>    

<div class="row">
	<div class="offset-2 col-8">
		<?php if($config->showSearchResults) echo($this->include('modules/datatable'));?>
	</div>
</div>    

<?php $this->endSection() ?>
