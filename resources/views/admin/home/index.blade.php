@extends('adminlte::page')

@section('title', '- Dashboard')
@section('plugins.Chartjs', true)

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fa fa-fw fa-digital-tachograph"></i> Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalAccess }}</h3>
                            <p>Visitantes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $onlineUsers }}</h3>
                            <p>Usários Online</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $pages }}</h3>
                            <p>Páginas</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $users }}</h3>
                            <p>Usuários</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row px-0 pb-5 mb-5">
                <div class="col-12 col-lg-6" style="display: block; height: 300px;">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Acessos Diários: {{ $access }}</h3>
                                <p class="ml-auto mb-0 d-flex flex-column text-right">
                                    <span id="percentclass" class="{{ $percent > 0 ? 'text-success' : 'text-danger' }}">
                                        <i id="percenticon"
                                            class="fas {{ $percent > 0 ? 'fa-arrow-up' : 'fa-arrow-down' }}  mr-1"></i><span
                                            id="percentvalue">{{ $percent }}</span>%
                                    </span>
                                    <span class="text-muted">em relação ao dia anterior</span>
                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="position-relative mb-4">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div></div>
                                    </div>
                                </div>
                                <canvas id="visitorsChart" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6" style="display: block; height: 300px;">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Páginas mais Vistas</span>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="position-relative mb-4" style="display: block; height: 255px;">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div></div>
                                    </div>
                                </div>
                                <canvas id="topPageChart" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script>
        const visitors = document.getElementById('visitorsChart');
        if (visitors) {
            visitors.getContext('2d');
            const visitorsChart = new Chart(visitors, {
                type: 'line',
                data: {
                    labels: ({!! json_encode($chart->labels) !!}),
                    datasets: [{
                        label: 'Acessos por horário',
                        data: {!! json_encode($chart->dataset) !!},
                        borderWidth: 1,
                        borderColor: '#007bff',
                        backgroundColor: 'transparent'
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    legend: {
                        labels: {
                            boxWidth: 0,
                        }
                    },
                },
            });

            let getData = function() {

                $.ajax({
                    url: "{{ route('admin.home.chart') }}",
                    type: "GET",
                    success: function(data) {
                        visitorsChart.data.labels = data.chart.labels;
                        visitorsChart.data.datasets[0].data = data.chart.dataset;
                        visitorsChart.update();
                        $("#onlineusers").text(data.onlineUsers);
                        $("#accessdaily").text(data.access);
                        $("#percentvalue").text(data.percent);
                        const percentclass = $("#percentclass");
                        const percenticon = $("#percenticon");
                        percentclass.removeClass('text-success');
                        percentclass.removeClass('text-danger');
                        percenticon.removeClass('fa-arrow-up');
                        percenticon.removeClass('fa-arrow-down');
                        if (parseInt(data.percent) > 0) {
                            percentclass.addClass('text-success');
                            percenticon.addClass('fa-arrow-up');
                        } else {
                            percentclass.addClass('text-danger');
                            percenticon.addClass('fa-arrow-down');
                        }
                    }
                });
            };
            setInterval(getData, 10000);
        }

        const topPage = document.getElementById('topPageChart');
        if (topPage) {
            visitors.getContext('2d');
            const topPageChart = new Chart(topPage, {
                type: 'pie',
                data: {
                    labels: ({!! json_encode($topPages->labels) !!}),
                    datasets: [{
                        label: 'Páginas mais vistas',
                        data: {!! json_encode($topPages->dataset) !!},
                        borderWidth: 1,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 205, 86)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                        ],
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'left',
                    },
                },
            });
        }
    </script>
@endsection
