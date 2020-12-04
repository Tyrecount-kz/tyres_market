<?php

?>

<div class="row wishlist">
    <div class="col-9">
        
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <canvas id="myChart" width="800" height="400"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');

                    var queries = [{
                            x: 1,
                            y: 1.6,
                            r: 10
                        },
                        {
                            x: 2,
                            y: 3.6,
                            r: 10
                        },
                        {
                            x: 3,
                            y: 2.3,
                            r: 10
                        },
                        {
                            x: 4,
                            y: 1.7,
                            r: 10
                        },
                        {
                            x: 5,
                            y: 2.9,
                            r: 10
                        },
                        {
                            x: 6,
                            y: 3.78,
                            r: 10
                        },
                        {
                            x: 7,
                            y: 8,
                            r: 10
                        },
                    ];

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
                                label: 'For ' + car_info,
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
            <div id="home1" class="tab-pane fade in">
                <canvas id="myChart1" width="800" height="400"></canvas>
                <script>
                    var ctx = document.getElementById('myChart1').getContext('2d');

                    var queries = [{
                            x: 1,
                            y: 1.6,
                            r: 10
                        },
                        {
                            x: 2,
                            y: 3.6,
                            r: 10
                        },
                        {
                            x: 3,
                            y: 2.3,
                            r: 10
                        },
                        {
                            x: 4,
                            y: 1.7,
                            r: 10
                        },
                        {
                            x: 5,
                            y: 2.9,
                            r: 10
                        },
                        {
                            x: 6,
                            y: 3.78,
                            r: 10
                        },
                        {
                            x: 7,
                            y: 8,
                            r: 10
                        },
                    ];

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
                                label: 'For ' + car_info,
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
            <div id="home2" class="tab-pane fade in">
                <canvas id="myChart2" width="800" height="400"></canvas>
                <script>
                    var ctx = document.getElementById('myChart2').getContext('2d');

                    var queries = [{
                            x: 1,
                            y: 11,
                            r: 10
                        },
                        {
                            x: 2,
                            y: 3.6,
                            r: 10
                        },
                        {
                            x: 3,
                            y: 2.3,
                            r: 10
                        },
                        {
                            x: 4,
                            y: 1.7,
                            r: 10
                        },
                        {
                            x: 5,
                            y: 2.9,
                            r: 10
                        },
                        {
                            x: 6,
                            y: 3.78,
                            r: 10
                        },
                        {
                            x: 7,
                            y: 8,
                            r: 10
                        },
                    ];

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
                                label: 'For ' + car_info,
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
