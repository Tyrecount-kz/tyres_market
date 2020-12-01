<?php session_start(); ?>

<?php

    $query_id = -1;
    if( isset( $_GET['query_id'] ) ){
        $query_id = $_GET['query_id'];
        echo '<div class="php_log">'.$query_id.'</div>';
    }

    $predicted = false;

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

    <!-- Template Main CSS File -->
    <link href="views/style/prediction.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    <link href="views/style/php_log.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

</head>

<body>

    <?php require_once('header.php') ?>

    <div class='signup-container'>
        <?php require_once('left_container_queries.php');  ?>
        <div class='right-container'>
            <header>
                <h1>Result</h1>
                <button  onclick="on()" id="to_market" class="submit"> Add to market </button>
            </header>
            <footer>
                <form action="prediction_result.php" method="post" name="form" id="form" >                 
                    <div class='set'>
                        <?php include 'go_back.php' ?>
                        <h3> Check for different configurations ? </h3>
                        <input id="modify" type="submit" name="modify" value="Modify">
                        <input id="delete" type="submit" name="delete" value="Delete">
                        <input type="hidden" name="id" value="<?php echo $query_id; ?>" />
                    </div>
                </form>
            </footer>
        </div>
    </div>

    
    <?php require_once('overlay_queries.php') ?>

</body>
</html>