@extends('layouts.frontEnd')

@section('content')

    <div class="expert-section gray-bg breadcrumb-area" style="background: url('{{ asset('assets/images') }}/{{ $basic->breadcrumb }}');">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h3 class="breadcrumb-title">Reiniciar contraseña</h3>
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb-list">
                            <li><a href="{{ route('home') }}">Inicio </a></li>
                            <li><a href="#">Reiniciar contraseña </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="expert-section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-12">
                    <div class="area-heading text-center">
                        <h2 class="area-title">Reinicia tu contraseña</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-12">

                    <form class="m-t-20" action="{{ route('password.email') }}" autocomplete="off" method="post" data-aos="fade-left" data-aos-duration="1200">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-lg-12">
                                @if (session()->has('message'))
                                    <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            {!!  $error !!}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" name="email" type="email" placeholder="Correo electrónico" required>
                                </div>
                            </div>
                            @if($basic->captcha_status == 1)
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Captcha::display() !!}
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-12" style="margin-top: 20px;">
                                <button type="submit" class="btn btn-lg btn-primary btn-block"><span> Enviar link de reseteo <i class="ti-arrow-right"></i></span></button>
                                <!--  -->
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-12 text-center m-t-30">
                            <div class="have-ac ml-auto align-self-center">¿Desea crear una cuenta? <a href="{{ route('register') }}" class="text-danger">Registrarse</a></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection

