<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Libraries\ViewConfig;

class Admin extends BaseController
{
    
    public function index(){
        $x = new ViewConfig();
        $x->userType = "admin";
        echo view('pages/guest_page', ["config"=>$x]);
    }
        
    public function administer(){
        $x = new ViewConfig();
        $x->userType = "admin";
        //echo "henlo";
        echo view('pages/admin_actions_page', ["config"=>$x]);
    }

} 