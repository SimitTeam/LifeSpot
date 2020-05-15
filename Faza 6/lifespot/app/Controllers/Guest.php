<?php namespace App\Controllers;


use App\Models\SpeciesModel;


class Guest extends BaseController
{
   
    protected function show($page,$data){
        $data['controller']='Guest'; //Guest
        echo view('templates/header_guest');
        echo view("pages/$page");
        echo view('templates/footer.php');
    }
    
    public function login(){
        echo view('templates/header_guest');
        echo view('pages/login_page.php');
        echo view('templates/footer.php');
    }
    
    
    
    

        

}