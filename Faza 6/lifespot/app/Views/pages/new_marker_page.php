<?php $this->extend('template') ?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<?php $this->section('content') ?>
<div class='container-fluid '>   
	<div class='row'>
		<div class='offset-sm-4 col-sm-4 text-center'>
		  <h2>New Marker</h2>
		  <hr>
		  <form action="<?= site_url($config->logInFormSubmit)?>" method="get">
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
					<td><input type='date' name="<?= $config->newMarkerDateInputName ?>">
					</td>
				</tr>  
				<tr>
					<td>Image:</td>
					<td colspan='2' >
						<?=$this-> include('modules/imageUpload');?>
					 </td>
				</tr>   
				<tr>
					<td><span style="color: red;">*</span>Location:</td>
					<td>
						<?=$this-> include('modules/inputMap');?>
					 </td>
				</tr>                                            
				<tr>
					<td>Text:</td>
					<td><textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="<?= $config->newMarkerTextInputName ?>"></textarea>
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
