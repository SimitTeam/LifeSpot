<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Models\MarkerModel;
use App\Models\ConfirmationModel;
use \App\Libraries\ViewConfig;


class Moderator extends BaseController
{
	public function index()
	{
            $x = new ViewConfig();
            $x->userType = "Moderator";
            echo view('pages/guest_page', ["config"=>$x]);
	}
        
        public function addSpecies(){
            $x = new ViewConfig();
            $x->userType = "moderator";
            echo view('pages/add_species_page', ["config"=>$x]);
        }

        
        //Creates page with markers to be confirmed
        public function confirmMarker(){
           
           

            
            $x = new ViewConfig();
            $x->dtRows=[];
            $x->dtHead=["Username", "Image", "Species", "Link"];
            $x->showSearchResults=true;
            $x->showResultsMap=false;
            
            $test=new MarkerModel();
            $results=$test->getNotConfirmed('nore');
            foreach ($results as $value) {
               $x->dtRows[]=[$value->username,$value->img,$value->species_name,["text"=>"Show", "url"=>site_url("./Marker/showMarker/")."$value->id/confirmMarker"]];
            }

            echo view('pages/guest_page', ["config"=>$x]);
        }
        
        
        
        public function confirmSubmit(){
                $model=new ConfirmationModel();
                $result_model=$model->getConfirmation($this->request->getVar("marker_id"));
            
                if($result_model!=null && $result_model->status=="N"){
                   $spec=new SpeciesModel();
                   $result_spec=$spec->getSpecies($this->request->getVar("species_name"));
                   if($result_spec!=null)
                   {
                       $mark_model=new MarkerModel();
                       $mark_model->changeSpecies($this->request->getVar("marker_id"), $this->request->getVar("species_name"));
                       
                       $symbol='';
                       if($this->request->getVar("option")=="confirm")$symbol='C';
                       else $symbol='D';
                       
                       $model->updateConfirmation($this->request->getVar("marker_id"),$symbol);
                       return redirect()->to(site_url("/Moderator/confirmMarker/"));
                   }
                   else{
                       return redirect()->back();
                   }                      
                }
                else{
                    return redirect()->to(site_url("/Moderator/confirmMarker/"));
                }
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