<?php session_start(); ?>

<?php
    include 'comment.php';
    include 'fetch_item.php';
    include 'get_variable.php';

    // update views

    $user_id = $_SESSION["user"]["USER_ID"];
    // $cars = fetch_cars($user_id);    

    $post_id = get_variable("post_id");
    $link = $_SERVER['REQUEST_URI'];

    // fetch post info + also user info etc.
    // var_dump($start_from);
    
    $in_wishlist = false;
    $views = 0;
    $interested = 0;

    $description = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis suscipit cumque, est,
    explicabo voluptates numquam deleniti et consectetur nostrum voluptatem esse pariatur aspernatur
    assumenda maxime quidem modi dignissimos dolore reprehenderit!";

    $images = array();
    $placeholder_image = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAANlBMVEX///+/v7+7u7vt7e3z8/P5+fn8/PzAwMDGxsbZ2dnV1dXw8PDDw8P19fXMzMzo6Oji4uLe3t6/AaFhAAAFa0lEQVR4nO2c7XqkIAyFK4riF+L93+wKTqduFRIdBWd63n/77FTgGEICwa8vAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGxQlnKmdxQ/9LJM3blolH0+mLrRWnVVlT0RK7Ks6rRuRjPkxQfr046Nyubx8nG/rzrVmFymHsDZFHW1T4wNcTpdm/5jbEbql/RYKlPpsf0EXcw5gjyFybTpU4/pNXp1kpEsZRHKvLG11Ocr8pClKVKP7Rh5d5EkThb9hlOobC5UZFbl3VZoc7EiTpU69Sj3cIVv3RIlG1KPlM1VvnVDlTdxK+2VvnWtyph6vDSX+9aVKF2eeswEeRVZEqtKc+cYLrqRfGNSj9xLXtG9v4bb+tpURjKrcsdgJZ2RPES5n6+NF5P4VdG38rVF1JjEz43i2vEeikymou7ia8/aXjyDe8S1skutw3+Irk2tyFebWoQVSeNa2eemTq3AJtHj2lIWkxZaVdnOU6x4iC7SClTK1oyN7qq9J3opEFV93WGQtYphkkJ19zWLbc4/JCvbHyXeSoolwh6SnbGXLScx1FtMEBZCvCiLNE33IVosEMcPPopRfZ4eM+LQ6lyOCbYN46EPmEjzqRbyoNurSH+nLO4axL4sKNnOclR27U22iTcNI7Fn8hSpOxuJHZOn/BtWMtGwNWlSdzUe3NRn+AvudYYbtpWpOxoTppf9QzNnMhTWoVjPmjnijimyONArVnyvGU3rehjyYRh1dhtdhFC1GfJ82JnEC0Zy3BLPE1mzXNT78RanfUIv91pLsyMvYcSylJmsHfUQp3gvgKhXL7vgq0JKIoOPep6S9IMxZige/zq5gH4nzzoTmdtOtQ99uCV0giy/DtawVrOTHnT1fdXosYOX8tjvEWK01o3MnVLjLBIvjaVDlNDUUc4szH/bTJN7caqk21hw3u3X/BXavXzeMT4Z3wdeuJNkyyJNQlGc5W/cBxJupKyIXFGa+B/Slb6pNbdPr+EX4BLbfPN/lGRaiiAkKb3PcC/E04SwgU+KZNr5gtzT50ry3hSliXfZca17HbATxde3C7HN+gMqa9mM5I3SxBvYq/CgXYVh/ERJhgdtJaNdCqVJ4XmCTZWCk8NOLUm1fjY1MTlcfZKinnJUE2sm4SpGlcBQJDVhbTJDGsrBuSMG0gqsJfkUvYiGtgL7E+oxB32s/TNqWdMcOz0T1luY3CxZNUVo4olPOOO1dhq3aIsxXmvg1HpIxmyb4aj1VeRWE6f5U7EvisyzGno5pneVthIna6X0mtZQWfXJ1KEQ8wkpHGebeuNdiynPHMnWrd4RY1k7Ftqpi5KIZXlFKBsPZrmKjmPL52HnKiMg68MhArPcYu1MBcd7O00iLjxMTYpg1wWzFH8tK99O7qdJH+o6+9LTOtPjaaLizx16nbNd98+diinJRqJpdynoi/WatQ6cx8hZ52y06fWxgl1YvV7P7d9SZxxubaR/dCI2bifbs8brXQzJaO2Hta6stCGP85WGJ13IBL6pA4nantKtYf0psC866bVzU6+/InYhPe1k7bKzHs6DXVcSlp+Lc9gzDMqfWRfe5jGRtAOzs6PP859v331/Fa/NT7nlFF5nOeeuFxBeDveZwgGChpLqenM4wdvhRA8S8ijslf5sQh6FPvZ8mdIfkUVo3Yf/BPRYPf1OpG+lv3zehvCdQEaazp6zcl4B1GVsixLtUnG50b7oUn8sbutEIabpDr/Lte7wQY32d1lQ7A+1LYstRLYuEUrCsLh5JYSOf+28H7UtgKl0nf7K+xNp9KSLyFRzow9ZAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC2+AdFqFBandxOZgAAAABJRU5ErkJggg==";
    for($i = 0; $i <= 10; $i++){
        array_push( $images, $placeholder_image );
    }

    $characteristics = [
        "a" => "A",
        "b" => "B",
        "c" => "C",
        "d" => "D",
        "e" => "E",
        "f" => "F",
        "g" => "G"
    ];

    // get all comments
    $comments = array();
    for($i = 1; $i<=10; $i++){
        $comment_id = -1;
        $new_comment = new comment($i, $comment_id, "lorem ".$i);
        // echo $new_comment->text;
        array_push($comments, $new_comment);
    }

    // post comment or reply
    if(isset($_POST['post_comment']))
    {
      post_comment( $user_id, $post_id, $_POST["comment"] );
    }
    if(isset($_POST['post_reply']))
    {
      post_reply( $user_id, $_POST["comment_id"], $_POST["reply"] );
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="views/style/car_detail.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    

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
                    <ul class="characterists">
                        <?php 
                            foreach($characteristics as $key => $value) {
                                echo '<li><a href="#" data-page="'.$value.'">'.$key.'</a></li>';
                            }
                        ?>
                    </ul>
                    <div class="description">
                        <h3>Description</h3>
                        <p class="description_text">
                            <?php
                                echo $description;
                            ?>
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 right_part">
                    <?php 
                        include 'photo_carousel.php';

                        start_carousel($images);

                    ?>
                        
                    <footer class='comments_section'>
                        
                        <form action="<?php echo $link ?>" method="post" name="form" id="form">
                            <div class='post_comment'>
                                <label for='comment'>Comments</label>
                                <div class="horizontal">
                                    <input required="required" id='comment' name="comment" placeholder="comment"
                                        type='text'>
                                    <input required="required" id="post_comment" type="submit" name="post_comment" value="Comment">
                                </div>
                            </div>
                        </form>

                        <div class="comments">
                            <?php
                                foreach($comments as $comment){
                            ?>
                                <div class="comment">

                                    <div class="comment_parent">
                                        <?php echo '<a href="profile.php?user_id='.$comment->author_id.'">'.$comment->get_email().'</a>' ?> 
                                        <!-- <a href="profile.php"> USERNAME </a> -->
                                        <p> <?php echo $comment->text ?> </p>

                                    <form action="<?php echo $link ?>" method="post" name="form" id="form">
                                        <div class='post_reply'>
                                            <div class="horizontal">
                                                <input required="required" id='reply' name="reply" placeholder="reply"
                                                    type='text'>
                                                <input required="required" id="post_reply" type="submit" name="post_reply" value="Reply">
                                                <input required="required" id="comment_id" type="hidden" name="comment_id" value="<?php echo $comment->comment_id ?>">
                                            </div>
                                        </div>
                                    </form>

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
                
                </div>

            </div>

        </div>

    </div>

</body>

</html>