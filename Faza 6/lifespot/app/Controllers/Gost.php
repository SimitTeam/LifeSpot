<?php namespace App\Controllers;


use App\Models\SpeciesModel;


class Gost extends BaseController
{

        protected function prikaz($page,$data){
                $data['controller']='Gost';
                echo view('sabloni/header_guest');
                echo view("stranice/$page");
                echo view('sabloni/footer.php');
        }
	//--------------------------------------------------------------------

}