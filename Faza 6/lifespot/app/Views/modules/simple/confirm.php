<h3> Confirm Marker: </h3>
<form action="<?=site_url($config->addConfirmationFormSubmit)?>">
	Confirm 
	<input type='radio' name="<?=$config->confirmationRadio?>" value='confirm' checked>
	&nbsp Deny 
	<input type='radio' name="<?=$config->confirmationRadio?>" value='deny' >
	<button class="btn btn-success my-2 my-sm-0" type="submit">Submit</button> 
</form>
