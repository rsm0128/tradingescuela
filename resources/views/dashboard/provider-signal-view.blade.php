@extends('layouts.dashboard')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-datetimepicker.css') }}">
@endsection
@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Title : {{$signal->title}}</h4>
                    </div>
                    <hr>
                    <div class="card-content collpase show">
                        <div class="card-body">

                            <h4 class="card-title" id="horz-layout-basic">Signal Description : </h4>

                            {!!$signal->description!!}
                            <br>
                            <hr>

                            <div class="row">
                                <div class="col-md-8 offset-2">
                                    <div class="card text-white box-shadow-0 bg-info rounded">
                                        <div class="card-header">
                                            <h1 class="text-uppercase font-weight-bold text-center" id="horz-layout-basic">Signal Action</h1>
                                        </div>
                                        <div class="card-content collpase show">
                                            <div class="card-body">

                                                {!! Form::open(['route'=>'provider-signal-submit','method'=>'post', 'role'=>'form', 'class'=>'form-horizontal']) !!}
                                                <input type="hidden" name="signal_id" value="{{ $signal->id }}">
                                                <div class="form-body">

                                                    <div class="form-group row">
                                                        <label for="example-tel-input" class="col-md-3 offset-3 text-right"><b>Signal Status :</b></label>
                                                        <div class="col-4">
                                                            @if($signal->status == 0)
                                                                <div class="badge badge-warning">
                                                                    <i class="fa fa-spinner font-medium-2"></i>
                                                                    <span>Pending</span>
                                                                </div>
                                                            @elseif($signal->status == 1)
                                                                <div class="badge badge-danger">
                                                                    <i class="fa fa-check font-medium-2"></i>
                                                                    <span>Accept</span>
                                                                </div>
                                                            @else
                                                                <div class="badge badge-danger">
                                                                    <i class="fa fa-times font-medium-2"></i>
                                                                    <span>Reject</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="example-tel-input" class="col-md-3 offset-3 text-right"><b>Signal Amount :</b></label>
                                                        <div class="col-4">
                                                            @if($signal->status == 0)
                                                                <div class="badge badge-warning">
                                                                    <i class="fa fa-spinner font-medium-2"></i>
                                                                    <span>Waiting</span>
                                                                </div>
                                                            @elseif($signal->status == 1)
                                                                {{ $signal->price }} {{ $basic->currency }}
                                                            @else
                                                                <div class="badge badge-danger">
                                                                    <i class="fa fa-times font-medium-2"></i>
                                                                    <span>Rejected</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($signal->status == 0)
                                                    <div class="form-group row">
                                                        <label for="example-tel-input" class="col-md-3 offset-3 text-right" style="margin-top: 10px;"><b>Signal Action :</b></label>
                                                        <div class="col-4">
                                                            <select name="status" id="status" class="form-control font-weight-bold">
                                                                <option value="1" class="font-weight-bold">Accept</option>
                                                                <option value="2" class="font-weight-bold">Reject</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @elseif($signal->status == 1)
                                                        <div class="form-group row">
                                                            <label for="example-tel-input" class="col-md-3 offset-3 text-right"><b>Signal Status :</b></label>
                                                            <div class="col-4">
                                                                <div class="badge badge-success">
                                                                    <i class="fa fa-check font-medium-2"></i>
                                                                    <span>Accepted</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="form-group row">
                                                            <label for="example-tel-input" class="col-md-3 offset-3 text-right"><b>Signal Status :</b></label>
                                                            <div class="col-4">
                                                                <div class="badge badge-danger">
                                                                    <i class="fa fa-times font-medium-2"></i>
                                                                    <span>Rejected</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if($signal->status == 0)

                                                    <div class="accept" id="accept">
                                                        <div class="form-group">
                                                            <label class="col-sm-12 control-label"><b>Signal Title : </b></label>
                                                            <div class="col-sm-12">
                                                                <input name="title" value="{{ $signal->title }}" class="form-control input-lg" type="text" placeholder="Signal Title">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-12 control-label"><b>Signal Plan :  All <input type="checkbox" id="checkbox" ></b></label>
                                                            <div class="col-sm-12">
                                                                <select name="plan_id[]" id="e1" class="form-control input-lg select2-multi" multiple="multiple" >
                                                                    @foreach($plan as $d)
                                                                        <option value="{{$d->id}}" style="color: #000">{{$d->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-12 control-label"><b>Provider Amount : </b></label>
                                                            <div class="col-sm-12">
                                                                <div class="input-group">
                                                                    <input name="price" value="" class="form-control input-lg" type="text" placeholder="Provider Amount" >
                                                                    <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-12 control-label"><b>Signal Description :</b> </label>
                                                            <div class="col-sm-12">
                                                                <textarea name="description" id="ckview" rows="10" class="form-control input-lg">{{ $signal->description }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-12 control-label"><b>Telegram Signal : <code>Length : 4096 UTF8 characters | HTML Not Supported</code></b> </label>
                                                            <div class="col-sm-12">
                                                                <textarea name="telegram" rows="5" class="form-control input-lg" placeholder="Telegram Signal Description"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-12 control-label"><b>Publish Status :</b> </label>
                                                            <div class="col-sm-12">
                                                                <select name="publish_status" id="publish" class="form-control font-weight-bold">
                                                                    <option value="0" class="font-weight-bold">On Time Send</option>
                                                                    <option value="1" class="font-weight-bold">Schedule Time</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="schedule" style="display: none">
                                                            <div class="form-group">
                                                                <label class="col-sm-12 control-label"><b>Schedule Date Time : </b></label>
                                                                <div class="col-sm-12">
                                                                    <div class='input-group'>
                                                                        <input type="text" name="publish_date" id="datetimepicker4" class="form-control bold input-lg" value="{{ \Carbon\Carbon::now()->format('Y-m-d HH:ii:ss') }}">
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endif

                                                    @if($signal->status == 0)

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-grd-primary border-0 white btn-lg btn-block "> <i class="fa fa-send"></i> Signal Action</button>
                                                        </div>
                                                    </div>

                                                    @endif

                                                </div>
                                                {!! Form::close() !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!---ROW-->

@endsection
@section('scripts')
    <script src="{{asset('assets/admin/js/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/select2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/ckeditor/ckeditor.js')}}"></script>
    <script>
        var ckview = document.getElementById("ckview");
        CKEDITOR.replace(ckview,{
            language:'en-gb'
        });
    </script>
    <script type="text/javascript">
        $('.select2-multi').select2();

        $("#checkbox").click(function(){
            if($("#checkbox").is(':checked') ){
                $("#e1 > option").prop("selected","selected");// Select All Options
                $("#e1").trigger("change");// Trigger change to select 2
            }else{
                $("#e1 > option").removeAttr("selected");
                $("#e1").trigger("change");// Trigger change to select 2
            }
        });
    </script>
    <script>
        $(document).ready(function () {

            $(document).on("change", '#status', function (e) {
                var type = $(this).val();
                if (type == "0"){
                    var duration = document.getElementById('accept');
                    duration.style.display='none';
                }else if (type == "1"){
                    var duration = document.getElementById('accept');
                    duration.style.display='block';
                }else {
                    var duration = document.getElementById('accept');
                    duration.style.display='none';
                }
            });

            $(document).on("change", '#publish', function (e) {
                var type1 = $(this).val();
                if (type1 == "0"){
                    var duration1 = document.getElementById('schedule');
                    duration1.style.display='none';
                }else {
                    var duration1 = document.getElementById('schedule');
                    duration1.style.display='block';
                }
            });
        });
    </script>



    <script src="{{ asset('assets/admin/js/moment-with-locales.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script>
        $('#datetimepicker4').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    </script>

@endsection
