<?php namespace App\Controllers;

/**
* Error Controller – klasa za prikazivanje stranica pri pokusajima pristupanja 
 * nedozvoljenim stranicama
*
* @version 1.0
 * 
 *@author  Aleksa Bogdanovic
*/

use App\Libraries\ViewConfig;

class Error extends BaseController{
    
    /**
       * Funkcija za prikaz stranice kada osoba koja je banovana pokusava da 
     * se prijavi na sajt
       *
    */
   public function banned(){
        $x = new ViewConfig();
        $x->errorButton = "Home page";
        $x->errorBackPage = "./Guest/index";
        $x->errorPageMessage = 'You are BANNED ! <br>For additional information contact admin. <br>Return to the home page.';
        $this->session->destroy();
        echo view('pages/error_page',["config"=>$x]);
   }
    /**
    * Funkcija za prikaz stranice kada neprijavljeni korisnik (Gost) pokusava da 
     * pristupi stranici kojoj ima pristup neki ulogovani korisnik
    *
    */
    public function login(){
        $x = new ViewConfig();
        $x->errorButton = 'Log In';
        $x->errorBackPage = "./Guest/login";
        $x->errorPageMessage = 'That action is not possible ! <br>You have to LOG IN !!! ';
        echo view('pages/error_page',["config"=>$x]);
    }
     /**
    * Funkcija za prikaz stranice kada korinik pokusava da pristupi stranici za 
      * koju nema privilegije
    *
    */
    public function permission(){
        $x = new ViewConfig();
        $x->errorButton = 'Home page';
        $x->errorBackPage = "./Guest/index";
        $x->errorPageMessage = 'You dont have permission to do that!';
        echo view('pages/error_page',["config"=>$x]);
    }

        

}
