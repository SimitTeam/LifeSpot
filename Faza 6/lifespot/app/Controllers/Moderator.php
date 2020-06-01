<?php namespace App\Controllers;

/**
* Moderator Controller – klasa za obradjivanje zahteva koje moze da vrsi barem
 * Moderator, odnosno Administrator i Moderator
*
* @version 1.0
 * 
 *@author  Mara Bolic 17/0614 i Jovan Spasojevic 17/0118
*/ 

use App\Models\SpeciesModel;
use App\Models\MarkerModel;
use App\Models\ConfirmationModel;
use \App\Libraries\ViewConfig;
use \App\Models\SynonymModel;


class Moderator extends BaseController
{
        /**
           * Funkcija za pozivanje prikaza pocetne stranice pri prijavi moderatora
           *
           *
        */
	public function index()
	{
            $x = new ViewConfig();
            $x->userType = "Moderator";
            echo view('pages/guest_page', ["config"=>$x]);
	}
        
         /**
        * Funkcija za pozivanje prikaza stranice na kojoj se dodaju vrste i sinonimi
        *
        *
    */
        public function addSpecies(){
            $x = new ViewConfig();
            //$x->userType = "moderator";
            echo view('pages/add_species_page', ["config"=>$x]);
        }

        
         /**
        * Funkcija za kreiranje stranice na kojoj se prikazuju markeri koji
          * zahtevaju potvrdu opazanja
        *
        *
    */
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
                
                
               $x->dtRows[]=[$value->username, $img_value,$value->species_name,["text"=>"Show", 
                   "url"=>site_url("./Marker/showMarker/")."$value->id/confirmMarker"]];
            }

            echo view('pages/guest_page', ["config"=>$x]);
        }
        
        
         /**
        * Funkcija za obradu podataka prilikom potvrde opazanja
        *
        *  @return preusmeravanje na odgovarajucu stranicu 
        *
    */
        public function confirmSubmit(){
                $model=new ConfirmationModel();
                $result_model=$model->getConfirmation($this->request->getVar("marker_id"));
            
                if($result_model!=null && $result_model->status=="N" && strcmp($result_model->username, $this->session->get('user')->username)==0){
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


        
        /**
        * Funkcija za obradu podataka prilikom dodacanja nove vrste
        *
        * @return preusmeravanje na stranicu 
        */
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
        
         /**
        * Funkcija za obradu podataka prilikom dodavanja sinonima za neku vrstu
        *
        *@return preusmeravanje na stranicu 
    */
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
