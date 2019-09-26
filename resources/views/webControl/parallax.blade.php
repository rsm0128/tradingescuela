@extends('layouts.dashboard')
@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@endsection
@section('content')
    {!! Form::open(['files'=>true]) !!}
    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-md-12"><strong style="text-transform: uppercase;">Testimonial parallax</strong></label>
                            <div class="col-sm-12">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group input-large">
                                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                            <span class="fileinput-filename"> </span>
                                        </div>
                                        <span class="input-group-addon btn default btn-file">
                                                                                <span class="fileinput-new bold"> Change Image </span>
                                                                                <span class="fileinput-exists bold"> Change </span>
                                                                                <input type="file" name="counter_bg"> </span>
                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                    </div>
                                    <code>Mimes Type : png,jpeg,jpg | Resize 2100X1410</code>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Testimonial parallax</strong></label>
                        <img class="img-responsive" src="{{ asset('assets/images') }}/{{ $basic->counter_bg }}" alt="logo" style="width:100%;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-lg bold btn-block"><i class="fa fa-send"></i> UPDATE Parallax</button>
            </div>
        </div>
    </section>
    {!! Form::close() !!}

@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@endsection
