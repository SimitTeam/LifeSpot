<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Models\MarkerModel;

use \App\Libraries\ViewConfig;


class Moderator extends BaseController
{
	public function index()
	{
            $x = new ViewConfig();
            $x->userType = "moderator";
            echo view('pages/guest_page', ["config"=>$x]);
	}
        
        public function addSpecies(){
            $x = new ViewConfig();
            $x->userType = "moderator";
            echo view('pages/add_species_page', ["config"=>$x]);
        }

        
        //Creates page with markers to be confirmed
        public function confirmMarker(){
            $test=new MarkerModel();
            $results=$test->getNotConfirmed('nore');

            
            $x = new ViewConfig();
            $x->userType = "moderator";
            $x->dtRows=[];
            $x->dtHead=["Username", "Image", "Species", "Link"];
            foreach ($results as $value) {
               $x->dtRows[]=[$value->username,$value->img,$value->species_name,["text"=>"Show", "url"=>site_url("./Marker/showMarker/")."$value->id/hm"]];
            }

            echo view('pages/confirm_marker_page', ["config"=>$x]);
        }
        
        
        
        public function confirmSubmit(){
            
        }


        
        public function speciesSubmit(){
            //validation
            if (!$this->validate(['species_name'=>'required'])){
                $x = new ViewConfig();
                echo "species reqired";
                return false;
            }
              if (!$this->validate(['type'=>'required'])){
                $x = new ViewConfig();
                echo "type reqired";
                return;
            }
      
            //database add
            $speciesModel=new SpeciesModel();
            $species=$speciesModel->addSpecies($this->request->getVar('speciesInputName'),  $this->request->getVar('username'), $this->request->getVar('speciesTypeRadio'));
        }
        
        public function synonymSubmit(){
            //validation
            if (!$this->validate(['species_name'=>'required'])){
                $x = new ViewConfig();
                echo "species reqired";
                return;
            }
            if (!$this->validate(['synonym'=>'required'])){
                $x = new ViewConfig();
                echo "synonym reqired";
                return;
            }
              if (!$this->validate(['type'=>'required'])){
                $x = new ViewConfig();
                echo "type reqired";
                return;
            }
            //database add
            $speciesModel=new SpeciesModel();
            $species=$speciesModel->addSynonym($this->request->getVar('speciesInputName'),$this->request->getVar('synonymInputName'), $this->request->getVar('speciesTypeRadio'));
        }





        //--------------------------------------------------------------------

}