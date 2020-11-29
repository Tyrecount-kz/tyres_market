<?php session_start(); ?>

<?php 

    //include('logout.php');
    var_dump($_SESSION['user']);
    
    if( empty($_SESSION['user'] ) ){
        header('location: login.php');
    }
    else{
        echo 'authorized';
    }

?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]>-->
<!--[if !IE]> <!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>HOME</title>
	
    <!-- <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> -->
    <!-- <link rel="stylesheet" type="text/css" href="views/style/form_style.css?ver=<?php echo rand(111,999)?>">
	 -->

</head>
<body>

    
    <div class="wrapper">
    
        <a href="logout.php"> Logout </a>

    </div>


</body> 

</html>

