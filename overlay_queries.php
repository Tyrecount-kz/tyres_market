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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <style>

        #overlay {
            position: fixed; /* Sit on top of the page content */
            overflow: y;
            /* display: none; Hidden by default */
            /* width: 100%; Full width (cover the whole page) */
            /* height: 100%; Full height (cover the whole page) */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5); /* Black background with opacity */
            z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
            cursor: pointer; /* Add a pointer on hover */
            /* display: flex; */
            display: none;
            align-items: center;
            justify-content: center;
            flex-flow: column;
        }

        #overlay .queries {
            bottom: -5px;
            /* position: absolute; */
            text-align: center;
            display: flex;
            flex-flow: column;
            align-items: center;
            justify-content: center;
            overflow-y: scroll;
            background-color: green;

            max-Width: 500px;
            height: 700px;
            padding: 32px;
            /* margin: 0 auto; */
        }

        #overlay .query {
            height: 138px;
            width: 320px;
            background-color: darkkhaki;
            margin: 10px;
            display: flex;
            flex-flow: column;
            justify-content: space-between;
            /* align-items: space-around; */
        }

        #overlay .query .set {
            background-color: darkmagenta;
            display: flex;
            justify-content: space-between;
            padding: 0px 32px;
            align-items: center;
            height: 48px;
        }

        #close {

            position: absolute;
            top: 32px;
            left: 32px;

            text-align: center;
            padding: 20px;

            background: black;
            color: white;
            height: 64px;
            width: 64px;    

        }

        #close:hover{
            background: white;
            color: black;
        }

    </style>

</head>

<body>
    <div id="overlay">

        <div id="close" onclick="off()">X</div>

        <div class='queries'>
            <h1>
                Pick one configuration of car
            </h1>
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

                        <a href="prediction_result.php?query_id=<?php echo $query["USER_ID"] ?> ">
                            <button class='query_button'>Add to Market</button>
                        </a>
                    </div>
                </footer>
            </div>
            <?php } ?>
       
        </div>

        <script>
        function on() {
            document.getElementById("overlay").style.display = "flex";
        }

        function off() {
            document.getElementById("overlay").style.display = "none";
        }
        </script>

</body>

</html>