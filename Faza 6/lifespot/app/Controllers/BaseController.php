<?php
namespace App\Controllers;

/**
* BaseController – klasa koja sluzi kao osnova svih drugih kontrolera
*
* @version 1.0
 * 
*/
use CodeIgniter\Controller;

class BaseController extends Controller
{
	protected $helpers = [];

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);

		$this->validation =  \Config\Services::validation();
		$this->session = session();
	}
        
        
        
        public function index()
        {
            $this->show("guest_page",[]);
        }
        
        
        
        public function signin(){
            $this->login();
        }

}
