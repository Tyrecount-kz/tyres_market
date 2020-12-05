<?php
    include 'fake_data.php';
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

        echo '<a href="prediction_result.php?car_id='.$car["car_id"].'"> review '.$car["car_id"].'</a>';
        echo '<br><small>'.$car["city"].'</small>';
        echo'</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">';
        echo '<button type="button" 
            class="btn btn-sm btn-outline-secondary">
            <a href="post_detail.php?post_id='.$car["car_id"].'">View</a></button>';
        echo '<button type="button" 
            class="btn btn-sm btn-outline-secondary"> 
            <a href="edit_post.php?post_id='.$car["car_id"].'">Edit</a></button>';
        echo '<button type="button" 
        class="btn btn-sm btn-outline-secondary"> 
        <a href="delete_car.php?post_id='.$car["car_id"].'">Delete</a></button>';

        echo '</div>
            <small class="text-muted"> views '.$car["views"].'</small>
            </div>
            </div>
            </div>
            </div>';
    }
    ?>

</div>