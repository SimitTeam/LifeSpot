        <?php 
            if($config->markerImage==null){
                   $result=array();
                   $image=glob("./assets/img/users/no_preview.jpg");
                   $result[]=site_url($image);
                   echo "<script>var images=". json_encode($result)." </script>";
            }
            else
            {
                $dirname="./assets/img/users/".$config->markerUser."/".$config->markerImage."/";
                $images = glob($dirname."*.{jpg,png}",GLOB_BRACE);
                $result=array();
                foreach($images as $image) {
                  $result[]=site_url($image);  
                }
                echo "<script>var images=". json_encode($result)." </script>";
            }
        ?>



<div class="row">
    <div class="offset-4 col-4" id="slide-container">
          <a id="prev_img" onclick="plusSlides(-1)">&#10094;</a>
          <a id="next_img" onclick="plusSlides(1)">&#10095;</a>      
    </div>
</div>

<script>
    var len=images.length;
    var str="";
    for (var ind in images) {
        
        str+="<div class='mySlide'>";
        str+="<div class='numbertext'>"+(parseInt(ind)+1)+"/"+len+"</div>";
        str+="<img src='"+images[ind]+"'>";
        str+="</div>";
}

$("#slide-container").prepend(str);

var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlide");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}


</script>
