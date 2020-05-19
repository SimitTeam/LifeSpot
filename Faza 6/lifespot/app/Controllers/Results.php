<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Libraries\ViewConfig;
class Results extends BaseController{
    
    //private $resultPerPage = 3;
    /*
        public function index($id)
        {
            $speciesModel=new SpeciesModel();
            $species = $speciesModel->findLike();
	}
*/
        public function search(){
           $x = new ViewConfig();
           echo view('pages/guest_page',["config"=>$x]);
        }
}


