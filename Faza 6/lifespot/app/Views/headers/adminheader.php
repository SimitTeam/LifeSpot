<?php $this->extend('headers/moderatorheader') ?>

<?php $this->section('adminOptions') ?>
<li class="nav-item">
	<?= anchor("Gost/index", " Administrate <span class='sr-only'>(current)</span>",array('class' => 'nav-link')) ?> 
</li>
<?php $this->endSection() ?>
