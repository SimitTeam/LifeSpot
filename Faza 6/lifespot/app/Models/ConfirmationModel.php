<?php namespace App\Models;

/**
* Comfirmation Model – klasa koja komunicisa Confirmation tabelom u bazi
*
* @version 1.0
 * 
 *@author Aleksa Bogdanovic i Jovan Spasojevic
*/


use CodeIgniter\Model;

class ConfirmationModel extends Model
{
    protected $table      = 'confirmation';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['username', 'status','id'];
    
    /**
    * Funkcija za dohvatanje potvrde opazanja
    *
     * @param int $id id markera
    *@return Objectk potvrda
    */
    public function getConfirmation($id){
        $getConfirmation = $this->find($id);
        return $getConfirmation;
    }
    
        /**
    * Funkcija za kreiranje i dodeljivanje potvrde opazanja
    *
     * @param int $id id markera
     * @param String $user_add korisnik koji je napravio marker
    *@return String prezime
    */
    public function getUsername($id){
        $getUsername = $this->find($id);
        return $getUsername->username;
    }
    
        /**
    * Funkcija za kreiranje i dodeljivanje potvrde opazanja
    *
     * @param int $id id markera
     * @param String $user_add korisnik koji je napravio marker
    *@return String prezime
    */
    public function getStatus($id){
        $getStatus = $this->find($id);
        return $getStatus->status;
    }
    
    
    /**
    * Funkcija za kreiranje i dodeljivanje potvrde opazanja
    *
     * @param int $id id markera
     * @param String $user_add korisnik koji je napravio marker
    *@return String prezime
    */
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
    
    
    /**
    * Funkcija za azuriranje statusa potvrde opazanja
    *
     * @param int $id id markera
     * @param char $status novi status
    */
    public function updateConfirmation($id, $status){
        $newStatus = [
            'status' => $status
        ];
        
        $this->update($id, $newStatus);
    }
}