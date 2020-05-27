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
    
    public function addConfirmation($username, $status){
        $query = $this->db->query('SELECT * FROM marker');
        $id = $query->num_rows();
        $new_id = $id + 1;
        
        $confirmation = [
                'id' => $new_id,
                'username' => $username,
                'status' => $status
            ];

            $this->insert($confirmation);
    }
    
    public function updateConfirmation($id, $status){
        $newStatus = [
            'status' => $status
        ];
        
        $this->update($id, $newStatus);
    }
}