     <div class="row">
        <div class="offset-4 col-4">
            <input type="text" id="search_data" autocomplete="off" class="form-control">
            <script>
                $(document).ready(function(){
                    $("#search_data").autocomplete({     
                        source:"<?= site_url("./AutoComplete/fetch") ?>",
                        minLength:1,
                        select:function(event,ui){
                            $("#search_data").val(5);
                        }
                    }).data('ui-autocomplete')._renderItem=function(ul,item){
                        return $("<li class='ui-autocomplete-row'></li>")
                        .data("item.autocomplete",item).append(item.label).appendTo(ul);
                    };
                });
            </script>    
        </div>
    </div>    
