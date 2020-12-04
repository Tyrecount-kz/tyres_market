<?php session_start(); ?>

<?php

    // var_dump($_GET);

    $queryID = $_GET["queryID"];
    echo $queryID;

    $query_id = -1;
    if( isset( $_GET['query_id'] ) ){
        $query_id = $_GET['query_id'];
        echo '<div class="php_log">'.$query_id.'</div>';
    }

    $car_id = -1;

    if(isset($_POST['modify']))
    {
        echo '<div class="php_log">Mod '.$_POST['id'].'</div>';
        header('location: prediction_section.php?query_id='.$_POST['id']);
    }

    if( isset($_POST['delete']) ){
        delete_car();
    }

    function delete_car(){
        // add new car then call predict
        echo '<div class="php_log">DEL '.$_POST['id'].'</div>';
    }

    $in_market = true;
    $views = 0;
    $interested = 0;

    $description = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis suscipit cumque, est,
    explicabo voluptates numquam deleniti et consectetur nostrum voluptatem esse pariatur aspernatur
    assumenda maxime quidem modi dignissimos dolore reprehenderit!";

    $characteristics = [
        "a" => "A",
        "b" => "B",
        "c" => "C",
        "d" => "D",
        "e" => "E",
        "f" => "F",
        "g" => "G"
    ];

    $images = array();
    $placeholder_image = "data:image/png;base64,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";
    for($i = 0; $i < 3; $i++){
        array_push( $images, $placeholder_image );
    }

    include 'add_new_photos.php';
    add_new_photos($car_id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> My Car Info </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="views/style/prediction.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    <link href="views/style/php_log.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

    <link href="views/style/car_detail.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    <link href="views/style/statistics.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

    <link href="views/style/prediction_result.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

    <script>
        function preview_images() {
            var total_file = document.getElementById("images").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<div class='col-lg-3'><img class='img-responsive u_image' src='" + URL
                    .createObjectURL(event.target.files[i]) + "'></div>");
            }
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

</head>

<body>

    <?php require_once('header.php') ?>

    <div class='signup-container'>
        <?php require_once('left_container_navbar.php');  ?>
        <div class='right-container container'>

            <div class="row">
                <div class="left_part col col-md-6">

                    <canvas id="myChart" width="400" height="400"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');

                        var queries = [{
                                x: 1,
                                y: 1.6,
                                r: 10
                            },
                            {
                                x: 2,
                                y: 3.6,
                                r: 10
                            },
                            {
                                x: 3,
                                y: 2.3,
                                r: 10
                            },
                            {
                                x: 4,
                                y: 1.7,
                                r: 10
                            },
                            {
                                x: 5,
                                y: 2.9,
                                r: 10
                            },
                            {
                                x: 6,
                                y: 3.78,
                                r: 10
                            },
                            {
                                x: 7,
                                y: 8,
                                r: 10
                            },
                        ];

                        function getQuery(a, b) {
                            // console.log("query");
                            // console.log(a);
                            // console.log(b);

                            var index = b[0]['_index'];
                            console.log(queries[index]);

                            var theUrl = 'http://localhost/tyres/prediction_result.php?queryID=' + index;

                            window.location.replace(theUrl);

                        }

                        var car_info = "Toyota Camry";

                        var myBubbleChart = new Chart(ctx, {
                            type: 'bubble',
                            data: {
                                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                datasets: [{
                                    label: 'For ' + car_info,
                                    data: queries,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 5
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                },
                                evenrs: ['mousemove', 'click'],
                                onClick: getQuery,
                            }
                        });
                    </script>

                    <h5>Characteristics</h5>
                    <ul class="characteristics">
                        <?php 
                            foreach($characteristics as $key => $value) {
                                echo '<li><a href="#" data-page="'.$value.'">'.$key.'</a></li>';
                            }
                        ?>
                    </ul>

                    <!-- <div class="description">
                        <h3>Description</h3>
                        <p class="description_text">
                            <?php
                            //      echo $description;
                            ?>
                        </p>
                    </div> -->
                </div>

                <div class="right_part col col-md-6">

                    <!-- Statistics -->

                    <?php
                        if( $in_market == 0 ){
                    ?>

                    <section id="statistic" class="statistic-section one-page-section">
                        <div class="container">
                            <div class="row text-center">
                                <div class="col-xs-12 col-md-4">
                                    <div class="counter"><i class="fa fa-eye fa-x stats-icon"></i>
                                        <h2 class="timer count-title count-number"> <?php echo $views; ?> </h2>
                                        <!-- <div class="stats-line-black"></div> -->
                                        <!-- <p class="stats-text">Views</p> -->
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="counter"><i class="fa fa-bookmark fa-x stats-icon"></i>
                                        <h2 class="timer count-title count-number"> <?php echo $interested; ?> </h2>
                                        <!-- <div class="stats-line-black"></div> -->
                                        <!-- <p class="stats-text">Interested</p> -->
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="counter">
                                        <a href="delete_car.php?car_id=<?php echo $car_id; ?>">    
                                            <i class="fa fa-trash-o fa-x stats-icon"></i>
                                        </a>    
                                        <h2 class="timer count-title count-number"></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <?php
                        }
                        else{
                    ?>
                    <div class="add_to_market">
                        <?php
                            if( $query_id == $queryID ) {
                        ?>
                            <a href="to_market.php?delete=1?query_id=<?php echo $queryID; ?>?car_id=<?php echo $car_id ?>">    
                                <i class="fa fa-minus fa-x stats-icon"></i>
                            </a>
                        <?php
                            }
                            else{
                        ?>
                            <a href="to_market.php?delete=0?query_id=<?php echo $queryID; ?>?car_id=<?php echo $car_id ?>">    
                                <i class="fa fa-plus fa-x stats-icon"></i>
                            </a>
                        <?php
                            }
                        ?>
                    </div>
                    <?php
                        }    
                    ?>

                    <!-- Gallery -->
                    <div class="gallery">

                        <div class="container-fluid">
                            <?php
                                include 'photo_carousel.php';
                                show_uploaded_images($images, $car_id);
                            ?>
                        </div>

                        <div class="m_uploader">
                            <div class=" header">
                                <div class="file-upload btn btn-primary">
                                    <span>+</span>
                                    <input type="file" class="form-control upload" id="images" name="images[]"
                                        onchange="preview_images();" multiple />
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row" id="image_preview"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- <button onclick="on()" id="to_market" class="submit"> Add to market </button> -->

            <!-- <footer>
                <form action="prediction_result.php" method="post" name="form" id="form">
                    <div class='set'>
                        <?php include 'go_back.php' ?>
                        <h3> Check for different configurations ? </h3>
                        <input id="modify" type="submit" name="modify" value="Modify">
                        <input id="delete" type="submit" name="delete" value="Delete">
                        <input type="hidden" name="id" value="<?php echo $query_id; ?>" />
                    </div>
                </form>
            </footer> -->
        </div>
    </div>


    <?php require_once('overlay_queries.php') ?>

</body>

</html>