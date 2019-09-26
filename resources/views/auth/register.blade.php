@extends('layouts.frontEnd')

@section('content')

    <div class="expert-section gray-bg breadcrumb-area" style="background: url('{{ asset('assets/images') }}/{{ $basic->breadcrumb }}');">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h3 class="breadcrumb-title">Registrarse</h3>
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb-list">
                            <li><a href="{{ route('home') }}">Inicio </a></li>
                            <li><a href="#">Registrarse </a></li>
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
                        <h2 class="area-title">Regístrate Aquí</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-12">
                    <form class="m-t-20" action="{{ route('register') }}" autocomplete="off" method="post" data-aos="fade-up" data-aos-duration="1200">
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
                                    <input class="form-control" name="name" type="text" placeholder="Nombre completo" autocomplete="false" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" name="email" type="email" placeholder="Dirección de correo electrónico" required>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <select name="country_code" id="country_code" class="form-control input-lg" required>
                                        <option value="">Código del país</option>
                                        @foreach($country as $cn)
                                            <option value="{{$cn['dial_code']}}">{{ $cn['name'] }} ({{$cn['dial_code']}})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <input class="form-control" name="phone" type="number" placeholder="Número telefónico" id="phone_number" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select name="plan_id" id="plan_id" class="form-control input-lg" required data-error="Select One Subscription Plan" style="line-height: 30px!important;">
                                        <option value="">Selecciona Plan</option>
                                        @foreach($plan as $p)
                                            <option value="{{$p->id}}">{{$p->name}} - @if($p->price_type == 0) FREE @else {{ $p->price }} {{$basic->currency}}@endif</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select name="level" id="level" class="form-control input-lg" required data-error="Select One Level" style="line-height: 30px!important;">
                                        <option value="">Nivel de Conocimientos</option>
                                        <option value="Principiante">Principiante</option>
                                        <option value="Intermedio">Intermedio</option>
                                        <option value="Avanzado">Avanzado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" name="reg_code" type="text" placeholder="Código de Registro (Opcional)" id="reg_code">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" name="password" type="password" placeholder="Contraseña" autocomplete="rrr" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" name="password_confirmation" type="password" placeholder="Confirmar contraseña" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                        <input type="checkbox" class="custom-control-input" required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Acepto <a href="{{ route('terms-condition') }}" target="_blank" class="link">términos y condiciones</a> y <a href="{{ route('privacy-policy') }}" target="_blank" class="link">políticas de privacidad</a></span>
                                    </label>
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
                                <button type="submit" class="btn btn-lg btn-block btn-primary btn-arrow"><span> Crear cuenta <i class="ti-arrow-right"></i></span></button>
                                <!--  -->
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-12 text-center m-t-30">
                            <div class="have-ac ml-auto align-self-center">¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-danger">Ingresa aquí.</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('scripts')
@endsection
