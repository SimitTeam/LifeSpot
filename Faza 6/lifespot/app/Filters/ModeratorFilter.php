<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class ModeratorFilter implements FilterInterface {
    //put your code here
    public function after(RequestInterface $request, ResponseInterface $response) {
        
    }

    public function before(RequestInterface $request) {
        $userType = session()->get('userType');
        $user = session()->get('user');
        if ($user == null){
            return redirect()->to("/Guest/login");
        }
        if ($userType != 'Moderator' && $userType != 'Admin'){
            return redirect()->to('/Guest/index'); //dodati error page za ovo
        }
        
        
    }

}