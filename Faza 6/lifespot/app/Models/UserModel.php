<?php namespace App\Models;

/**
* User Model – klasa koja komunicisa User tabelom u bazi
*
* @version 1.0
 * 
 *@author Aleksa Bogdanovic 17/0578
*/


use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'username';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['type', 'name', 'surname', 'username', 'birth_date', 'mail', 'pass'];
  
    
    protected $useTimestamps = false;
    protected $skipValidation = false;
    
    /**
    * Funkcija koja dohvata korisnika
    *
    *@return Object korisnik
    */
    public function getUser($username){
        $getUserByUsername = $this->find($username);
        return $getUserByUsername;
    }
    
    /**
    * Funkcija koja dohvata ime
    *
    *@return String ime
    */
    public function getName($username){
        $getName = $this->find($username);
        return $getName->name;
    }
    
    /**
    * Funkcija koja dohvata prezime
    *
    *@return String prezime
    */
    public function getSurname($username){
        $getSurname = $this->find($username);
        return $getSurname->surname;
    }
    
    /**
    * Funkcija koja dohvata datum rodjenja
    *
    *@return String datum rodjenja
    */
    public function getBirthDate($username){
        $getBirthDate = $this->find($username);
        return $getBirthDate->birth_date;
    }
    
    /**
    * Funkcija koja dohvata prezime
    *
    *@return String prezime
    */
    public function getMail($username){
        $getMail = $this->find($username);
        return $getMail->mail;
    }
    
    /**
    * Funkcija koja dohvata prezime
    *
    *@return String prezime
    */
    public function getType($username){
        $getType = $this->find($username);
        if($getType->type === 'U'){
            return 'User';
        }else if($getType->type === 'M'){
            return 'Moderator';
        }else if ($getType->type === 'A')
                return 'Admin';
            else
                return 'Banned';
    }

    
    /**
    * Funkcija koja dohvata prezime
    *
    *@return String prezime
    */
    public function addUser($name, $surname, $username, $pass, $date, $email){
        $proveraUsername = $this->where('username', $username)->findAll();
        $proveraMail = $this->where('mail', $email)->findAll();
        
            if ($this->first() != null) {
                $t = 'U';
            } else {
                $t = 'A';
            }

            $user = [
                'username' => $username,
                'type' => $t,
                'name' => $name,
                'surname' => $surname,
                'pass' => $pass,
                'birth_date' => $date,
                'mail' => $email
            ];

            $this->insert($user);      
        
    }
    
    /**
    * Funkcija koja dohvata prezime
    *
    *@return String prezime
    */
    public function checkUser($username, $password){
        $user = $this->getUser($username);
        
        if($user == NULL){
            return false;
        }
        
        if($user->pass === $password){
            return true;
        }else{   
            return false;
        }
    }
    
    /**
    * Funkcija koja dohvata prezime
    *
    *@return String prezime
    */
    public function promoteUser($username, $type){
        $newType = [
            'type' => $type
        ];
        
        return $this->update($username, $newType);
    }
    
    /**
    * Funkcija koja dohvata prezime
    *
    *@return String prezime
    */
    public function demoteUser($username){
        $currType = $this->getType($username);
        $test = FALSE;
        if ($currType === 'Administrator') {
            $type = 'M';
            $test = TRUE;
        } else if ($currType === 'Moderator') {
            $type = 'U';
            $test = TRUE;
        }
        
        if(test === TRUE){
            $newType = [
               'type' => $type
            ];
        
            $this->update($username, $newType);
        }
    }

    /**
    * Funkcija koja dohvata prezime
    *
    *@return String prezime
    */
    public function findUser($term){
        return $this->where('username', $term)->findAll();
    }
    
    
    /**
    * Funkcija koja dohvata prezime
    *
    *@return String prezime
    */
    public function getAllUsers(){
        return $this->findAll();
    }
}
