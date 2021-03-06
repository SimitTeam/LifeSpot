<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


/**
* 
* UserFilter - klasa za filtiranje ne ulogovanih
*
* @version 1.0
* 
* @author Mara Bolic 17/0614 i Edvin Maid 17/0117
*/
class UserFilter implements FilterInterface {
   
    public function after(RequestInterface $request, ResponseInterface $response) {
        
    }

    /**
    * Funkcija koja filtrira pristup korisnika koji nisu ulogovani
    *
    *
    */
    public function before(RequestInterface $request) {
        $userType = session()->get('userType');
        $user = session()->get('user');
        
        if ($user == null){
            session()->set('error','login');
            return redirect()->to(site_url("/Error/login"));
        }

    }

}
