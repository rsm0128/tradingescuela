@extends('layouts.dashboard')
@section('style')
<link rel="stylesheet" href="{{asset('public/assets/admin/css/pricing.css')}}">
<link href="{{ asset('assets/admin/css/customstyle.css')}}" rel="stylesheet">
@endsection
@section('content')

    <div class="page-body">

    <div class="row no-gutters">
        @foreach($plan as $k => $p)
        <div class="col-md-4 pr-1">
            <div class="list-group text-center my-3">
                <div class= "list-group-item text-white<?php if($p->has_promo == 1){ echo ' bg-success'; }else{echo ' bg-dark';}?>">
                    <h4 class="text-center text-uppercase font-weight-bold my-1">{{$p->name}}</h4>
                    <h6 class="pricing-subtitle">{{$p->subtitle}}</h6>
                </div>
                <div class="list-group-item text-uppercase font-weight-bold">
                    <h3>
                    @if($p->price_type == 0)
                        GRATIS
                    @else
                        {{$basic->symbol}}{{$p->price}}
                    @endif
                    </h3>
                </div>
                @if($p->plan_type == 0)
                <a href="#" class="list-group-item">
                    <h4>{{$p->duration}} - Días</h4>
                </a>
                @else
                    <a href="#" class="list-group-item">
                        <h4>Ilimitado</h4>
                    </a>
                @endif
                @if($p->support_visible)
                    <a href="#" class="list-group-item">
                        <h4>Soporte - {{$p->support}}</h4>
                    </a>
                @endif
                @if($p->telegram_visible)
                    <a href="#" class="list-group-item">
                        <h4>Alertas de Telegram - {{$p->telegram_status == 1 ? 'SI' : 'NO'}}</h4>
                    </a>
                @endif
                @if($p->sms_visible)
                <!--</a>-->
                    <a href="#" class="list-group-item">
                        <h4>Alertas por SMS - {{$p->sms_status == 1 ? 'SI' : 'NO'}}</h4>
                    </a>
                @endif
                @if($p->seminars_visible)
                    <a href="#" class="list-group-item">
                        <h4>Acceso a Seminarios - {{$p->seminar_status == 1 ? 'SI' : 'NO'}}</h4>
                    </a>
                @endif
                @if($p->forex_course_visible)
                    <a href="#" class="list-group-item">
                        <h4>Curso Básico de Forex  - {{ $p->forex_course == 1 ? 'SI' : 'NO' }}</h4>
                    </a>
                @endif
                @if($p->telegram_group_visible)
                    <a href="#" class="list-group-item">
                        <h4>Consultoría en grupo de Telegram - {{$p->telegram_group_status == 1 ? 'SI' : 'NO'}}</h4>
                    </a>
                @endif
                @if($p->description)
                    <div class="pricing-detail">{!!$p->description!!}</div>
                @endif
                <a href="#" class="list-group-item">
                    <h4>{{$p->status == 1 ? 'ACTIVO' : 'INACTIVO'}}</h4>
                </a>
                <div class="list-group-item">
                    <a href="{{url('admin/plan-edit/'.$p->id)}}" class="btn btn-secondary btn-lg btn-block text-truncate"><i class="fa fa-edit"></i> EDITAR PLAN</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>






{{--
    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title bold" id="myModalLabel"> <i class='fa fa-exclamation-triangle'></i> Confirmation !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('plan-delete') }}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id" class="abir_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>--}}

@endsection
@section('scripts')

    {{--<script>
        $(document).ready(function () {

            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);
            });
            
        });
    </script>

    <script>
        $(document).ready(function (e) {
            $(document).on("click", '.publish_button', function (e) {
                var id = $(this).data('id');
                $(".confirm_id").val(id);
            });
        });
    </script>--}}

@endsection
