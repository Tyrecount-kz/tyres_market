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

    <title>Arsha Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="arsha/assets/vendor/bootstrap/css/bootstrap.min.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="views/style/prediction.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    <link href="views/style/php_log.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

</head>

<body>
    <div class='signup-container'>
        <div class='left-container'>
            <h1>
                All predictions for current car
            </h1>
            <div class='puppy'>
                <h3> There will be your queries </h3>
            <!-- <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/38816/image-from-rawpixel-id-542207-jpeg.png'> -->
            </div>
        </div>
        <div class='right-container'>
            
            <form action="prediction_result.php" method="post" name="form" id="form" >
                <header>
                    <h1>Result</h1>
                    
                </header>
                <footer>
                    <div class='set'>
                        <!-- <button id='back'>Back</button> -->
                        <h3> Check for different configurations ? </h3>
                        <input id="submit" type="submit" name="submit" value="Modify">
                    </div>
                </footer>
            </form>
       
        </div>
    </div>

</body>
</html>