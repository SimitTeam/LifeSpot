<input type="text" id="search_data_header" autocomplete="off" class="form-control" name="<?= $config->searchBarName ?>">
<script>
	$(document).ready(function(){
		$("#search_data_header").autocomplete({     
			source:"<?= site_url($config->autocompleteFetch) ?>",
			minLength:1,
			select:function(event,ui){
				$("#search_data_header").val(ui.item.value);
			},
                        open: function(event, ui) {
                            $(".ui-autocomplete").css("z-index", 1000);
                        }
		}).data('ui-autocomplete')._renderItem=function(ul,item){
			return $("<li class='ui-autocomplete-row''></li>")
			.data("item.autocomplete",item).append(item.label).appendTo(ul);
		};
	});
</script>    
