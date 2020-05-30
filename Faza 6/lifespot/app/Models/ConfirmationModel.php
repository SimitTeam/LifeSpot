<?php namespace App\Models;

use CodeIgniter\Model;

class ConfirmationModel extends Model
{
    protected $table      = 'confirmation';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['username', 'status','id'];
    
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
    
    public function addConfirmation($id,$user_add){
   

        
       $confirmers=$this->db->table('user as u')
        ->groupStart()
            ->where('u.type','M')
            ->orWhere('u.type','A')
         ->groupEnd()
        ->join('(SELECT * from confirmation where status!="C" and status!="D") as con', 'u.username = con.username', 'LEFT')
        ->groupBy('u.username')
        ->select("u.username,con.id")
        ->selectCount("con.id",'count')
        ->get()->getResult();         

        
        $min=-1;
        $username="";
        foreach ($confirmers as $value) {
            if(strcmp($user_add, $value->username)==0)continue;
            
            if($min==-1 || $min>$value->count){
                $min=$value->count;
                $username=$value->username;
            }
        }
        
        
        $status='N';
        if($min==-1){
             $username=$user_add;
             $status='C';
        }
        $confirmation = [
                'id' => $id,
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