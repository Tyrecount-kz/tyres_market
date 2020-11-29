<?php session_start(); ?>
<?php
    $_SESSION['user'] = '';

    echo $_SESSION['user'];
    header("location: index.php");
?>