<?php

    function get_carDetail($car_id){

        include 'connect.php';

        $stid = oci_parse($conn, 'begin :cursor := getCarDetail(:car_id); end;');
        $p_cursor = oci_new_cursor($conn);

        //Bind Cursor     put -1
        oci_bind_by_name($stid, ':car_id', $car_id);
        oci_bind_by_name($stid, ':cursor', $p_cursor, -1, OCI_B_CURSOR);

        // Execute Statement
        oci_execute($stid);
        oci_execute($p_cursor, OCI_DEFAULT);

        oci_fetch_all($p_cursor, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        // echo '<br>';
        // print_r($cursor[0]);
        
        // var_dump($cursor[0]);
        return $cursor[0];
    }

    function get_carDetailPost($post_id){

        include 'connect.php';

        $stid = oci_parse($conn, 'begin :cursor := getCarDetail(:car_id); end;');
        $p_cursor = oci_new_cursor($conn);

        //Bind Cursor     put -1
        oci_bind_by_name($stid, ':car_id', $post_id);
        oci_bind_by_name($stid, ':cursor', $p_cursor, -1, OCI_B_CURSOR);

        // Execute Statement
        oci_execute($stid);
        oci_execute($p_cursor, OCI_DEFAULT);

        oci_fetch_all($p_cursor, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        // echo '<br>';
        // print_r($cursor[0]);
        
        // var_dump($cursor[0]);
        return $cursor[0];
    }

    function get_carsPagination(){
        include 'connect.php';

        $stid = oci_parse($conn, 'begin :cursor := listAllCars(:index); end;');
        $p_cursor = oci_new_cursor($conn);

        //Bind Cursor     put -1
        $index = 1;
        oci_bind_by_name($stid, ':index', $index);
        oci_bind_by_name($stid, ':cursor', $p_cursor, -1, OCI_B_CURSOR);

        // Execute Statement
        oci_execute($stid);
        oci_execute($p_cursor, OCI_DEFAULT);

        oci_fetch_all($p_cursor, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        // echo '<br>';
        // print_r($cursor[0]);
        
        var_dump($cursor);
        return $cursor;
    }

    function get_carByUser($user_id){
        include 'connect.php';

        $stid = oci_parse($conn, 'begin :cursor := getAllUserCars(:index, :user_id); end;');
        $p_cursor = oci_new_cursor($conn);

        //Bind Cursor     put -1
        $index = 1;
        oci_bind_by_name($stid, ':index', $index);
        oci_bind_by_name($stid, ':user_id', $user_id);
        oci_bind_by_name($stid, ':cursor', $p_cursor, -1, OCI_B_CURSOR);

        // Execute Statement
        oci_execute($stid);
        oci_execute($p_cursor, OCI_DEFAULT);

        oci_fetch_all($p_cursor, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        // echo '<br>';
        // print_r($cursor[0]);
        
        // var_dump($cursor);
        return $cursor;
    }

    // get_carByUser(1, 1);

    // $characteristics = get_carDetail(4);
    // var_dump($characteristics);
  
?>