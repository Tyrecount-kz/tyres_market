<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="views/style/php_log.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
        
    </head>

    <body>
        <section id="statistic" class="statistic-section one-page-section">
            <div class="container">
                <div class="row text-center">
                    <div class="col-xs-12 col-md-4">
                        <div class="counter"><i class="fa fa-coffee fa-2x stats-icon"></i>
                            <h2 class="timer count-title count-number">999</h2>
                            <div class="stats-line-black"></div>
                            <p class="stats-text">Coffee Cups</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="counter"><i class="fa fa-code fa-2x stats-icon"></i>
                            <h2 class="timer count-title count-number">10000 </h2>
                            <div class="stats-line-black"></div>
                            <p class="stats-text">Line Code</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="counter"><i class="fa fa-clock-o fa-2x stats-icon"></i>
                            <h2 class="timer count-title count-number">6</h2>
                            <div class="stats-line-black"></div>
                            <p class="stats-text">Years Experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

    <script>
        $(document).ready(function($) {
            $('.count-number').counterUp({
                delay: 10,
                time: 10000
            });
        });
    </script>

    </html>