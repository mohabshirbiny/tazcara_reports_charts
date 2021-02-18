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
                            <form id="search-form" >
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
                                            <option value="">--- اختر الشركة ---</option>
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
                          <div id="chart-internetTickets" class='chart'>
                            <div id="internetTickets" ></div>
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
                            <div id="chart-compLinesOnlineVsOffline" class='chart'>
                              <div id="compLinesOnlineVsOffline" ></div>
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
                          <div id="chart-bestSellerStationOnline"class='chart'>
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
                            <div id="chart-bestSellerStationOffline"class='chart'>
                              <div id="bestSellerStationOffline" ></div>
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
                          <div id="chart-topOrganizationsTrips"class='chart'>
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
                            <div id="chart-topOrganizationsStations"class='chart'>
                              <div id="topOrganizationsStations" ></div>
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
                          <div id="chart-BestSellerTicketTypes"class='chart'>
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
                            <div id="chart-ticketsReservationMethods"class='chart'>
                              <div id="ticketsReservationMethods" ></div>
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
                          <h3 class="card-title">مبيعات الشباك</h3>

                        </div>
                        <div class="card-body">
                          <div id="chart-OfflineSales"class='chart'>
                            <div id="OfflineSales"  ></div>
                          </div>

                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">اجمالی مستحقات مبیعات الاونلاین عن فترة</h3>

                        </div>
                        <div class="card-body">
                            <div id="chart-OnlineSales"class='chart'>
                              <div id="OnlineSales" ></div>
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
                          <h3 class="card-title"> أعلى 10 خطوط مبيعا اونلاين </h3>

                        </div>
                        <div class="card-body">
                          <div id="chart-topDestinationSalesOnline"class='chart'>
                            <div id="topDestinationSalesOnline"  ></div>
                          </div>

                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> أعلى 10 خطوط مبيعا اوفلاين </h3>

                        </div>
                        <div class="card-body">
                            <div id="chart-topDestinationSalesOffline"class='chart'>
                              <div id="topDestinationSalesOffline" ></div>
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
                          <h3 class="card-title"> عدد العملاء المسجلین </h3>

                        </div>
                        <div class="card-body">
                          <div id="chart-RegisteredClients"class='chart'>
                            <div id="RegisteredClients"  ></div>
                          </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> أرصدة كروت الشحن المحصلة </h3>

                        </div>
                        <div class="card-body">
                            <div id="chart-collectedBalance"class='chart'>
                              <div id="collectedBalance" ></div>
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
                          <h3 class="card-title"> أعلى طرق الدفع استخداما </h3>

                        </div>
                        <div class="card-body">
                          <div id="chart-mostUsedPaymentMethod"class='chart'>
                            <div id="mostUsedPaymentMethod"  ></div>
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

                loadAllCharts();

            })

            $("form").on("submit", function(event){
                event.preventDefault();

                var searchParamters = $('form').serialize();

                // clear all charts to rebulid them
                $('.chart').empty();

                // load charts again
                loadAllCharts(searchParamters);
            });

            function loadAllCharts(searchParamters) {

                // Online Vs. Offline خطوط شرکات النقل
                loadcompLinesOnlineVsOffline(searchParamters);

                // اعلى 10 محطات مبيعا اونلاين
                loadBestSellerStationOnline(searchParamters);

                // تذاكر الانترنت
                loadInternetTickets(searchParamters);

                // اعلى 10 محطات مبيعا اوفلاين
                loadBestSellerStationOffline(searchParamters);

                // أعلى 10 شركات لعدد الرحلات
                loadtopOrganizationsTrips(searchParamters);

                //أعلى 10 شركات لعدد المحطات
                loadtopOrganizationsStations(searchParamters);

                //فئات التذاكر الاعلى مبيعا
                loadBestSellerTicketTypes(searchParamters);

                // قنوات حجز التذاكر
                loadticketsReservationMethods(searchParamters);

                // اجمالی مستحقات مبیعات الاونلاین عن فترة
                loadOnlineSales(searchParamters);

                //مبيعات الشباك
                loadOfflineSales(searchParamters);

                loadtopDestinationSalesOnline(searchParamters);

                loadtopDestinationSalesOffline(searchParamters);

                // أرصدة كروت الشحن المحصلة
                loadcollectedBalance(searchParamters);
                
                // عدد العملاء المسجلین
                getRegisteredClients(searchParamters);

                // أعلى طرق الدفع استخداما
                mostUsedPaymentMethod(searchParamters);
            }

            function loadInternetTickets(searchParamters )  {

                var BestSellerOnlineStations = $.parseJSON($.ajax({
                    url:  '{{route('getInternetTickets')}}',
                    dataType: "json",
                    data: searchParamters,
                    async: false
                }).responseText);

                var types = [];
                var totals = [];

                BestSellerOnlineStations.forEach(function (x) {
                    types.push(x.type);
                    totals.push(x.total);
                });

                var options = {
                    series: totals,
                    chart: {
                    width: 380,
                    type: 'pie',
                    },
                    labels: types,
                    responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                        width: 200
                        },
                        legend: {
                        position: 'bottom'
                        }
                    }
                    }]
                    };

                    createChartElementIfNotExist('internetTickets');

                var chart = new ApexCharts(document.querySelector("#internetTickets"), options);

                chart.render();
            }

            function loadcompLinesOnlineVsOffline(searchParamters) {

                var compLinesOnlineVsOffline = $.parseJSON($.ajax({
                    url:  '{{route('compLinesOnlineVsOffline')}}',
                    dataType: "json",
                    data: searchParamters,
                    async: false
                }).responseText);

                var stations = [];
                var onlineTickets = [];
                var offlineTickets = [];

                compLinesOnlineVsOffline.forEach(function (x,y) {

                    stations.push(Object.keys(x)[0]);
                    offlineTickets.push(Object.values(x)[0].Offline);
                    onlineTickets.push(Object.values(x)[0].Online);
                });

                var options = {

                            series: [{
                                name:'اونلاين',
                                data: onlineTickets,
                            },{
                                name:'اوفلاين',
                                data: offlineTickets,
                            }],

                            chart: {
                                type: 'bar',
                                height: 350
                            },

                            plotOptions: {
                                bar: {
                                    // borderRadius: 45,
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

                createChartElementIfNotExist('compLinesOnlineVsOffline');

                var chart = new ApexCharts(document.querySelector("#compLinesOnlineVsOffline"), options);

                chart.render();
            }

            function loadBestSellerStationOnline(searchParamters) {

                var BestSellerOnlineStations = $.parseJSON($.ajax({
                    url:  '{{route('stationBestSeller','Online')}}',
                    dataType: "json",
                    data: searchParamters,
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
                                    // borderRadius: 45,
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

                createChartElementIfNotExist('bestSellerStationOnline');

                var chart = new ApexCharts(document.querySelector("#bestSellerStationOnline"), options);

                chart.render();
            }

            function loadBestSellerStationOffline(searchParamters) {

                var BestSellerOfflineStations = $.parseJSON($.ajax({
                    url:  '{{route('stationBestSeller','Offline')}}',
                    dataType: "json",
                    data: searchParamters,
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

                createChartElementIfNotExist('bestSellerStationOffline');
                var chart1 = new ApexCharts(document.querySelector("#bestSellerStationOffline"), options);

                chart1.render();
            }

            function loadtopOrganizationsTrips(searchParamters) {

                var BestSellerOfflineStations = $.parseJSON($.ajax({
                    url:  '{{route('topOrganizationsTrips')}}',
                    dataType: "json",
                    data: searchParamters,
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

                        createChartElementIfNotExist('topOrganizationsTrips');

                var chart1 = new ApexCharts(document.querySelector("#topOrganizationsTrips"), options);

                chart1.render();
            }

            function loadtopOrganizationsStations(searchParamters) {

                var topOrganizationsStations = $.parseJSON($.ajax({
                    url:  '{{route('topOrganizationsStations')}}',
                    dataType: "json",
                    data: searchParamters,
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

                        createChartElementIfNotExist('topOrganizationsStations');

                var chart1 = new ApexCharts(document.querySelector("#topOrganizationsStations"), options);

                chart1.render();
            }

            function loadBestSellerTicketTypes(searchParamters) {

                var BestSellerTicketTypes = $.parseJSON($.ajax({
                    url:  '{{route('BestSellerTicketTypes')}}',
                    dataType: "json",
                    data: searchParamters,
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

                        createChartElementIfNotExist('BestSellerTicketTypes');

                var chart1 = new ApexCharts(document.querySelector("#BestSellerTicketTypes"), options);

                chart1.render();
            }

            function loadticketsReservationMethods(searchParamters) {

                var ticketsReservationMethods = $.parseJSON($.ajax({
                    url:  '{{route('ticketsReservationMethods')}}',
                    dataType: "json",
                    data: searchParamters,
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
                createChartElementIfNotExist('ticketsReservationMethods');

                var chart1 = new ApexCharts(document.querySelector("#ticketsReservationMethods"), options);

                chart1.render();
            }

            function loadOfflineSales(searchParamters) {

                var OfflineSales = $.parseJSON($.ajax({
                    url:  '{{route('OfflineSales')}}',
                    dataType: "json",
                    data: searchParamters,
                    async: false
                }).responseText);

                var organization = [];
                var totals = [];

                OfflineSales.forEach(function (x) {
                    organization.push(x.name);
                    totals.push(x.total);
                });

                var options = {
                            series: [{
                                name:'الاجمالي بالجنيه',
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
                                categories: organization,
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

                        createChartElementIfNotExist('OfflineSales');
                var chart1 = new ApexCharts(document.querySelector("#OfflineSales"), options);

                chart1.render();
            }

            function loadOnlineSales(searchParamters) {

                var OnlineSales = $.parseJSON($.ajax({
                    url:  '{{route('OnlineSales')}}',
                    dataType: "json",
                    data: searchParamters,
                    async: false
                }).responseText);

                var organization = [];
                var totals = [];

                OnlineSales.forEach(function (x) {
                    organization.push(x.name);
                    totals.push(x.total);
                });

                var options = {
                            series: [{
                                name:'الاجمالي بالجنيه',
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
                                categories: organization,
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

                createChartElementIfNotExist('OnlineSales');

                var chart1 = new ApexCharts(document.querySelector("#OnlineSales"), options);

                chart1.render();
            }

            function loadtopDestinationSalesOnline(searchParamters) {

                var topDestinationSalesOnline = $.parseJSON($.ajax({
                    url:  '{{route('topDestinationSales','Online')}}',
                    dataType: "json",
                    data: searchParamters,
                    async: false
                }).responseText);

                var linenames = [];
                var tickets = [];

                topDestinationSalesOnline.forEach(function (x) {
                    linenames.push(x.linename);
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
                                    // borderRadius: 45,
                                    horizontal: true,
                                }
                            },
                            dataLabels: {
                                enabled: true
                            },
                            xaxis: {
                                categories: linenames,
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

                createChartElementIfNotExist('topDestinationSalesOnline');

                var chart = new ApexCharts(document.querySelector("#topDestinationSalesOnline"), options);

                chart.render();
            }

            function loadtopDestinationSalesOffline(searchParamters) {

                var topDestinationSalesOffline = $.parseJSON($.ajax({
                    url:  '{{route('topDestinationSales','Offline')}}',
                    dataType: "json",
                    data: searchParamters,
                    async: false
                }).responseText);

                var linenames = [];
                var tickets = [];

                topDestinationSalesOffline.forEach(function (x) {
                    linenames.push(x.linename);
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
                                categories: linenames,


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
                createChartElementIfNotExist('topDestinationSalesOffline');

                var chart1 = new ApexCharts(document.querySelector("#topDestinationSalesOffline"), options);

                chart1.render();
            }

            function loadcollectedBalance(searchParamters) {

                var collectedBalance = $.parseJSON($.ajax({
                    url:  '{{route('collectedBalance')}}',
                    dataType: "json",
                    data: searchParamters,
                    async: false
                }).responseText);

                var stations = [];
                var totals = [];

                collectedBalance.forEach(function (x) {
                    stations.push(x.name);
                    totals.push(x.total);
                });

                var options = {
                            series: [{
                                name:'الاجمالي',
                                data: totals
                            }],
                            chart: {
                                type: 'bar',
                                height: 350
                            },

                            plotOptions: {
                                bar: {
                                    // borderRadius: 15,
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
                createChartElementIfNotExist('collectedBalance');

                var chart1 = new ApexCharts(document.querySelector("#collectedBalance"), options);

                chart1.render();
            }
            
            function getRegisteredClients(searchParamters) {

                var RegisteredClients = $.parseJSON($.ajax({
                    url:  '{{route('getRegisteredClients')}}',
                    dataType: "json",
                    data: searchParamters,
                    async: false
                }).responseText);

                var stations = [];
                var totals = [];

                RegisteredClients.forEach(function (x) {
                    stations.push(x.type);
                    totals.push(x.total);
                });

                var options = {
                            series: [{
                                name:'الاجمالي',
                                data: totals
                            }],
                            chart: {
                                type: 'bar',
                                height: 350
                            },

                            plotOptions: {
                                bar: {
                                    // borderRadius: 15,
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
                createChartElementIfNotExist('RegisteredClients');

                var chart1 = new ApexCharts(document.querySelector("#RegisteredClients"), options);

                chart1.render();
            }
            
            function mostUsedPaymentMethod(searchParamters) {

                var mostUsedPaymentMethod = $.parseJSON($.ajax({
                    url:  '{{route('mostUsedPaymentMethod')}}',
                    dataType: "json",
                    data: searchParamters,
                    async: false
                }).responseText);

                var stations = [];
                var totals = [];

                mostUsedPaymentMethod.forEach(function (x) {
                    stations.push(x.type);
                    totals.push(x.total);
                });

                var options = {
                            series: [{
                                name:'الاجمالي',
                                data: totals
                            }],
                            chart: {
                                type: 'bar',
                                height: 350
                            },

                            plotOptions: {
                                bar: {
                                    // borderRadius: 15,
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
                createChartElementIfNotExist('mostUsedPaymentMethod');

                var chart1 = new ApexCharts(document.querySelector("#mostUsedPaymentMethod"), options);

                chart1.render();
            }


            /**************************************************************** */
            function createChartElementIfNotExist(chartDivId) {

                var parentId = "chart-"+chartDivId;

                if (document.getElementById(parentId).children.length == 0) {
                    dc = document.createElement("div");
                    dc.id = chartDivId;
                    document.getElementById(parentId).appendChild(dc);
                }
            }

        </script>

    </body>
</html>
