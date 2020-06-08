<?php namespace App\Filters;

/**
* 
* AdminFilter - klasa za filtriranje korisnika bez administratorskog prava
* @version 1.0
* 
* @author Mara Bolic 17/0614 i Edvin Maid 17/0117
*/

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface{
    
    public function after(RequestInterface $request, ResponseInterface $response) {
        
    }

    /**
    * Funkcija koja filtrira pristup korisnika koji nemaju administratorsko pravo
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
        
        if ($userType != 'Admin'){
            session()->set('error','permission');
            return redirect()->to(site_url('/Error/permission'));
        }

    }

}
