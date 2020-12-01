<?php

    function fetch_item($query){
        include 'connect.php';
        
        // echo $query;

        $stid = oci_parse($conn, $query);
        oci_execute($stid, OCI_DEFAULT);

        $row = oci_fetch_array($stid, OCI_BOTH);
        // var_dump($row);

        return $row;
    }

?>