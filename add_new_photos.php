<?php

    function add_new_photos($car_id){
        $images_array = array();
        // var_dump($_FILES);
        foreach($_FILES["images"]['name'] as $key=>$val){
        
            $uploadfile = $_FILES["images"]["tmp_name"][$key];
            $folder="images/";

            $target_file = $folder.$_FILES['images']['name'][$key];
            // echo $target_file;

            if(move_uploaded_file($_FILES["images"]["tmp_name"][$key], "$folder".$_FILES["images"]["name"][$key])){
                $images_array[] = $target_file;
            }
            
        }
    }

?>