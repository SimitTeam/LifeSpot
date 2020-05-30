<?php namespace App\Controllers;


use App\Models\SpeciesModel;

class SignOut extends BaseController{
    
    	public function index()
	{
               $this->session->destroy();
               return redirect()->to(site_url("Guest/index"));
	}
}
