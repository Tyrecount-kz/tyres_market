<?php session_start(); ?>

<?php

    $user_id = $_SESSION["user"]["USER_ID"];
    // $cars = fetch_cars($user_id);    

    include 'get_variable.php';

    $car_id = get_variable("car_id");
    var_dump($car_id);

    echo 'delete';
    
    header("location: profile.php");

?>
