<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class ErrorFilter implements FilterInterface {
   
    public function after(RequestInterface $request, ResponseInterface $response) {
        
    }

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
