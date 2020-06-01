<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


/**
* 
* ModeratorFilter - klasa za filtriranje korisnika bez moderatorskog prava
* @version 1.0
* 
* @author Mara Bolic 17/0614 i Edvin Maid 17/0117
*/
class ModeratorFilter implements FilterInterface {
    //put your code here
    public function after(RequestInterface $request, ResponseInterface $response) {
        
    }

    /**
    * Funkcija koja filtrira pristup korisnika koji nemaju moderatorsko pravo
    *
    *
    */
    public function before(RequestInterface $request) {
        $userType = session()->get('userType');
        $user = session()->get('user');
        if ($user == null){
            session()->set('error','login');
            return redirect()->to("/Error/login");
        }
        if ($userType != 'Moderator' && $userType != 'Admin'){
            session()->set('error','permission');
            return redirect()->to('/Error/permission'); 
        }

    }

}
