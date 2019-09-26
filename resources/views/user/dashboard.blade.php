@extends('layouts.user')
@section('style')

@endsection
@section('content')

    <div class="page-body">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="text-center">Estatus del Plan</h5>
                    </div>
                    <div class="card-block">

                        <div class="card-body text-center">

                            <h3>Plan Actual : {{ $user->plan->name }}</h3>
                            <br>
                            @if($user->plan_status == 0 && $user->plan->name !='Equipo' && $user->plan->name !='Cortesía')
                                <h5>Completa tu pago para acceder a las funciones avanzadas <br>{{$user->plan->price}} {{ $basic->currency }}</h5>
                            @else
                                @if($user->plan->plan_type == 0)
                                    <h3>Duración disponible: {{ \Carbon\Carbon::parse($user->expire_time)->diffInDays()  }} - Días Disponibles</h3>
                                @else
                                    <h3>Duración Ilimitada</h3>
                                @endif
                            @endif
                            <br>
                            @if($user->plan_status != 0 or $user->plan->price_type == 0)
                                <a href="{{ route('user-upgrade-plan') }}" class="btn text-white btn-primary font-weight-bold text-uppercase btn-min-width mr-1 mb-1">Mejora tu plan</a>
                            @else
                                <a href="{{ route('chose-payment-method') }}" class="btn text-white btn-warning font-weight-bold text-uppercase btn-min-width mr-1 mb-1">Completa tu pago</a>
                                <!--<a href="{{ route('user-upgrade-plan') }}" class="btn text-white btn-primary font-weight-bold text-uppercase btn-min-width mr-1 mb-1">Mejora tu plan</a>-->
                            @endif
                            <br>
                            <br>
                        </div>

                    </div>
                </div>
            </div>
            <!--<div class="col-sm-6">-->
                <!--<div class="card">-->
                <!--    <div class="card-header text-center">-->
                <!--        <h5>Estado de la Señal</h5>-->
                <!--    </div>-->
                <!--    <div class="card-block">-->

                <!--        <div class="card-body text-center font-weight-bold">-->
                <!--            <br>-->
                <!--            <h3>Nueva Señal : {{ $new_signal }}</h3>-->
                <!--            <br>-->
                <!--            <h3 style="margin-bottom: 32px;">Total de Señales : {{ $all_signal }}</h3>-->
                <!--            <br>-->
                <!--            <br>-->
                <!--        </div>-->

                <!--    </div>-->
                <!--</div>-->
            <!--</div>-->
        </div>
    </div>
    
    <!--<div style="text-align: center; padding: 0 0 30px; font-size: 18px;">-->
    <!--    Nivel de conocimiento: {{ $user->level }}-->
    <!--</div>-->

    <!--<div class="page-body">-->
    <!--    <div class="row">-->
    <!--        <div class="col-sm-12">-->
    <!--            <div class="card">-->
    <!--                <div class="card-header">-->
    <!--                    <h5>Estadística de Señales</h5>-->
    <!--                    <div class="card-header-right">-->
    <!--                        <ul class="list-unstyled card-option">-->
    <!--                            <li><i class="fa fa-chevron-left"></i></li>-->
    <!--                            <li><i class="fa fa-window-maximize full-card"></i></li>-->
    <!--                            <li><i class="fa fa-minus minimize-card"></i></li>-->
    <!--                            <li><i class="fa fa-times close-card"></i></li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="card-block">-->
    <!--                    <div class="row">-->
    <!--                        <div class="col-md-12">-->
                                <!-- small box -->
    <!--                            <div class="small-box">-->
    <!--                                <canvas id="lineChart" style="width: auto; height: auto"></canvas>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->


@endsection
@section('scripts')

    <script type="text/javascript" src="{{ asset('assets/admin/js/Chart.min.js') }}"></script>

    <script language="JavaScript">
        displayLineChart();
        function displayLineChart() {
            var data = {
                labels: [
                    @foreach($dL as $l)
                        '{{ $l }}',
                    @endforeach
                ],
                datasets: [
                    {
                        label: "Prime and Fibonacci",
                        fillColor: "#3dbcff",
                        strokeColor: "#0099ff",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [
                            @foreach($dV as $d)
                                '{{ $d }}',
                            @endforeach
                        ]
                    }
                ]
            };
            var ctx = document.getElementById("lineChart").getContext("2d");
            var options = {
                responsive: true
            };
            var lineChart = new Chart(ctx).Line(data, options);
        }
    </script>
@endsection