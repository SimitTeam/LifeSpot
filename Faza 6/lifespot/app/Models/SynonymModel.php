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

    public function findMarkers($term){
        return $this->like('species_name', $term)->orLike('name', $term)->findAll();
    }
    
}