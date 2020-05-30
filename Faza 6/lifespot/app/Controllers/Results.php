<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Models\MarkerModel;
use App\Libraries\ViewConfig;
class Results extends BaseController{
    
    //private $resultPerPage = 3;
    /*
        public function index($id)
        {
            $speciesModel=new SpeciesModel();
            $species = $speciesModel->findLike();
	}
*/
        public function search(){
           $x = new ViewConfig();
           
           
           if($this->request->getVar('search_species')){
            $x->dtRows=[];
            $x->dtHead=["Username", "Image", "Date", "Link"];
            $x->showSearchResults=true;
            
            $test=new MarkerModel();
            $results=$test->findMarkers($this->request->getVar('search_species'));

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
                
                
               $x->dtRows[]=[$value->username, $img_value,$value->date,["text"=>"Show", "url"=>site_url("./Marker/showMarker/")."$value->id/confirmMarker"]];
            }
           }
           echo view('pages/guest_page',["config"=>$x]);
           
        }
}


