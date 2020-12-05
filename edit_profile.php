<?php session_start(); ?>

<?php 
    include 'fake_data.php';

    //echo 'hi';

    $user_id = $_SESSION["user"]["user_id"];
    $email = $_SESSION["user"]["email"];

    $predicted = false;

    if(isset($_POST['submit']))
    {
        include 'get_variable.php';
        $email = get_variable("email", "POST");
        $phone = get_variable("phone", "POST");
        $first_name = get_variable("first_name", "POST");
        $last_name = get_variable("last_name", "POST");

        // update in oracle
    }

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

        <div class="row">
            <div class="col-12 info">
                <form action="edit_profile.php" method="post">
                    <h1>Edit profile info</h1>
                    <ul class="info_edit">
                        <li> First Name <input name="first_name" type="text" value="<?php echo $users[$user_id]["first_name"]; ?>"> </li>
                        <li> Last Name <input name="last_name" type="text" value="<?php echo $users[$user_id]["last_name"]; ?>"> </li>
                        <li> Email <input name="email" type="text" value="<?php echo $email; ?>"> </li>
                        <li> Phone <input name="phone" type="text" value="<?php echo $email; ?>"> </li>
                    </ul>
                    <input class="btn btn-danger" name="submit" type="submit" value="Upload">
                </form>
            </div>
        </div>


    </div>


</body>

</html>