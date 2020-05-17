<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Libraries\ViewConfig;
use App\Models\UserModel;

class Guest extends BaseController
{

    protected function show($page,$data){
        $x = new ViewConfig();
        $x->showSearchBar = true;
        echo view('pages/guest_page',["config"=>$x]);
    }
    
    public function login(){
        $x = new ViewConfig();
        $x->showSearchBar = true;
        echo view('pages/login_page', ["config"=>$x]);
       
    }
    
    public function signup(){
        $x = new ViewConfig();
        $x->showSearchBar = true;
        echo view("pages/signup_page", ["config"=>$x]);
    }
    
    public function loginSubmit(){
        if (!$this->validate(['username'=>'required',
            'password'=>'reqired'
        ])){
            $x = new ViewConfig();
            return view("pages/guest_page", ["config"=>$x]);
        }
        
        $userModel = new UserModel();
        
        $user = $userModel->checkUser($username, $password);
        
        
        $this->session->set('user', $username);
        
        return redirect()->to(site_url('Marker/newMarker'));
      
    }
    
    public function signupSubmit($name, $surname, $username, $pass, $confPass, $date, $email){
        //validation
        $userModel = new UserModel();
        $user = $userModel->addUser($name, $surname, $username, $pass, $confPass, $date, $email);
    }
    
    
    

        

}