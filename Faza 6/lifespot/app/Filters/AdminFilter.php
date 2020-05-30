<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface{
    
    public function after(RequestInterface $request, ResponseInterface $response) {
        
    }

    public function before(RequestInterface $request) {
        $userType = session()->get('userType');
        $user = session()->get('user');
        
        if ($user == null){
            session()->set('error','login');
            return redirect()->to("/Error/login");
        }
        
        if ($userType != 'Admin'){
            session()->set('error','permission');
            return redirect()->to('/Error/permission');
        }

    }

}
