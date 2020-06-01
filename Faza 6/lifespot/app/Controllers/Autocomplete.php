<?php namespace App\Controllers;

/**
* Autocomplete Controller – klasa koja koristi pri AJAX zahtevima
* @version 1.0
 * 
 *@author  Jovan Spasojevic 17/0118
*/
use App\Models\SpeciesModel;
use App\Models\SynonymModel;
use App\Models\UserModel;
use App\Models\MarkerModel;


class Autocomplete extends BaseController
{

        protected function show($page,$data){
                $data['controller']='Autocomplete';
                echo view('templates/header_guest');
                echo view("pages/$page");
                echo view('teplates/footer.php');
        }
        
        /**
        * Funkcija koja odgovara na AJAX zahtev za kompletiranje predloga pretrage
        *
        *
        */
        public function fetch(){
            if($this->request->isAJAX()){
                $output=array();
                $synonym=new SynonymModel();        
                $result=$synonym->findMarkers($this->request->getVar("term"));
                
                foreach ($result as $value) {
                   $temp_array['value']="$value->species_name";
                   $test_img=site_url("./assets/img/species/".$value->species_name.".jpg");
 
                   $temp_array['label']="<div class='row'><div class='col-12 col-sm-6 col-md-4'><img src='$test_img'></div> <div class='col-12 col-sm-6 col-md-8'>"
                           . "<div class='row'><div class='col-12 col-sm-12'>".$value->name."<br>"
                           . $value->species_name
                           . "</div></div></div></div>";                  
                   $output[]=$temp_array;
                }
                echo json_encode($output);
            }else{
                echo "Acces Denied";
            }
        }
        
        /**
        * Funkcija za iscrtavanje markera na mapi
        *
        *
        */
        public function getMarkers(){
         if($this->request->isAJAX()){
                $term=$this->request->getVar("term");
                $markers=new MarkerModel();
                $results=$markers->findMarkers($term);   
                echo json_encode($results);
          }
        }
        
        /**
        * Funkcija za menjanje tipa korisnika prilikom administratorskih akcija
        *
        *
        */
        public function updateUser($username,$type){
         if($this->request->isAJAX()){
                $marker=new UserModel();
                $result=$marker->promoteUser($username, $type);
                echo json_encode($result);
          }
        }
        
 
	//--------------------------------------------------------------------

}
