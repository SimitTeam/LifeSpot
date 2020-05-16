<?php namespace App\Models;

use CodeIgniter\Model;

class MarkerModel extends Model
{
    protected $table      = 'confirmation';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['username', 'status'];

}