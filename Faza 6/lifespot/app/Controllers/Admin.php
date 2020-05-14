<?php namespace App\Controllers;


use App\Models\SpeciesModel;


class Admin extends BaseController
{
	public function index()
	{
            
            $speciesModel=new SpeciesModel();
            $species=$speciesModel->find("test");
            echo $species->species_name;
	    return view('welcome_message');
	}

	//--------------------------------------------------------------------

}