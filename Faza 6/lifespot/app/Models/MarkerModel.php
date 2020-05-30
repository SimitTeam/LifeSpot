<?php namespace App\Models;

use CodeIgniter\Model;

class MarkerModel extends Model
{
    protected $table      = 'marker';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['id', 'species_name', 'username', 'img', 'date', 'text', 'latitude', 'longitude'];
    
    
    protected $useTimestamps = false;
    protected $skipValidation = false;
    
    public function getMarker($id){
        $getMarker = $this->find($id);
        return $getMarker;
    }
    
    public function getSpeciesNameInMarker($id){
        $getSpeciesName = $this->find($id);
        return $getSpeciesName->species_name;
    }
    
    public function getUsername($id){
        $getUsername = $this->find($id);
        return $getUsername->username;
    }
    
    public function getIMG($id){
        $getImg = $this->find($id);
        return $getImg->img;
    }
    
    public function getDate($id){
        $getDate = $this->find($id);
        return $getDate->date;
    }
    
    public function getText($id){
        $getText = $this->find($id);
        return $getText->text;
    }
    
    public function getLatitude($id){
        $getLatitude = $this->find($id);
        return $getLatitude->latitude;
    }
    
     public function getLongitude($id){
        $getLongitude = $this->find($id);
        return $getLongitude->longitude;
    }
    public function findMarkers($term){
       return $this->where('species_name', $term)->findAll();
    }
    
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
    

    public function getNotConfirmed($username){
        return $this->db->table('confirmation as con')->where('con.username',$username)
          ->where('con.status','N')
          ->join('marker  as m', 'm.id = con.id', 'LEFT')
          ->get()->getResult();     
        
    }
    
    public function changeSpecies($id, $species){
        $newSpecies = [
            'species_name' => $species
        ];
        
        $this->update($id, $newSpecies);
    }
}