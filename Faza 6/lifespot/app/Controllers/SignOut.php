<?php namespace App\Controllers;

/**
* SignOut Controller – klasa za odjavljivanje registrovanog korisnika
*
* @version 1.0
 * 
 * @author Mara Bolic 17/0614
*/
use App\Models\SpeciesModel;

class SignOut extends BaseController{
    
        /**
        * Funkcija za odjavljivanje koja koristi unistava sesiju i preusmerava 
         * na pocetnu stranu sajta
        *
        * @return preusmerava na pocetnu stranu
        *
        */
    	public function index()
	{
               $this->session->destroy();
               return redirect()->to(site_url("Guest/index"));
	}
}
