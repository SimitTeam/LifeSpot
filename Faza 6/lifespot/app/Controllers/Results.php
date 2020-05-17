<?php namespace App\Controllers;


use App\Models\SpeciesModel;

class Results {
    
    //private $resultPerPage = 3;
    
    	public function index($id)
        {
            $speciesModel=new SpeciesModel();
            $species = $speciesModel->findLike();
	}
}


