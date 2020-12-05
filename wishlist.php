<?php
    function get_wishlist($user_id){
        include 'connect.php';

        $query = '
        declare 
            userInfo information1.userInfoList;
            a users.first_name%type;
            b users.last_name%type;
            c users.phone%type;
        begin 
            information1.getUserInfo(:a, userInfo);
            :b := userInfo(1).first_name;
            :c := userInfo(1).last_name;
            :d := userInfo(1).phone;
        end;';

        $stid = oci_parse($conn, $query);
        
        $user_data = array();

        oci_bind_by_name($stid, ':a', $user_id);
        oci_bind_by_name($stid, ':b', $user_data['first_name'], 150);
        oci_bind_by_name($stid, ':c', $user_data['last_name'], 150);
        oci_bind_by_name($stid, ':d', $user_data['phone'], 150);

        oci_execute($stid);
        
        // var_dump($first_name);
        var_dump($user_data);
        return $user_data;
    }

    // $wishlist = get_wishlist();
    // get_wishlist($user_id);
    // $user_data = get_wishlist(1);
    // var_dump($user_data);
?>

<div class="row wishlist">
    <div class="col-9">
        <div class="tab-content">
            
            <?php 
                $index = 0;
                foreach($details as $detail){ 
            ?>

            <div id="home<?php echo $index; ?>" class="tab-pane fade in active">
                <canvas class="chart" id="myChart<?php echo $index; ?>" width="800" height="400"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');

                    var queries = [];

                    function getQuery(a, b) {
                        // console.log("query");
                        // console.log(a);
                        // console.log(b);

                        var index = b[0]['_index'];
                        console.log(queries[index]);

                        var theUrl = 'http://localhost/tyres/prediction_result.php?queryID=' + index;

                        window.location.replace(theUrl);

                    }

                    var car_info = "Toyota Camry";

                    var myBubbleChart = new Chart(ctx, {
                        type: 'bubble',
                        data: {
                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                            datasets: [{
                                label: 'Detail: ' + <?php echo $detail; ?>,
                                data: queries,
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
            </div>
        
            <?php } ?>

        </div>
    </div>
    <div class="col-3">

        <h3 class="text-center">From The Blog</h3>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Mike</a></li>
            <li><a data-toggle="tab" href="#home1">Chandler</a></li>
            <li><a data-toggle="tab" href="#home2">Peter</a></li>
        </ul>

    </div>
</div>