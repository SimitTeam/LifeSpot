<?php namespace App\Controllers;


use App\Models\SpeciesModel;


class AutoComplete extends BaseController
{

        protected function prikaz($page,$data){
                $data['controller']='AutoComplete';
                echo view('sabloni/header_guest');
                echo view("stranice/$page");
                echo view('sabloni/footer.php');
        }
        
        public function fetch(){
            $output=array();
            $temp_array['value']=5;
            $test_img=site_url("./assets/img/species/aki.jpg");
            $temp_array['label']="<img src='$test_img'   >"."&nbsp"."Lorem ipsum";
            $output[]=$temp_array;
             $output[]=$temp_array;
            echo json_encode($output);
        }
	//--------------------------------------------------------------------

}