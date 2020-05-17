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
    
    
    public function loginSubmit(){
        //validation
       
        if (!$this->validate(['username'=>'required'])){
            echo "username reqired";
            return;
        }
        if (!$this->validate(['password'=>'required'])){
            echo "password reqired";
            return;
        }
        
        
        //checking if user exists and mathces password
        $userModel = new UserModel();
        $user = $userModel->checkUser($username, $password);
        $user=true;
        
        //setting user and redirecting to home page
        if ($user == true){
            $this->session->set('user', $this->request->getVar('username'));
            $userType = $userModel->getUserType($this->request->getVar('username'));
            $viewConf = new ViewConfig();
            $viewConf->userType = $userType;
            return redirect()->to(site_url("$userType/index"));
        }
        else {
            echo "wrong username or password";
        }
      
    }
    
    public function signupSubmit(){
        //validation
       if (!$this->validate(['name'=>'required'])){
            $x = new ViewConfig();
            echo "name reqired";
            return;
        }
        if (!$this->validate(['surname'=>'required'])){
            $x = new ViewConfig();
            echo "surname reqired";
            return;
        }
        if (!$this->validate(['newusername'=>'trim|required|min_length[4]'])){
            $x = new ViewConfig();
            echo "username reqired";
            return;
        }
        if (!$this->validate(['newpassword'=>'trim|required|min_length[4]|max_length[15]'])){
            $x = new ViewConfig();
            echo "password reqired";
            return;
        }
        if (!$this->validate(['cpassword'=>'trim|required|matches[newpassword]'])){
            $x = new ViewConfig();
            echo "must confirm password";
            return;
        }
        if (!$this->validate(['date'=>'required'])){
            $x = new ViewConfig();
            echo "date reqired";
            return;
        }
        if (!$this->validate(['email'=>'trim|required|valid_email'])){
            $x = new ViewConfig();
            echo "email reqired";
            return;
        }
        
        //
        $userModel = new UserModel();
        $user = $userModel->addUser($name, $surname, $username, $pass, $confPass, $date, $email);
        
        return redirect()->to(site_url('Guest/login'));
        
    }
    
   
   
   
    

        

}