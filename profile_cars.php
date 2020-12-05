<?php

    $user_id = $_SESSION["user"]["user_id"];

    include 'get_cars.php';

    $cars = get_carByUser(1, $user_id);

?>

<h1> My cars </h1>

<div class="row cars" id="added_cars">

    <?php
    $index = 0;
    foreach($cars as $car){

        echo '<div class="col-md-3">
        <div class="card mb-4 shadow-sm">';

        echo '<img class="card-img-top" src="';
        echo "https://www.osdla.com/wp-content/uploads/2014/10/placeholder-1.png";
            
        echo '" alt="Card image cap">
            <div class="card-body">
            <p class="card-text">';

        echo '<a href="post_detail.php?post_id='.$car["CAR_ID"].'"> '.$car["COMPANY"].' '.$car["MODEL"].' '.$car["CAR_ID"].'</a>';
        echo '<br><small>'.$car["CITY"].'</small>';
        echo'</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">';
        echo '<button type="button" 
            class="btn btn-sm btn-outline-secondary">
            <a href="post_detail.php?post_id='.$car["CAR_ID"].'">View</a></button>';
        echo '<button type="button" 
            class="btn btn-sm btn-outline-secondary"> 
            <a href="edit_post.php?post_id='.$car["CAR_ID"].'">Edit</a></button>';
        echo '<button type="button" 
        class="btn btn-sm btn-outline-secondary"> 
        <a href="delete_car.php?post_id='.$car["CAR_ID"].'">Delete</a></button>';

        echo '</div>
            <small class="text-muted"> views 0</small>
            </div>
            </div>
            </div>
            </div>';
    }
    ?>

</div>