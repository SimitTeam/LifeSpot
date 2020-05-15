<?php $this->extend('headers/userheader') ?>

<?php $this->section('moderatorOptions') ?>
<?php $this->renderSection('adminOptions'); ?>
<li class="nav-item">
	<a class="nav-link " href="login.html"></a>
</li>
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Moderating
	</a>
	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<?= anchor($config->headerAddSpecies, " Add Species <span class='sr-only'>(current)</span>",array('class' => 'nav-link')) ?> 
		<?= anchor($config->headerConfirmMarker, " Confirm Marker <span class='sr-only'>(current)</span>",array('class' => 'nav-link')) ?> 
	</div>

</li>            
<?php $this->endSection() ?>
