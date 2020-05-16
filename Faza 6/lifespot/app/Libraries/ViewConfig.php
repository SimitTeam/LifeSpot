<?php 
namespace App\Libraries;

// To use this you need to add the following code to your controller:
// use App\Libraries\ViewConfig;
//
// When creating a view do the following
//
// $x = new ViewConfig;
// $x->showSearchBar = False; Change the options as you wish
// echo view('pages/some_page',["config"=>$x]);
//
//
// If you wish to change the default setting you may do so here VVVVV

class ViewConfig{
	public function __construct(){
		//General settings
		$this->title = "LifeSpot";
		$this->userType = "guest"; // possible options: admin, moderator, user
		$this->showSearchBar = True;
		$this->showBackButton = False;

		//Links
		$this->headerLogo = "./Gost/index";
		$this->headerHome = "./Gost/index";
		$this->headerLogIn = "./Gost/index";
		$this->headerSignUp = "./Gost/index";
		$this->headerAddMarker = "./Gost/index";
		$this->headerAddSpecies = "./Gost/index";
		$this->headerConfirmMarker = "./Gost/index";
		$this->headerAdminister = "./Gost/index";
		$this->headerBackButton = "./Gost/index";

		//Form submit controllers
		$this->headerSearchFormSubmit = "./Gost/index";

		//Form input names
		$this->headerSearchBarName="search_species";

	}
}
