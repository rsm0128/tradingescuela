@extends('layouts.subdashboard')

@section('style')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/select2.min.css')}}">
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
                        <form class="form-horizontal" method="post" action="{{route('sub-add-material')}}" enctype="multipart/form-data" files="true">
                        {{csrf_field()}}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label"><b>Título del material: </b></label>
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
                                            <label class="col-sm-12 control-label"><b>material de url:</b> </label>
                                            <div class="col-sm-12">
                                               <input type="text" class="form-control" name="url"></input>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label"><b>Descripción del material:</b> </label>
                                            <div class="col-sm-12">
                                               <textarea class="form-control" rows="5" name="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Choose Material Image</strong></label>
                                            <div class="col-md-12">
                                                <input name="image" type="file" class="form-control input-lg" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Material Type</strong></label>
                                            <div class="col-md-12">
                                                <input type="radio" name="is_video" value="true"> Video
                                                <input type="radio" name="is_video" value="false" checked> Image
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary bg-softwarezon-x btn-lg btn-block "> <i class="fa fa-plus"></i> Añadir material</button>
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
@endsection

