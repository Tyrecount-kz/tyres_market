<?php session_start(); ?>

<?php

    $user_id = $_SESSION["user"]["USER_ID"];

    if(isset($_POST['submit']))
    {
        add_new_car($user_id);
    }
    
    function add_new_car($user_id){

        // var_dump( $_POST );

        $company = $_POST['company'];
        $model = $_POST['model'];

        $shell = $_POST['shell'];
        $year = $_POST['release_year'];
        $mileage = $_POST['mileage'];
        $rudder = $_POST['rudder'];
        $color = $_POST['color'];
        $gear = $_POST['gear'];
        $custom_clear = $_POST['custom_clear'];
        $engine_volume = $_POST['engine_volume'];
        $city = $_POST['city'];
        $transmission = $_POST['transmission'];

        include 'connect.php';
    
        // Add new car
        $query = "INSERT INTO CARS (car_id, user_id, city) VALUES (default, '$user_id', '$city')";
        // echo $query;
        // send me car_id

        $stid = oci_parse($conn, $query);
        oci_execute($stid, OCI_DEFAULT);

        oci_commit($conn);

        // get car_id
        $car_id = -1;
        // Add new query , predict , show result
        
        // Add images -> file path
        // echo 'uploading';
        // var_dump($_FILES["images"]);
        include 'add_new_photos.php';
        add_new_photos($car_id);

        // echo 'moves';
        // header("location: prediction_result.php?car_id=$car_id");
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://www.expertphp.in/js/jquery.form.js"></script>
    
    <script>
        function preview_images() {
            var total_file = document.getElementById("images").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<div class='col-md-3'><img class='img-responsive u_image' src='" + URL
                    .createObjectURL(event.target.files[i]) + "'></div>");
            }
        }
    </script>

    <style>
        .m_uploader {
            /* background: white; */
            height: 360px;
            width: 550px;
            /* padding: 16px; */
        }

        .header {
            margin-bottom: 16px;
        }

        .file-upload {

            margin-top: 12px;

            height: 64px;
            width: 64px;

            position: relative;
            overflow: hidden;

            border-radius: 3px !important;
            background: #ff0000;
            text-transform: uppercase;
            font-size: 40px;
            border: none !important;
            box-shadow: none !important;
            color: #fff !important;
            text-shadow: none;
            padding: 5px 10px !important;
            font-family: Arial, sans-serif;
            display: inline-block;
            vertical-align: middle;

        }

        .file-upload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .u_image {
            min-width: 64px;
            /* height: 128px; */
            position: relative;
            /* border-radius: 100%; */
            border: 6px solid #1D0F2B;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

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
            flex-flow: column;
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
            background: #238755;
        }

        .stepper .nav-tabs>li:last-child::after {
            background: transparent;
        }

        .stepper .nav-tabs>li.active:last-child .round-tab {
            background: #238755;
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
            color: #238755;
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
            border: 2px solid #238755;
            color: #238755;
            z-index: 2;
            position: absolute;
            left: 0;
            text-align: center;
            font-size: 14px;
        }

        .stepper .completed .round-tab {
            background: #238755;
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
            border: 2px solid #238755;
        }

        .stepper .active .round-tab:hover {
            background: #fff;
            border: 2px solid #238755;
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
            color: #238755;
            border: 2px solid #a6dfd3;
        }

        .stepper .disabled .round-tab::after {
            display: none;
        }

        /*form*/

        input[type="text"], 
        input[type="number"],
        textarea

        /* .form-style-8 select  */
            {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            display: block !important;
            width: 100%;
            padding: 2px !important;
            border: none !important;
            border-radius: 0 !important;
            border-bottom: 1px solid black !important;
            background: transparent;
            font: 16px Arial, Helvetica, sans-serif;

            margin-bottom: 12px;
            transition: all 0.25s;
            /* height: 45px; */
        }

        input[type="text"]:hover, 
        input[type="number"]:hover,
        textarea:hover,
        input[type="text"]:focus, 
        input[type="number"]:focus,
        textarea:focus {
            border-bottom: 5px solid #238755 !important;
        }

        textarea {
            resize: none;
            overflow: hidden;
        }

        .list-inline {
            margin-top: 20px;
        }

        /* .page-header {
            margin-bottom:
        } */

        .next-step,
        .prev-step,
        .submit_button {
            height: 36px;
            padding: 0;
            width: 96px;
            font-weight: 700;
            background: #238755;
            color: white !important;
            display: flex;
            align-items:center;
            justify-content: center;
        }

        .prev-step {
            background: #E0DDCF;
            color: white;
        }

        .next-step:hover,
        .prev-step:hover,
        .submit_button:hover {
            background: #1D0F2B;
            color: white;
        }

        .first_info {
            font-weight: 800 !important;
            font-size: 25px !important;
            /* text-transform: uppercase; */
            margin-top: 24px;
            margin-bottom: 24px;
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
                        <form action="add_new_car.php" method="post" enctype="multipart/form-data" name="form"
                            id="form">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" role="tabpanel" id="stepper-step-1">

                                    <div class="page-header">
                                        <h1 class="h3">Let's add your car's details
                                            <small>
                                                <br> then you can predict cost for different configurations
                                            </small>
                                        </h1>
                                    </div>

                                    <h3 class="h2">
                                        Enter car's manufacturer and model
                                    </h3>

                                    <input class="first_info" type="text" name="company" placeholder="Manufacturer" />

                                    <input class="first_info" type="text" name="model" placeholder="Model" />

                                    <ul class="list-inline pull-right">
                                        <li>
                                            <a class="btn btn-primary next-step">Next</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="stepper-step-2">

                                    <div class="container-fluid m_uploader">
                                        <div class="row header">
                                            <div class="col-md-9">
                                                <h3> Upload car Images </h3>
                                                <h4>

                                                    <small>
                                                        you can skip this process and add later
                                                    </small>
                                                </h4>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="file-upload btn btn-primary">
                                                    <span>+</span>
                                                    <input type="file" class="form-control upload" id="images"
                                                        name="images[]" onchange="preview_images();" multiple />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row" id="image_preview"></div>
                                    </div>

                                    <ul class="list-inline pull-right">
                                        <li>
                                            <a class="btn btn-default prev-step">Back</a>
                                        </li>
                                        <li>
                                            <a class="btn btn-default next-step">Next</a>
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
                                            <a class="btn btn-default next-step">Predict</a>
                                        </li>
                                    </ul>


                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="stepper-step-4">
                                    <h3>Now we will process the data</h3>
                                    <p>Be ready to know you car's price!</p>
                                    <input class="btn btn-warning submit_button" type="submit" name="submit"
                                                value="I'm ready" />
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