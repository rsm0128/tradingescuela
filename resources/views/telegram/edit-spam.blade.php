@extends('layouts.subdashboard')

@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-tagsinput.css')}}">
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
                        {!! Form::open(['url' => '/subadmin/telegram-spam-edit', 'method'=>'post', 'role'=>'form', 'class'=>'form-horizontal']) !!}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-10 offset-1">
                                    <input type="hidden" name="spam_id" value="{{$spam->id}}">
                                        <div class="form-group">
                                            <label class="col-md-12"><strong>Key word</strong></label>
                                            <div class="col-md-12">
                                                <input name="keyword" class="form-control input-lg" placeholder=" Name" value="{{$spam->keyword}}" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong>Description</strong></label>
                                            <div class="col-md-12">
                                                <textarea name="description" rows="6" class="form-control" placeholder="Description">{{$spam->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" onclick="nicEditors.findEditor('area1').saveContent();" class="btn btn-primary btn-block bold btn-lg uppercase"><i class="fa fa-send"></i> Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script src="{{asset('assets/admin/js/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script>
    <script type="text/javascript">
        
    </script>

@endsection
