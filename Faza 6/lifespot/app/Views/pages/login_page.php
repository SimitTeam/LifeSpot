<?php $this->extend('template') ?>


<?php $this->section('content') ?>
<div class='container-fluid'>   
	<div class='row'>
		<div class='offset-sm-4 col-sm-4 text-center row_space'>
		  <h2>Login</h2>
		  <hr>
		  <form action="<?= site_url($config->logInFormSubmit)?>" method="post">
			  <table class='table'>
				<tr>
					<td>
						Username:
					</td>
					<td>
						<input type="text" name="<?=$config->usernameInputName?>">
					</td>
				</tr>
				<tr>
					<td>
						Password:
					</td>
					<td>
					<input type="password" name="<?=$config->passwordInputName?>">
					</td>    
				</tr>

				<tr>
					<td colspan='2' class='text-center'>
					   <button class="btn btn-success my-2 my-sm-0" type="submit">Log In</button> 
					</td>
				</tr>
			  </table>
		  </form>
		  <hr>
		  <p>Dont have an account?</p>
		  <a href = "<?= site_url($config->logInPageSignUpButton)?>" class="btn btn-outline-dark link2">Sign Up</a>
		</div>
</div>
<?php $this->endSection() ?>
