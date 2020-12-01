<?php session_start(); ?>

<?php

    $user_id = $_SESSION["user"]["USER_ID"];

    add_new_car($user_id);

    function add_new_car($user_id){

        if( !empty($_POST['city']) )
        {
            $city = $_POST['city'];
            
            include 'connect.php';
        
            // query
            $query = "INSERT INTO CARS (car_id, user_id, city) VALUES (default, '$user_id', '$city')";
            // echo $query;
            // send me car_id

            $stid = oci_parse($conn, $query);
            echo oci_execute($stid, OCI_DEFAULT);

            oci_commit($conn);

            $car_id = -1;
            header("location: prediction_section.php?car_id=$car_id");
            /*
            else {
                echo '<p id="failed">Login Failed !</p>';
            }*/
        }
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

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

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
        <form action="add_new_car.php" method="post" name="form" id="form">
            <div id="cars" class="container right-container profile" style="overflow-y:scroll;">

                <h1> Let's predict cost of your car! First of all insert city </h1>

                <div class='set'>
                    <div class='pets-name'>
                        <label for='car_model'>Car Model</label>
                        <!-- add values which parsed by query _ id -->
                        <input required="required" id='city' name="city" placeholder="City" type='text'>
                        <input required="required" id="submit" type="submit" name="submit" value="Move">
                    </div>
                </div>

            </div>
        </form>
    </div>


    </body>
</html>