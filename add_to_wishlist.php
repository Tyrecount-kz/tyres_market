<?php session_start(); ?>

<?php

    $user_id = $_SESSION["user"]["USER_ID"];
    // $cars = fetch_cars($user_id);    

    include 'get_variable.php';

    $post_id = get_variable("post_id");
    var_dump($post_id);

    $is_delete = get_variable("is_delete");
    var_dump($is_delete);

    if( $is_delete == 1 ){
        echo 'delete';
    }
    else{
        echo 'insert';
        // insert to wishlist
        // update interested
    }

    header("location: post_detail.php?post_id=".$post_id);

?>
