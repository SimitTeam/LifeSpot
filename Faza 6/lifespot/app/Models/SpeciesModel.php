<?php namespace App\Models;

/**
* Species Model – klasa koja komunicisa Species tabelom u bazi
*
* @version 1.0
 * 
 *@author Aleksa Bogdanovic 17/0578
*/


use CodeIgniter\Model;

class SpeciesModel extends Model
{
    protected $table      = 'species';
    protected $primaryKey = 'species_name';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['species_name', 'username', 'type'];
    
    public function getSpecies($species_name){
        $getSpecies = $this->find($species_name);
        return $getSpecies;
    }
    
    public function getUsername($species_name){
        $getUsername = $this->find($species_name);
        return $getUsername->username;
    }   
    
    public function getTypeSpecies($species_name){
        $getType = $this->find($species_name);
        return $getType->username;
    }
        
    public function addSpecies($species_name, $username, $type){
        $species = [
            'species_name' => $species_name,
            'username' => $username,
            'type' => $type
        ];
        
        $this->insert($species);
    }
    
}
