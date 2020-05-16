<?php namespace App\Models;

use CodeIgniter\Model;

class MarkerModel extends Model
{
    protected $table      = 'marker';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['species_name', 'username', 'img', 'text', 'latitude', 'longitude'];
    
    protected $dateFormat = 'date';
    
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
       

    
    
}