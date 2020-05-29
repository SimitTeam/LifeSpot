<?php $this->extend('template') ?>


<?php $this->section('content') ?>
<div class='container-fluid'>   
	<div class='row'>
		<div class='offset-sm-4 col-sm-4 text-center row_space'>
		<h2>Sign Up</h2>
		<hr>
		<?php if($config->showError[0]) echo($this-> include('modules/error_list')) ?>
		  <form action="<?= site_url($config->signUpFormSubmit)?>" method="post">
			  <table class='table'>
				<tr>
					<td>
						<span style="color: red;">*</span>Name:
					</td>
					<td>
						<input type="text" placeholder="John" name="<?=$config->nameInputName?>">
					</td>
				</tr>
				<tr>
					<td>
						<span style="color: red;">*</span>Surname:
					</td>
					<td>
						<input type="text" placeholder="Stewart" name="<?=$config->surnameInputName?>">
					</td>
				</tr>
				<tr>
					<td>
						<span style="color: red;">*</span>Username:
					</td>
					<td>
						<input type="text" placeholder="Username" name="<?=$config->newUsernameInputName?>">
					</td>
				</tr>

				<tr>
					<td>
						<span style="color: red;">*</span>Password:
					</td>
					<td>
						<input type="password" name="<?=$config->newPasswordInputName?>">
					</td>    
				</tr>
				<tr>
					<td>
						<span style="color: red;">*</span>Confirm Password:
					</td>
					<td>
						<input type="password" name="<?=$config->confirmPasswordInputName?>">
					</td>    
				</tr>
				<tr>
					<td>
						<span style="color: red;">*</span>Date of Birth:
					</td>
					<td>
						<input type="date" name="<?=$config->dateInputName?>">
					</td>    
				</tr>
				<tr>
					<td>
						<span style="color: red;">*</span>E-Mail:
					</td>
					<td>
						<input type="email" name="<?=$config->emailInputName?>">
					</td>    
				</tr>     

				<tr>
						<td colspan='2' class='text-center'>
						   <button class='btn btn-outline-dark' type="submit">Sign Up</button>
						</td>
				</tr>
			  </table>
		  </form>
		  <hr>
		  <p>Already have an account?</p>
		  <a href = "<?= site_url($config->signUpPageLogInButton)?>" class="btn btn-outline-dark link2">Log In</a>
		</div>
	</div>
</div>
<?php $this->endSection() ?>
