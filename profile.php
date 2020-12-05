<?php session_start(); ?>

<?php 
    include 'fake_data.php';

    //echo 'hi';

    $user_id = $_SESSION["user"]["user_id"];
    $email = $_SESSION["user"]["email"];

    function get_user_data($user_id){
        include 'connect.php';

        $query = '
        declare 
            userInfo information1.userInfoList;
            a users.first_name%type;
            b users.last_name%type;
            c users.phone%type;
        begin 
            information1.getUserInfo(:a, userInfo);
            :b := userInfo(1).first_name;
            :c := userInfo(1).last_name;
            :d := userInfo(1).phone;
        end;';

        $stid = oci_parse($conn, $query);
        
        $user_data = array();

		oci_bind_by_name($stid, ':a', $user_id);
		oci_bind_by_name($stid, ':b', $user_data['first_name'], 150);
		oci_bind_by_name($stid, ':c', $user_data['last_name'], 150);
		oci_bind_by_name($stid, ':d', $user_data['phone'], 150);
    
        oci_execute($stid);
        
        // var_dump($first_name);
        var_dump($user_data);
        return $user_data;
    }

    // get_user_data($user_id);
    $user_data = get_user_data(1);
    // var_dump($user_data);


    // function get_data(){

    //     //Bind Cursor     put -1
    //     oci_bind_by_name($stid, ':cursor', $p_cursor, -1, OCI_B_CURSOR);

    //     // Execute Statement
    //     oci_execute($stid);
    //     oci_execute($p_cursor, OCI_DEFAULT);

    //     oci_fetch_all($p_cursor, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
    //     echo '<br>';
    //     print_r($cursor[3]);
    // }

    if(isset($_POST['submit']))
    {
        header('location: prediction_section.php');
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Profile</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="views/style/php_log.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

    <link href="views/style/profile.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

</head>

<body>

    <?php require_once('header.php') ?>

    <div class="container wrapper">
    
        <div class="row">
            <div class="col-6">
                <ul class="main_info">
                    <li> <b><?php echo $user_data["first_name"].' '.$user_data["last_name"]; ?> </b> </li>
                    <li> <b>Email: </b> <?php echo $email; ?> </li>
                    <li> <b>Phone: </b> <?php echo $user_data['phone']; ?> </li>
                    <li> <a href="profile.php#added_cars"> Number of cars in market <?php echo 1; ?> </a></li>
                    <li> <a href="#"> Number of cars in wishlist <?php echo 1; ?> </a> </li>
                    <li> <a href="edit_profile.php"> edit profile </a> </li>
                    <li> <a href="add_new_car.php"> add car </a> </li>
                </ul>
            </div>
            <div class="col-6">    
                <a href="add_new_car.php"> Add car ?  </a>
            </div>
        </div>
            
        <?php require_once("wishlist.php"); ?>

        <?php require_once("profile_cars.php"); ?>

    </div>

       
</body>
</html>