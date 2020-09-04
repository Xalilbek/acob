@extends('admin.admin_app')

@section('content')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-xs-12">
                        <div class="card bg-teal">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-body white text-xs-left">
                                            <h3>{{ $statistic['counts']['projectsCount'] }}</h3>
                                            <span>Proyektlər</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-bag2 white font-large-2 float-xs-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-xs-12">
                        <div class="card bg-cyan">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <i class="icon-pencil white font-large-2 float-xs-left"></i>
                                        </div>
                                        <div class="media-body white text-xs-right">
                                            <h3>{{ $statistic['counts']['partnersCount'] }}</h3>
                                            <span>Partnyorlar</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-xs-12">
                        <div class="card bg-deep-orange">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <i class="icon-chat1 white font-large-2 float-xs-left"></i>
                                        </div>
                                        <div class="media-body white text-xs-right">
                                            <h3>{{ $statistic['counts']['vacanciesCount'] }}</h3>
                                            <span>Vakansiyalar</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-xs-12">
                        <div class="card bg-pink">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <i class="icon-map1 white font-large-2 float-xs-left"></i>
                                        </div>
                                        <div class="media-body white text-xs-right">
                                            <h3>{{ $statistic['counts']['usersCount'] }}</h3>
                                            <span>Ümumi ziyarət</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="chartjs-pie-charts">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ziyarətçilərin daxil olduğu ölkələr</h4>
                                </div>
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                        <canvas id="country-chart" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ziyarətçilərin daxil olduğu şəhərlər</h4>
                                </div>
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                        <canvas id="city-chart" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="flot-bar-charts">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header" style="display: flex;">
                                    <h4 class="card-title">Ziyarətçi dəyişməsi</h4>
                                    <div style="margin-left: 20px;">
                                        <label for="date" style="
                                        color: #6c6f71;
                                        font-size: 18px;
                                        font-weight: 500;
                                        margin-right: 10px;">Tarix</label>
                                        <select name="date" id="date">
                                            <option value="day">Günlük</option>
                                            <option value="month">Aylıq</option>
                                            <option value="year">İllik</option>
                                        </select>
                                    </div>
                                    <div style="margin-left: 20px;">
                                        <form id="month_form" action="">
                                            <label for="month" style="
                                        color: #6c6f71;
                                        font-size: 18px;
                                        font-weight: 500;
                                        margin-right: 10px;">Aylar</label>
                                            <select name="month" id="month">
                                                <option value="01" {{ $statistic['selectedMonth'] == "01" ? "selected" : ""}}>Yanvar</option>
                                                <option value="02" {{ $statistic['selectedMonth'] == "02" ? "selected" : "" }}>Fevral</option>
                                                <option value="03" {{ $statistic['selectedMonth'] == "03" ? "selected" : "" }}>Mart</option>
                                                <option value="04" {{ $statistic['selectedMonth'] == "04" ? "selected" : "" }}>Aprel</option>
                                                <option value="05" {{ $statistic['selectedMonth'] == "05" ? "selected" : "" }}>May</option>
                                                <option value="06" {{ $statistic['selectedMonth'] == "06" ? "selected" : "" }}>İyun</option>
                                                <option value="07" {{ $statistic['selectedMonth'] == "07" ? "selected" : "" }}>İyul</option>
                                                <option value="08" {{ $statistic['selectedMonth'] == "08" ? "selected" : "" }}>Avqust</option>
                                                <option value="09" {{ $statistic['selectedMonth'] == "09" ? "selected" : "" }}>Sentyabr</option>
                                                <option value="10" {{ $statistic['selectedMonth'] == "10" ? "selected" : "" }}>Oktyabr</option>
                                                <option value="11" {{ $statistic['selectedMonth'] == "11" ? "selected" : "" }}>Noyabr</option>
                                                <option value="12" {{ $statistic['selectedMonth'] == "12" ? "selected" : "" }}>Dekabr</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                        <canvas id="line-chart" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')
    <script src="{{ asset('assets/vendors/js/charts/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/charts/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/charts/flot/jquery.flot.categories.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/charts/flot/jquery.flot.stack.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/charts/flot/jquery.flot.navigate.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/js/scripts/charts/flot/bar/bar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/charts/flot/bar/annotations.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/charts/flot/bar/stacked-bar.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/js/scripts/charts/chartjs/pie-doughnut/pie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/charts/chartjs/pie-doughnut/pie-simple.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/charts/chartjs/pie-doughnut/doughnut.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/charts/chartjs/pie-doughnut/doughnut-simple.js') }}"
            type="text/javascript"></script>

    <script>
        let ctx = document.getElementById('country-chart').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [{!! $statistic['countryList'] !!}],
                datasets: [{
                    label: '# of Votes',
                    data: [{{ $statistic['countryCountList'] }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(230, 110, 240, 1)',
                        'rgba(140, 50, 110, 1)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(230, 110, 240, 1)',
                        'rgba(140, 50, 110, 1)',
                    ],
                    borderWidth: 1
                }]
            }
        });

        let ctxCity = document.getElementById('city-chart').getContext('2d');
        let myChartCity = new Chart(ctxCity, {
            type: 'pie',
            data: {
                labels: [{!! $statistic['cityList'] !!}],
                datasets: [{
                    label: '# of Votes',
                    data: [{{ $statistic['cityCountList'] }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(230, 110, 240, 1)',
                        'rgba(140, 50, 110, 1)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(230, 110, 240, 1)',
                        'rgba(140, 50, 110, 1)',
                    ],
                    borderWidth: 1
                }]
            }
        });

        let lineChart = document.getElementById('line-chart').getContext('2d');

        let dayLineChart = {
            type: 'line',
            data: {
                labels: {!! $statistic['daysList'] !!},
                datasets: [{
                    label: 'Günlər üzrə ziyarətçi sayı',
                    data: {!! $statistic['daysCountList'] !!},
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            reverse: false,
                            stepSize: 1
                        },
                    }]
                }
            }
        };

        let monthLineChart = {
            type: 'line',
            data: {
                labels: {!! (string)App\Http\Helper\Standard::months() !!},
                datasets: [{
                    label: 'Aylar üzrə ziyarətçi sayı',
                    data: {!! $statistic['monthsCountList'] !!},
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            reverse: false,
                            stepSize: 1
                        },
                    }]
                }
            }
        };

        let yearLineChart = {
            type: 'line',
            data: {
                labels: {!! $statistic['yearsList'] !!},
                datasets: [{
                    label: 'İllər üzrə ziyarətçi sayı',
                    data: {!! $statistic['yearsCountList'] !!},
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            reverse: false,
                            stepSize: 1
                        },
                    }]
                }
            }
        };

        let myLineChart = new Chart(lineChart, dayLineChart);


        $('#date').on('change',function(e){
           // console.log(e.target.value);
            if(e.target.value === "month"){
                myLineChart = new Chart(lineChart,monthLineChart)
            }
            else if(e.target.value === "year"){
                myLineChart = new Chart(lineChart,yearLineChart)
            }
            else {
                myLineChart = new Chart(lineChart,dayLineChart)
            }
        });

        $('#month').on('change',function(e){
           $('#month_form').submit();
        });
    </script>
@endsection
