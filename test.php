<pre>
<?php
$conn=oci_connect("tyres", "tyres", "localhost/XE", 'AL32UTF8');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}

    $stid = oci_parse($conn, 'begin :cursor := newTestFunction(2); end;');
    $p_cursor = oci_new_cursor($conn);

    //Bind Cursor     put -1
    oci_bind_by_name($stid, ':cursor', $p_cursor, -1, OCI_B_CURSOR);

    // Execute Statement
    oci_execute($stid);
    oci_execute($p_cursor, OCI_DEFAULT);

    oci_fetch_all($p_cursor, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
    echo '<br>';
    print_r($cursor[3]);
?>  