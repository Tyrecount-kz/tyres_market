ca<?php session_start(); ?>

<?php

    $user_id = $_SESSION["user"]["USER_ID"];
    $cars = fetch_cars($user_id);

    function fetch_cars($user_id){
        include 'connect.php';
    
        // query
        // $query = "select * from cars where query_id = '$query_id'";
        $query = "select * from users";
        // echo $query;

        $stid = oci_parse($conn, $query);
        oci_execute($stid, OCI_DEFAULT);

        $cars = array();

        while( ($row = oci_fetch_array($stid, OCI_BOTH)) ){
            array_push($cars, $row);
        }

        return $cars;
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
        
        <?php include 'left_container_queries.php'; ?>

        <div id="car_detail" class="right-container" >

            <h1> Your car's detail <?php echo $_GET["car_id"] ?> </h1>
            
        </div>

    </div>

</body>
</html>