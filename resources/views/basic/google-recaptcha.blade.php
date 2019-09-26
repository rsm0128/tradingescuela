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



                            {!! Form::model($basic,['route'=>['recaptcha-update',$basic->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal']) !!}
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-10 offset-1">

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Google Recapcta Status</strong></label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle" {{ $basic->captcha_status == 1 ? 'checked' : ''}} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="captcha_status">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Recaptcha Site Key</strong></label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input class="form-control bold input-lg" name="captcha_site" value="{{ $basic->captcha_site }}" type="text" required>
                                                    <span class="input-group-addon"><strong><i class="fa fa-key"></i></strong></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Recaptcha Secret Key</strong></label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input class="form-control bold input-lg" name="captcha_secret" value="{{ $basic->captcha_secret }}" type="text" required>
                                                    <span class="input-group-addon"><strong><i class="fa fa-key"></i></strong></span>
                                                </div>
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
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.my-colorpicker1').colorpicker()
        });
    </script>
@endsection