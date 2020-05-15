<?php $this->extend('headers/template') ?>


<?php $this->section('options') ?>
<li class="nav-item">
	<?= anchor($config->headerLogIn, " Log in <span class='sr-only'>(current)</span>",array('class' => 'nav-link')) ?> 
</li>           
<li class="nav-item">
	<?= anchor($config->headerSignUp, " Sign up <span class='sr-only'>(current)</span>",array('class' => 'nav-link')) ?> 
</li>           
<?php $this->endSection() ?>
