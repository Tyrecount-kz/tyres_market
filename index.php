
<?php session_start(); ?>
<?php require_once('header.php')?>
<?php require_once('prediction_section.php')?>
<?php require_once('profile.php')?>
<?php 

    // include('logout.php');
    var_dump($_SESSION['user']);
    
    if( empty($_SESSION['user'] ) ){
        header('location: login.php');
    }
    else{
        echo 'authorized';
    }

?>