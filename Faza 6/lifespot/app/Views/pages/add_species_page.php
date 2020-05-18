<?php $this->extend('template') ?>


<?php $this->section('content') ?>
<div class='container-fluid '>   
	<div class="row">
		<div class=" offset-sm-2 col-sm-4 text-center row_space">
			<h2>Add Species</h2>
			<?php if($config->showError) echo($validation->listErrors()) ?>
			<form action="<?=site_url($config->addSpeciesFormSubmit)?>" >
				<table class='table'>
				  <tr>
					  <td>
						<span style="color: red;">*</span>Species Name(Latin):
					  </td>
					  <td>
						  <input type="text" name="<?=$config->speciesInputName?>">
						  </td>
					  </tr>
				  <tr>
					<td colspan='2'  class='text-center'>
						Plant 
						<input type='radio' name="<?=$config->speciesTypeRadio?>" value='plant' checked>
						&nbsp Animal 
						<input type='radio' name="<?=$config->speciesTypeRadio?>" value='animal' >
					</td>
				  </tr> 
				<tr>
					<td>Image:</td>
					<td colspan='2' >
						<input type="file" name="<?=$config->imgUploadName ?>[]">
					 </td>
				</tr>   
				  <tr>
					  <td colspan='2' class='text-center'>
						  <button class="btn btn-success my-2 my-sm-0" type="submit">Confirm</button> 
					  </td>
				  </tr>
				</table>
			</form>
		</div>
		<div class=" col-sm-4 text-center row_space">
			<h2>Add Synonym</h2>
			<?php if($config->showError) echo($validation->listErrors()) ?>
			<form action="<?=site_url($config->addSynonymFormSubmit)?>" >
				<table class='table'>
				  <tr>
					<td>
						<span style="color: red;">*</span>Species Name(Latin):
				 	</td>
				 	<td>
						<?=$this-> include('modules/autocomplete');?>
					</td>
				  </tr>
				  <tr>
					  <td>
						<span style="color: red;">*</span>Synonym:
					  </td>
					  <td>
						  <input type="text" name="<?=$config->synonymInputName?>">
					  </td>    
				  </tr>
				  <tr>
					  <td colspan='2' class='text-center'>
						  <button class="btn btn-success my-2 my-sm-0" type="submit">Confirm</button> 
					  </td>
				  </tr>
				</table>
			</form>
		</div>
	</div>
</div>
<?php $this->endSection() ?>
