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

?>
