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
        
        // $query = 'declare 
        //     userInfo information1.userInfoList;
        //     a users.first_name%type;
        // begin information1.getUserInfo(:a, userInfo);
        //  :b := userInfo(1).first_name;end;';
        // $stid = oci_parse($conn, $query);
        // $x = 1;
		// oci_bind_by_name($stid, ':a', $x);
		// oci_bind_by_name($stid, ':b', $ym, 150);
    
        // oci_execute($stid);
        
        // var_dump($ym);

    }

?>