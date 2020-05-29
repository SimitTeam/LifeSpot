<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Libraries\ViewConfig;
use App\Models\MarkerModel;

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
        
        //Shows marker by id
        public function showMarker($id,$string){
            
            $t_marker=new MarkerModel();
            $marker=$t_marker->find($id);
            
            $x = new ViewConfig();
            $x->modifiableMarker=false;
            $x->markerUser=$marker->username;
            $x->markerSpeciesName=$marker->species_name;
            $x->markerDate=$marker->date;
            $x->markerText=$marker->text;
            $x->markerLat=$marker->latitude;
            $x->markerLon=$marker->longitude;
            $x->markerImage=$marker->img;
            $x->markerId=$marker->id;
            $x->showBackButton=true;
            
            
            
            if(strcmp($string, "confirmMarker")==0){
                $x->headerBackButton="/Moderator/confirmMarker";
                $x->modifiableMarker=true;
            }else{
                $x->headerBackButton="/Results/search?search_species=".urldecode($string);
            }
            
            
	    echo view('./pages/modifiable_marker_page', ["config"=>$x]);
            
        }
        
        public function newMarker(){
            $x = new ViewConfig();
            $x->userType = "user";
            echo view("pages/new_marker_page", ["config"=>$x]);
        }
        
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
                    $img->move($PATH.'/assets/img/markers/'.$markerId, $newName );
                }
            }

            return redirect()->to(site_url("./Guest/index"));
        }
        //--------------------------------------------------------------------

}
