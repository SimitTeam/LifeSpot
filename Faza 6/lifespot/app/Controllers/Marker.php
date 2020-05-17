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
            $x->userType = "user";
            echo view("pages/new_marker_page", ["config"=>$x]);
        }
        
        public function markerSubmit(){
            //validation
            if (!$this->validate(['species'=>'required'])){
            $x = new ViewConfig();
            echo "species reqired";
            return;
        }
        if (!$this->validate(['date'=>'required'])){
            $x = new ViewConfig();
            echo "date reqired";
            return;
        }
        if (!$this->validate(['location'=>'trim|required'])){
            $x = new ViewConfig();
            echo "location reqired";
            return;
        }
            
            //adding to database
            $markerModel = new MarkerModel();
            $marker = $markerModel->addMarker($species, $date, $img, $location, $text);
            
        }
        //--------------------------------------------------------------------

}