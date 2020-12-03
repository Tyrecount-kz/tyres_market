<?php session_start(); ?>

<?php

    $user_id = $_SESSION["user"]["USER_ID"];

    add_new_car($user_id);

    function add_new_car($user_id){

        if( !empty($_POST['city']) )
        {
            $city = $_POST['city'];
            
            include 'connect.php';
        
            // query
            $query = "INSERT INTO CARS (car_id, user_id, city) VALUES (default, '$user_id', '$city')";
            // echo $query;
            // send me car_id

            $stid = oci_parse($conn, $query);
            echo oci_execute($stid, OCI_DEFAULT);

            oci_commit($conn);

            $car_id = -1;
            header("location: prediction_section.php?car_id=$car_id");
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

    <title>Profile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="views/style/prediction.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
    <link href="views/style/php_log.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

    <style>
        @charset "UTF-8";

        .stepper {
            min-height: 565px;
            width: 100%;
            margin: 0 auto;
            /* background: orange; */
            display: flex;
            flex-flow: column;
            align-items: center;
            justify-content: center;

        }

        .panel-default {
            height: 100%;
            background: #F9ECCC;
            margin: auto 0;
            border: none;
            padding: 0;
        }

        .panel-body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-flow:column;
            justify-content: center;
        }


        .stepper .nav-tabs {
            position: relative;
            background: #F9ECCC;
            height: 64px;
        }

        .stepper .nav-tabs>li {
            width: 25%;
            position: relative;
        }

        .stepper .nav-tabs>li:after {
            content: '';
            position: absolute;
            background: #E0DDCF;
            display: block;
            width: 100%;
            height: 5px;
            top: 30px;
            left: 50%;
            z-index: 1;
        }

        .stepper .nav-tabs>li.completed::after {
            background: #34bc9b;
        }

        .stepper .nav-tabs>li:last-child::after {
            background: transparent;
        }

        .stepper .nav-tabs>li.active:last-child .round-tab {
            background: #34bc9b;
        }

        .stepper .nav-tabs>li.active:last-child .round-tab::after {
            content: '✔';
            color: #fff;
            position: absolute;
            left: 0;
            right: 0;
            margin: 0 auto;
            top: 0;
            display: block;
        }

        .stepper .nav-tabs [data-toggle='tab'] {
            width: 25px;
            height: 25px;
            margin: 20px auto;
            border-radius: 100%;
            border: none;
            padding: 0;
            color: #E0DDCF;
        }

        .stepper .nav-tabs [data-toggle='tab']:hover {
            background: transparent;
            border: none;
        }

        .stepper .nav-tabs>.active>[data-toggle='tab'],
        .stepper .nav-tabs>.active>[data-toggle='tab']:hover,
        .stepper .nav-tabs>.active>[data-toggle='tab']:focus {
            color: #34bc9b;
            cursor: default;
            border: none;
        }

        .stepper .tab-content {
            margin: 0 auto;
            /* background: red; */
            min-height: 500px;
            display: flex;
            /* flex-flow: column; */
            align-items: center;
            justify-content: center;
        }

        .stepper .tab-pane {
            position: relative;
            /* padding-top: 50px; */
        }

        .stepper .round-tab {
            width: 25px;
            height: 25px;
            line-height: 22px;
            display: inline-block;
            border-radius: 25px;
            background: #fff;
            border: 2px solid #34bc9b;
            color: #34bc9b;
            z-index: 2;
            position: absolute;
            left: 0;
            text-align: center;
            font-size: 14px;
        }

        .stepper .completed .round-tab {
            background: #34bc9b;
        }

        .stepper .completed .round-tab::after {
            content: '✔';
            color: #fff;
            position: absolute;
            left: 0;
            right: 0;
            margin: 0 auto;
            top: 0;
            display: block;
        }

        .stepper .active .round-tab {
            background: #fff;
            border: 2px solid #34bc9b;
        }

        .stepper .active .round-tab:hover {
            background: #fff;
            border: 2px solid #34bc9b;
        }

        .stepper .active .round-tab::after {
            display: none;
        }

        .stepper .disabled .round-tab {
            background: #fff;
            color: #E0DDCF;
            border-color: #E0DDCF;
        }

        .stepper .disabled .round-tab:hover {
            color: #4dd3b6;
            border: 2px solid #a6dfd3;
        }

        .stepper .disabled .round-tab::after {
            display: none;
        }
    </style>

</head>

<body>

    <?php require_once('header.php') ?>
    <div class='signup-container'>

        <?php include 'left_container_navbar.php'; ?>

        <div class="container right-container profile">

            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="stepper">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a class="persistant-disabled" href="#stepper-step-1" data-toggle="tab"
                                    aria-controls="stepper-step-1" role="tab" title="Step 1">
                                    <span class="round-tab">1</span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a class="persistant-disabled" href="#stepper-step-2" data-toggle="tab"
                                    aria-controls="stepper-step-2" role="tab" title="Step 2">
                                    <span class="round-tab">2</span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a class="persistant-disabled" href="#stepper-step-3" data-toggle="tab"
                                    aria-controls="stepper-step-3" role="tab" title="Step 3">
                                    <span class="round-tab">3</span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a class="persistant-disabled" href="#stepper-step-4" data-toggle="tab"
                                    aria-controls="stepper-step-4" role="tab" title="Complete">
                                    <span class="round-tab">4</span>
                                </a>
                            </li>
                        </ul>
                        <form action="add_new_car.php" method="post" name="form" id="form">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" role="tabpanel" id="stepper-step-1">

                                    <div class="page-header">
                                        <h1 class="h3">Let's add your car's details
                                            <small>
                                                <br> then you can predict cost for different configurations
                                            </small>
                                        </h1>
                                    </div>
                                    <h3 class "h2">
                                        1. Enter car's model
                                    </h3>
                                    <p>This is step 1</p>
                                    <ul class="list-inline pull-right">
                                        <li>
                                            <a class="btn btn-primary next-step">Next</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="stepper-step-2">
                                    <h3 class "h2">2. Enter Payment Information</h3>
                                    <p>This is step 2</p>
                                    <ul class="list-inline pull-right">
                                        <li>
                                            <a class="btn btn-default prev-step">Back</a>
                                        </li>
                                        <li>
                                            <a class="btn btn-primary next-step">Next</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="stepper-step-3">

                                    <?php
                                        require_once('prediction_section_crop.php');
                                    ?>

                                    <ul class="list-inline pull-right">
                                        <li>
                                            <a class="btn btn-default prev-step">Back</a>
                                        </li>
                                        <li>
                                            <a class="btn btn-default cancel-stepper">Cancel Payment</a>
                                        </li>
                                        <li>
                                            <a class="btn btn-primary next-step">Submit Payment</a>
                                        </li>
                                    </ul>


                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="stepper-step-4">
                                    <h3>4. All done!</h3>
                                    <p>You have successfully completed all steps.</p>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="stepper.js"></script>
</body>

</html>