<?php

  // $user_id = $_SESSION["user"]["user_id"];

  function is_in_wishlist($user_id, $post_id){

    include 'connect.php';

    $query = '
        begin 
          :b := wishList_package.InWishList(:user_id, :post_id);
        end;';

    $stid = oci_parse($conn, $query);

    oci_bind_by_name($stid, ':user_id', $user_id);
    oci_bind_by_name($stid, ':post_id', $post_id);
    oci_bind_by_name($stid, ':b', $ym);

    oci_execute($stid);
    
    // var_dump($ym);

    return $ym;
  }

  // var_dump( is_in_wishlist(1, 1) );

?>

