@extends('layouts.dashboard')

@section('style')

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
                            {!! Form::open(['route'=>'counter-section','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-10 offset-1">

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Previous Image</strong></label>
                                            <div class="col-md-12">
                                                <img src="{{ asset('assets/images') }}/{{$section->counter_image}}" style="width: 100%;" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Change Background Image</strong></label>
                                            <div class="col-md-12">
                                                <input name="counter_image" type="file" class="form-control input-lg" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
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

@endsection
