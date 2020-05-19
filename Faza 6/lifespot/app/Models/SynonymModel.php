<?php namespace App\Models;

use CodeIgniter\Model;

class SynonymModel extends Model
{
    protected $table      = 'synonym';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['species_name', 'name'];
    
    protected $validationRules    = [
                    'species_name'   => 'trim|required',
                    'name' => 'trim|required'
            ];
    
    protected $validationMessages = [
                'species_name'   => ['required' => 'Ime vrste je obavezno !'],
                'name' => ['required' => 'Ime je obavezno !']
            ];
    
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
    
    //Trazi markere koji u name i species_name imaju term
    public function findMarkers($term){
        return $this->like('species_name', $term)->orLike('name', $term)->findAll();
    }
    
    public function addSynonym($species_name, $name, $type){
        $query = $this->db->query('SELECT * FROM synonym');
        $id = $query->num_rows();
        $new_id = $id + 1;
        
        $synonym = [
            'id' => $new_id,
            'species_name' => $species_name,
            'name' => $name,
            'type' => $type
        ];
        
        $this->insert($synonym);
    }
    
}