<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use \App\Libraries\ViewConfig;

class Moderator extends BaseController
{
	public function index()
	{
            
            $speciesModel=new SpeciesModel();
            $species=$speciesModel->find("test");
            echo $species->species_name;
            echo view('templates/footer.php');
	    return view('welcome_message');
	}
        
        public function addSpecies(){
            $x = new ViewConfig();
            $x->userType = "moderator";
            echo view('pages/add_species_page', ["config"=>$x]);
        }

        public function confirmMarker(){
            $x = new ViewConfig();
            $x->userType = "moderator";
            echo view('pages/modifiable_marker_page', ["config"=>$x]);
        }
        
        public function speciesSubmit($species_name, $type){
            $speciesModel=new SpeciesModel();
            $species=$speciesModel->addSpecies($species_name,  $username, $type);
        }
        
        public function synonymSubmit($species_name, $synonym, $type){
            $speciesModel=new SpeciesModel();
            $species=$speciesModel->addSynonym($species_name, $name, $type);
        }





        //--------------------------------------------------------------------

}