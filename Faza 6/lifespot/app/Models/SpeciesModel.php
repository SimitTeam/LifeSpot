<?php namespace App\Models;

use CodeIgniter\Model;

class SpeciesModel extends Model
{
    protected $table      = 'species';
    protected $primaryKey = 'species_name';

    protected $returnType     = 'object';
}