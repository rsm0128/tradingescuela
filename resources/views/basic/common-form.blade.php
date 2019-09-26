@extends('layouts.dashboard')
@section('style')
    <script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel : true,iconsPath : '{{ asset('assets/admin/js/nicEditorIcons.gif') }}'}).panelInstance('area1');
        });
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

                            <form class="form-horizontal" method="post" role="form">

                                {!! csrf_field() !!}
                                <div class="form-body">

                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">{{ $heading }}</strong></label>
                                        <div class="col-md-12">
                                            <textarea id="{{ $nicEdit == 1 ? 'area1' : '' }}" class="form-control" rows="15" name="{{ $filed }}">{{ $basic->$filed }}</textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary bg-softwarezon-x btn-block btn-lg"><i class="fa fa-send"></i> Actualizar ahora</button>
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


@endsection