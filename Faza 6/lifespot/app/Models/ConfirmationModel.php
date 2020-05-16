<?php namespace App\Models;

use CodeIgniter\Model;

class ConfirmationModel extends Model
{
    protected $table      = 'confirmation';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['username', 'status'];
    
    public function getConfirmation($id){
        $getConfirmation = $this->find($id);
        return $getConfirmation;
    }
    
    public function getUsername($id){
        $getUsername = $this->find($id);
        return $getUsername->username;
    }
    
    public function getStatus($id){
        $getStatus = $this->find($id);
        return $getStatus->status;
    }
}