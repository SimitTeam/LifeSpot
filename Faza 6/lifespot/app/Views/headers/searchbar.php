<form name="search" action="<?= site_url($config->headerSearchFormSubmit) ?>" class="form-inline my-2 my-lg-0">
	<?=$this-> include('modules/autocomplete');?>
	<button class="btn btn-success my-2 my-sm-0" type="submit">Search</button> 
</form>
