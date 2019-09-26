@extends('layouts.subscriberdashboard')
@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $page_title }}</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="fa fa-chevron-left"></i></li>
                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                <li><i class="fa fa-minus minimize-card"></i></li>
                                <li><i class="fa fa-times close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right" for="projectinput1"><b>Name : </b></label>
                            <div class="col-md-8">
                                <input type="text" id="projectinput1" class="form-control font-weight-bold" value="{{$user->name}}" placeholder="Name" name="name" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right" for="projectinput1"><b>Email : </b></label>
                            <div class="col-md-8">
                                <input type="email" id="projectinput1" class="form-control font-weight-bold" value="{{$user->email}}" placeholder="Email" name="email" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right" for="projectinput1"><b>Country Code : </b></label>
                            <div class="col-md-8">
                                <input type="text" id="country_code" class="form-control font-weight-bold" value="{{$user->country_code}}" readonly>
                                <!--<select name="country_code" id="country_code" required class="form-control font-weight-bold">-->
                                <!--    @foreach($country as $cn)-->
                                <!--        <option value="{{$cn['dial_code']}}">{{ $cn['name'] }} ({{$cn['dial_code']}})</option>-->
                                <!--    @endforeach-->
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right" for="projectinput1"><b>Phone : </b></label>
                            <div class="col-md-8">
                                <input type="text" id="projectinput1" class="form-control font-weight-bold" value="{{$user->phone}}" placeholder="Phone" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right" for="plan_id"><b>Select Plan : </b></label>
                            <div class="col-md-8">
                                @foreach($plan as $p)
                                    @if($p->id == $user->plan_id)
                                        <input type="text" id="plan_id" class="form-control font-weight-bold" value="@if($p->id == $user->plan_id) {{ $p->name }} @endif" readonly>
                                    @endif
                                @endforeach
                                
                                <!--<select name="plan_id" id="" class="form-control font-weight-bold">-->
                                <!--    <option value="" class="font-weight-bold">Select One</option>-->
                                <!--    @foreach($plan as $p)-->
                                <!--        @if($p->id == $user->plan_id)-->
                                <!--            <option value="{{$p->id}}" class="font-weight-bold" selected >{{$p->name}} - @if($p->price == 0) FREE @else {{$p->price}} {{$basic->currency}}@endif</option>-->
                                <!--        @else-->
                                <!--            <option value="{{$p->id}}" class="font-weight-bold" >{{$p->name}} - @if($p->price == 0) FREE @else {{$p->price}} {{$basic->currency}}@endif</option>-->
                                <!--        @endif-->
                                <!--    @endforeach-->
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right" for="projectinput1"><b>Nivel de Conocimientos : </b></label>
                            <div class="col-md-8">
                                <input type="text" id="projectinput1" class="form-control font-weight-bold" value="{{$user->level}}" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right" for="projectinput1"><b> Días restantes de la membresía: </b></label>
                            <div class="col-md-8">
                                <input type="text" id="projectinput1" class="form-control font-weight-bold" value="<?php if($user->expire_time == 1){ echo ' Duración Ilimitada'; }else{echo $time_left;}?>" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right" for="projectinput1"><b> Fecha del último pago: </b></label>
                            <div class="col-md-8">
                                <input type="text" id="projectinput1" class="form-control font-weight-bold" value="{{$user->last_payment}}" readonly>
                            </div>
                        </div>
                        
                        <!--<div class="form-group row">-->
                        <!--    <label class="col-md-3 label-control text-right" for="projectinput1"><b> Método del último pago: </b></label>-->
                        <!--    <div class="col-md-8">-->
                        <!--        <input type="text" id="projectinput1" class="form-control font-weight-bold" value="{{$user->payment_type}}" readonly>-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right" for="payment_method"><b>Método del último pago: </b></label>
                            <div class="col-md-8">
                                <input type="text" id="payment_method" class="form-control font-weight-bold" value=" @if($user->payment_type == '') Not payed yet @else {{ $user->payment_type }} @endif" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right"><b>Register Code : </b></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control font-weight-bold" value=" @if($user->code == '') No Code @else {{ $user->code }} @endif" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right" for="discord_username"><b> Discord Username: </b></label>
                            <div class="col-md-8">
                                <input type="text" name="discord_username" id="discord_username" class="form-control font-weight-bold" value="{{ $user->discord_username }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right" for="discord_id"><b> Discord ID: </b></label>
                            <div class="col-md-8">
                                <input type="text" name="discord_id" id="discord_id" class="form-control font-weight-bold" value="{{ $user->discord_id }}" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right" for="projectinput1"><b>Payment Status : </b></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control font-weight-bold" value="@if($user->plan_status == 1) Complete @else Not Complete @endif" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-3">
                                <a href="{{ route('subscriber-manage-user') }}" class="btn btn-primary btn-lg btn-block">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>
    
@endsection