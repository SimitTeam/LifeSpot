<?php $this->extend('headers/template') ?>

<?php $this->section('options') ?>
<?php $this->renderSection('moderatorOptions'); ?>
<li class="nav-item">
	<?= anchor($config->headerAddMarker, " Add Marker <span class='sr-only'>(current)</span>",array('class' => 'nav-link')) ?> 
</li>
<?php $this->endSection() ?>