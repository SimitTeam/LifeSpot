<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Models\SynonymModel;

class Autocomplete extends BaseController
{

        protected function show($page,$data){
                $data['controller']='Autocomplete';
                echo view('templates/header_guest');
                echo view("pages/$page");
                echo view('teplates/footer.php');
        }
        
        public function fetch(){
            if(isset($_GET["term"])){
                $output=array();
                $synonym=new SynonymModel();        
                $result=$synonym->findMarkers($_GET["term"]);
                
                foreach ($result as $value) {
                   $temp_array['value']="$value->species_name";
                   $test_img=site_url("./assets/img/species/aki.jpg");
 
                   $temp_array['label']="<div class='row'><div class='col-12 col-sm-6 col-md-4'><img src='$test_img'></div> <div class='col-12 col-sm-6 col-md-8'>"
                           . "<div class='row'><div class='col-12 col-sm-12'>".$value->name."<br>"
                           . $value->species_name
                           . "</div></div></div></div>";                  
                   $output[]=$temp_array;
                }
                echo json_encode($output);
            }
        }

        
 
	//--------------------------------------------------------------------

}