<?php

  function start_carousel($images){
    echo '<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">';
    
    echo '<div class="carousel-inner">';
    $started = 0;
    foreach($images as $image){

      if( $started == 0 )
        echo'
          <div class="carousel-item active">
            <img class="d-block w-100" src="'.$image.'" alt="First slide">
          </div>';

      else
        echo'
          <div class="carousel-item">
            <img class="d-block w-100" src="'.$image.'" alt="First slide">
          </div>';
      
      $started = 1;

      }
    
    echo '
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>';
  }

  function show_uploaded_images($images, $car_id){
    echo '
    <form action="delete_photo.php" method="post" name="form">
    <div class="row uploads_i">';
    foreach($images as $image){
      echo '
      <div class="column">
        <input type="submit" name="delete" class="closebtn" value="X" >
        <input type="hidden" name="car_id" value="'.$car_id.'" >
        <input type="hidden" name="image_path" value="'.$image.'" >

        <img src="'.$image.'">
      </div>';
    }
    echo '</div></form>';
  }

?>
