<?php namespace App\Models;

/**
* Synonym Model – klasa koja komunicisa Synonym tabelom u bazi
*
* @version 1.0
 * 
 *@author Aleksa Bogdanovic 17/0578 i Jovan Spasojevic 17/0118
*/


use CodeIgniter\Model;

class SynonymModel extends Model
{
    protected $table      = 'synonym';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['species_name', 'name'];
    

    protected $useTimestamps = false;
    protected $skipValidation = false;
    
    public function getSynonym($id){
        $getSynonym = $this->find($id);
        return $getSynonym;
    }
    
    public function getSpeciesName($id){
        $getSpeciesName = $this->find($id);
        return $getSpeciesName->species_name;
    }
    
    public function getSynonymName($id){
        $getName = $this->find($id);
        return $getName->species_name;
    }

    
    /**
    * Funkcija koja dohvata sve vrste i njihove sinonime koji odgovaraju pretrazi
    *
    *@param String $term niska po kojoj se vrsi pretraga
    *@return Array 
    */
    public function findMarkers($term){
     return $this->db->table('species as sp')
     ->select("sp.species_name,syn.name")  
     ->join('synonym  as syn', 'sp.species_name = syn.species_name', 'LEFT')
     ->like('syn.name',"$term")
     ->orLike("sp.species_name","$term")    
     ->get()->getResult(); 
    }
    
    public function addSynonym($species_name, $name){
        
        $synonym = [
            'species_name' => $species_name,
            'name' => $name,
        ];
        
        $this->insert($synonym);
    }
    
}
