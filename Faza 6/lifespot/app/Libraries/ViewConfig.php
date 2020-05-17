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
		$this->showResultsMap = True;
		$this->modifiableMarker = True;

		//Links
		$this->headerLogo = "./Gost/index";
		$this->headerHome = "./Gost/index";
		$this->headerLogIn = "./Gost/login";
		$this->headerSignUp = "./Gost/index";
		$this->headerAddMarker = "./Gost/index";
		$this->headerAddSpecies = "./Gost/index";
		$this->headerConfirmMarker = "./Gost/index";
		$this->headerAdminister = "./Gost/index";
		$this->headerBackButton = "./Gost/index";

		$this->logInPageSignUpButton = "./Gost/index";
		$this->signUpPageLogInButton = "./Gost/index";

		//Form submit controllers
		$this->headerSearchFormSubmit = "./Gost/index";
		$this->searchFormSubmit = "./Gost/index";
		$this->logInFormSubmit = "./Gost/index";
		$this->addSpeciesFormSubmit = "./Gost/index";
		$this->addSynonymFormSubmit = "./Gost/index";
		$this->changeSpeciesFormSubmit = "./Gost/index";
		$this->addConfirmationFormSubmit = "./Gost/index";

		//Form input names
		$this->searchBarName="search_species";
		$this->usernameInputName="username";
		$this->passwordInputName="password";
		$this->confirmPasswordInputName="cpassword";
		$this->nameInputName="name";
		$this->surnameInputName="surname";
		$this->textInputName="text";
		$this->dateInputName="date";
		$this->speciesTypeRadio="species_type";
		$this->confirmationRadio="species_type";
		$this->speciesInputName="species_name";
		$this->synonymInputName="synonym_name";

		//Autocomplete
		//This is the controller which is being
		//used while searching for species
		$this->autocompleteFetch="./AutoComplete/fetch";

		//Outputs
		$this->markerUser="Mock1";
		$this->markerSpeciesName="Mock2";
		$this->markerDate="Mock3";
		$this->markerText="Mock4";
	}
}
