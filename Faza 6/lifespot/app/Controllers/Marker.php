<?php namespace App\Controllers;
/**
* MarkerController – klasa koja sluzi za prikazivanje i dodavanje markera
*
* @version 1.0
 * 
 * @author Edvin Maid 17/0117 i Jovan Spasojevic 17/0118
*/

use App\Models\SpeciesModel;
use App\Models\ConfirmationModel;
use App\Models\MarkerModel;

use App\Libraries\ViewConfig;


class Marker extends BaseController
{
    
	public function index()
	{
            $speciesModel=new SpeciesModel();
            $species=$speciesModel->find("test");
            echo $species->species_name;
            echo view('templates/footer.php');
	    return view('welcome_message');
	}
        
        /**
        * Funkcija za prikaz markera po id-u
        *
        */
        public function showMarker($id,$string){
            
            $t_marker=new MarkerModel();
            $marker=$t_marker->find($id);
            if($marker==null){
               return redirect()->to(site_url("Results/search"));
            }
            
            
            $x = new ViewConfig();
            $x->modifiableMarker=false;
            $x->markerUser=$marker->username;
            $x->markerSpeciesName=$marker->species_name;
            $x->markerDate=$marker->date;
            $x->markerText=$marker->text;
            $x->markerLat=$marker->latitude;
            $x->markerLon=$marker->longitude;
            $x->markerId=$marker->id;
            $x->showBackButton=true;
            
            
            
            if(strcmp($string, "confirmMarker")==0){
                $conf_model=new ConfirmationModel();
                $result_conf=$conf_model->find($id);
                if(strcmp($this->session->get('user')->username,$result_conf->username)){
                    return redirect()->to(site_url("Results/Search"));
                }
                $x->headerBackButton="/Moderator/confirmMarker";
                $x->modifiableMarker=true;
            }else{
                $x->headerBackButton="/Results/search?search_species=".urldecode($string);
            }
            
			$errmodpg = $this->session->get('error_mod_marker_page');
			$errors = [];
			if($errmodpg == 1){
				$this->session->set('error_mod_marker_page', 0);
				$errors = ["That species does not exist!",];
				$x->showError = [True];
			}
            
			echo view('./pages/modifiable_marker_page', ["config"=>$x,
				'errors'=>$errors
			]);
            
        }
        
         /**
        * Funkcija za prikaz stranice za dodavanje markera
        *
        *
        */
        public function newMarker(){
            $x = new ViewConfig();
            $x->userType = "user";
            echo view("pages/new_marker_page", ["config"=>$x]);
        }
        
        
        /**
        * Funkcija za obradu podataka prilikom dodavanja novog markera
        *
        *
        */
        public function markerSubmit(){
            //validation
            $this->validation->setRuleGroup("marker");
            if (!$this->validation->withRequest($this->request)->run()){
                    $x = new ViewConfig();
                    $x->showError = [True]; //Dodaj da ti se ispisu errori
                    echo view('pages/new_marker_page',["config"=>$x,
                                    'validation' => $this->validation,
                                    'errors'=>[]
                        ]);
                    return;
            }


            $markerModel= new MarkerModel();

            $species = $this->request->getVar("search_species");
            $user = $this->session->get("user");
            $date = $this->request->getVar("date");
            $text = $this->request->getVar("text");
            $latitude = $this->request->getVar("lat");
            $longitude = $this->request->getVar("lon");
           
            $markerId = $markerModel->addMarker($species, $user->username, $date, $latitude, $longitude, $text);
            
            $imgs = $this->request->getFiles();
            
            
            foreach($imgs['imgs'] as $img)
            {
                if($img->isValid()){
                    $newName = $img->getRandomName();
                    $PATH = getcwd();
                    $img->move('./assets/img/markers/'.$markerId, $newName );
                }
            }

            return redirect()->to(site_url("./Guest/index"));
        }
        //--------------------------------------------------------------------

}
