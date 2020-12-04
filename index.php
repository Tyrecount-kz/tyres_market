<?php session_start(); ?>

<?php 

    // include('logout.php');
    // var_dump($_SESSION['user']);
    
    if( empty($_SESSION['user'] ) ){
        header('location: login.php');
    }
    else{
        // echo 'authorized';
        // header("location: profile.php");
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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Template Main CSS File
    <link href="views/style/prediction.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    <link href="views/style/php_log.css?ver=<?php echo rand(111,999)?>" rel="stylesheet"> -->

    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

</head>

<body>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>My First Bootstrap 4 Page</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div>

    <?php require_once('header.php') ?>

    <div class="container" style="margin-top:30px">
        <div class="row">

            <div class="col-12">
                <h1> Let's start </h1>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6">
                <a href="add_new_car.php" class="btn btn-lg btn-primary"> Sell a Car ? </a>
            </div>
            <div class="col-lg-6">
                <a href="market.php" class="btn btn-lg btn-primary"> Buy a Car ? </a>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>Footer</p>
    </div>

</body>

</html>