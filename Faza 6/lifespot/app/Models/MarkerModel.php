<?php namespace App\Models;

use CodeIgniter\Model;

class MarkerModel extends Model
{
    protected $table      = 'marker';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['species_name', 'username', 'img', 'date', 'text', 'latitude', 'longitude'];
    
    protected $validationRules    = [
                    'species_name'   => 'trim|required',
                    'date' => 'trim|required',
                    'img' => 'trim|required',
            ];
    
    protected $validationMessages = [
                'species_name'   => ['required' => 'Ime vrste je obavezno !'],
                'date' => ['required' => 'Datum je obavezan !'],
                'img' => ['required' => 'Slika je obavezna !'],
            ];
    
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
    
    public function addMarker($species, $username, $date, $img, $latitude, $longitude, $text){
        $query = $this->db->query('SELECT * FROM marker');
        $id = $query->num_rows();
        $new_id = $id + 1;
        
        $marker = [
                'id' => $new_id,
                'species_name' => $species,
                'username' => $username,
                'img' => $img,
                'date' => $date,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'text' => $text
            ];

            $this->insert($marker);
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