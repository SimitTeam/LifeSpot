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
    
    public function getType($username){
        $getType = $this->find($username);
        if($getType->type === 'U'){
            return 'User';
        }else if($getType->type === 'M'){
            return 'Moderator';
        }else{
            return 'Admin';
        }
    }
    
    public function addUser($name, $surname, $username, $pass, $confPass, $date, $email){
        $proveraUsername = $this->where('username', $username)->findAll();
        $proveraMail = $this->where('mail', $email)->findAll();
        
        if ($proveraUsername != NULL) {
            return '<h3>To korisnicko ime vec postoji !<h3>';
        } else if ($proveraMail != NULL) {
            return '<h3>Taj mejl vec postoji ! </h3>';
        } else {
            if ($this->first() != null) {
                $t = 'U';
            } else {
                $t = 'A';
            }

            $korisnik = [
                'username' => $username,
                'type' => $t,
                'name' => $name,
                'surname' => $surname,
                'pass' => $pass,
                'birth_date' => $date,
                'mail' => $email
            ];

            $this->insert($korisnik);
        }        
        
    }
    
    public function checkUser($username, $password){
        $user = $this->getUser($username);
        
        if($user == NULL){
            return '<h3>To korisnicko ime ne postoji</h3>';
        }
        
        if($user->pass === $password){
            return '<h3>Uspesno ste ulogovani</h3>';
        }else{
            return '<h3>Sifra nije dobra</h3>';
        }
    }
    
    
}