<?php

    function fetch_query($query_id = -1){
        include 'connect.php';
    
        // query
        // $query = "select * from queries where query_id = '$query_id'";
        $query = "select * from users where user_id = '$query_id'";
        // echo $query;

        $stid = oci_parse($conn, $query);
        echo oci_execute($stid, OCI_DEFAULT);

        $row = oci_fetch_array($stid, OCI_BOTH);
        var_dump($row);

        return $row;
        
        // oci_commit($conn);
    }

?>