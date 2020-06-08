<div class="row">
<div class="offset-3 col-6">
	<?php if($config->showError[0]) echo($this-> include('modules/error_list')) ?>
</div>
</div>
<h3> Confirm Marker: </h3>
<form action="<?=site_url($config->ConfirmationFormSubmit)?>">
	Confirm 
	<input type='radio' name="<?=$config->confirmationRadio?>" value='confirm' checked>
	&nbsp Deny 
	<input type='radio' name="<?=$config->confirmationRadio?>" value='deny' >
        <input type="text" id="hidden_species_par" name="species_name" hidden value="<?=$config->markerSpeciesName?>">
         <input type="text" id="hidden_species_par" name="marker_id" hidden value="<?=$config->markerId?>">
	<button class="btn btn-success my-2 my-sm-0" type="submit">Submit</button> 
</form>
