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
                        <form class="form-horizontal" method="post" action="{{ route('manage-faq-update', $id) }}">
                            {!! csrf_field() !!}
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="col-sm-12 control-label"><b>Faq Title : </b></label>
                                        <input type="text" class="form-control" name="title" value="{{ $faq->title }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-sm-12 control-label"><b>Faq Content : </b></label>
                                        <textarea id="area1" class="form-control" rows="5" name="content">{{ $faq->content }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Save</button>
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