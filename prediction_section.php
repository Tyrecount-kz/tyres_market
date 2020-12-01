<?php session_start(); ?>

<?php

    //echo 'hi';

    $predicted = false;

    if(isset($_POST['submit']))
    {
        echo '<div class="php_log"> to true </div>';
        $predicted = true;
        
        echo '<div class="php_log">';

            var_dump( $_POST );
        
        echo '</div>';
        predict();
        // header('location: prediction_result.php');

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
           
        

            // $first_name = $_POST['first_name'];
            // $last_name = $_POST['last_name'];
            // $phone = $_POST['phone'];
            // $city = $_POST['city'];

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

    <!-- Template Main CSS File -->
    <link href="views/style/prediction.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    <link href="views/style/php_log.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

</head>

<body>

    <?php require_once('header.php');  ?>

    <div class='signup-container'>
        <?php require_once('left_container_queries.php') ?>
        <form action="prediction_section.php" method="post" name="form" id="form" >
            <div class='right-container'>
                    <header>
                        <h1>Yay, let's predict your car's price</h1>
                        <div class='set'>
                            <div class='pets-name'>
                                <label for='car_model'>Car Model</label>
                                <input required="required" id='car_model' name="car_model" placeholder="Car Model" type='text'>
                            </div>
                        </div>
                        <div class='set'>
                            <div class='pets-breed'>
                                <label for='shell'>shell</label>
                                <input required="required" id='shell' name="shell" placeholder='shell' type='text'>                            
                            </div>
                            <div class='pets-birthday'>
                                <label for='release_year'>release_year</label>
                                <input required="required" id='release_year' name="release_year" placeholder="release_year" type='text'>
                            </div>
                            
                            <div class='pets-breed'>
                                <label for='mileage'>mileage</label>
                                <input required="required" id='mileage' name ="mileage" placeholder='mileage' type='text'>                            
                            </div>

                        </div>

                        <div class='set'>
                            <div class='pets-birthday'>
                                <label for='rudder'>rudder</label>
                                <input required="required" id='rudder' name="rudder" placeholder="rudder" type='text'>
                            </div>
                            
                            <div class='pets-breed'>
                                <label for='color'>color</label>
                                <input required="required" id='color' name="color" placeholder='color' type='text'>                            
                            </div>
                            <div class='pets-birthday'>
                                <label for='gear'>gear</label>
                                <input required="required" id='gear' name="gear" placeholder="gear" type='text'>
                            </div>
                        </div>

                        <div class='set'>
                            <div class='pets-breed'>
                                <label for='engine_volume'>engine_volume</label>
                                <input required="required" id='engine_volume' name='engine_volume' placeholder='engine_volume' type='text'>                            
                            </div>
                            <div class='pets-birthday'>
                                <label for='custom_clear'>custom_clear</label>
                                <input required="required" id='custom_clear' name='custom_clear' placeholder="custom_clear" type='text'>
                            </div>
                        </div>
                        <div class='pets-weight'>
                            <label for='transmission_variant1'>Toplivo</label>
                            <div class='radio-container'>
                                <input required="required" checked='' id='transmission_variant1' name='transmission' type='radio' value='transmission_variant1'>
                                <label for='transmission_variant1'>transmission_variant1</label>
                                <input required="required" id='transmission_variant2' name='transmission' type='radio' value='transmission_variant2'>
                                <label for='transmission_variant2'>transmission_variant1</label>
                                <input required="required" id='transmission_variant3' name='transmission' type='radio' value='transmission_variant3'>
                                <label for='transmission_variant3'>transmission_variant1</label>
                            </div>
                        </div>
                    </header>
                    <footer>
                        <div class='set'>
                            <!-- <button id='back'>Back</button> -->
                            <h3> Are you ready ? </h3>
                            <input required="required" id="submit" type="submit" name="submit" value="Predict">
                        </div>
                    </footer>
            </div>
        </form>
    </div>

</body>
</html>