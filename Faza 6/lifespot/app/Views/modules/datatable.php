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
					if(!strcmp($config->dtTypes[$i], "str")){
						echo("<td>".$row[$i]."</td>");
					}
					else if(!strcmp($config->dtTypes[$i], "ref")){
						echo("<td><a href=\"".site_url($row[$i]["url"])."\" class='btn btn-success'>".$row[$i]["text"]."</a></td>");
					}
					else if(!strcmp($config->dtTypes[$i], "img")){
						echo("<td>".view('modules/imagepreview', ['img'=>$row[$i]])."</td>");
					}
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
