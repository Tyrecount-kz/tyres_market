<?php session_start(); ?>

<?php

    //echo 'hi';

    if(isset($_POST['submit']))
    {
      signup();
    }

    function signup(){

        if(!empty($_POST['email']) && !empty($_POST['password']))
        {
            $email = $_POST['email'];
            
            // encrypt password
            $password = $_POST['password'];
            $password = md5($password);
            
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];

            include 'connect.php';
        
            // query
            $query = "INSERT INTO USERS VALUES(default, '$first_name','$last_name','$city','$phone','$email','$password')";
            // echo $query;

            $stid = oci_parse($conn, $query);
            echo oci_execute($stid, OCI_DEFAULT);

            oci_commit($conn);
        
            //$_SESSION['user'] = $email;
            
            header('location: index.php');
            /*
            else {
                echo '<p id="failed">Login Failed !</p>';
            }*/
        }
    }


?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]>-->
<!--[if !IE]> <!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Signup</title>
	
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="views/style/form_style.css?ver=<?php echo rand(111,999)?>">
	

</head>
<body>

    
    <div class="wrapper">
        <div class="logo"></div>
        <div class="block">
            <form action="signup.php" method="post" name="form" id="form" >
                <h1>Tyres KZ <br> Signup</h1>
                <input name="first_name" type="text" value="" placeholder="First Name" id="first_name" />
                <input name="last_name" type="text" value="" placeholder="Last Name" id="last_name" />
                <input name="city" type="text" value="" placeholder="city" id="city" />
                <input name="phone" type="phone" value="" placeholder="phone" id="phone" />
                <input name="email" type="text" value="" placeholder="Email" id="email" />
                <input name="password" type="password" value="" placeholder="Password" id="password" />
                <input id="submit" type="submit" name="submit" value="Signup">
                <a href="login.php"> Already have an account ?</a>
            </form>
        </div>
    </div>


</body> 

</html>

