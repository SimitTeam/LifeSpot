<?php $this->extend('template') ?>





<?php $this->section('content') ?>
<div class='container-fluid '>   
	<div class="row">
		<div class=" col-sm-12 text-center ">
		<?php
			if($config->modifiableMarker)
				echo $this->include('modules/simple/confirm');
		?>
		</div>
	</div>
	<div class="row">
		<div class=" col-sm-12 text-center ">
		<h2><p><i><?=$config->markerSpeciesName?></i> </p></h2> 
		</div>
	</div>
	<?php
	if($config->modifiableMarker)
		echo $this->include('modules/simple/modname');
	?>
	<div class="row">
		<div class=" col-sm-12 text-center ">
			<p><i><?=$config->markerDate?></i> </p>
		</div>
	</div>
	<div class="row">
		<div class=" col-sm-12 text-center ">
			<img src="assets/map.png" width="400px" height="400px">
		</div>
	</div>
	<div class="row">
		<div class=" col-sm-12 text-center ">
			<img src="assets/dog1.jpg" width="400px" height="400px">
		</div>
	</div>

	<div class="row">
		<div class=" offset-sm-4 col-sm-4 text-center ">
			<p>
				Lorem ipsum dolor sit amet, cu qui vide pertinax incorrupte, at wisi rebum usu. Et quem mutat vix. Malorum repudiandae quo te, eu semper nonumes partiendo nam, veniam argumentum dissentiunt in has. Deleniti omittantur sit an, est mutat utinam semper ex. Eu dolorum gloriatur definitiones mea. Id mei justo maiestatis.

				Mei dolorum quaerendum id, impetus singulis vulputate at usu, in vix simul oportere. Nam solet habemus salutatus ea. Adipiscing scribentur et usu, fabellas perpetua his at. Zril quidam molestie eam an. Aliquam accusata repudiare eu eum, id omnis nostrum quo, vis te eius tamquam.                   

			</p>

		</div>

	</div>       


</div>
<?php $this->endSection() ?>
