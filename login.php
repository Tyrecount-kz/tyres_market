<?php session_start(); ?>

<?php

    //echo 'hi';

    if(isset($_POST['submit']))
    {
        login();
    }

    function login(){

        if(!empty($_POST['email']) && !empty($_POST['password']))
        {
            $email = $_POST['email'];
            
            // encrypt the password
            $password = $_POST['password'];
            $password = md5($password);

            include 'connect.php';

            // query
            $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $stid = oci_parse($conn, $query);
            oci_execute($stid);

            $row = oci_fetch_array($stid, OCI_BOTH); 
            //var_dump($row);

            
            if($email === $row['EMAIL'] && $password === $row['PASSWORD']) {
                $_SESSION['user'] = $email;
                echo $row['FIRST_NAME'];
                
                header('location: index.php');
            }
            else {
                echo '<p id="failed">Login Failed !</p>';
            }
        }
    }


?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]>-->
<!--[if !IE]> <!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Login</title>
	
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="views/style/form_style.css?ver=<?php echo rand(111,999)?>">
	

</head>
<body>

    
    <div class="wrapper">
        <div class="logo"></div>
        <div class="block">
            <form action="login.php" method="post" name="loginform" id="loginform" >
                <h1>Tyres KZ <br> login</h1>
                <input name="email" type="text" value="" placeholder="Email" id="email" />
                <input name="password" type="password" value="" placeholder="Password" id="password" />
                <input id="submit" type="submit" name="submit" value="Login">
                <a href="signup.php"> Do not have account ?</a>
            </form>
        </div>
    </div>


</body> 

</html>

