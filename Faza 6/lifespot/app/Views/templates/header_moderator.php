<html>
<head>
    <title>LifeSpot</title>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no">
   
    
    <script src="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.css" />
    
    
    <link rel="stylesheet" href=" <?= site_url("./assets/bootstrap-4.4.1-dist/css/bootstrap.css") ?> ">
   
    <link rel="stylesheet" href=" <?= site_url("./assets/css/style.css") ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">


    <script src="<?= site_url("./assets/js/jquery-3.4.1.min.js") ?> "></script>
    <script src="<?= site_url("./assets/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js") ?> "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
  
    
    
    <link rel="shortcut icon" href="<?= site_url("./assets/img/logo.png") ?> "/>

</head>




<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-ligh nav_color">
        
        <a href="<?= site_url("./Guest/index") ?>" > 
            <img src="<?= site_url("./assets/img/logo1.png") ?>" alt='Lifespot_logo' class="navbar-brand" height = 70 width = 325></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <?= anchor("Guest/index", "Home <span class='sr-only'>(current)</span>",array('class' => 'nav-link')) ?> 
            </li>
            <li class="nav-item">
                <a class="nav-link " href="search">Search</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signin">Sign in</a>
            </li>           
          </ul>
          <form name="search" action="<?= site_url('$controller/search') ?>" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name="search_species" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button> 
          </form>
        </div>
      </nav>        
