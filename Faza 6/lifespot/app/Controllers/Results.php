<?php namespace App\Controllers;
/**
* ResultsController – klasa koja prikazuje stranicu sa rezultatima
*
* @version 1.0
 * 
*/

use App\Models\SpeciesModel;
use App\Models\MarkerModel;
use App\Libraries\ViewConfig;
class Results extends BaseController{
    

        /**
        * Funkcija za prikaz rezultata pretrage
        *
        */
        public function search(){
           $x = new ViewConfig();
           
           
           if($this->request->getVar('search_species')){
            $x->dtRows=[];
            $x->dtHead=["Username", "Image", "Confirmation", "Link"];
            $x->showSearchResults=true;
            
            $test=new MarkerModel();
            $results=$test->findMarkersValid($this->request->getVar('search_species'));

            foreach ($results as $value) {
                
                $dirname="./assets/img/markers/".$value->id."/";
                $images = glob($dirname."*.{jpg,png}",GLOB_BRACE);
                $result=array();
                foreach($images as $image) {
                  $result[]=site_url($image);  
                }
                
                $img_value="";
                
                if(empty($result)){
                   $result=array();
                   $image=glob("./assets/img/markers/no_preview.jpg");
                   $img_value=site_url($image);
                   echo "<script>var images=". json_encode($result)." </script>";                   
                }
                else{
                   $img_value=$result[0];
                }                
                
                $status_names=['C'=>"Confirmed","N"=>"Not Confirmed"];
               $x->dtRows[]=[$value->username, $img_value,$status_names[$value->status],["text"=>"Show", "url"=>site_url("./Marker/showMarker/")."$value->id/".$this->request->getVar('search_species')]];
            }
           }
           echo view('pages/guest_page',["config"=>$x]);
           
        }
}


