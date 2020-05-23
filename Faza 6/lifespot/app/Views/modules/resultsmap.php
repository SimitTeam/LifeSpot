
<div class="row">
    <div class="offset-4 col-4">
        <div id="mapDiv"> </div>
    </div>
    
</div>
 


<script>
    function onMapClick(e) {
        var lat  = e.latlng.lat.toFixed(5);
        var lon  = e.latlng.lng.toFixed(5);
        var gps = "";
        if (lat>0) gps+='N'; else gps+='S';
        if (10>Math.abs(lat))  gps += "0";
        gps += Math.abs(lat).toFixed(5)+" ";
        if (lon>0) gps+='E'; else gps+='W';
        if (10>Math.abs(lon))  gps += "0";
        if (100>Math.abs(lon)) gps += "0";
        gps += Math.abs(lon).toFixed(5);
        var textArea = document.createElement("textarea");
        textArea.style.position = 'fixed';
        textArea.style.top = 0;
        textArea.style.left = 0;
        textArea.style.width = '2em';
        textArea.style.height = '2em';
        textArea.style.padding = 0;
        textArea.style.border = 'none';
        textArea.style.outline = 'none';
        textArea.style.boxShadow = 'none';
        textArea.style.background = 'transparent';
        textArea.value = gps;
        document.body.appendChild(textArea);
        textArea.select();
        try {
          var successful = document.execCommand('copy');
          var msg = successful ? 'Successfully' : 'Unsuccessfully';
          console.log(msg + ' copied ' + lat+" "+lon + ' to clipboard ');
        } catch (err) {
          console.log('Oops, unable to copy');
        }
        document.body.removeChild(textArea);
    }
    
        
    var osmUrl='https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    var osm = new L.TileLayer(osmUrl, {minZoom:1, maxZoom:19});		
    
    //var googleStreets = new L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{minZoom:0, maxZoom:19, subdomains:['mt0','mt1','mt2','mt3']});
    
    //var googleSat = new L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{minZoom:0, maxZoom: 21,subdomains:['mt0','mt1','mt2','mt3']});
    
    var map = new L.Map('mapDiv', { doubleClickZoom:true, zoomControl:true, maxBounds:([[90,-270],[-90,270]]) });
    
   // L.control.layers({"OSM (Mapnik)": osm, "Google Street": googleStreets, "Google Earth": googleSat}).addTo(map);
    
    map.addLayer(osm);
    var map_set = "osm";
    map.fitBounds([[0,-180],[0,180]]);
    
    map.on('click', onMapClick);
    map.setView([0, 0], 0);
    
     var search_species_data="<?php if(isset($_GET["search_species"])){
         echo $_GET["search_species"] ;
         }?>";
            $.ajax({
            method: "Get",
            url: "<?= site_url("./Autocomplete/getMarkers") ?>",
            data: {term:search_species_data},
            datatype:"json",
            success: function(data){
                j_obj=JSON.parse(data);
                for (var item in j_obj) {
                  var marker = L.marker([j_obj[item].latitude, j_obj[item].longitude],{id:j_obj[item].id}).addTo(map);
                  marker.on("click",function(event){
                     window.open("<?= site_url("./Marker/showMarker/")?>"+this.options.id+"/"+"hm","_self");
                  });
                }
            } });

    
    
    </script>