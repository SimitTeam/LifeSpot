<?php

/**
* headers/template - sablon za generisanje razlicitih header-a u zavisnosti od tipa korisnika
*
* @version 1.0
* 
*@author edvin maid 17/0117
*/

?>
<nav class="navbar navbar-expand-lg navbar-light bg-ligh nav_color">
	<a href="<?= site_url($config->headerLogo) ?>" > 
		<img src="<?= site_url("./assets/img/logo1.png") ?>" alt='Lifespot_logo' class="navbar-brand" height = 70 width = 260></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
  
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  <ul class="navbar-nav mr-auto">
		<li class="nav-item active">
		<?= anchor($config->headerHome, " Home <span class='sr-only'>(current)</span>",array('class' => 'nav-link')) ?> 
		</li>
		<?= $this->renderSection('options'); ?>
	  </ul>
	<?php if($config->showSearchBar) echo($this->include('headers/searchbar'))?>
	<?php if($config->showBackButton) echo($this->include('headers/backbutton'))?>
	</div>
</nav>        
