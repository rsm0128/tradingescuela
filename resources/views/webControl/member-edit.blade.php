@extends('layouts.dashboard')

@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
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


                            {!! Form::model($testimonial,['route'=>['member-update',$testimonial->id],'method'=>'put','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-10 offset-1">

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Member Name</strong></label>
                                            <div class="col-md-12">
                                                <input name="name" value="{{$testimonial->name}}" class="form-control input-lg" placeholder="Member Name" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Member Position</strong></label>
                                            <div class="col-md-12">
                                                <input name="position" value="{{$testimonial->position}}" class="form-control input-lg" placeholder="Member Position" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Member Short Details</strong></label>
                                            <div class="col-md-12">
                                                <input name="details" value="{{$testimonial->details}}" class="form-control input-lg" placeholder="Member Short Details" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Member Image</strong></label>
                                            <div class="col-md-12">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                                        <img style="width: 200px" src="{{ asset('assets/images/member') }}/{{ $testimonial->image }}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                                    <div>
                                                        <span class="btn btn-info btn-file">
                                                            <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                            <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                            <input type="file" name="image" accept="image/*">
                                                        </span>
                                                        <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Facebbok Link</strong></label>
                                            <div class="col-md-12">
                                                <input name="facebook" value="{{$testimonial->facebook}}" class="form-control input-lg" placeholder="Member Facebook" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Twitter Link</strong></label>
                                            <div class="col-md-12">
                                                <input name="twitter" value="{{$testimonial->twitter}}" class="form-control input-lg" placeholder="Member Twitter" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Linkedin</strong></label>
                                            <div class="col-md-12">
                                                <input name="linkedin" value="{{$testimonial->linkedin}}" class="form-control input-lg" placeholder="Member Linkedin" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Instrgram </strong></label>
                                            <div class="col-md-12">
                                                <input name="instragram" value="{{$testimonial->instragram}}" class="form-control input-lg" placeholder="Member Instrgram" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" onclick="nicEditors.findEditor('area1').saveContent();" class="btn btn-primary btn-block bold btn-lg uppercase"><i class="fa fa-send"></i> Update Member</button>
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
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>

@endsection
