<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

/**
* 
* Ban Filter - Klasa za filtriranje korisnika koji su banovani
*
* @version 1.0
* 
*@author Aleksa Bogdanovic 17/0578 i  Edvin Maid 17/0117
*/
class BanFilter implements FilterInterface{
    
    public function after(RequestInterface $request, ResponseInterface $response) {
        
    }

    /**
    * Funkcija koja filtrira pristup korisnika koji su banovani
    *
    *
    */
    public function before(RequestInterface $request) {
        $userType = session()->get('userType');
        $user = session()->get('user');
        
        if ($user != null){
            if ($userType == "Banned"){
                session()->set('error', 'banned');
                return redirect()->to("/Error/banned");
            }
        }
        
       
       
    }

}
