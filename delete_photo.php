<?php

    if( isset($_POST["delete"]) ){
        $car_id = $_POST["car_id"];
        $img_path = $_POST["image_path"];

        echo $car_id.' '.$img_path;

        // make query delete photo

        header('location: edit_post.php?car_id='.$car_id);
    }

?>
