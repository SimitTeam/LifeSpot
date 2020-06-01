<?php namespace App\Models;

/**
* Marker Model – klasa koja komunicira sa Marker tabelom u bazi
*
* @version 1.0
 * 
 *@author Aleksa Bogdanovic 17/0578
*/


use CodeIgniter\Model;

class MarkerModel extends Model
{
    protected $table      = 'marker';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['id', 'species_name', 'username', 'img', 'date', 'text', 'latitude', 'longitude'];
    
    
    protected $useTimestamps = false;
    protected $skipValidation = false;
    
    
    /**
    * Funkcija za dohvatanje potvrde opazanja
    *
    *@param int $id id markera
    *@return Object marker
    */
    public function getMarker($id){
        $getMarker = $this->find($id);
        return $getMarker;
    }
    
    /**
    * Funkcija za dohvatanje naziva vrste
    *
    *@param int $id id markera
    *@return String ime vrste
    */
    public function getSpeciesNameInMarker($id){
        $getSpeciesName = $this->find($id);
        return $getSpeciesName->species_name;
    }
    
    /**
    * Funkcija za dohvatanje Korisnickog imena 
    * korisnika koji je postavio marker
    *
    *@param int $id id markera
    *@return Object potvrda
    */
    public function getUsername($id){
        $getUsername = $this->find($id);
        return $getUsername->username;
    }
    
    public function getIMG($id){
        $getImg = $this->find($id);
        return $getImg->img;
    }
    
    /**
    * Funkcija za dohvatanje Datuma
    *
    *@param int $id id markera
    *@return String datum
    */
    public function getDate($id){
        $getDate = $this->find($id);
        return $getDate->date;
    }
    
    /**
    * Funkcija za dohvatanje Opisa
    *
    *@param int $id id markera
    *@return String opis
    */
    public function getText($id){
        $getText = $this->find($id);
        return $getText->text;
    }
    
    /**
    * Funkcija za dohvatanje Geografska sirina
    *
    *@param int $id id markera
    *@return String Geografska sirina
    */
    public function getLatitude($id){
        $getLatitude = $this->find($id);
        return $getLatitude->latitude;
    }
    
    /**
    * Funkcija za dohvatanje Geografska visine
    *
    *@param int $id id markera
    *@return Float Geografska visine
    */
     public function getLongitude($id){
        $getLongitude = $this->find($id);
        return $getLongitude->longitude;
    }

    /**
    * Funkcija za dohvatanje markera sa zadatim nazivom vrste
    *
    *@param String $term niska po kojoj se pretrazuje
    */    
    public function findMarkers($term){
      return $markers=$this->db->table('marker as m')
        ->join('confirmation as con', 'm.id = con.id', 'LEFT')
        ->where("con.status!='D'")
		->where("m.species_name",$term)
        ->select("*")
        ->get()->getResult();  
    }
    
    /**
    * Funkcija za dohvatanje svih validnih markera markera sa zadatim nazivom vrste
    *
    *@param String $term niska po kojoj se pretrazuje
    */    
    public function findMarkersValid($term){
      return $markers=$this->db->table('marker as m')
        ->join('confirmation as con', 'm.id = con.id', 'LEFT')
        ->where("con.status!='D'")
		->where("m.species_name",$term)
        ->select("m.id,con.status,m.username")
        ->get()->getResult();  
    }   
    
    /**
    * Funkcija za dodavanje markera
    *
    *@param String $species niska po kojoj se pretrazuje
    *@param String $username korisnik koji postavlja marker
    *@param String $date datum opazanja
    *@param String $latitude Geografska visine
    *@param String $longitude Geografska sirina
    *@param String $text opis markera
    *@return int identitet povratnog markera
    */    
    public function addMarker($species, $username, $date, $latitude, $longitude, $text){
        
        
            $marker = [
                'species_name' => $species,
                'username' => $username,
                'date' => $date,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'text' => $text
            ];

           $id=$this->insert($marker,);
            
           $conf=new ConfirmationModel();
           $answer=$conf->addConfirmation($id,$username);
           
           
          return  $id;
            
            
    }
    

    /**
    * Funkcija za dohvatanje svih ne potvrdjenih markera za zadatog korisnika
    *
    *@param String $username korisnik za koga se pretrazuje
    */    
    public function getNotConfirmed($username){
        return $this->db->table('confirmation as con')->where('con.username',$username)
          ->where('con.status','N')
          ->join('marker  as m', 'm.id = con.id', 'LEFT')
          ->get()->getResult();     
        
    }
    
    /**
    * Funkcija za dohvatanje svih ne potvrdjenih markera za zadatog korisnika
    *
    *@param String $id id markera
    *@param String $species novi naziv vrste 
    */    
    public function changeSpecies($id, $species){
        $newSpecies = [
            'species_name' => $species
        ];
        
        $this->update($id, $newSpecies);
    }
}
