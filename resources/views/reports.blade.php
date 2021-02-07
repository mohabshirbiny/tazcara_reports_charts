<!DOCTYPE html>
<html lang="ar" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>التقارير</title>

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
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title"></h3>

                        </div>
                        <div class="card-body">
                            <form >
                                <div class="row">
                                  <div class="col">
                                    <label for="">اسم الشركة</label>
                                  </div>
                                  <div class="col">
                                    <label for="">من تاريخ</label>
                                  </div>
                                  <div class="col">
                                    <label for="">الى تاريخ</label>
                                  </div>

                                </div>
                                <div class="row">
                                    <div class="col" style="text-align: center;">
                                        <select  class="form-control select2" name="organization_id" id="">
                                            <option value="0">--- اختر الشركة ---</option>
                                            @foreach ($organizations as $organization)
                                            <option value="{{$organization->id}}">{{$organization->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" name="from">
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" name="to">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col" style="text-align: center;">
                                        <button class="btn btn-success mb-2" type="submit">تحديث</button>
                                    </div>
                                </div>
                              </form>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
        </div>

        <br><br>
        <div class="container">


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
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">أعلى 10 محطات مبيعا اونلاين</h3>

                        </div>
                        <div class="card-body">
                          <div class="chart">
                            <div id="bestSellerStationOnline"  ></div>
                          </div>

                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">اعلى 10 محطات مبيعا اوفلاين </h3>

                        </div>
                        <div class="card-body">
                            <div class="chart">
                              <div id="bestSellerStationOffline" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 732px;" width="732" height="250" class="chartjs-render-monitor"></div>
                            </div>

                        </div>
                          <!-- /.card-body -->
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">أعلى 10 شركات لعدد الرحلات</h3>

                        </div>
                        <div class="card-body">
                          <div class="chart">
                            <div id="topOrganizationsTrips"  ></div>
                          </div>

                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">أعلى 10 شركات لعدد المحطات</h3>

                        </div>
                        <div class="card-body">
                            <div class="chart">
                              <div id="topOrganizationsStations" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 732px;" width="732" height="250" class="chartjs-render-monitor"></div>
                            </div>

                        </div>
                          <!-- /.card-body -->
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">فئات التذاكر الاعلى مبيعا</h3>

                        </div>
                        <div class="card-body">
                          <div class="chart">
                            <div id="BestSellerTicketTypes"  ></div>
                          </div>

                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">قنوات حجز التذاکر</h3>

                        </div>
                        <div class="card-body">
                            <div class="chart">
                              <div id="ticketsReservationMethods" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 732px;" width="732" height="250" class="chartjs-render-monitor"></div>
                            </div>

                        </div>
                          <!-- /.card-body -->
                        </div>
                </div>
            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            $(document).ready(function(){

                $('.select2').select2();

                /**************************** تذاکر الانترنت ***********************************/
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

                /************************** خطوط شرکات النقل ***********************************/

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
                            text: 'تذاكر الانترنت',
                            rtl: true
                        },
                        legend: {
                            reverse:true,
                            textDirection: "rtl"
                        },
                        tooltips: {
                            rtl: true
                        }
                    }
                });

                /************************** اعلى المحطات مبيعا اونلاين ****************************/



                loadBestSellerStationOnline();

                loadBestSellerStationOffline();

                loadtopOrganizationsTrips();

                loadtopOrganizationsStations();

                loadBestSellerTicketTypes();

                loadticketsReservationMethods();
            })

            function loadBestSellerStationOnline() {

                var BestSellerOnlineStations = $.parseJSON($.ajax({
                    url:  '{{route('stationBestSeller','Online')}}',
                    dataType: "json",
                    async: false
                }).responseText);

                var stations = [];
                var tickets = [];

                BestSellerOnlineStations.forEach(function (x) {
                    stations.push(x.name);
                    tickets.push(x.total);
                });

                var options = {

                            series: [{
                                name:'عدد التذاكر',
                                data: tickets,
                            }],

                            chart: {
                                type: 'bar',
                                height: 350
                            },

                            plotOptions: {
                                bar: {
                                    borderRadius: 45,
                                    horizontal: true,
                                }
                            },
                            dataLabels: {
                                enabled: true
                            },
                            xaxis: {
                                categories: stations,
                            },
                            grid: {
                                xaxis: {
                                    lines: {
                                        show: true
                                    }
                                }
                            },
                            yaxis: {
                                reversed: true,
                                axisTicks: {
                                    show: true
                                },
                                labels: {
                                    show: true,
                                    style: {
                                        colors: [],
                                        fontSize: '15px',
                                        fontFamily: 'Helvetica, Arial, sans-serif',
                                        fontWeight: 600,
                                        cssClass: 'apexcharts-xaxis-label',
                                    },

                                },
                            },

                        };

                var chart = new ApexCharts(document.querySelector("#bestSellerStationOnline"), options);

                chart.render();
            }

            function loadBestSellerStationOffline() {

                var BestSellerOfflineStations = $.parseJSON($.ajax({
                    url:  '{{route('stationBestSeller','Offline')}}',
                    dataType: "json",
                    async: false
                }).responseText);

                var stations = [];
                var tickets = [];

                BestSellerOfflineStations.forEach(function (x) {
                    stations.push(x.name);
                    tickets.push(x.total);
                });

                var options = {
                            series: [{
                                name:'عدد التذاكر',
                                data: tickets
                            }],
                            chart: {
                                type: 'bar',
                                height: 350
                            },

                            plotOptions: {
                                bar: {
                                    borderRadius: 15,
                                    horizontal: true,
                                }
                            },
                            dataLabels: {
                                enabled: true
                            },
                            xaxis: {
                                type: 'category',
                                categories: stations,


                            },
                            grid: {
                                xaxis: {
                                    lines: {
                                        show: true
                                    }
                                }
                            },
                            yaxis: {
                                reversed: true,
                                axisTicks: {
                                    // show: true
                                },
                                labels: {
                                    show: true,
                                    style: {
                                        colors: [],
                                        fontSize: '15px',
                                        fontFamily: 'Helvetica, Arial, sans-serif',
                                        fontWeight: 600,
                                        cssClass: 'apexcharts-xaxis-label',
                                    },

                                },
                            }
                        };

                var chart1 = new ApexCharts(document.querySelector("#bestSellerStationOffline"), options);

                chart1.render();
            }

            function loadtopOrganizationsTrips() {

                var BestSellerOfflineStations = $.parseJSON($.ajax({
                    url:  '{{route('topOrganizationsTrips')}}',
                    dataType: "json",
                    async: false
                }).responseText);

                var stations = [];
                var trips = [];

                BestSellerOfflineStations.forEach(function (x) {
                    stations.push(x.name);
                    trips.push(x.total);
                });

                var options = {
                            series: [{
                                name:'عدد الرحلات',
                                data: trips
                            }],
                            chart: {
                                type: 'bar',
                                height: 350
                            },

                            plotOptions: {
                                bar: {
                                    borderRadius: 15,
                                    horizontal: true,
                                }
                            },
                            dataLabels: {
                                enabled: true
                            },
                            xaxis: {
                                type: 'category',
                                categories: stations,


                            },
                            grid: {
                                xaxis: {
                                    lines: {
                                        show: true
                                    }
                                }
                            },
                            yaxis: {
                                reversed: true,
                                axisTicks: {
                                    // show: true
                                },
                                labels: {
                                    show: true,
                                    style: {
                                        colors: [],
                                        fontSize: '14px',
                                        fontFamily: 'Helvetica, Arial, sans-serif',
                                        fontWeight: 600,
                                        cssClass: 'apexcharts-xaxis-label',
                                    },

                                },
                            }
                        };

                var chart1 = new ApexCharts(document.querySelector("#topOrganizationsTrips"), options);

                chart1.render();
            }

            function loadtopOrganizationsStations() {

                var topOrganizationsStations = $.parseJSON($.ajax({
                    url:  '{{route('topOrganizationsStations')}}',
                    dataType: "json",
                    async: false
                }).responseText);

                var organizations = [];
                var stations = [];

                topOrganizationsStations.forEach(function (x) {
                    organizations.push(x.name);
                    stations.push(x.total);
                });

                var options = {
                            series: [{
                                name:'عدد المحطات',
                                data: stations
                            }],
                            chart: {
                                type: 'bar',
                                height: 350
                            },

                            plotOptions: {
                                bar: {
                                    borderRadius: 15,
                                    horizontal: true,
                                }
                            },
                            dataLabels: {
                                enabled: true
                            },
                            xaxis: {
                                type: 'category',
                                categories: organizations,
                            },
                            grid: {
                                xaxis: {
                                    lines: {
                                        show: true
                                    }
                                }
                            },
                            yaxis: {
                                reversed: true,
                                axisTicks: {
                                    // show: true
                                },
                                labels: {
                                    show: true,
                                    style: {
                                        colors: [],
                                        fontSize: '14px',
                                        fontFamily: 'Helvetica, Arial, sans-serif',
                                        fontWeight: 600,
                                        cssClass: 'apexcharts-xaxis-label',
                                    },

                                },
                            }
                        };

                var chart1 = new ApexCharts(document.querySelector("#topOrganizationsStations"), options);

                chart1.render();
            }

            function loadBestSellerTicketTypes() {

                var BestSellerTicketTypes = $.parseJSON($.ajax({
                    url:  '{{route('BestSellerTicketTypes')}}',
                    dataType: "json",
                    async: false
                }).responseText);

                var types = [];
                var totals = [];

                BestSellerTicketTypes.forEach(function (x) {
                    types.push(x.name);
                    totals.push(x.total);
                });

                var options = {
                            series: [{
                                name:'عدد التذاكر',
                                data: totals
                            }],
                            chart: {
                                type: 'bar',
                                height: 350
                            },

                            plotOptions: {
                                bar: {
                                    borderRadius: 15,
                                    horizontal: true,
                                }
                            },
                            dataLabels: {
                                enabled: true
                            },
                            xaxis: {
                                type: 'category',
                                categories: types,
                            },
                            grid: {
                                xaxis: {
                                    lines: {
                                        show: true
                                    }
                                }
                            },
                            yaxis: {
                                reversed: true,
                                axisTicks: {
                                    // show: true
                                },
                                labels: {
                                    show: true,
                                    style: {
                                        colors: [],
                                        fontSize: '14px',
                                        fontFamily: 'Helvetica, Arial, sans-serif',
                                        fontWeight: 600,
                                        cssClass: 'apexcharts-xaxis-label',
                                    },

                                },
                            }
                        };

                var chart1 = new ApexCharts(document.querySelector("#BestSellerTicketTypes"), options);

                chart1.render();
            }

            function loadticketsReservationMethods() {

                var ticketsReservationMethods = $.parseJSON($.ajax({
                    url:  '{{route('ticketsReservationMethods')}}',
                    dataType: "json",
                    async: false
                }).responseText);

                var types = [];
                var totals = [];

                ticketsReservationMethods.forEach(function (x) {
                    types.push(x.title);
                    totals.push(x.total);
                });

                var options = {
                            series: [{
                                name:'عدد التذاكر',
                                data: totals
                            }],
                            chart: {
                                type: 'bar',
                                height: 350
                            },

                            plotOptions: {
                                bar: {
                                    borderRadius: 15,
                                    horizontal: true,
                                }
                            },
                            dataLabels: {
                                enabled: true
                            },
                            xaxis: {
                                type: 'category',
                                categories: types,
                            },
                            grid: {
                                xaxis: {
                                    lines: {
                                        show: true
                                    }
                                }
                            },
                            yaxis: {
                                reversed: true,
                                axisTicks: {
                                    // show: true
                                },
                                labels: {
                                    show: true,
                                    style: {
                                        colors: [],
                                        fontSize: '14px',
                                        fontFamily: 'Helvetica, Arial, sans-serif',
                                        fontWeight: 600,
                                        cssClass: 'apexcharts-xaxis-label',
                                    },

                                },
                            }
                        };

                var chart1 = new ApexCharts(document.querySelector("#ticketsReservationMethods"), options);

                chart1.render();
            }

        </script>

    </body>
</html>
