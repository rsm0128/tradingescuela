@extends('layouts.dashboard')
@section('style')
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true}).panelInstance('area1'); });
    </script>

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


                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->

                                    <div class="col-md-12">
                                        <!-- BEGIN SAMPLE FORM PORTLET-->
                                        <div class="card">
                                            <div class="card-content collpase show">
                                                <div class="card-body">

                                                    <form class="form-horizontal" action="" method="post" role="form">
                                                        {!! csrf_field() !!}
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-12"><strong>Plantilla Teléfono SMS Template</strong><br></label>
                                                                <div class="col-md-12">
                                                                    <textarea class="form-control" rows="3" name="sms_tem" placeholder="SMS Template">{!! $basic->sms_tem !!}</textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> ACTUALIZAR</button>
                                                            </div>

                                                        </div>
                                                    </form>
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
    </div>


@endsection
