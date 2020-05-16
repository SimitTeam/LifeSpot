<?php namespace App\Controllers;


use App\Models\SpeciesModel;


class Autocomplete extends BaseController
{

        protected function show($page,$data){
                $data['controller']='Autocomplete';
                echo view('templates/header_guest');
                echo view("pages/$page");
                echo view('teplates/footer.php');
        }
        
        public function fetch(){
            $output=array();
            $temp_array['value']=5;
            $test_img=site_url("./assets/img/species/aki.jpg");
            $temp_array['label']="<img src='$test_img'   >"."&nbsp"."Lorem ipsum";
            $output[]=$temp_array;
             $output[]=$temp_array;
            echo json_encode($output);
        }
	//--------------------------------------------------------------------

}