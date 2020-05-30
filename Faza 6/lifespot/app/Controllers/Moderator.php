<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Models\MarkerModel;
use App\Models\ConfirmationModel;
use \App\Libraries\ViewConfig;
use \App\Models\SynonymModel;


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
            //$x->userType = "moderator";
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
            $results=$test->getNotConfirmed($this->session->get("user")->username);

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
                
                
               $x->dtRows[]=[$value->username, $img_value,$value->species_name,["text"=>"Show", "url"=>site_url("./Marker/showMarker/")."$value->id/confirmMarker"]];
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
	
            $this->validation->setRuleGroup("species");
            if (!$this->validation->withRequest($this->request)->run()){
                    $x = new ViewConfig();
                    $x->showError = [true, false]; //Dodaj da ti se ispisu errori
                    echo view('pages/add_species_page',["config"=>$x,
                                    'validation' => $this->validation,
                                    'errors'=>[]
                        ]);
                    return;
            }

            $imgs = $this->request->getFile("imgs");
            $ext = $imgs->getClientExtension();
            $newName = $this->request->getVar("species_name").'.'.$ext;
            $PATH = getcwd();
            $imgs->move($PATH.'/assets/img/species', $newName);

            //database add
            $speciesModel=new SpeciesModel();
            $speciesModel->addSpecies($this->request->getVar('species_name'),  
                    $this->session->get('user')->username, $this->request->getVar('species_type'));
            
            
            return redirect()->to(site_url("/Moderator/addSpecies"));
        }
        
        public function synonymSubmit(){
            //validation
            $this->validation->setRuleGroup("synonym");
            if (!$this->validation->withRequest($this->request)->run()){
                    $x = new ViewConfig();
                    $x->showError = [false, true]; //Dodaj da ti se ispisu errori
                    echo view('pages/add_species_page',["config"=>$x,
                                    'validation' => $this->validation,
                                    'errors'=>[]
                        ]);
                    return;
            }
       
            //database add
            $synoModel=new SynonymModel();
            $synoModel->addSynonym($this->request->getVar('search_species'),
                    $this->request->getVar('synonym_name'));
            
            return redirect()->to(site_url("/Moderator/addSpecies"));
        }





        //--------------------------------------------------------------------

}
