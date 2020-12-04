<?php

    $users[1] = array("user_id"=>1,"first_name"=>'Aida',"last_name"=>"Danayeva","phone"=>'87054512369',"email"=>'110785345@stu.sdu.edu.kz','password'=>'qwkdkasmd');
    $users[2] = array("user_id"=>2,"first_name"=>'Almurat',"last_name"=>"Myktybekov","phone"=>'87054514857',"email"=>'130782585@stu.sdu.edu.kz','password'=>'qwdasceedw');
    $users[3] = array("user_id"=>3,"first_name"=>'Sanzhar',"last_name"=>"Kopzhassarov","phone"=>'87078512003',"email"=>'sanzh@gmail.com','password'=>'sadzxcwq');

    // var_dump($users);

    $cars[0] = array("user_id"=>1, 'car_id'=>1, 'query_id'=>1, 'city'=>'Almaty','in_market'=>0);
    $cars[1] = array("user_id"=>1, 'car_id'=>2, 'query_id'=>2, 'city'=>'Astana','in_market'=>1);
    $cars[2] = array("user_id"=>2, 'car_id'=>3, 'query_id'=>3, 'city'=>'Almaty','in_market'=>0);
    $cars[3] = array("user_id"=>2, 'car_id'=>4, 'query_id'=>4, 'city'=>'Astana','in_market'=>1);
    $cars[4] = array("user_id"=>2, 'car_id'=>5, 'query_id'=>5, 'city'=>'Oskemen','in_market'=>0);
    $cars[5] = array("user_id"=>3, 'car_id'=>6, 'query_id'=>6, 'city'=>'Semey','in_market'=>0);
    $cars[6] = array("user_id"=>3, 'car_id'=>7, 'query_id'=>7, 'city'=>'Almaty','in_market'=>0);
    $cars[7] = array("user_id"=>3, 'car_id'=>8, 'query_id'=>8, 'city'=>'Oral','in_market'=>1);

    $queries[0] = array("query_id"=>3, 'car_id'=>6, 'car_model'=>'Audi', 'release_year'=>'2019',
    'shell'=>'внедорожник',  'Volume'=>1.7,  'Mileage'=>31000,  'Transmission'=>'механика','Rudder'=>'  справо',  
    'Color'=>'серебристый',  'Gear'=>'полный привод','CustomsCleared'=>'да',  'Type Engine'=>'бензин',  
    'Price'=>3000000);

    $queries[1] = array("query_id"=>4, 'car_id'=>6, 'car_model'=>'Audi', 'release_year'=>'2019',
    'shell'=>'внедорожник',  'Volume'=>2,  'Mileage'=>31000,  'Transmission'=>'автомат','Rudder'=>'  слева',  
    'Color'=>'серебристый',  'Gear'=>'полный привод','CustomsCleared'=>'нет',  'Type Engine'=>'бензин',  
    'Price'=>2900000);

    $queries[2] = array("query_id"=>5, 'car_id'=>6, 'car_model'=>'Audi', 'release_year'=>'2019',
    'shell'=>'внедорожник',  'Volume'=>2,  'Mileage'=>41000,  'Transmission'=>'механика','Rudder'=>'  справо',  
    'Color'=>'серебристый',  'Gear'=>'полный привод','CustomsCleared'=>'да',  'Type Engine'=>'бензин',  
    'Price'=>2750000);

?>