<form name="search" <?php if(!$config->showSearchBarGP) echo("hidden") ?>action="<?= site_url($config->searchFormSubmit) ?>">
	<div class="row">
		<div class="offset-4 col-4">
			<?=$this-> include('modules/autocomplete');?>
		</div>
		<div class="col-2">
			<button class="btn btn-success" type="submit">Search</button> 
		</div>
	</div>    
</form>
