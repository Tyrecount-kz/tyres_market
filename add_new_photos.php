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

    function get_photos($post_id){
        
        $images = array();
        for($i = 1; $i<=5; $i++){
            array_push($images, 'https://www.osdla.com/wp-content/uploads/2014/10/placeholder-1.png');
        }

        return $images;

    }

?>