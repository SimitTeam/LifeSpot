<?php namespace App\Models;

use CodeIgniter\Model;

class SpeciesModel extends Model
{
    protected $table      = 'species';
    protected $primaryKey = 'species_name';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['username', 'type'];
    
    public function getSpecies($species_name){
        $getSpecies = $this->find($species_name);
        return $getSpecies;
    }
    
    public function getUsernameSpecies($species_name){
        $getUsername = $this->find($species_name);
        return $getUsername->username;
    }   
    
    public function getTypeSpecies($species_name){
        $getType = $this->find($species_name);
        return $getType->username;
    }
        
}