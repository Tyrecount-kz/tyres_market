<?php

function get_variable($var_name, $type = "GET") {

    $value = null;

    if ($type == "GET") {

        // echo $_GET["query_id"];
        if (isset($_GET[$var_name])) {
            $value = $_GET[$var_name];
            echo '<div class="php_log">'.$value.
            '</div>';
        }

    } else {
        // echo $_POST["query_id"];
        if (isset($_POST[$var_name])) {
            $value = $_POST[$var_name];
            echo '<div class="php_log">'.$value.
            '</div>';
        }
    }

    return $value;

} 

?>