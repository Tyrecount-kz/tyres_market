<?php

    $DB_username = 'tyres';
    $DB_password = 'tyres';
    // $DB_username = 'tyresmarket';
    // $DB_password = 'tyresmarket';
    $DB_hostname = '//localhost/XE';

    $conn = oci_connect($DB_username, $DB_password, $DB_hostname);

    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    else {
        echo "connected to database !";
        
        // only check

        $query = 'begin getUserName(:a, :b); end;';
        $stid = oci_parse($conn, $query);
        $x = 1;
        oci_bind_by_name($stid, ':a', $x);
        oci_bind_by_name($stid, ':b', $ym, 300);
        oci_execute($stid);

        // $row = oci_fetch_array($stid, OCI_BOTH); 
        var_dump($ym);
    }

?>