<?php $this->extend('template') ?>





<?php $this->section('content') ?>
<div class='container-fluid '>   
	<div class='row'>
		<div class='offset-sm-4 col-sm-4 text-center'>
		  <h2>New Marker</h2>
		  <hr>
		<?php if($config->showError) echo($validation->listErrors()) ?>
		  <form action="<?= site_url($config->logInFormSubmit)?>" method="post">
			  <table class='table'>
				<tr>
					<td>
						<span style="color: red;">*</span> Species :
					</td>
					<td>
						<?=$this-> include('modules/autocomplete');?>
					</td>                    
				</tr>
				<tr>
					<td><span style="color: red;">*</span>Date:</td>
					<td><input type='date' name="<?= $config->dateInputName ?>">
					</td>
				</tr>  
				<tr>
					<td>Image:</td>
					<td colspan='2' >
						<input type="file" name="<?=$config->imgUploadName ?>[]" multiple>
					 </td>
				</tr>   
				<tr>
					<td><span style="color: red;">*</span>Location:</td>
					<td>
						<?=$this-> include('modules/inputmap');?>
                                            <input type="text" name="lon" id="hidden_lon" hidden value="0">
                                            <input type="text" name="lat" id="hidden_lat" hidden value="0">
					 </td>
				</tr>                                            
				<tr>
					<td>Text:</td>
					<td><textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="<?= $config->textInputName ?>"></textarea>
					</td>
				</tr> 

				<tr>
					<td colspan='2' class='text-center'>
					   <button class="btn btn-success my-2 my-sm-0" type="submit">AddMarker</button> 
					</td>
				</tr>                    
			  </table>
		  </form>
		</div>
	</div>
</div>
<?php $this->endSection() ?>
