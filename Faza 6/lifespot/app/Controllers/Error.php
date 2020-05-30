<?php namespace App\Controllers;

use App\Libraries\ViewConfig;

class Error extends BaseController{
    
   public function banned(){
        $x = new ViewConfig();
        $x->errorButton = "Home page";
        $x->errorBackPage = "./Guest/index";
        $x->errorPageMessage = 'You are BANNED ! <br>For additional information contact admin. <br>Return to the home page.';
        echo view('pages/error_page',["config"=>$x]);
   }
   
    public function login(){
        $x = new ViewConfig();
        $x->errorButton = 'Log In';
        $x->errorBackPage = "./Guest/login";
        $x->errorPageMessage = 'That action is not possible ! <br>You have to LOG IN !!! ';
        echo view('pages/error_page',["config"=>$x]);
    }
    
    public function permission(){
        $x = new ViewConfig();
        $x->errorButton = 'Home page';
        $x->errorBackPage = "./Guest/index";
        $x->errorPageMessage = 'You dont have permission to do that!';
        echo view('pages/error_page',["config"=>$x]);
    }

        

}
