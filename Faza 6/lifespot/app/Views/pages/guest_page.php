<?php $this->extend('template') ?>


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

<?php $this->endSection() ?>
