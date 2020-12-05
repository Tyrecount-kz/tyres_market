<?php session_start(); ?>

<?php
    include 'add_new_photos.php';
    include 'delete_photo.php';
    include 'photo_carousel.php';
  
    $user_id = $_SESSION["user"]["user_id"];
    $post_id = 1;
    $car_id = 1;

    if(isset($_POST['submit']))
    {
        echo 'whal';
        update_car_details($user_id);
    }
    
    $company = "B";
    $model = "A";
    $description = "Lorem";

    $images = get_photos(1);

    function update_car_details($user_id){

        // var_dump( $_POST );

        $company = $_POST['company'];
        $model = $_POST['model'];
        $description = $_POST['description'];

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
        // add car then add to market
        // $query = "INSERT INTO CARS (car_id, user_id, city) VALUES (default, '$user_id', '$city')";
        // echo $query;
        // send me car_id

        // $stid = oci_parse($conn, $query);
        // oci_execute($stid, OCI_DEFAULT);

        // oci_commit($conn);

        // get car_id
        $car_id = 1;
        // Add new query , predict , show result
        
        // Add images -> file path
        // echo 'uploading';
        // var_dump($_FILES["images"]);
        add_new_photos($car_id);




        // echo 'moves';
        header("location: post_detail.php?car_id=$car_id");
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
    
    <link href="views/style/post_style.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://www.expertphp.in/js/jquery.form.js"></script>
    
    <script>
        function preview_images() {
            var total_file = document.getElementById("images").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<div class='col col-lg-2'><img class='img-responsive u_image' src='" + URL
                    .createObjectURL(event.target.files[i]) + "'></div>");
            }
        }
    </script>

</head>

<body>

    <div class='signup-container'>

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
                        <form action="edit_post.php" method="post" enctype="multipart/form-data" name="edit_post"
                            id="form">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" role="tabpanel" id="stepper-step-1">

                                    <div class="page-header">
                                        <h1 class="h3">Edit or update you car's details
                                            <small>
                                                <br> cost may be changed.
                                            </small>
                                        </h1>
                                    </div>

                                    <h3 class="h2">
                                        Enter car's info
                                    </h3>

                                    <input class="first_info" type="text" name="company" value="<?php echo $company; ?>" />

                                    <input class="first_info" type="text" name="model" placeholder="Model"  value="<?php echo $company; ?>" />
                                    <input class="first_info" type="text" name="description" placeholder="Description"  value="<?php echo $company; ?>" />

                                    <ul class="list-inline pull-right">
                                        <li>
                                            <a class="btn prev-step " style="background: red;" href="profile.php" >Cancel</a>
                                        </li>
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
                                                        as soon as possible, you car's license number will be hidden.
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
                                        <?php 
                                            show_uploaded_images($images, 1);
                                        ?>
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