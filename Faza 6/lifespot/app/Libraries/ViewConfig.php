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
		$this->showSearchResults = False;

		$this->showError = [False, False]; //showError is now an array for every form on a page

		$this->errors = [];


		//Links

		$this->headerLogo = "./Guest/index";
		$this->headerHome = "./Guest/index";
		$this->headerLogIn = "./Guest/login";
		$this->headerSignUp = "./Guest/signup";
		$this->headerAddMarker = "./Marker/newMarker";
		$this->headerAddSpecies = "./Moderator/addSpecies";
		$this->headerConfirmMarker = "./Moderator/confirmMarker";
		$this->headerAdminister = "./Admin/administer";
		$this->headerBackButton = "./Guest/index";
		$this->headerSignOut = "./SignOut/index";

		$this->logInPageSignUpButton = "./Guest/signup";
		$this->signUpPageLogInButton = "./Guest/login";

                $this->errorBackPage = "";

		//Form submit controllers

		$this->headerSearchFormSubmit = "./Results/search";
		$this->searchFormSubmit = "./Results/search";
		$this->logInFormSubmit = "./Guest/loginSubmit";
		$this->signUpFormSubmit = "./Guest/signupSubmit";
		$this->newMarkerSubmit = "./Marker/markerSubmit";
		$this->addSpeciesFormSubmit = "./Moderator/speciesSubmit";
		$this->addSynonymFormSubmit = "./Moderator/synonymSubmit";
		$this->changeSpeciesFormSubmit = "./Guest/index";
		$this->ConfirmationFormSubmit = "./Moderator/confirmSubmit";


		//Form input names
		$this->searchBarName="search_species";
		$this->usernameInputName="username";
		$this->passwordInputName="password";
		$this->newUsernameInputName="newusername";
		$this->newPasswordInputName="newpassword";
		$this->confirmPasswordInputName="cpassword";
		$this->nameInputName="name";
		$this->surnameInputName="surname";
		$this->textInputName="text";
		$this->dateInputName="date";
		$this->emailInputName="email";
		$this->speciesTypeRadio="species_type";
		$this->confirmationRadio="option";
		$this->speciesInputName="species_name";
		$this->synonymInputName="synonym_name";
		$this->imgUploadName="imgs";

		//Autocomplete
		//This is the controller which is being
		//used while searching for species

		$this->autocompleteFetch="./AutoComplete/fetch";

		//Outputs
		$this->markerUser="Mock1";
		$this->markerSpeciesName="Mock2";
		$this->markerDate="Mock3";
		$this->markerText="Mock4";
		$this->markerLat="Mock5";
		$this->markerLon="Mock6";
		$this->markerImage="Mock7";
		$this->markerId="Mock8";
		$this->username="Options";
                $this->errorPageMessage=""; //error messages
                $this->errorButton="";

		//Working with DataTables
		

		//dtHead determines the head row of the table
		$this->dtHead=["Mock", "mmock", "mak", "mek"];
		
		
		
		//dtTypes determine what type the field
		//a table can have 3 types of fields
		//str which will be shown as any old string
		//img which will be rendered as an image
		//ref which will be shown as a button with a link
		$this->dtTypes=["str","img","str","ref"];

		//dtRows represent the contents of the data table
		$this->dtRows=[["John","Doe","546/43",["text"=>"Omgosh", "url"=>"./Guest/index"]],["Jenny","fds","222/00",["text"=>"Heloo", "url"=>"./Guest/index"]],["Joe","Do","3",["text"=>"Helo", "url"=>"./Guest/index"]]];

		//if a field is of type str then you should only
		//pass in a string in dtRows for that position
		//
		//if a field is of type ref then you should
		//pass in a dictionary of the following form
		//["text"=>"Click me","url"=>"./Gost/index]
		//as can be seen above
		//
		//if a field is of type img then you shou...
		//well Jovan should do something about that :P
	}
}
