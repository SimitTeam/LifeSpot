<?php namespace App\Controllers;


use App\Models\SpeciesModel;


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

	//--------------------------------------------------------------------

}