<?php session_start(); ?>

<?php

    $user_id = $_SESSION["user"]["USER_ID"];
    // $cars = fetch_cars($user_id);    

    include 'get_variable.php';

    // var_dump($start_from);

    
    include 'fetch_item.php';
    
    
    // function fetch_cars($user_id){
    //     include 'connect.php';
    
    //     // query
    //     // $query = "select * from cars where query_id = '$query_id'";
    //     $query = "select * from users";
    //     // echo $query;

    //     $stid = oci_parse($conn, $query);
    //     oci_execute($stid, OCI_DEFAULT);

    //     $cars = array();

    //     while( ($row = oci_fetch_array($stid, OCI_BOTH)) ){
    //         array_push($cars, $row);
    //     }

    //     return $cars;
    // }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Profile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="views/style/prediction.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    <link href="views/style/php_log.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

</head>

<body>

    <?php require_once('header.php') ?>

    <div class='signup-container'>

        <div id="cars" class="container right-container car_detail" style="overflow-y:scroll;">

            <header>
                <?php require_once('go_back.php'); ?>

                <div class='buttons'>
                    <button class="simple_buttons"> Wishlist </button>
                    <button class="simple_buttons"> Wishlist </button>
                    <button class="simple_buttons"> Wishlist </button>
                </div>
            </header>

            <div class="row">

                <div class="col-lg-6 left_part">
                    <h1>hello</h1>
                    <ul>
                        <li><a href="#" data-page="1">Lorem ipsum</a></li>
                        <li><a href="#" data-page="4">Delectus, sint</a></li>
                        <li><a href="#" data-page="5">Vel, illo</a></li>
                        <li><a href="#" data-page="8">Dolorem, excepturi</a></li>
                        <li><a href="#" data-page="11">Ab, reprehenderit</a></li>
                        <li><a href="#" data-page="13">Ipsum, adipisci</a></li>
                        <li><a href="#" data-page="17">Cumque, totam</a></li>
                        <li><a href="#" data-page="20">Incidunt, alias</a></li>
                        <li><a href="#" data-page="21">Itaque, necessitatibus</a></li>
                        <li><a href="#" data-page="25">Quidem, qui</a></li>
                    </ul>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis suscipit cumque, est,
                        explicabo voluptates numquam deleniti et consectetur nostrum voluptatem esse pariatur aspernatur
                        assumenda maxime quidem modi dignissimos dolore reprehenderit!
                    </p>
                </div>

                <div class="col-lg-6 right_part">
                    <?php require_once('photo_carousel.php') ?>

                    <form action="car_detail.php" method="post" name="form" id="form">
                        <footer class='comments_section'>
                            <div class='post_comment'>
                                <label for='comment'>Comment</label>
                                <div class="horizontal">
                                    <input required="required" id='comment' name="comment" placeholder="comment"
                                        type='text'>
                                    <input required="required" id="submit" type="submit" name="submit" value="wishlist">
                                </div>
                            </div>
                            <div class="comments">
                                
                            </div>
                        </footer>
                    </form>

                </div>


            </div>

        </div>



    </div>
</body>

</html>