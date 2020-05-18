<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Libraries\ViewConfig;

class Guest extends BaseController
{

    protected function show($page,$data){
        $x = new ViewConfig();
        $x->showSearchBar = False;
        echo view("pages/$page",["config"=>$x]);
    }
    
    public function login(){
        
        $x = new ViewConfig();
        $x->showSearchBar = False;
        echo view("pages/login_page",["config"=>$x]);
        //echo view('templates/header_guest');
        //echo view('pages/login_page.php');
        //echo view('templates/footer.php');
    }
    

        

}