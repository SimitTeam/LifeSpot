<?php namespace App\Controllers;


use App\Models\SpeciesModel;


class AdminActions extends BaseController
{
    
    protected function show($page,$data){
        $data['controller']='AdminActions';
        echo view('templates/header_admin');
        echo view("pages/admin_page");
        echo view('teplates/footer.php');
    }
        

}