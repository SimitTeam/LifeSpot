<?php

/**
* template - sablon za generisanje svih ostalih stranica
* ukljucuje sve biblioteke koje su koriscene za iscrtavanje
* kao i sekcije za dopunjavanje header dela stranice
*  
*
* @version 1.0
* 
*@author Edvin Maid 17/0117
*/

?>
<html>
	<head>
			
	<title><?= $config->title ?></title>
		<meta charset='utf-8' />
		<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no">

		<script src="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.js"></script>

		<link rel="stylesheet" href="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.css" />

		<link rel="stylesheet" href=" <?= site_url("./assets/bootstrap-4.4.1-dist/css/bootstrap.css") ?> ">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
		<link rel="stylesheet" href=" <?= site_url("./assets/css/style.css") ?>">
		

		<script src="<?= site_url("./assets/js/jquery-3.4.1.min.js") ?> "></script>
		<script src="<?= site_url("./assets/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js") ?> "></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<link rel="shortcut icon" href="<?= site_url("./assets/img/logo.png") ?> "/>
		<?php $this->renderSection('htmlhead');?>
	</head>
	<body>
	<?php
                $user_type_arr=['M'=>"Moderator","U"=>"User","A"=>"Admin"];
                $user=session()->get("user");
                $userType = session()->get("userType");
                if($user!=null){
                    $config->userType=$userType;
                }
		if(!strcmp($config->userType,"Admin")){
			echo($this-> include('headers/adminheader'));
		}
		else if(!strcmp($config->userType,"Moderator")){
			echo($this-> include('headers/moderatorheader'));
		}
		else if(!strcmp($config->userType,"User")){
			echo($this-> include('headers/userheader'));
		}
		else{
			echo($this-> include('headers/guestheader'));
		}

		$this->renderSection('content');
	?>
        <div class="row" id="footer">
             <div class="col-12">
                 Copyright Lifespot team 2020
             </div>
        </div>

	</body>
</html>
