<?php

    include 'get_variable.php';

    $query_id = get_variable("query_id");
    echo $query_id;

    include 'fetch_item.php';
    
    $sql_query = "select * from users where user_id = '$query_id'";
    $query = fetch_item( $sql_query );    
    
    $car_id = get_variable("car_id");

    // var_dump($query);

?>

<form class="" action="prediction_section.php" method="post" name="form" id="form">

    <div class='right-container details_form'>
        <header>
            <h3 class="hs">3. Review and Submit Payment</h3>

            <div class='set'>
                <div class='form_block'>
                    <label for='shell'>shell</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?> required="required" id='shell' name="shell" placeholder='shell' type='text'>
                </div>
                <div class='form_block'>
                    <label for='release_year'>release_year</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?> required="required" id='release_year' name="release_year" placeholder="year"
                        type='number' min="1900" max="2021">
                </div>

                <div class='form_block'>
                    <label for='mileage'>mileage (only in km)</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?> required="required" id='mileage' name="mileage" placeholder='mileage' type='number'>
                </div>

            </div>

            <div class='set'>
                <div class='form_block'>
                    <div class='pets-weight'>
                        <label for='rudder'>Rudder</label>
                        <div class='radio-container'>
                            <input required="required" checked='' id='left' name='rudder' type='radio'
                                value='left'>
                            <label for='left'>left</label>
                            <input required="required" id='right' name='rudder' type='radio'
                                value='right'>
                            <label for='right'>right</label>
                        </div>
                    </div>    
            </div>

                <div class='form_block'>
                    <label class="color_label" for='color'>color</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["COLOR"].'" '; 
                                }
                            ?> required="required" id='color' name="color" placeholder='color' type='color'>
                </div>
                <div class='form_block'>
                    <label for='gear'>gear</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?> required="required" id='gear' name="gear" placeholder="gear" type='text'>
                </div>
            </div>

            <div class='set'>
                <div class='form_block'>
                    <label for='engine_volume'>engine_volume</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?> required="required" id='engine_volume' name='engine_volume' placeholder='engine_volume'
                        type='text'>
                </div>
                <div class='form_block'>
                    <label for='city'>city</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["city"].'" '; 
                                }
                            ?> required="required" id='city' name='city' placeholder="city"
                        type='text'>
                </div>
                <div class='form_block'>
                    <label for='custom_clear'>custom_clear</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$query["FIRST_NAME"].'" ';
                                    // echo 'value="'.$query["FIRST_NAME"].'" '; 
                                }
                            ?> required="required" id='custom_clear' name='custom_clear' placeholder="custom_clear"
                        type='text'>
                </div>
            </div>
            
            <div class='pets-weight'>
                <label for='transmission'>Toplivo</label>
                <div class='radio-container'>
                    <input required="required" checked='' id='transmission_variant1' name='transmission' type='radio'
                        value='transmission_variant1'>
                    <label for='transmission_variant1'>transmission_variant1</label>
                    <input required="required" id='transmission_variant2' name='transmission' type='radio'
                        value='transmission_variant2'>
                    <label for='transmission_variant2'>transmission_variant1</label>
                    <input required="required" id='transmission_variant3' name='transmission' type='radio'
                        value='transmission_variant3'>
                    <label for='transmission_variant3'>transmission_variant1</label>
                </div>
            </div>
        </header>
    </div>
</form>