@extends("admin.layout")
@section("main")

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{"/admin"}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="height: 112px">
                <div class="inner">
                    <h3 style="color: #c82333">${{$d1}}</h3>

                    <p class="small-box-footer" ><p style="color: white">Today revenue</p></p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3 style="color: #c82333">${{$now}}</h3>

                    <p style="color: #941616">Month revenue now</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 style="color: #c82333">{{$user}} Users</h3>

                    <a href="{{url("/admin/users")}}" class="small-box-footer" style="color: #940505"> <p>User Registrations</p></a>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>
                        @if(isset($orders) && count($orders) > 0)
                            {{ count($orders) }}
                        @else
                            No orders found
                        @endif
                    </h3>

                    <a href="{{url("/admin/new_orders")}}" class="small-box-footer" style="color: #52b9ef"> <p>New Orders</p></a>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row" style="width: 2000px;margin-left: 35px">


        <!-- Left col -->
        <section class="col-lg-7 connectedSortable" style="width: 100%;float: left">
            <!-- Custom tabs (Charts with tabs)-->


            <div class="chart_line" style="width:100%;float: left;background-color: #454d55">

                <div class="chart_day_1" style="background-color: white;border-radius: 3px;margin-bottom: 20px;width: 49%";>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                    <body>
                    <canvas id="myLineChart" style="width:100%;max-width:2000px"></canvas>

                    <script>
                        const x = [{{$n10}},{{$n9}},{{$n8}},{{$n7}},{{$n6}},{{$n5}},{{$n4}},{{$n3}},{{$n2}}, {{$n1}}];

                        new Chart("myLineChart", {
                            type: "line",
                            data: {
                                labels: x,
                                datasets: [{
                                    data: [{{$d10 }},{{$d9}},{{$d8}},{{$d7}},{{$d6}},{{$d5}},{{$d4}},{{$d3}}, {{$d2}}, {{$d1}}],
                                    borderColor: "red",
                                    fill: false
                                }]
                            },
                            options: {
                                legend: {display: false},
                                title: {
                                    display: true,
                                    text: "Revenue of the past days"
                                }
                            }
                        });
                    </script>
                    </body>
                </div>


                <div class="chart_day_2" style="background-color: white;border-radius: 3px;margin-bottom: 20px;width: 49%;margin-left: 587px;margin-top: -301px">


                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                    <body>
                    <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>

                    <script>
                        const xCount = [{{$n10}},{{$n9}},{{$n8}},{{$n7}},{{$n6}},{{$n5}},{{$n4}},{{$n3}},{{$n2}},{{$n1}}];
                        const yCount = [{{$c10}},{{$c9}},{{$c8}},{{$c7}},{{$c6}},{{$c5}},{{$c4}},{{$c3}}, {{$c2}}, {{$c1}}];

                        new Chart("myChart1", {
                            type: "line",
                            data: {
                                labels: xCount,
                                datasets: [{
                                    fill: false,
                                    lineTension: 0,
                                    backgroundColor: "rgba(0,0,255,1.0)",
                                    borderColor: "rgba(0,0,255,0.1)",
                                    data: yCount
                                }]
                            },
                            options: {
                                legend: {display: false},
                                scales: {
                                    yAxes: [{ticks:{min:0.9}}],
                                },
                                title: {
                                    display: true,
                                    text: "Number of orders in recent days"
                                }
                            }
                        });
                    </script>

                    </body>
                </div>


                <div class="chart_day_3" style="background-color: white;border-radius: 3px;margin-bottom: 20px;width: 49%">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                <body>
                <canvas id="newChart" style="width:100%;max-width:2000px"></canvas>

                <script>
                    const y = [{{$n10}},{{$n9}},{{$n8}},{{$n7}},{{$n6}},{{$n5}},{{$n4}},{{$n3}},{{$n2}}, {{$n1}}];

                    new Chart("newChart", {
                        type: "line",
                        data: {
                            labels: y,
                            datasets: [{
                                data: [{{$d10 }},{{$d9}},{{$d8}},{{$d7}},{{$d6}},{{$d5}},{{$d4}},{{$d3}}, {{$d2}}, {{$d1}}],
                                borderColor: "blue",
                                fill: false
                            }, {
                                data: [{{$s10}},{{$s9}},{{$s8}},{{$s7}},{{$s6}},{{$s5}},{{$s4}},{{$s3}},{{$s2}},{{$s1}}],
                                borderColor: "red",
                                fill: false
                            }]
                        },
                        options: {
                            legend: {display: false},
                            title: {
                                display: true,
                                text: "Expected and actual revenue"
                            }
                        }
                    });
                </script>
                </body>
                </div>


            </div>

            <div class="chart_month" style="background-color: white;border-radius: 3px;margin-bottom: 20px">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                <body>

                <canvas id="myChart" style="width:100%;max-width:2000px"></canvas>

                <script>
                    const xValues = ["January", "February", "March", "April", "May","June","July","August","September","October","November","December"];
                    const yValues = [{{$x1}}, {{$x2}}, {{$x3}}, {{$x4}}, {{$x5}}, {{$x6}},{{$x7}},{{$x8}},{{$x9}},{{$x10}},{{$x11}},{{$x12 }}];
                    const barColors = ["red", "green","blue","orange","brown","red","purple","black","red","grey","yellow","orange"];

                    new Chart("myChart", {
                        type: "bar",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                            }]
                        },
                        options: {
                            legend: {display: false},
                            title: {
                                display: true,
                                text: "Revenue of the months of this year (${{$sumtotal}})"
                            }
                        }
                    });
                </script>
                </body>
            </div>
        </section>
    </div>


@endsection
