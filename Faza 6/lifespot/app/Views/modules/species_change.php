<div class="row">
	<div class="col-sm-12 text-center">
		<form name="#">
		<div class="row">
			<div class="offset-sm-4 col-sm-4 text-center ">
				<?=$this-> include('modules/autocomplete');?>
			</div>
			<div class="col-sm-2 text-center">
				<button class="btn btn-success my-2 my-sm-0 newSpeciesSet" type="button">Change Species</button>
			</div>
		</div>
		</form>
	</div>
</div>

<script>

    $(document).ready(function(){
        $(".newSpeciesSet").click(function(){
            $("#new_species").text("Species: "+$("#search_data").val());
            $("#hidden_species_par").val($("#search_data").val());
        })
    });

</script>