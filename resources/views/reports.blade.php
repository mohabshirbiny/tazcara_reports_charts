<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">تذاكر الانترنت</h3>
                      
                        </div>
                        <div class="card-body">
                          <div class="chart">
                            <canvas id="internetTickets" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 732px;" width="732" height="250" class="chartjs-render-monitor"></canvas>
                          </div>
                          
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>  
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Online Vs. Offline خطوط شرکات النقل </h3>
                        
                        </div>
                        <div class="card-body">
                            <div class="chart">
                              <canvas id="compLinesOnlineVsOffline" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 732px;" width="732" height="250" class="chartjs-render-monitor"></canvas>
                            </div>
                            
                        </div>
                          <!-- /.card-body -->
                        </div>
                </div>
            </div>

            <canvas id="myChart" width="400" height="400"></canvas>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        
        <script>
            $(document).ready(function(){

                var getInternetTickets = $.parseJSON($.ajax({
                    url:  '{{route('getInternetTickets')}}',
                    dataType: "json", 
                    async: false
                }).responseText);
                 
                var bookedTotal,cancelledTotal = 0;
                
                for (const [key, value] of Object.entries(getInternetTickets)) {
                    switch(value.type) {
                        case 'booked':
                            bookedTotal = value.total;
                        break;
                        case 'cancelled':
                            cancelledTotal = value.total;
                        break;
                        default:
                    } 

                }

                var ctx = document.getElementById('internetTickets').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['تم الدفع', 'لم يتم الدفع'],
                        datasets: [{
                            label: 'تذاكر الانترنت',
                            backgroundColor: ['rgb(251, 174, 23)','rgb(255, 0, 0)'],
                            data: [bookedTotal, cancelledTotal]
                        }],
                        
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'تذاكر الانترنت'
                        }
                    }   
                });
                
                var ctx = document.getElementById('compLinesOnlineVsOffline').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'horizontalBar',
                    data: {
                        labels: ['شرق الدلتا',
                        ' سوبر جيت'],
                        datasets: [{
                            label: 'اونلاين',
                            backgroundColor: 'red',
                            data: [ cancelledTotal,45]
                        },{
                            label: 'اوفلاين',
                            backgroundColor: 'blue',
                            data: [bookedTotal,65]
                        }],
                        
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'تذاكر الانترنت'
                        }
                    }   
                });
            })
        </script>
    </body>
</html>
