<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Libraries\ViewConfig;
use App\Models\MarkerModel;

class Marker extends BaseController
{
    
    
    
	public function index()
	{
            $speciesModel=new SpeciesModel();
            $species=$speciesModel->find("test");
            echo $species->species_name;
            echo view('templates/footer.php');
	    return view('welcome_message');
	}
        
        
        public function newMarker(){
            $x = new ViewConfig();
            $x->userType = "admin";
            echo view("pages/new_marker_page", ["config"=>$x]);
        }
        
        public function markerSubmit($species, $date, $img, $location, $text){
            $markerModel = new MarkerModel();
            $marker = $markerModel->addMarker($species, $date, $img, $location, $text);
            
        }
        //--------------------------------------------------------------------

}