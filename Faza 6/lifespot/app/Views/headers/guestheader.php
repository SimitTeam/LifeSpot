<?php $this->extend('headers/template') ?>


<?php $this->section('options') ?>
<li class="nav-item">
	<?= anchor("Gost/index", " Log in <span class='sr-only'>(current)</span>",array('class' => 'nav-link')) ?> 
</li>           
<li class="nav-item">
	<?= anchor("Gost/index", " Sign up <span class='sr-only'>(current)</span>",array('class' => 'nav-link')) ?> 
</li>           
<?php $this->endSection() ?>
