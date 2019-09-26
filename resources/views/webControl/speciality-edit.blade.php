@extends('layouts.dashboard')
@section('style')

@endsection

@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('speciality-control') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Speciality</a>
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

                    <form class="form-horizontal" action="{{ route('speciality-update',$menu->id) }}" method="post" role="form">

                        {!! csrf_field() !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-12"><strong style="text-transform: uppercase;">Speciality Title</strong></label>
                                <div class="col-md-12">
                                    <input class="form-control input-lg" name="name" placeholder="" value="{{ $menu->name }}" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><strong style="text-transform: uppercase;">Font awesome icon</strong></label>
                                <div class="col-md-12">
                                    <input class="form-control input-lg" name="icon" placeholder="" value="{{ $menu->icon }}" type="text" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12"><strong style="text-transform: uppercase;">Speciality Description</strong></label>
                                <div class="col-md-12">
                                    <textarea id="area1" class="form-control" rows="5" name="description">{{ $menu->description }}</textarea>
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> Update Speciality</button>
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