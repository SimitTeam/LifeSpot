<?php namespace App\Controllers;

/**
* Guest Controller – klasa za zahteve vezane za prijavljivanje postojeceg korisnika,
 *  registraciju novog korisnika i pozivanje prikaza pocetne stranice
*
* @version 1.0
 * 
 *@author  Mara Bolic 17/0614
*/

use App\Models\SpeciesModel;
use App\Libraries\ViewConfig;
use App\Models\UserModel;

class Guest extends BaseController
{
   
    /**
        * Funkcija za pozivanje prikaza pocetne stranice
        *
        *
    */
    protected function show($page,$data){
        $x = new ViewConfig();
        echo view('pages/guest_page',["config"=>$x]);
    }
      /**
        * Funkcija za pozivanje prikaza stranize za prijvaljivanje
        *
        *
    */
    public function login(){
        $x = new ViewConfig();
        echo view('pages/login_page', ["config"=>$x]);
       
    }
    
      /**
        * Funkcija za pozivanje prikaza stranice za registraciju novog korisnika
        *
        *
    */
    
    public function signup(){
        $x = new ViewConfig();
        echo view("pages/signup_page", ["config"=>$x]);
    }
    
    
      /**
        * Funkcija za obradu podataka prilikom prijavljivanja
        *
        *
    */
    public function loginSubmit(){
        //validation
       
        $this->validation->setRuleGroup("login");
        if (!$this->validation->withRequest($this->request)->run()){
                $x = new ViewConfig();
                $x->showError = [True]; //Dodaj da ti se ispisu errori
                echo view('pages/login_page',["config"=>$x,
				'validation' => $this->validation,
				'errors'=>[]
                    ]);
                return;
        }
        
        
        //checking if user exists and mathces password
        $userModel = new UserModel();
        $valid = $userModel->checkUser($this->request->getVar('username'), $this->request->getVar('password'));
        //$user=true;
        
        
        
        //setting user and redirecting to home page

        if ($valid){
            $user = $userModel->getUser($this->request->getVar('username'));
            $userType = $userModel->getType($this->request->getVar('username'));
            $this->session->set('user', $user);
            
            $this->session->set('userType', $userType);
            
            //$viewConf = new ViewConfig();
            return redirect()->to(site_url("Results/search"));

        }
        else {
            $x = new ViewConfig();
            $x->showError=[true];
             echo view('pages/login_page',["config"=>$x,
				'validation' => $this->validation,
				'errors'=>["Username or password is not correct"]
                    ]);
            return;
        }
      
    }
    
      /**
        * Funkcija za obradu podataka prilikom registracije korisnika
        *
        *
    */
    public function signupSubmit(){
        //validation
       
        $this->validation->setRuleGroup("signup");
        if (!$this->validation->withRequest($this->request)->run()){
		$x = new ViewConfig();
		$x->showError = [True]; //Dodaj da ti se ispisu errori
		echo view('pages/signup_page',["config"=>$x,
				'validation' => $this->validation,
                                'errors' => []
		]);
                return;
	}
	
        
        //
        $userModel = new UserModel();
        $user = $userModel->addUser($this->request->getVar('name'), $this->request->getVar('surname'), 
                $this->request->getVar('newusername'), $this->request->getVar('newpassword'), 
                $this->request->getVar('date'), $this->request->getVar('email'));
        
        return redirect()->to(site_url('Guest/login'));
        
    }
    
   
   
   
    


        

}
