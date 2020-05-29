<table id="example" class="display" style="width:100%">
	<thead>
		<tr>
			<?php	
				foreach($config->dtHead as $col){
						echo("<th>".$col."</th>");
				}
			?>
		</tr>
	</thead>
    <tbody>
		<?php	
			foreach($config->dtRows as $row){
				echo("<tr>");
				for($i=0;$i<count($row);$i++){
					if(!strcmp($config->dtTypes[$i], "user")){
						echo("<td><span id='".$row[$i]['id']."'>".$row[$i]['value']."</span></td>");
					}
   					if(!strcmp($config->dtTypes[$i], "type")){
						echo("<td><span id='".$row[$i]['id']."'>".$row[$i]['type']."</span></td>");
					}                                     
					else if(!strcmp($config->dtTypes[$i], "pro")){
                                            if(strcmp($row[$i]["text"],"Promote" )==0)
                                                    echo("<td><button id='".$row[$i]['id']."'type='button'".$row[$i]["disabled"]." "
                                                    . "class='".$row[$i]["text"]." btn btn-primary promote_button'>".$row[$i]["text"]."</button></td>");
                                            else  echo("<td><button id='".$row[$i]['id']."'type='button'".$row[$i]["disabled"].""
                                                    . " class='".$row[$i]["text"]." btn btn-secondary promote_button'>".$row[$i]["text"]."</button></td>");
                                        
					}
					else if(!strcmp($config->dtTypes[$i], "ban")){
                                            if(strcmp($row[$i]["text"],"Ban" )==0)
                                                    echo("<td><button id='".$row[$i]['id']."'type='button'".$row[$i]["disabled"]." "
                                                    . "class='".$row[$i]["text"]." btn btn-danger ban_button'>".$row[$i]["text"]."</button></td>");
                                            else  echo("<td><button id='".$row[$i]['id']."'type='button'".$row[$i]["disabled"].""
                                                    . " class='".$row[$i]["text"]." btn btn-success ban_button'>".$row[$i]["text"]."</button></td>");					}                                        
				}
				echo("</tr>");
			}
		?>
    </tbody>
	<tfoot>
		<tr>
			<?php	
				foreach($config->dtHead as $col){
						echo("<th>".$col."</th>");
				}
			?>
		</tr>
	</tfoot>
</table>
