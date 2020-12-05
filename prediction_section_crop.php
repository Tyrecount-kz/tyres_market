<?php

    include 'get_variable.php';

    $query_id = get_variable("query_id");
    echo $query_id;

    include 'fetch_item.php';
    
    // $sql_query = "select * from users where user_id = '$query_id'";
    // $query = fetch_item( $sql_query );    
    $query = 1;
    
    $car_id = get_variable("car_id");

    // var_dump($query);
    
    $shell = "A";
    $release_year = 2000;
    $mileage = 123456;
    $rudder = "right";
    $color = "A";
    $gear = "A";
    $custom_clear = "A";
    $engine_volume = "A";
    $city = "A";
    $transmission = "механика";

    function get_data($post_id){
        $company = $_POST['company'];
        $model = $_POST['model'];
        $description = $_POST['description'];

        $shell = $_POST['shell'];
        $release_year = $_POST['release_year'];
        $mileage = $_POST['mileage'];
        $rudder = $_POST['rudder'];
        $color = $_POST['color'];
        $gear = $_POST['gear'];
        $custom_clear = $_POST['custom_clear'];
        $engine_volume = $_POST['engine_volume'];
        $city = $_POST['city'];
        $transmission = $_POST['transmission'];
    }

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
                                    echo 'value="'.$shell.'" ';
                                    // echo 'value="'.$shell.'" '; 
                                }
                            ?> required="required" id='shell' name="shell" placeholder='shell' type='text'>
                </div>
                <div class='form_block'>
                    <label for='release_year'>release_year</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$release_year.'" ';
                                    // echo 'value="'.$release_year.'" '; 
                                }
                            ?> required="required" id='release_year' name="release_year" placeholder="year"
                        type='number' min="1900" max="2021">
                </div>

                <div class='form_block'>
                    <label for='mileage'>mileage (only in km)</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$mileage.'" ';
                                    // echo 'value="'.$mileage.'" '; 
                                }
                            ?> required="required" id='mileage' name="mileage" placeholder='mileage' type='number'>
                </div>

            </div>

            <div class='set'>
                <div class='form_block'>
                    <div class='pets-weight'>
                        <label for='rudder'>Rudder</label>
                        <div class='radio-container'>
                            <input required="required" <?php if( $rudder == "left" ){ echo "checked=''"; } ?> id='left' name='rudder' type='radio'
                                value='left'>
                            <label for='left'>left</label>
                            <input required="required" <?php if( $rudder == "right" ){ echo "checked=''"; } ?> id='right' name='rudder' type='radio'
                                value='right'>
                            <label for='right'>right</label>
                        </div>
                    </div>    
            </div>

                <div class='form_block'>
                    <label class="color_label" for='color'>color</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$color.'" ';
                                    // echo 'value="'.$color.'" '; 
                                }
                            ?> required="required" id='color' name="color" placeholder='color' type='color'>
                </div>
                <div class='form_block'>
                    <label for='gear'>gear</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$gear.'" ';
                                    // echo 'value="'.$gear.'" '; 
                                }
                            ?> required="required" id='gear' name="gear" placeholder="gear" type='text'>
                </div>
            </div>

            <div class='set'>
                <div class='form_block'>
                    <label for='engine_volume'>engine_volume</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$engine_volume.'" ';
                                    // echo 'value="'.$engine_volume.'" '; 
                                }
                            ?> required="required" id='engine_volume' name='engine_volume' placeholder='engine_volume'
                        type='text'>
                </div>
                <div class='form_block'>
                    <label for='city'>city</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$city.'" ';
                                    // echo 'value="'.$city.'" '; 
                                }
                            ?> required="required" id='city' name='city' placeholder="city"
                        type='text'>
                </div>
                <div class='form_block'>
                    <label for='custom_clear'>custom_clear</label>
                    <input <?php 
                                if( $query ){
                                    echo 'value="'.$custom_clear.'" ';
                                    // echo 'value="'.$custom_clear.'" '; 
                                }
                            ?> required="required" id='custom_clear' name='custom_clear' placeholder="custom_clear"
                        type='text'>
                </div>
            </div>
            
            <div class='pets-weight'>
                <label for='transmission'>Топливо</label>
                <div class='radio-container'>
                    <input required="required" <?php if( $transmission == "автомат" ){ echo "checked=''"; } ?> id='transmission_variant1' name='transmission' type='radio'
                        value='автомат'>
                    <label for='transmission_variant1'>автомат</label>
                    <input required="required" <?php if( $transmission == "механика" ){ echo "checked=''"; } ?> id='transmission_variant2' name='transmission' type='radio'
                        value='механика'>
                    <label for='transmission_variant2'>механика</label>
                    <input required="required" <?php if( $transmission == "типтроник" ){ echo "checked=''"; } ?> id='transmission_variant3' name='transmission' type='radio'
                        value='типтроник'>
                    <label for='transmission_variant3'>типтроник</label>
                </div>
            </div>
        </header>
    </div>
</form>