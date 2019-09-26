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

                            <form class="form form-horizontal" action="{{ route('update-profile') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-body">

                                    <div class="form-group row">
                                        <label class="col-md-2 label-control text-right font-weight-bold" for="projectinput1">Admin Name : </label>
                                        <div class="col-md-8">
                                            <input type="text" id="projectinput1" class="form-control" value="{{ $admin->name }}" placeholder="Name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 label-control text-right font-weight-bold" for="projectinput2">Admin User name : </label>
                                        <div class="col-md-8">
                                            <input type="text" id="projectinput2" class="form-control" value="{{ $admin->username }}" placeholder="User Name" name="username" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 label-control text-right font-weight-bold" for="projectinput2">Admin Email : </label>
                                        <div class="col-md-8">
                                            <input type="email" id="projectinput2" class="form-control" value="{{ $admin->email }}" placeholder="Email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 label-control text-right font-weight-bold" for="projectinput2">Admin Picture : </label>
                                        <div class="col-md-8">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 215px; height: 215px;" data-trigger="fileinput">
                                                    <img style="width: 215px" src="{{ asset('assets/images') }}/{{ $admin->image }}" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 215px; max-height: 215px"></div>
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
                                    <div class="form-group row">
                                        <div class="col-md-8 offset-2">
                                            <button type="submit" class="btn btn-primary bg-softwarezon-x btn-lg btn-block"><i class="ft-navigation"></i> Update Now</button>
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
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@endsection