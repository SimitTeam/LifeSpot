<?php 
namespace App\Libraries\ViewLib;


class ViewConfig{
	public function __construct(){
		$this->title = "LifeSpot";
		$this->userType = "guest";
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
