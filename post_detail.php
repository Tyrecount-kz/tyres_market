<?php session_start(); ?>

<?php

    // update views

    $user_id = $_SESSION["user"]["USER_ID"];
    // $cars = fetch_cars($user_id);    

    include 'get_variable.php';
    $post_id = get_variable("post_id");

    // var_dump($start_from);

    include 'comment.php';

    $comments = array();
    for($i = 1; $i<=10; $i++){
        $new_comment = new comment($i, "lorem ".$i);
        // echo $new_comment->text;
        array_push($comments, $new_comment);
    }

    include 'fetch_item.php';
    
    $in_wishlist = false;
    $views = 0;
    $interested = 0;

    $description = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis suscipit cumque, est,
    explicabo voluptates numquam deleniti et consectetur nostrum voluptatem esse pariatur aspernatur
    assumenda maxime quidem modi dignissimos dolore reprehenderit!";

    

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="views/style/statistics.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

</head>

<body>

    <?php require_once('header.php') ?>

    <div class='signup-container'>

        <div id="cars" class="container right-container car_detail" style="overflow-y:scroll;">

            <header>
                <?php require_once('go_back.php'); ?>
                
                <h1>hello</h1>

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

                                    <?php
                                        if( $in_wishlist == false ){
                                    ?>
                                        <a href="add_to_wishlist.php?post_id=<?php echo $post_id; ?>">    
                                            <i class="fa fa-heart-o fa-x stats-icon"></i>
                                        </a>
                                    <?php
                                       }
                                       else{
                                    ?>
                                        <a href="add_to_wishlist.php?is_delete=1?post_id=<?php echo $post_id; ?>">    
                                            <i class="fa fa-heart fa-x stats-icon"></i>
                                        </a>
                                    <?php
                                        }
                                    ?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </header>

            <div class="row">

                <div class="col-lg-6 left_part">
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
                    <div class="description">
                        <h3>Description</h3>
                        <p class="text">
                            <?php
                                echo $description;
                            ?>
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 right_part">
                    <?php require_once('photo_carousel.php') ?>

                    <form action="post_detail.php" method="post" name="form" id="form">
                        <footer class='comments_section'>
                            <div class='post_comment'>
                                <label for='comment'>Comment</label>
                                <div class="horizontal">
                                    <input required="required" id='comment' name="comment" placeholder="comment"
                                        type='text'>
                                    <input required="required" id="submit" type="submit" name="submit" value="Comment">
                                </div>
                            </div>
                            <div class="comments">
                                <?php
                                    foreach($comments as $comment){
                                ?>
                                    <div class="comment">
                                    
                                        <div class="comment_parent">
                                            <?php echo '<a href="profile.php?user_id='.$comment->author_id.'">'.$comment->get_email().'</a>' ?> 
                                            <!-- <a href="profile.php"> USERNAME </a> -->
                                            <p> <?php echo $comment->text ?> </p>

                                            <div class="comment_replies">
                                                                
                                                <?php
                                                    // foreach($comment->get_replies() as $reply){
                                                    foreach($comments as $reply){
                                                ?>
                                                    <div class="reply">
                                                        <?php echo '<a href="profile.php?user_id='.$reply->author_id.'">'.$comment->get_email().'</a>' ?> 
                                                        <!-- <a href="profile.php"> USERNAME </a> -->
                                                        <p> <?php echo $reply->text ?> </p>
                                                    </div>
                                                <?php
                                                    }
                                                ?>

                                            </div>

                                        </div>

                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </footer>
                    </form>

                </div>


            </div>

        </div>

    </div>

    <script>
        $(document).ready(function($) {
            $('.count-number').counterUp({
                delay: 10,
                time: 10000
            });
        });
    </script>

</body>

</html>