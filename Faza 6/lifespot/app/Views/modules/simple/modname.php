<div class="row">
	<div class="col-sm-12 text-center">
		<form name="search" action="<?= site_url($config->changeSpeciesFormSubmit) ?>">
		<div class="row">
			<div class="offset-sm-4 col-sm-4 text-center ">
				<?=$this-> include('modules/autocomplete');?>
			</div>
			<div class="col-sm-2 text-center">
				<button class="btn btn-success my-2 my-sm-0" type="submit">Change Species</button>
			</div>
		</div>
		</form>
	</div>
</div>
