<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Libraries\ViewConfig;
use App\Models\UserModel;

class Guest extends BaseController
{
   
    protected function show($page,$data){
        $x = new ViewConfig();
        echo view('pages/guest_page',["config"=>$x]);
    }
    
    public function login(){
        $x = new ViewConfig();
        echo view('pages/login_page', ["config"=>$x]);
       
    }
    
    public function signup(){
        $x = new ViewConfig();
        echo view("pages/signup_page", ["config"=>$x]);
    }
    
    
    //
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
