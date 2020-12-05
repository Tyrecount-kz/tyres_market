<?php

    $DB_username = 'tyres';
    $DB_password = 'tyres';
    // $DB_username = 'tyresmarket';
    // $DB_password = 'tyresmarket';
    $DB_hostname = '//localhost/XE';

    $conn = oci_connect($DB_username, $DB_password, $DB_hostname, 'AL32UTF8');

    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    else {
        // echo "connected to database !";
        
        // only check
        $query = "declare
        userInfo information1.userInfoList;
    begin
        information1.getUserInfo(1,userInfo);
        DBMS_OUTPUT.put_line(userInfo(1).first_name);
    end;";
        $stid = oci_parse($conn, $query);
        // $query = 'begin getUserName(:a, :b); end;';
        $x = 1;
        // $ym = 
        // oci_bind_by_name($stid, ':a', $x);
        // oci_bind_by_name($stid, ':b(1).first_name', $ym, 150);
        // oci_bind_by_name($stid, ':b(1).last_name', $qm, 150);
        // oci_bind_by_name($stid, ':b(1).phone', $wm, 150);
        // oci_bind_by_name($stid, ':b(1).email', $em, 150);
    
        oci_execute($stid);
        
        // $arr = array();
        // array_push($arr, $ym);
        // array_push($arr, $qm);
        // array_push($arr, $wm);
        // array_push($arr, $em);

        // var_dump($arr);

    }

?>