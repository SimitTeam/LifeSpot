<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Models\UserModel;
use App\Libraries\ViewConfig;

class Admin extends BaseController
{
    
    public function index(){
        $x = new ViewConfig();
        $x->userType = "admin";
        echo view('pages/guest_page', ["config"=>$x]);
    }
        
    public function administer(){
        $x = new ViewConfig();
        $x->dtRows=[];
        $x->dtHead=["Username", "Rank", "Promote/Demote", "Ban/Unban"];
        $x->dtTypes=["str","str","pro","ban"];
        $x->showResultsMap=false;

        $users=new UserModel();
        $results=$users->getAllUsers();
        $type_array=['M'=>"Moderator","U"=>"User","A"=>"Admin","B"=>"Banned"];
        foreach ($results as $value) {
            //$temp_arr=[$value->username,$type_array[$value->type]];
            $disabled_mod="";
            $disabled_ban="";
            $text_mod="Promote";
            $text_ban="Ban";            
            if($value->type=="B"){
                $disabled_mod="disabled";
                $text_ban="UnBan";
            }
             else if($value->type=="M"){
                $text_mod="Demote";
            }               
            
            else if($value->type=="A"){
                $disabled_mod="disabled";
                $disabled_ban="disabled";
             }           

           $x->dtRows[]=[$value->username,$type_array[$value->type],["disabled"=>$disabled_mod,"text"=>$text_mod, "url"=>site_url("./Results/search/")],
               ["disabled"=>$disabled_ban,"text"=>$text_ban, "url"=>site_url("./Results/search/")]];
        }

        echo view('pages/admin_actions_page', ["config"=>$x]);
    }

} 