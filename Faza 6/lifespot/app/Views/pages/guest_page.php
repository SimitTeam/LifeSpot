<?php

/**
* guest_page - iscrtava stranicu koja sadrzi forme za pretragu markera po vrsti i prikazuje 
*
* @version 1.0
* 
*@author Edvin Maid 17/0117
*/

?>

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

<?php if(!$config->showSearchBarGP) echo($this->include('modules/big_search')); ?>

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
