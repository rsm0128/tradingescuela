@extends('layouts.user')
@section('content')
    <style>
        h3 small {
            color: #ccc;
        font-size: 60%;
        }
    </style>
    <div class="page-body">
        <div class="row no-gutters">
            @foreach($plan as $k => $p)
                <div id="plan-wrapper_{{ $p->id }}" class="col-md-4 pr-1">
                    <div class="list-group text-center my-3">
                        <div class="list-group-item text-white <?php if($p->has_promo == 1){ echo ' bg-success'; }else{echo ' bg-primary';}?>">
                            <h4 class="text-center text-uppercase font-weight-bold my-1">{{$p->name}}</h4>
                        </div>
                        <div class="list-group-item font-weight-bold">
                            <h3>
                                @if($p->price == 0)
                                    GRATIS
                                @else
                                    {{$basic->symbol}}{{$p->price}}
                                @endif
                                {!! $p->has_promo == 1 ? '<small id="timer_'.$p->id.'"></small>' : '' !!}
                            </h3>
                        </div>
                        <!--@if($p->plan_type == 0)-->
                        <!--    <a href="#" class="list-group-item">-->
                        <!--        <h4>{{$p->duration}} - Días</h4>-->
                        <!--    </a>-->
                        <!--@else-->
                        <!--    <a href="#" class="list-group-item">-->
                        <!--        <h4>Ilimitado</h4>-->
                        <!--    </a>-->
                        <!--@endif-->
                        <!--<a href="#" class="list-group-item">-->
                        <!--    <h4>Alerta por SMS - {{$p->sms_status == 1 ? 'SI' : 'NO'}}</h4>-->
                        <!--</a>-->
                        <!--<a href="#" class="list-group-item">-->
                        <!--    <h4>Alerta por Telegram - {{$p->telegram_status == 1 ? 'SI' : 'NO'}}</h4>-->
                        <!--</a>-->
                        <!--<a href="#" class="list-group-item">-->
                        <!--    <h4>Soporte - {{$p->support}}</h4>-->
                        <!--</a>-->
                        <!--<a href="#" class="list-group-item">-->
                        <!--    <h4>Curso Básico de Forex  - {{ $p->forex_course == 1 ? 'SI' : 'NO' }}</h4>-->
                        <!--</a>-->
                        <!--<a href="#" class="list-group-item">-->
                        <!--    <h4>Accceso a seminarios - {{$p->seminar_status == 1 ? 'SI' : 'NO'}}</h4>-->
                        <!--</a>-->
                        <!--<a href="#" class="list-group-item">-->
                        <!--    <h4>Consultoría en grupo de Telegram - {{$p->telegram_group_status == 1 ? 'SI' : 'NO'}}</h4>-->
                        <!--</a>-->

                        <!--<div class="list-group-item">-->
                        <!--    <button type="button" class="btn btn-grd-primary btn-lg btn-block text-truncate delete_button" data-toggle="modal" data-target="#DelModal" data-id="{{$p->id}}"> <i class="fa fa-send"></i> Mejorar</button>-->
                        <!--</div>-->
                    </div>
                </div>
            @endforeach
        </div>
    </div><!---ROW-->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-exclamation-triangle'></i> Confirmation !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <!--strong>¿Está seguro de que quiere mejorar el plan?</strong-->
                    <strong>Se va a agregar los días del nuevo plan.</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('upgrade-plan-submit') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="delete_id" id="delete_id" class="delete_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary deleteButton"><i class="fa fa-send"></i> Sí, estoy seguro</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $("#delete_id").val(id);
            });

        <?php foreach ($promos as $promo) : ?>
            var seconds{{$promo['id']}} = {{$promo['timeout']}};
            function secondPassed{{$promo['id']}}() {
                var minutes = Math.round((seconds{{$promo['id']}} - 30)/60);
                var remainingSeconds = seconds{{$promo['id']}} % 60;

                var hours = Math.round((minutes - 30)/60);
                var remainingMinutes = minutes % 60;

                if (remainingSeconds < 10) { 
                    remainingSeconds = "0" + remainingSeconds; 
                }

                if (remainingMinutes < 10) { 
                    remainingMinutes = "0" + remainingMinutes; 
                }

                var message = '';

                if (hours > 0)
                    message += hours + ' h. ';
                if (remainingMinutes > 0)
                    message += remainingMinutes + ' m. ';
                message += remainingSeconds + ' s.';

                $('#timer_{{$promo['id']}}').html(message); 
                if (seconds{{$promo['id']}} == 0) { 
                    clearInterval(countdownTimer{{$promo['id']}});
                    $('#plan-wrapper_{{$promo['id']}}').remove();
                } else { 
                    seconds{{$promo['id']}}--; 
                } 
            }

            var countdownTimer{{$promo['id']}} = setInterval(secondPassed{{$promo['id']}}, 1000);
        <?php endforeach ?>

        <?php /*foreach ($promos as $promo) : ?>
            var seconds{{$promo['id']}} = {{$promo['timeout']}};
            function secondPassed{{$promo['id']}}() {
                var minutes = Math.round((seconds{{$promo['id']}} - 30)/60);
                var remainingSeconds = seconds{{$promo['id']}} % 60;
                if (remainingSeconds < 10) { 
                    remainingSeconds = "0" + remainingSeconds; 
                } 
                $('#timer_{{$promo['id']}}').html(minutes + ":" + remainingSeconds); 
                if (seconds{{$promo['id']}} == 0) { 
                    clearInterval(countdownTimer{{$promo['id']}});
                } else { 
                    seconds{{$promo['id']}}--; 
                } 
            }

            var countdownTimer{{$promo['id']}} = setInterval(secondPassed{{$promo['id']}}, 1000);
        <?php endforeach */?>

        });
    </script>
@endsection