<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('template/plugins/bootstrap/css/bootstrap.min.css') }}">
    @stack('styles')
</head>

<body>
    @yield('content')
    <script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('template/dist/js/adminlte.js') }}"></script>
    @stack('scripts')
</body>

</html>

@extends('components.template.layout')

@section('judul', 'Dashboard')

@section('content')
    <br>
    <main class="main users chart-page" id="skip-target">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>100</h3>

                        <p>Total Properti Terjual</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>50</h3>
                        <p>Total Properti Tersedia</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 style="color:white;">150</h3>
                        <p style="color:white;">Total Properti</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>

        </div>

        <div class="card bg-gradient-info">
            <div class="card-header border-0">
                <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    Sales Graph
                </h3>

            </div>
            <div class="card-body">
                <canvas class="chart" id="line-chart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>

            <div class="card-footer bg-transparent">
                <div class="row">
                    <div class="col-4 text-center">
                        <input type="text" class="knob" value="20" data-width="60" data-height="60"
                            data-fgColor="#39CCCC" data-inputColor="#FFFFFF">
                        <div class="text-white">Mail-Orders</div>
                    </div>

                    <div class="col-4 text-center">
                        <input type="text" class="knob" value="20" data-width="60" data-height="60"
                            data-fgColor="#39CCCC" data-inputColor="#FFFFFF">
                        <div class="text-white">Online</div>
                    </div>

                    <div class="col-4 text-center">
                        <input type="text" class="knob" value="20" data-width="60" data-height="60"
                            data-fgColor="#39CCCC" data-inputColor="#FFFFFF">
                        <div class="text-white">In-Store</div>
                    </div>

                </div>
            </div>
        </div>



    </main>
@endsection

@push('scripts')
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>

    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('template/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

    <script src="{{ asset('template/plugins/sparklines/sparkline.js') }}"></script>

    <script src="{{ asset('template/dist/js/demo.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(function() {

            $('.knob').knob({

                draw: function() {

                    if (this.$.data('skin') == 'tron') {

                        var a = this.angle(this.cv),
                            sa = this.startAngle,
                            sat = this.startAngle,
                            ea,
                            eat = sat + a,
                            r = true

                        this.g.lineWidth = this.lineWidth

                        this.o.cursor &&
                            (sat = eat - 0.3) &&
                            (eat = eat + 0.3)

                        if (this.o.displayPrevious) {
                            ea = this.startAngle + this.angle(this.value)
                            this.o.cursor &&
                                (sa = ea - 0.3) &&
                                (ea = ea + 0.3)
                            this.g.beginPath()
                            this.g.strokeStyle = this.previousColor
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
                            this.g.stroke()
                        }

                        this.g.beginPath()
                        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
                        this.g.stroke()

                        this.g.lineWidth = 2
                        this.g.beginPath()
                        this.g.strokeStyle = this.o.fgColor
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth *
                            2 / 3, 0, 2 * Math.PI, false)
                        this.g.stroke()

                        return false
                    }
                }
            })

            var sparkline1 = new Sparkline($('#sparkline-1')[0], {
                width: 240,
                height: 70,
                lineColor: '#92c1dc',
                endColor: '#92c1dc'
            })
            var sparkline2 = new Sparkline($('#sparkline-2')[0], {
                width: 240,
                height: 70,
                lineColor: '#f56954',
                endColor: '#f56954'
            })
            var sparkline3 = new Sparkline($('#sparkline-3')[0], {
                width: 240,
                height: 70,
                lineColor: '#3af221',
                endColor: '#3af221'
            })

            sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
            sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
            sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])

        })
    </script>
    <script>
        $(document).ready(function() {
            var ctx = document.getElementById('line-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April'],
                    datasets: [{
                        label: 'Sales',
                        data: [10, 50, 30, 70],
                        fill: false,
                        borderColor: '#FFFFFF',
                        backgroundColor: '#FFFFFF',
                        tension: 0.1,
                        pointBorderColor: '#FFFFFF',
                        pointBackgroundColor: '#FFFFFF',
                        borderWidth: 2,
                        borderColor: 'rgba(255, 255, 255, 1)',

                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#FFFFFF'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#FFFFFF'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#FFFFFF'
                            }
                        },
                        tooltip: {
                            bodyFontColor: '#FFFFFF',
                            titleFontColor: '#FFFFFF',
                            footerFontColor: '#FFFFFF'
                        }
                    }
                }
            });
        });
    </script>
@endpush
