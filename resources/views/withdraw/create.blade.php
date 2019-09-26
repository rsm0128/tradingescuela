@extends('layouts.dashboard')

@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
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

                            <div class="row">
                                <div class="col-md-10 offset-1">

                                    {!! Form::open(['role'=>'form', 'class'=>'form-horizontal', 'files'=>true]) !!}
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label"><b>Method Name :</b> </label>
                                            <div class="col-sm-12">
                                                <input name="name" value="" class="form-control input-lg" type="text" required placeholder="Plan Name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Display Image</strong></label>
                                            <div class="col-md-12">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 250px; height: 140px;" data-trigger="fileinput">
                                                        <img style="width: 250px" src="http://www.placehold.it/290X190/EFEFEF/AAAAAA&text=290X190" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 140px"></div>
                                                    <div>
                                                    <span class="btn btn-info btn-file bg-softwarezon-y border-0">
                                                        <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                        <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                        <input type="file" name="image" accept="image/*">
                                                    </span>
                                                        <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                                    </div>
                                                    <b style="color: red;">Image Type PNG,JPEG,JPG. Resize - (290X190)</b><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label"><b>Withdraw Charge : </b></label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <input name="charge" value="" class="form-control input-lg" type="text" placeholder="Withdraw Charge" >
                                                            <span class="input-group-addon"><strong>{{$basic->currency}}</strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label"><b>Duration : </b></label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <input name="duration" value="" class="form-control input-lg" type="text" required placeholder="Duration" >
                                                            <span class="input-group-addon"><strong>Days</strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label"><b>Withdraw Minimum : </b></label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <input name="withdraw_min" value="" class="form-control input-lg" type="text" placeholder="Withdraw Minimum" >
                                                            <span class="input-group-addon"><strong>{{$basic->currency}}</strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label"><b>Withdraw Maximum : </b></label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <input name="withdraw_max" value="" class="form-control input-lg" type="text" placeholder="Withdraw Maximum" >
                                                            <span class="input-group-addon"><strong>{{$basic->currency}}</strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 control-label"><b>Publication Status : </b></label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle" checked data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="Deactive" data-width="100%" type="checkbox" name="status">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary bg-softwarezon-x btn-lg btn-block "> <i class="fa fa-send"></i> Submit Withdraw Method</button>
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>
@endsection
