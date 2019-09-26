@extends('layouts.subdashboard')
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

                            <form class="form-horizontal" method="post" role="form">
                                {!! csrf_field() !!}
                                <div class="form-body">

                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Título de la señal:</strong></label>
                                        <div class="col-md-12">
                                            <input id="title" class="form-control" name="title" value="{{ $basic->welcome_message_title }}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Youtube url:</strong></label>
                                        <div class="col-md-12">
                                            <input id="youtube_url" class="form-control" name="youtube_url" value="{{ $basic->welcome_message_youtube }}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Descripción de la señal:</strong></label>
                                        <div class="col-md-12">
                                            <textarea id="area1" class="form-control" rows="15" name="body">{{ $basic->welcome_message_body }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> Update</button>
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

    <script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel : true,iconsPath : '{{ asset('assets/admin/js/nicEditorIcons.gif') }}'}).panelInstance('area1');
        });
    </script>

@endsection