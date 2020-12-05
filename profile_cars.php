<?php
    include 'fake_data.php';
?>

<div class="row cars" id="added_cars">
    <div class="car col-md-4 col-lg-4">
        <a href="add_new_car.php?"> + </a>
    </div>

<?php
    $index = 1;
    foreach($cars as $car){
        if( $index % 3 == 0 )
            echo "<div class='row'>";
?>

    <div class="car col-md-4 col-lg-4">
        <h3> <?php echo $car["car_id"]; ?> </h3>
        <a href="prediction_result.php?car_id=<?php echo $car["car_id"]; ?>"> review </a>
    </div>
    
<?php 
    $index += 1;
    if( $index % 3 == 0 )
        echo "</div>";
}
if( $index % 3 != 0 ){
    echo "</div>";
}
?>


</div>
