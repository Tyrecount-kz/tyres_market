<?php
if(isset($_POST['submit_image']))
{
    $images_array=array();
     foreach($_FILES['images']['name'] as $key=>$val){
    
     $uploadfile=$_FILES["images"]["tmp_name"][$key];
     $folder="images/";
     $target_file = $folder.$_FILES['images']['name'][$key];
     if(move_uploaded_file($_FILES["images"]["tmp_name"][$key], "$folder".$_FILES["images"]["name"][$key])){
         $images_array[] = $target_file;
     }
    }
}
if(!empty($images_array)){ 
    foreach($images_array as $src){ ?>
<ul>
    <li>
        <img src="<?php echo $src; ?>">
    </li>
</ul>
<?php }
}
?>

<html>

<head>
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
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
    </style>

</head>

<body>
    <div class="container-fluid m_uploader">
        <div class="row header">
            <form action="iamge_uploader_multiple.php" method="post" enctype="multipart/form-data">
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
                        <input type="file" class="form-control upload" id="images" name="images[]"
                            onchange="preview_images();" multiple />
                    </div>
                </div>
            </form>
        </div>
        <div class="row" id="image_preview"></div>
    </div>
</body>

</html>