<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'username';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['type', 'name', 'surname', 'birth_date', 'mail', 'pass'];
  
    protected $validationRules    = [
                    'name' => 'trim|required',
                    'surname' => 'trim|required',
                    'username' => 'trim|required|is_unique[user.username]',
                    'pass' => 'trim|required|is_unique[user.pass]',
                    'birth_date' => 'trim|required',
                    'mail' => 'trim|required|is_unique[user.mail]'
            ];
    
    protected $validationMessages = [
                'name' => ['required' => 'Vase ime je obavezno !'],
                'surname' => ['required' => 'Vase prezime je obavezno !'],
                'username' => ['required' => 'Vase korisnicko ime je obavezno !', 'is_unique' => 'Vase korisnicko ime mora biti jedinstveno !'],
                'pass' => ['required' => 'Vasa lozinka je obavezna !', 'is_unique' => 'Vasa lozinka mora da bude jedinstvena !'],
                'birth_date' => ['required' => 'Datum rodjenja je obavezno polje !'],
                'mail' => ['required' => 'Vas mejl je obavezan', 'is_unique' => 'Vas mejl mora biti jedinstven']
            ];
    
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