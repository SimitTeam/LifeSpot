<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Libraries\ViewConfig;
use App\Models\UserModel;

class Guest extends BaseController
{

    public $signup_errors = [
        'name'       => [
            'required' => 'Your name is required !'
        ],
        
        'surname'    => [
            'required' => 'Your surname is required !'
        ],
        
        'username'   => [
            'required' => 'Your username is required  !', 
            'is_unique' => 'Your username has to be unique !'
        ],
        
        'pass'       => [
            'required' => 'Your password is required  !'
        ],
        
        'pass_confirm' =>[
            'required' => 'Your password confirmation is required  !',
            'matches[password]' => 'Your password must match'
        ],
        
        'birth_date' => [
            'required' => 'Your birth date is required  !'
        ],
        
        'mail' => [
            'required' => 'Your mail is required ', 
            'is_unique' => 'Your mail has to be unique',
            'valid_email' => 'Please check the Email field. It does not appear to be valid.'
        ]
            
    ];
   
    protected function show($page,$data){
        $x = new ViewConfig();
		echo view('pages/new_marker_page',["config"=>$x]);
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
       
        if (!$this->validation->withRequest($this->request)->run(null,"login")){
                $x = new ViewConfig();
                $x->showError = True; //Dodaj da ti se ispisu errori
                echo view('pages/login_page',["config"=>$x,
                                'validation' => $this->validation
                ]);
        }
        else{
                //echo ("Success");
        }
        
        
        //checking if user exists and mathces password
        $userModel = new UserModel();
        $valid = $userModel->checkUser($this->request->getVar('username'), $this->request->getVar('password'));
        //$user=true;
        
        
        
        //setting user and redirecting to home page
        if (!$valid ){
            $this->session->set('user', $result["user"]);
            $viewConf = new ViewConfig();
            return redirect()->to(site_url("Results/search"));
        }
        else {
            $x = new ViewConfig();
            $x->showError=['error'=>$user["message"]];
            echo view('pages/login_page', ["config"=>$x]);
            return;
        }
      
    }
    
    public function signupSubmit(){
        //validation
       
        if (!$this->validation->withRequest($this->request)->run(null,"signup")){
		$x = new ViewConfig();
		$x->showError = True; //Dodaj da ti se ispisu errori
		echo view('pages/signup_page',["config"=>$x,
				'validation' => $this->validation
		]);
	}
	else{
		//echo ("Success");
	}
        
        
        //
        $userModel = new UserModel();
        $user = $userModel->addUser($this->request->getVar('name'), $this->request->getVar('surname'), 
                $this->request->getVar('newusername'), $this->request->getVar('newpassword'), 
                $this->request->getVar('date'), $this->request->getVar('email'));
        
        return redirect()->to(site_url('Guest/login'));
        
    }
    
   
   
   
    


        

}
