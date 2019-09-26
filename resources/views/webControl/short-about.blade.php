@extends('layouts.dashboard')

@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@endsection
@section('content')


    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">{{$page_title}}</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">

                            <form action="" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-10 offset-1">
                                            <input type="hidden" name="id" value="{{$basic->id}}">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Image</strong></label>
                                                <div class="col-md-12">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 900px; height: 300px;" data-trigger="fileinput">
                                                            <img style="width: 900px" src="{{ asset('assets/images')}}/{{ $basic->short_about_img }}" alt="...">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 900px; max-height: 300px"></div>
                                                        <div>
                                                            <span class="btn btn-info btn-file">
                                                                <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                                <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                                <input type="file" name="short_about_img" accept="image/*" >
                                                            </span>
                                                            <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Short Title</strong></label>
                                                <div class="col-md-12">
                                                    <input type="text" name="short_title" id="" value="{{ $basic->short_title }}" class="form-control" required placeholder="Short Title">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Short Message</strong></label>
                                                <div class="col-md-12">
                                                    <textarea name="short_about" id="area1" rows="5" class="form-control" required placeholder="Short Message">{{ $basic->short_about }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type="submit" onclick="nicEditors.findEditor('area1').saveContent();" class="btn btn-primary btn-block bold btn-lg uppercase"><i class="fa fa-send"></i> Update </button>
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
    </section><!---ROW-->


@endsection
@section('scripts')
<script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>

<script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        new nicEditor({fullPanel : true,iconsPath : '{{ asset('assets/admin/js/nicEditorIcons.gif') }}'}).panelInstance('area1');
    });
</script>
@endsection
