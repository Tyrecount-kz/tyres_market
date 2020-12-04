
<?php session_start(); ?>

<?php 

    // include('logout.php');
    var_dump($_SESSION['user']);
    
    if( empty($_SESSION['user'] ) ){
        header('location: login.php');
    }
    else{
        echo 'authorized';
        header("location: profile.php");
    }

?>