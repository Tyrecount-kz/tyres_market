<?php

    include 'get_variable.php';

    $query_id = get_variable("query_id");
    echo $query_id;

    include 'fetch_item.php';
    
    $sql_query = "select * from users where user_id = '$query_id'";
    $query = fetch_item( $sql_query );    
    
    $car_id = get_variable("car_id");

    // var_dump($query);

    if(isset($_POST['submit']))
    {
        echo '<div class="php_log"> to true </div>';
        $predicted = true;
        
        echo '<div class="php_log">';

            var_dump( $_POST );
        
        echo '</div>';
        predict();
        header('location: prediction_result.php');

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

<form class="" action="prediction_section.php" method="post" name="form" id="form" >

    <div class='right-container details_form'>
            <header>
                <h3 class="hs">3. Review and Submit Payment</h3>
                
                <div class='set'>
                    <div class='form_block'>
                        <label for='shell'>shell</label>
                        <input
                            <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?>
                                required="required" id='shell' name="shell" placeholder='shell' type='text'>                            
                    </div>
                    <div class='form_block'>
                        <label for='release_year'>release_year</label>
                        <input
                            <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?>
                                required="required" id='release_year' name="release_year" placeholder="release_year" type='text'>
                    </div>
                    
                    <div class='form_block'>
                        <label for='mileage'>mileage</label>
                        <input
                            <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?>
                                required="required" id='mileage' name ="mileage" placeholder='mileage' type='text'>                            
                    </div>

                </div>

                <div class='set'>
                    <div class='form_block'>
                        <label for='rudder'>rudder</label>
                        <input
                            <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?>
                                required="required" id='rudder' name="rudder" placeholder="rudder" type='text'>
                    </div>
                    
                    <div class='form_block'>
                        <label for='color'>color</label>
                        <input
                            <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?>
                                required="required" id='color' name="color" placeholder='color' type='text'>                            
                    </div>
                    <div class='form_block'>
                        <label for='gear'>gear</label>
                        <input
                            <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?>
                                required="required" id='gear' name="gear" placeholder="gear" type='text'>
                    </div>
                </div>

                <div class='set'>
                    <div class='form_block'>
                        <label for='engine_volume'>engine_volume</label>
                        <input
                            <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?>
                                required="required" id='engine_volume' name='engine_volume' placeholder='engine_volume' type='text'>                            
                    </div>
                    <div class='form_block'>
                        <label for='custom_clear'>custom_clear</label>
                        <input
                            <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?>
                                required="required" id='custom_clear' name='custom_clear' placeholder="custom_clear" type='text'>
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
    </div>
</form>