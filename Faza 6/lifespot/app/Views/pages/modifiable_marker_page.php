<?php $this->extend('template') ?>





<?php $this->section('content') ?>
<div class='container-fluid '>   
	<div class="row">
		<div class=" col-sm-12 text-center ">
		<?php
			if($config->modifiableMarker)
				echo $this->include('modules/confirm');
		?>
		</div>
	</div>
	<div class="row">
		<div class=" col-sm-12 text-center ">
			<h4><p>User: <i><?=$config->markerUser?></i> </p></h4>
		</div>
	</div>
	<div class="row">
		<div class=" col-sm-12 text-center ">
                    <h2><p><i id="new_species">Species: <?=$config->markerSpeciesName?></i> </p></h2> 
		</div>
	</div>
	<?php
	if($config->modifiableMarker)
		echo $this->include('modules/species_change');
	?>
	<div class="row">
		<div class=" col-sm-12 text-center ">
			<h4><p>Sighting Date: <i><?=$config->markerDate?></i> </p></h4>
		</div>
	</div>
	<div class="row">
		<div class=" col-sm-12 text-center ">
			<?=$this-> include('modules/outputmap');?>
		</div>
	</div>
	<div class="row">
		<div class=" offset-sm-3 col-sm-6">
			&nbsp;
		</div>
	</div>
	<div class="row">
		<div class=" col-sm-12 text-center ">
			<?=$this-> include('modules/imagepreview');?>
		</div>
	</div>
	<div class="row">
		<div class=" offset-sm-3 col-sm-6">
			<h2> &nbsp;</h2>
		</div>
	</div>
	<div class="row">
		<div class=" offset-sm-3 col-sm-6">
			<h2> Description: </h2>
		</div>
	</div>
	<div class="row">
		<div class=" offset-sm-3 col-sm-6">
			<p>
				<?=$config->markerText?>
			</p>

		</div>

	</div>       

	<div class="row">
		<div class=" offset-sm-3 col-sm-6">
			<h2> &nbsp;</h2>
		</div>
	</div>

</div>
<?php $this->endSection() ?>
