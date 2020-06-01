<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

/**
* 
* ErrorFilter - klasa koja filtrira pristup korisnika koji pokusavaju da pristupe 
* error ispisu bez izazivanja pravog error-a
*
* @version 1.0
* 
* @author Mara Bolic 17/0614 i Aleksa Bogdanovic 17/0578
*/
class ErrorFilter implements FilterInterface {
   
    public function after(RequestInterface $request, ResponseInterface $response) {
        
    }

    /**
    * Funkcija koja filtrira pristup korisnika koji pokusavaju da pristupe 
	* error ispisu bez izazivanja pravog error-a
    *
    *
    */
    public function before(RequestInterface $request) {
        $error = session()->get('error');
        
        
        if($error == null){
            return redirect()->to('/Guest/index');
        }
        
        if($error == 'none'){
            return redirect()->to('/Guest/index');
        }
        
        session()->set('error', 'none');
    }

}
