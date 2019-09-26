@extends('layouts.subdashboard')
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

                        <form class="form form-horizontal" action="{{ route('sub-user-update') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <div class="form-group row">
                                    <label class="col-md-3 label-control text-right" for="projectinput1"><b>Name : </b></label>
                                    <div class="col-md-8">
                                        <input type="text" id="projectinput1" class="form-control font-weight-bold" value="{{$user->name}}" placeholder="Name" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control text-right" for="projectinput1"><b>Email : </b></label>
                                    <div class="col-md-8">
                                        <input type="email" id="projectinput1" class="form-control font-weight-bold" value="{{$user->email}}" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control text-right" for="projectinput1"><b>Country Code : </b></label>
                                    <div class="col-md-8">
                                        <select name="country_code" id="country_code" required class="form-control font-weight-bold">
                                            @foreach($country as $cn)
                                                <option value="{{$cn['dial_code']}}">{{ $cn['name'] }} ({{$cn['dial_code']}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control text-right" for="projectinput1"><b>Phone : </b></label>
                                    <div class="col-md-8">
                                        <input type="text" id="projectinput1" class="form-control font-weight-bold" value="{{$user->phone}}" placeholder="Phone" name="phone" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control text-right" for="projectinput1"><b>Select Plan : </b></label>
                                    <div class="col-md-8">
                                        <select name="plan_id" id="" class="form-control font-weight-bold">
                                            <option value="" class="font-weight-bold">Select One</option>
                                            @foreach($plan as $p)
                                                @if($p->id == $user->plan_id)
                                                    <option value="{{$p->id}}" class="font-weight-bold" selected >{{$p->name}} - @if($p->price == 0) FREE @else {{$p->price}} {{$basic->currency}}@endif</option>
                                                @else
                                                    <option value="{{$p->id}}" class="font-weight-bold" >{{$p->name}} - @if($p->price == 0) FREE @else {{$p->price}} {{$basic->currency}}@endif</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 label-control text-right" for="projectinput1"><b> Días restantes de la membresía: </b></label>
                                    <div class="col-md-8">
                                        <input type="text" id="projectinput1" class="form-control font-weight-bold" value="<?php if($user->expire_time == 1){ echo ' Duración Ilimitada'; }else{echo $time_left;}?>" name="expire_time">
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
                                    <label class="col-md-3 label-control text-right" for="projectinput1"><b>Método del último pago: </b></label>
                                    <div class="col-md-8">
                                        <select name="payment_type" id="payment_method" required class="form-control font-weight-bold">
                                            <option value="CoinPayments" <?php if($user->payment_type == '') echo 'selected'?>>Not payed yet</option>
                                            <option value="CoinPayments" <?php if($user->payment_type == 'CoinPayments') echo 'selected'?>>Coinpayments</option>
                                            <option value="PayPal" <?php if($user->payment_type == 'PayPal') echo 'selected'?>>Paypal</option>
                                            <option value="Manual" <?php if($user->payment_type == 'Manual') echo 'selected'?>>Manual payment</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 label-control text-right" for="password"><b> Password: </b></label>
                                    <div class="col-md-8">
                                        <input type="text" name="password" id="password" class="form-control font-weight-bold">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 label-control text-right" for="projectinput1"><b>Payment Status : </b></label>
                                    <div class="col-md-8">
                                        <input data-toggle="toggle" {{$user->plan_status == 1 ? 'checked' : ''}} data-onstyle="success" data-offstyle="danger" data-on="Complete" data-off="Not Complete" data-width="100%" type="checkbox" name="plan_status">
                                    </div>
                                </div>
                                <!--<div class="form-group row">-->
                                <!--    <label class="col-md-3 label-control text-right" for="projectinput1"><input type="checkbox" name="manual_payment">  Pago Manual</label>-->
                                <!--</div>-->
                                
                                <div class="form-group row">
                                    <div class="col-md-8 offset-3">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-navigation"></i> Update User</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>
    <script>
        $( document ).ready(function() {
            var coder = '{{$user->country_code}}';
            $('#country_code').val(coder);
        });
    </script>
@endsection