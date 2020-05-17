<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'username';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['type', 'name', 'surname', 'birth_date', 'mail', 'pass'];
  
    
    protected $useTimestamps = false;
    protected $skipValidation = false;
    
    //getUserByUsername
    public function getUser($username){
        $getUserByUsername = $this->find($username);
        return $getUserByUsername;
    }
    
    //getNameByUsername
    public function getName($username){
        $getName = $this->find($username);
        return $getName->name;
    }
    
    //getSurnameByUsername
    public function getSurname($username){
        $getSurname = $this->find($username);
        return $getSurname->surname;
    }
    
    //getBirthDateByUsername
    public function getBirthDate($username){
        $getBirthDate = $this->find($username);
        return $getBirthDate->birth_date;
    }
    
    //getMailByUsername
    public function getMail($username){
        $getMail = $this->find($username);
        return $getMail->mail;
    }
    
}