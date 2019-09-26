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

                            <div class="row">
                                <div class="col-md-10 offset-1">
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Paso #1 : Se necesita mandar una petición al administrador.</strong>
                                    </div>
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Paso #2 : Se espera la aprovación del administrador.</strong>
                                    </div>
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Paso #3 : Después de la aprobación, ya puedes subir señales.</strong>
                                    </div>
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Paso #4 : El administrador asigna el valor de la señal en USD.</strong>
                                    </div>
                                    <div class="alert alert-primary" role="alert">
                                        <strong>Paso #5 : Cuando se alcance el límite de retiro, ya se podrá realizar un retiro.</strong>
                                    </div>
                                    <hr>
                                    @if(Auth::user()->signal_status == 0)
                                        <form class="form form-horizontal" action="{{ route('submit-staff-request') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-navigation"></i> Mandar solicitud de provedor</button>
                                        </form>
                                    @elseif(Auth::user()->signal_status == 2)
                                        <div class="alert alert-warning text-center" role="alert">
                                            <strong>Tu solicitud está pendiente.</strong>
                                        </div>
                                    @elseif(Auth::user()->signal_status == 3)
                                        <div class="alert alert-danger text-center" role="alert">
                                            <strong>Tu solicitud ha sido denegada.</strong>
                                        </div>
                                    @else
                                        <div class="alert alert-success text-center" role="alert">
                                            <strong>Ya eres un provedor.</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection