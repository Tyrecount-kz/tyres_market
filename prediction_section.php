<?php session_start(); ?>

<?php

    //echo 'hi';

    $predicted = false;

    if(isset($_POST['submit']))
    {
        echo '<div class="php_log"> to true </div>';
        $predicted = true;
        // predict();
        header('location: prediction_result.php');

    }

    function add_new_car(){
        // add new car then call predict
    }

    function predict(){

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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Arsha Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="arsha/assets/vendor/bootstrap/css/bootstrap.min.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="views/style/prediction.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    <link href="views/style/php_log.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

</head>

<body>
    <div class='signup-container'>
        <div class='left-container'>
            <h1>
                All predictions for this car
            </h1>
            <div class='puppy'>
                <h3> There will be your queries </h3>
            <!-- <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/38816/image-from-rawpixel-id-542207-jpeg.png'> -->
            </div>
        </div>
        <div class='right-container'>
            <form action="prediction_section.php" method="post" name="form" id="form" >
                <header>
                    <h1>Yay, let's predict your car's price</h1>
                    <div class='set'>
                        <div class='pets-name'>
                        <label for='pets-name'>Name</label>
                        <input id='pets-name' placeholder="Pet's name" type='text'>
                        </div>
                    </div>
                    <div class='set'>
                        <div class='pets-breed'>
                        <label for='pets-breed'>Breed</label>
                        <input id='pets-breed' placeholder="Pet's breed" type='text'>
                        </div>
                        <div class='pets-birthday'>
                        <label for='pets-birthday'>Birthday</label>
                        <input id='pets-birthday' placeholder='MM/DD/YYYY' type='text'>
                        </div>
                    </div>
                    <div class='set'>
                        <div class='pets-gender'>
                        <label for='pet-gender-female'>Gender</label>
                        <div class='radio-container'>
                            <input checked='' id='pet-gender-female' name='pet-gender' type='radio' value='female'>
                            <label for='pet-gender-female'>Female</label>
                            <input id='pet-gender-male' name='pet-gender' type='radio' value='male'>
                            <label for='pet-gender-male'>Male</label>
                        </div>
                        </div>
                        <div class='pets-spayed-neutered'>
                        <label for='pet-spayed'>Spayed or Neutered</label>
                        <div class='radio-container'>
                            <input checked='' id='pet-spayed' name='spayed-neutered' type='radio' value='spayed'>
                            <label for='pet-spayed'>Spayed</label>
                            <input id='pet-neutered' name='spayed-neutered' type='radio' value='neutered'>
                            <label for='pet-neutered'>Neutered</label>
                        </div>
                        </div>
                    </div>
                    <div class='pets-weight'>
                        <label for='pet-weight-0-25'>Toplivo</label>
                        <div class='radio-container'>
                        <input checked='' id='pet-weight-0-25' name='pet-weight' type='radio' value='0-25'>
                        <label for='pet-weight-0-25'>0-25 lbs</label>
                        <input id='pet-weight-25-50' name='pet-weight' type='radio' value='25-50'>
                        <label for='pet-weight-25-50'>25-50 lbs</label>
                        <input id='pet-weight-50-100' name='pet-weight' type='radio' value='50-100'>
                        <label for='pet-weight-50-100'>50-100 lbs</label>
                        </div>
                    </div>
                </header>
                <footer>
                    <div class='set'>
                        <!-- <button id='back'>Back</button> -->
                        <h3> Are you ready ? </h3>
                        <input id="submit" type="submit" name="submit" value="Predict">
                    </div>
                </footer>
            </form>
        </div>
    </div>

</body>
</html>