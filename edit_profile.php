<?php session_start(); ?>

<?php

    //echo 'hi';

    $predicted = false;

    if(isset($_POST['submit']))
    {
        header('location: prediction_section.php');
    }

    function add_new_car(){
        // add new car then call predict
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Profile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="views/style/prediction.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    <link href="views/style/php_log.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

</head>

<body>

    <?php require_once('header.php') ?>

    <div class='signup-container'>
        
        <?php include 'left_container_navbar.php'; ?>

        <div id="edit" class='right-container'>
            <header>
                <h1>Edit</h1>
            </header>
            <footer>
                <form action="prediction_result.php" method="post" name="form" id="form" >                 
                    <div class='set'>
                        <!-- <button id='back'>Back</button> -->
                        <h3> Check for different configurations ? </h3>
                        <input id="submit" type="submit" name="submit" value="Modify">
                    </div>
                </form>
            </footer>
        </div>

       
</body>
</html>