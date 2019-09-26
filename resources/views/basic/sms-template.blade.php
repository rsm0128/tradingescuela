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
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title" id="horz-layout-basic">Detalles del código</h4>
                                        </div>
                                        <div class="card-content collpase show">
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <div class="table-scrollable">
                                                        <table class="table table-striped bg-info table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th> # </th>
                                                                <th> CÓDIGO </th>
                                                                <th> DESCRIPCIÓN </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>


                                                            <tr>
                                                                <td> 1 </td>
                                                                <td> <pre>@{{message}}</pre> </td>
                                                                <td> Mensage de texto. Que lo recibe el usuario.</td>
                                                            </tr>

                                                            <tr>
                                                                <td> 2 </td>
                                                                <td> <pre>@{{number}}</pre> </td>
                                                                <td> Número del destinatario</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END SAMPLE TABLE PORTLET-->
                                </div>
                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE FORM PORTLET-->
                                    <div class="card">
                                        <div class="card-content collpase show">

                                            <div class="card-body">


                                                <form action="{{ route('sms-template') }}" method="post" role="form" class="form-horizontal">
                                                    {!! csrf_field() !!}
                                                    <div class="form-body">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">SMS Send API</strong></label>
                                                                    <div class="col-md-12">
                                                                        <textarea class="form-control" rows="3" name="smsapi" placeholder="API">{!! $basic->smsapi !!}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <button type="submit" class="btn btn-primary bg-softwarezon-x btn-block btn-lg"><i class="fa fa-send"></i> ACTUALIZAR</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- row -->
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


@endsection
