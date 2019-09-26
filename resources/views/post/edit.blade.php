@extends('layouts.dashboard')

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


                    <form action="{{route('post-update')}}" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-10 offset-1">
                            <input type="hidden" name="id" value="{{ $testimonial->id }}">
                            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">title </strong></label>
                                    <div class="col-md-12">
                                        <input name="title" class="form-control input-lg" placeholder=" Title" required value="{{ $testimonial->title }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;"> Category</strong></label>
                                    <div class="col-md-12">
                                    <select name="category" id="category" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach($category as $cat)
                                            @if($cat->id == $testimonial->category_id)
                                                <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                                            @else
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;"> Image</strong></label>
                                    <div class="col-md-12">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 400px; height: 220px;" data-trigger="fileinput">
                                                <img style="width: 400px" src="{{ asset('assets/images/post') }}/{{ $testimonial->image }}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 220px"></div>
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
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Description</strong></label>
                                    <div class="col-md-12">
                                        <textarea name="description" id="area1" rows="10" class="form-control" required placeholder="Description">{!! $testimonial->description !!}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;"> tags</strong></label>
                                    <div class="col-md-12">
                                        <input name="tags" data-role="tagsinput" class="form-control input-lg" required value="{!! $testimonial->tags !!}" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;"> Featured Status</strong> </label>
                                    <div class="col-md-12">
                                           <input data-toggle="toggle" {{ $testimonial->fetured == 1 ? 'checked' : ''}} data-onstyle="success" data-size="large" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="fetured">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" onclick="nicEditors.findEditor('area1').saveContent();" class="btn btn-primary btn-block bold btn-lg uppercase"><i class="fa fa-send"></i> Update Post</button>
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


@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
    <script src="{{asset('assets/admin/js/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel : true,iconsPath : '{{ asset('assets/admin/js/nicEditorIcons.gif') }}'}).panelInstance('area1');
        });
    </script>
@endsection
