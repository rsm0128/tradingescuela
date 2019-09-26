@extends('layouts.subdashboard')

@section('style')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-datetimepicker.css') }}">
    <link href="{{ asset('assets/admin/css/customstyle.css')}}" rel="stylesheet">
@endsection
@section('content')


    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Crear Nueva Señal</h5>
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

                            <form class="form-horizontal" method="post" action="{{route('sub-signal-create')}}">
                            {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label"><b>Título de la señal: </b></label>
                                                <div class="col-sm-12">
                                                    <input name="title" value="" class="form-control input-lg" type="text" placeholder="Título">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <div class="col-md-12" id="active-option">
                                                        <input type="radio" name="active_plan_only" id="plan_active" value=1> Active
                                                        <input type="radio" name="active_plan_only" id="plan_inactive" value=0> Inactive
                                                        <input type="radio" name="active_plan_only" id="plan_all" value=3> All
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <select name="service_id[]" id="e1" class="form-control input-lg select2-multi" multiple="multiple" >
                                                        @foreach($plan as $d)
                                                            <option value="{{$d->id}}" style="color: #000" <?php if($d->status == 1) echo 'class="active-plan"'; else echo 'class="inactive-plan"' ?>>{{$d->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12 control-label flex-label"><b>Descripción de la señal: </b>
                                                    <input type="checkbox" name="email_enabled" class="pricing-visible-option" checked>Enable
                                                </label>
                                                <div class="col-sm-12">
                                                    <textarea name="description" id="ckview" rows="5" class="form-control input-lg"  ></textarea>
                                                </div>
                                            </div>

                                            <!--<div class="form-group">
                                                <label class="col-sm-12 control-label"><b>Telegram Signal : <code>Length : 4096 UTF8 characters | HTML Not Supported</code></b> </label>
                                                <div class="col-sm-12">
                                                    <textarea name="telegram" rows="5" class="form-control input-lg" required placeholder="Telegram Signal Description"></textarea>
                                                </div>
                                            </div>-->
                                            
                                            <div class="form-group">
                                                <label class="col-md-12 control-label flex-label"><b>Mensaje a mostrar en SMS: </b>
                                                    <input type="checkbox" name="sms_enabled" class="pricing-visible-option">Enable
                                                </label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" rows="3" name="sms_tem" placeholder="Mensaje"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-12 control-label"><b>Estatus de la publicación:</b> </label>
                                                <div class="col-sm-12">
                                                    <select name="publish_status" id="publish" class="form-control font-weight-bold">
                                                        <option value="0" class="font-weight-bold">Mandar al crear</option>
                                                        <option value="1" class="font-weight-bold">Agendar publicación</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="schedule" style="display: none;">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label"><b>Programar tiempo de publicación: </b></label>
                                                    <div class="col-sm-12">
                                                        <div class='input-group'>
                                                            <input type="text" name="publish_date" id="datetimepicker4" class="form-control bold input-lg" value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary bg-softwarezon-x btn-lg btn-block "> <i class="fa fa-send"></i> Crear nueva señal</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->


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

        $("#plan_all").click(function(){
            $("#e1 > option").prop("selected","selected");
            $("#e1").trigger("change");
        });
        
        $("#plan_active").click(function(){
            var i, values=[];
            var plans = $("#e1").find(".active-plan");
            for (i = 0; i < plans.length; i++) { 
                values.push(plans[i].value);
            }
            $("#e1").val(values);
            $("#e1").trigger("change");
        });
        
        $("#plan_inactive").click(function(){
            var i, values=[];
            var plans = $("#e1").find(".inactive-plan");
            for (i = 0; i < plans.length; i++) { 
                values.push(plans[i].value);
            }
            $("#e1").val(values);
            $("#e1").trigger("change");
        });

    </script>
    <script>
        $(document).ready(function () {
            $(document).on("change", '#publish', function (e) {
                var type = $(this).val();
                if (type == "0"){
                    var duration = document.getElementById('schedule');
                    duration.style.display='none';
                }else {
                    var duration = document.getElementById('schedule');
                    duration.style.display='block';
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
