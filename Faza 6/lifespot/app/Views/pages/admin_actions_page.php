<?php

/**
* admin_actions_page - iscrtava stranicu koja sadrzi forme za administriranje sistema
*
* @version 1.0
* 
*@author Edvin Maid 17/0117
*/

?>
<?php $this->extend('template') ?>

<?php $this->section('htmlhead') ?>
<link rel="stylesheet" type="text/css" href="<?= site_url("./assets/DataTables/datatables.min.css")?>">
<script type="text/javascript" src="<?= site_url("./assets/DataTables/datatables.min.js")?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<?php $this->endSection() ?>



<?php $this->section('content') ?>
<div class='container-fluid '>   
   	<div class="row">
		<div class="col-12 text-center ">
                    &nbsp;
		</div>
        </div>  
 	<div class="row">
		<div class="col-12 text-center ">
                    
                    <form >
                        <input type="text" name="term">
                        <input hidden type="text" name="offset" value="0">
                        <input hidden type="text" name="limit" value="100">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
		</div>
	</div>   
    
	<div class="row">
		<div class="offset-2 col-8 text-center ">
		<?php
                    echo $this->include('modules/admin_datatable');
		?>
		</div>
	</div>
    
 	<div class="row">
		<div class="col-12 text-center ">
                    &nbsp;
		</div>
        </div>
	<div class="row">
		<div class="col-12 text-center ">
                    
                    <?php 
                        $limit=100;
                        
                        if(isset($_GET["limit"])){
                             $limit=$_GET["limit"];
                        }
                        
                        
                        $offset=0;
                        if(isset($_GET["offset"])){
                             $offset=$_GET["offset"];
                        }   
                        
                        $offset_bef= max(0,$offset-$limit);
                        $offset_aft=$offset+$limit;
                        
                        $term="";
                        if(isset($_GET["term"])){
                             $term=$_GET["term"];
                        }                        
                        
                        $link_bef= site_url("./Admin/administer")."?limit=$limit&offset=$offset_bef&term=$term";
                        $link_aft= site_url("./Admin/administer")."?limit=$limit&offset=$offset_aft&term=$term";
                    echo '<a '."href='$link_bef'".' class="btn btn-dark"><span style="color:white;">Previous</span></a>';
                    echo '<a '."href='$link_aft'".' class="btn btn-dark"><span style="color:white;">Next</span></a>';
                    ?>
		</div>
	</div>
</div>
<script>
    //PROMOTE BUTTON
    $(document).ready(function(){
        $(".promote_button").click(function(){
             $(this).prop("disabled",true);
             
             var id=$(this).attr("id").substring(3);
             var user=$("#user"+id).text();
             
             $("#ban"+id).prop("disabled",true);
             if($(this).hasClass("Promote"))
             {
                var answer=confirm("Do you want to PROMOTE user:"+user);
                if(answer)
                {
                    $.ajax({
                    method: "Get",
                    url: "<?= site_url("./Autocomplete/updateUser") ?>"+"/"+user+"/M",
                    datatype:"json",
                    success: function(data){
                        j_obj=JSON.parse(data);                  
                        if(j_obj==true){
                            $("#type"+id).text("Moderator");
                            $("#mod"+id).addClass("Demote btn-secondary");
                            $("#mod"+id).removeClass(" Promote btn-primary");
                            $("#mod"+id).text("Demote");    
                            $("#mod"+id).prop("disabled",false);
                            $("#ban"+id).prop("disabled",false);
                        }
                        else{
                             window.open("<?= site_url("./Admin/administer") ?>","_self")
                        }
                    },
                    error: function(){
                       window.open("<?= site_url("./Admin/administer") ?>","_self")
                   }});                     
                  }
                  else{
                    $("#mod"+id).prop("disabled",false);
                    $("#ban"+id).prop("disabled",false);
                  }
             }
             
             else{
                var answer=confirm("Do you want to DEMOTE user:"+user);
                if(answer)
                { 
                 $.ajax({
                    method: "Get",
                    url: "<?= site_url("./Autocomplete/updateUser") ?>"+"/"+user+"/U",
                    datatype:"json",
                    success: function(data){
                        j_obj=JSON.parse(data);
                        if(j_obj==true){
                            $("#type"+id).text("User");
                            $("#mod"+id).addClass("Promote btn-primary");
                            $("#mod"+id).removeClass("Demote btn-secondary");
                            $("#mod"+id).text("Promote");
                            $("#mod"+id).prop("disabled",false);
                            $("#ban"+id).prop("disabled",false);                       
                        }
                        else{
                             window.open("<?= site_url("./Admin/administer") ?>","_self")
                        }
                    },
                    error: function(){
                       window.open("<?= site_url("./Admin/administer") ?>","_self")
                   }});                  
                }
                else{
                    $("#mod"+id).prop("disabled",false);
                    $("#ban"+id).prop("disabled",false);                   
                }
             
           
            
             }
             
        })
        
        
        //BAN BUTTON
         $(".ban_button").click(function(){
             $(this).prop("disabled",true);
             
             var id=$(this).attr("id").substring(3);
             var user=$("#user"+id).text();
             
             $("#mod"+id).prop("disabled",true);
             if($(this).hasClass("Ban"))
             {
                var answer=confirm("Do you want to BAN user:"+user);
                if(answer)
                { 
                    $.ajax({
                    method: "Get",
                    url: "<?= site_url("./Autocomplete/updateUser") ?>"+"/"+user+"/B",
                    datatype:"json",
                    success: function(data){
                        j_obj=JSON.parse(data);                  
                        if(j_obj==true){
                            $("#type"+id).text("Banned");
                            $("#ban"+id).addClass("UnBan btn-success");
                            $("#ban"+id).removeClass("Ban btn-danger");
                            $("#ban"+id).text("UnBan");    
                            $("#ban"+id).prop("disabled",false);
                        }
                        else{
                             window.open("<?= site_url("./Admin/administer") ?>","_self")
                        }
                    },
                    error: function(){
                       window.open("<?= site_url("./Admin/administer") ?>","_self")
                   }});                     
                }else{
                   $("#ban"+id).prop("disabled",false);
                   $("#mod"+id).prop("disabled",false);   
                }              
        
             }
             
             else{
                var old_type="";
                if($("#mod"+id).hasClass("Promote")){
                    old_type="U";
                }
                else old_type="M";
                
                var answer=confirm("Do you want to UNBAN user:"+user);
                if(answer)
                {
                 $.ajax({
                    method: "Get",
                    url: "<?= site_url("./Autocomplete/updateUser") ?>"+"/"+user+"/"+old_type,
                    datatype:"json",
                    success: function(data){
                        j_obj=JSON.parse(data);
                        if(j_obj==true){
                            if($("#mod"+id).hasClass("Promote")){
                                $("#type"+id).text("User");
                            }
                            else $("#type"+id).text("Moderator");

                            $("#ban"+id).addClass("Ban btn-danger");
                            $("#ban"+id).removeClass("UnBan btn-success");
                            $("#ban"+id).text("Ban");    
                            $("#ban"+id).prop("disabled",false);    
                            $("#mod"+id).prop("disabled",false); 
                        }
                        else{
                            
                             window.open("<?= site_url("./Admin/administer") ?>","_self")
                        }
                    },
                    error: function(){
                       window.open("<?= site_url("./Admin/administer") ?>","_self")
                   }});                  
                }
                else{
                 $("#ban"+id).prop("disabled",false);    
                }
             }            
        })    
        
    });
</script>
<?php $this->endSection() ?>
