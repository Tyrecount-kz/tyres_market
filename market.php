<?php session_start(); ?>

<?php

    $user_id = $_SESSION["user"]["USER_ID"];
    $cars = fetch_cars($user_id);

    include 'get_variable.php';
    $start_from = get_variable("start_from");
    if( $start_from == null ){
        $start_from = 0;
    }

    // var_dump($start_from);

    
    include 'fetch_item.php';
    // use START_FROM
    $query = "select count(*) as CARS_LEN from users";
    $cars_len = fetch_item($query);
    $cars_len = $cars_len["CARS_LEN"];


    // var_dump( $cars_len );

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
    <link href="views/style/market.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
<!-- 
    <script src="filter.js"></script>
    <script src="search.js"></script> -->

</head>

<body>

    <?php require_once('header.php') ?>

    <div class='signup-container'>
        
        <?php include 'left_container_navbar.php'; ?>

        <!-- <div class="row">
            <div class="col-12">
                <h1>My cars</h1>
            </div>
        </div> -->

        <div id="cars" class="container right-container profile"  style="overflow-y:scroll;">

            <div class="row">
                <input type="text" id="myInput" placeholder="Search for names..">
            </div>

            <div class="row">

                <div id="myBtnContainer">
                    <button class="btn active" onclick="filterSelection('all')"> Show all</button>
                    <button class="btn" onclick="filterSelection('cars')"> Cars</button>
                    <button class="btn" onclick="filterSelection('animals')"> Animals</button>
                    <button class="btn" onclick="filterSelection('fruits')"> Fruits</button>
                    <button class="btn" onclick="filterSelection('colors')"> Colors</button>
                </div>

            </div>

            <div class="row">
                <div class="car col-md-3 col-lg-3">
                    <a href="add_new_car.php?"> + </a>
                </div>

            <?php
                $index = 1;
                foreach($cars as $car){
                    if( $index % 3 == 0 )
                        echo "<div class='row'>";
            ?>

                <div class="car col-md-3 col-lg-3">
                    <h3> <?php echo $car["FIRST_NAME"]; ?> </h3>
                    <img 
                        src="data:image/png;base64,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"
                        alt=""
                        class="car_image"
                    >
                    <a href="post_detail.php?post_id=<?php echo $car["USER_ID"]; ?>"> review </a>
                </div>
                
            <?php 
                $index += 1;
                if( $index % 3 == 0 )
                    echo "</div>";
            }
            if( $index % 3 != 0 ){
                echo "</div>";
            }
            ?>
            
            <div class="pagination">

                <?php
                    $cars_per_block = 5;
                    $sections =  intdiv($cars_len, $cars_per_block);
                    // echo $sections;
                    // echo $cars_len % $cars_per_block;
                    if( $cars_len % $cars_per_block != 0 )
                        $sections = $sections + 1;

                    echo '<a href="market.php?start_from=0" class="active">1</a>';  
                    for ($i = 1; $i < $sections; $i++) {
                        $index = ($i+1);
                        echo '<a href="market.php?start_from'.($cars_per_block*$i).'>'.$index.'</a>';
                    }
                ?>

            </div>
            
        </div>

        

    </div>
</body>
</html>