@extends('layouts.dashboard')
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
                            <form class="form form-horizontal" action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-body">

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control text-right" for="projectinput1"><b>Name : </b></label>
                                        <div class="col-md-8">
                                            <input type="text" id="projectinput1" class="form-control font-weight-bold" value="" placeholder="Name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control text-right" for="projectinput1"><b>Email : </b></label>
                                        <div class="col-md-8">
                                            <input type="email" id="projectinput1" class="form-control font-weight-bold" value="" placeholder="Email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control text-right" for="projectinput1"><b>Phone : </b></label>
                                        <div class="col-md-3">
                                            <select name="country_code" id="" required class="form-control font-weight-bold">
                                                <option value="" class="font-weight-bold">Select One</option>
                                                @foreach($country as $cn)
                                                    <option value="{{$cn['dial_code']}}">{{ $cn['name'] }} ({{$cn['dial_code']}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" id="projectinput1" class="form-control font-weight-bold" value="" placeholder="Phone" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control text-right" for="projectinput1"><b>Select Plan : </b></label>
                                        <div class="col-md-8">
                                            <select name="plan_id" id="" required class="form-control font-weight-bold">
                                                <option value="" class="font-weight-bold">Select One</option>
                                                @foreach($plan as $p)
                                                    <option value="{{$p->id}}" class="font-weight-bold">{{$p->name}} - @if($p->price == 0) FREE @else {{$p->price}} {{$basic->currency}}@endif</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control text-right" for="projectinput1"><b>Password : </b></label>
                                        <div class="col-md-8">
                                            <input type="password" id="projectinput1" class="form-control font-weight-bold" value="" placeholder="Password" name="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control text-right" for="projectinput1"><b>Confirm Password : </b></label>
                                        <div class="col-md-8">
                                            <input type="password" id="projectinput1" class="form-control font-weight-bold" value="" placeholder="Confirm Password" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control text-right" for="projectinput1"><b>Payment Status : </b></label>
                                        <div class="col-md-8">
                                            <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Complete" data-off="Not Complete" data-width="100%" type="checkbox" name="plan_status">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-8 offset-3">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-navigation"></i> Create User</button>
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
@endsection