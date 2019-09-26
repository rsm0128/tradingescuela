@extends('layouts.user')

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

                            <form class="form-horizontal" method="post" action="">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label"><b>Título de Señal : </b></label>
                                                <div class="col-sm-12">
                                                    <input name="title" value="" class="form-control input-lg" type="text" placeholder="Signal Title" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-12 control-label"><b>Descripción de Señal :</b> </label>
                                                <div class="col-sm-12">
                                                    <textarea name="description" id="ckview" cols="30" rows="10" class="form-control input-lg" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block bg-softwarezon-x "> <i class="fa fa-send"></i> Subir Señal</button>
                                                </div>
                                            </div>
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

    <script src="{{asset('assets/admin/ckeditor/ckeditor.js')}}"></script>

    <script>
        var ckview = document.getElementById("ckview");
        CKEDITOR.replace(ckview,{
            language:'en-gb'
        });
    </script>
@endsection
