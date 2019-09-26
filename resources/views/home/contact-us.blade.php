@extends('layouts.frontEnd')
@section('content')

    <div class="expert-section gray-bg breadcrumb-area" style="background: url('{{ asset('assets/images') }}/{{ $basic->breadcrumb }}');">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h3 class="breadcrumb-title">Contáctanos</h3>
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb-list">
                            <li><a href="{{ route('home') }}">Inicio </a></li>
                            <li><a href="#">Contáctanos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- expert contact section start -->
    <div class="expert-section contact-section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-lg-10 col-md-12">
                            <div class="area-heading area-heading-2 text-left">
                                <h2 class="area-title">Contáctate con nosotros</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-wrapper">
                                <div class="contact-form">

                                    @if($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                {!!  $error !!}
                                            </div>
                                        @endforeach
                                    @endif
                                        @if(session()->has('message'))
                                            <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                {!!  session()->get('message') !!}
                                            </div>
                                        @endif

                                    <form action="{{ url('submitContact') }}" method="POST">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="name" placeholder="Tu nombre" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="email" class="form-control" name="email" placeholder="Tu correo electrónico" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="phone" placeholder="Número telefónico" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="subject" placeholder="Asunto" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" name="message" rows="5" placeholder="Tu mensaje"></textarea>
                                            </div>
                                            <button type="submit" class="button btn-block">Enviar mensaje</button>
                                            <p class="form-send-message"></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-option-wrapper">
                        <div class="single-contact-option">
                            <i class="bi bi-map-pointer"></i>
                            <h4>Domicilio</h4>
                            <p>{{ $basic->address }}</p>
                        </div>
                        <!--<div class="single-contact-option">
                            <i class="bi bi-mobile"></i>
                            <h4>Teléfono móvil</h4>
                            <p>Núm. : {{ $basic->phone }}</p>
                        </div>-->
                        <div class="single-contact-option">
                            <i class="bi bi-envelop"></i>
                            <h4>Dirección de correo electrónico</h4>
                            <a href="mailto:{{ $basic->email }}">{{ $basic->email }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- expert contact section end -->
    <!-- expert map section start -->
    <div style="width: 100% !important;">
        {!! $basic->google_map !!}
    </div>

@endsection