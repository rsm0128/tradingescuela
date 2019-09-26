@extends('layouts.dashboard')
@section('style')


@endsection

@section('content')


    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('menu-control') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Menu</a>
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


                            <form class="form-horizontal" action="{{ route('menu-create') }}" method="post" role="form">

                                {!! csrf_field() !!}
                                <div class="form-body">

                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Menu Name</strong></label>
                                        <div class="col-md-12">
                                            <input class="form-control input-lg" name="name" placeholder="" type="text" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">CONTENT</strong></label>
                                        <div class="col-md-12">
                                            <textarea id="area1" class="form-control" rows="15" name="description"></textarea>
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-plus"></i> ADD MENU</button>
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