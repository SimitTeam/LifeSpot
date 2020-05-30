<?php namespace App\Controllers;


use App\Models\SpeciesModel;
use App\Models\ConfirmationModel;
use App\Models\UserModel;
use App\Libraries\ViewConfig;

class Admin extends BaseController
{
    
    public function index(){
        $con=new ConfirmationModel();
        $result=$con->addConfirmation("");
        var_dump($result);
        
    }
        
    public function administer(){
        $x = new ViewConfig();
        $x->dtRows=[];
        $x->dtHead=["Username", "Rank", "Promote/Demote", "Ban/Unban"];
        $x->dtTypes=["user","type","pro","ban"];
        $x->showResultsMap=false;

        $users=new UserModel();
        
        $limit=$this->request->getVar("limit");
        if($limit==null || is_int($limit)){
            $limit=100;
        }
        
        $offset=$this->request->getVar("offset");
        if($offset==null || is_int($offset)){
            $offset=0;
        }        
        
        $term=$this->request->getVar("term");  
        
        
        $results=$users->like('username',"$term")->findAll($limit,$offset);
        
        $type_array=['M'=>"Moderator","U"=>"User","A"=>"Admin","B"=>"Banned"];
        $id=0;
        foreach ($results as $value) {
            if(strcmp($this->session->get('user')->username, $value->username)==0)continue;
            
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

           $x->dtRows[]=[['value'=>$value->username,'id'=>"user".$id],['type'=>$type_array[$value->type],'id'=>"type".$id],["disabled"=>$disabled_mod,"text"=>$text_mod,'id'=>"mod".$id],
               ["disabled"=>$disabled_ban,"text"=>$text_ban, 'id'=>"ban".$id]];
           $id++;
        }

        echo view('pages/admin_actions_page', ["config"=>$x]);
    }

} 