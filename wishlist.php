<?php
    
    $w_cars = array(
    );

    $w_cars[0] = 
    array(
        'car_id' => 1,
        'post_id' => 1,
        'shell' => 1,
        'year' => 2000,
        'mileage' => 2000,
        'rudder' => 1,
        'engine_volume' => 3000,
        'transmission' => 1,
    );

    $details = array(
        'shell' => array(),
        'year' => array(),
        'mileage' => array(),
        'rudder' => array(),
        'engine_volume' => array(),
        'transmission' => array(),
    );

    foreach($details as $char => $detail){
        // var_dump($char);
        // var_dump($detail);
        
        foreach($w_cars as $car){
            // var_dump($car[$char]);
            array_push($details[$char], array(
                'id' => $car['post_id'], 
                'value' => $car[$char])
            ); 
        }
    }

    // var_dump($details);

    // get_wishlist($user_id);
    // var_dump($user_data);
?>

<div class="row wishlist">
    <div class="col-9">
        <div class="tab-content">
            
            <?php 
                $index = 0;
                foreach($details as $char => $detail){ 
            ?>

            <?php 
                if( $index == 0 ){
            ?>
                <div id="home<?php echo $index; ?>" class="tab-pane fade in active">
            <?php
                }
                else{
            ?>
                <div id="home<?php echo $index; ?>" class="tab-pane fade">
            <?php } ?>

                <canvas class="chart" id="myChart<?php echo $index; ?>" width="800" height="400"></canvas>
                
                <?php
                    echo '<script>
                    var ctx = document.getElementById("myChart'.$index.'").getContext("2d");';

                    echo 'var cars = [';
                    foreach($detail as $d){
                            echo '{';
                            echo 'x:'.$d["id"].',';
                            echo 'y:'.$d["value"].',';
                            echo 'r: 10';
                            echo '},';
                        }
                    echo '];';
                    
                    echo "
                    function getQuery(a, b) {

                        var index = b[0]['_index'];
                        console.log(queries[index]);

                        var theUrl = 'http://localhost/tyres/post_detail.php?post_id=".$d["id"]."';

                        window.location.replace(theUrl);

                    }

                    var car_info = 'Toyota Camra';

                    var myBubbleChart = new Chart(ctx, {
                        type: 'bubble',
                        data: {
                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                            datasets: [{
                                label: 'Detail: ' + '".$char."',
                                data: cars,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 5
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            evenrs: ['mousemove', 'click'],
                            onClick: getQuery,
                        }
                    });
                </script>
                ";
                ?>

            </div>
        
            <?php 
                
                $index+=1;
                } 
                
            ?>

        </div>
    </div>
    <div class="col-3">

        <h3 class="text-center">From The Blog</h3>
        <ul class="nav nav-tabs">
            <?php
                $index = 0;
                foreach($details as $char => $detail){
                    if( $index == 0 )
                       echo '<li class="active">';
                    else    
                        echo '<li>';

                    echo '<a data-toggle="tab" href="#home'.$index;
                    echo '">'.$char;
                    echo ' </a></li>';

                    $index += 1;
                }
            ?>
        </ul>

    </div>
</div>