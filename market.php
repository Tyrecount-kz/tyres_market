<?php session_start(); ?>

<?php 
    include 'fake_data.php';

    //echo 'hi';

    $user_id = $_SESSION["user"]["user_id"];
    $email = $_SESSION["user"]["email"];

    $pagination = 1;
    include 'get_variable.php';
    $pagination = get_variable("pagination");

    include 'get_cars.php';
    $cars = get_carsPagination();

    $cars_len = count($cars);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Profile</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="views/style/php_log.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

    <link href="views/style/profile.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script> -->

</head>

<body>

    <?php require_once('header.php') ?>

    <div class="container wrapper">

        <div class="row cars" id="added_cars">

            <?php
                // $index = 0;
                foreach($cars as $car){
            ?>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">

                    <img class="card-img-top" src="" alt="Card image cap">

                    <div class="card-body">
                        <p class="card-text">
                            <a href="post_detail.php?post_id=<?php echo $car["POST_ID"]; ?>">
                            <?php echo $car["COMPANY"].' '.$car["MODEL"].' '.$car["POST_ID"]; ?>
                            </a>
                            <br>
                            <small>
                                <?php echo $car["CITY"]; ?>
                            </small>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <a href="post_detail.php?post_id=<?php echo $car["POST_ID"]; ?>">View</a>
                                </button>
                                <button type="button"
                                    class="btn btn-sm btn-outline-secondary">
                                    <a href="edit_post.php?post_id=<?php echo $car["POST_ID"]; ?>">Edit</a>
                                </button>
                            <small class="text-muted"> views <?php echo $car["VIEWS"]; ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                // $index += 1;
                }
            ?>

            <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                    $cars_per_block = 6;
                    $sections =  intdiv($cars_len, $cars_per_block);
                    // echo $sections;
                    // echo $cars_len % $cars_per_block;
                    if( $cars_len % $cars_per_block != 0 )
                        $sections = $sections + 1;

                    echo '<li class="page-item"><a class="page-link" href="market.php?pagination=0" class="active">1</a></li>';  
                    for ($i = 1; $i < $sections; $i++) {
                        $index = ($i+1);
                        echo '<li class="page-item"><a class="page-link" href="market.php?pagination='.($cars_per_block*$i).'>'.$index.'</a></li>';
                    }
                ?>
            </ul>
            </nav>

        </div>
    </div>


</body>

</html>