<?php session_start(); ?>

<?php

    $user_id = $_SESSION["user"]["user_id"];
    // $cars = fetch_cars($user_id);    

    include 'connect.php';
    include 'get_variable.php';

    $post_id = get_variable("post_id");
    var_dump($post_id);

    $is_delete = get_variable("is_delete");
    var_dump($is_delete);

    $user_id = 1;
    $post_id = 1;
    echo 'fs';

    if( $is_delete == 1 ){
        echo 'delete';
        $query = "
        BEGIN 
            wishList_package.deleteWishList('$user_id', '$post_id');
        END;";
        
        $stid = oci_parse($conn, $query);
        oci_execute($stid);
    }
    else{
        echo 'insert';

        $query = "
        BEGIN 
            wishList_package.addToWishList('$user_id', '$post_id');
        END;";

        $stid = oci_parse($conn, $query);
        oci_execute($stid);
        
    }

    header("location: post_detail.php?post_id=".$post_id);

?>
