<?php $this->extend('headers/template') ?>

<?php $this->section('options') ?>
<?php $this->renderSection('moderatorOptions'); ?>
<li class="nav-item">
	<?= anchor($config->headerAddMarker, " Add Marker <span class='sr-only'>(current)</span>",array('class' => 'nav-link')) ?> 
</li>
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<?=$config->username?>
	</a>
	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<a class="dropdown-item" href="<?=site_url($config->headerSignOut)?>">Sign Out</a>
	</div>
	
</li>                                 

<?php $this->endSection() ?>
