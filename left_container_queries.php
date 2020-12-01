<!-- <?php session_start(); ?> -->
<?php

    //echo 'hi';

    // encrypt password
    $user = $_SESSION["user"];

    include 'connect.php';

    // query
    $user_id = $user["USER_ID"];
    // echo $user_id;
    
    // $query = "SELECT * from queries where user_id='$user_id'";
    $query = "SELECT * from users";

    // echo $query;

    $stid = oci_parse($conn, $query);
    oci_execute($stid);

    $rows = array();

    while(($row = oci_fetch_array($stid, OCI_BOTH))){
        array_push($rows, $row);
    }
    
    // echo '<div class="php_log">';
    //     var_dump($rows);
    // echo '</div>'; 

?>

<div class='left-container' style="overflow-y:scroll;">
    <h1>
        All predictions for this car
    </h1>

    <a href="profile1.php"> <h3> Go to Profile </h3> </a>

    <div class='queries' >
        <?php 
            foreach ($rows as $query){         
        ?>
            <div class="query">
                <header>
                    <h1><?php echo $query["FIRST_NAME"] ?></h1>    
                </header>
                <footer>
                    <div class='set'>
                        <!-- <button id='back'>Back</button> -->
                        <?php echo $query["USER_ID"] ?>
                        <input required="required" id="submit" type="submit" name="submit" value="Modify">
                    </div>
                </footer>
            </div>
        <?php } ?>
    </div>
</div>

