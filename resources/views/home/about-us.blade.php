@extends('layouts.frontEnd')
@section('content')

    <div class="expert-section gray-bg breadcrumb-area" style="background: url('{{ asset('assets/images') }}/{{ $basic->breadcrumb }}');">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h3 class="breadcrumb-title">{{ $page_title }}</h3>
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb-list">
                            <li><a href="{{ route('home') }}">Home </a></li>
                            <li><a href="#">{{ $page_title }} </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="white-bg expert-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="area-heading text-center">
                        <h2 class="area-title">{{ $section->about_title }}</h2>
                        <p>{{ $section->about_description }}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="intro-image wow fadeIn" data-wow-delay="0.2s">
                        <img src="{{ asset('assets/images') }}/{{ $section->about_image }}" alt="" class="img-responsive large-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php /*
    div class="expert-section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="area-heading text-center">
                        <h2 class="area-title">{{ $section->price_title }}</h2>
                        <p>{{ $section->price_description }}</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($plan as $pl)

                    <div class="col-lg-4 col-md-4 col-sm-6" style="margin-top: 20px;">
                        <div class="single-price-table table-active wow fadeIn" data-wow-delay="0.6s">
                            <div class="pricing-head">
                                <h4 class="pricing-title">{{ $pl->name }}</h4>
                            </div>
                            <div class="pricing-content">
                                <div class="pricing-value-wrapper">
                                    @if($pl->price_type == 0)
                                        <h2 class="pricing-value">
                                            GRATIS
                                            @if($pl->plan_type == 0)
                                                <sub>/ {{$pl->duration}} días</sub>
                                            @else
                                                <sub>/ ilimitado</sub>
                                            @endif
                                        </h2>
                                    @else
                                        <h2 class="pricing-value">
                                            <sup>{{ $basic->currency }}</sup>
                                            {{ $pl->price }}
                                            @if($pl->plan_type == 0)
                                                <sub>/ {{$pl->duration}} días</sub>
                                            @else
                                                <sub>/ ilimitado</sub>
                                            @endif
                                        </h2>
                                    @endif
                                </div>
                                <ul class="table-content">
                                    <li>Alertas E-mail - {{ $pl->email_status == 1 ? 'SI' : 'NO' }}</li>
                                    <li>Alertas SMS - {{ $pl->sms_status == 1 ? 'SI' : 'NO' }}</li>
                                    <li>Alertas Telegram - {{ $pl->telegram_status == 1 ? 'SI' : 'NO' }}</li>
                                    <li>Consultas telefónicas - {{ $pl->call_status == 1 ? 'SI' : 'NO' }}</li>
                                    <li>Soporte - {{ $pl->support }}</li>
                                </ul>
                            </div>
                            <div class="pricibg-footer">
                                <a href="{{ route('register') }}" class="button button-small">Suscríbete ahora</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
*/ ?>

    <!-- expert section start -->

    <!-- expert call to action section start -->
    <div class="colored-bg call-to-action-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="action-content">
                        <div class="action-heading">
                            <h3>{{ $section->provider_title }}</h3>
                            <p>{{ $section->provider_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="action-button">
                        <a href="{{ route('user-staff-request') }}" class="button btn-white" style="background: #ffffff;">Become a Provider</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- expert call to action section start -->

    <!-- expert team section start -->
    <div class="expert-section team-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="area-heading text-center">
                        <h2 class="area-title">{{ $section->team_title }}</h2>
                        <p>{{ $section->team_description }}</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($team as $t)
                <div class="col-md-3 col-sm-6" style="margin-bottom: 20px;">
                    <div class="single-team-member team-style-2 wow fadeIn" data-wow-delay="0.2s">
                        <div class="member-thumbnail">
                            <img src="{{ asset('assets/images/member') }}/{{ $t->image }}" class="img-responsive" alt="">
                        </div>
                        <div class="member-content">
                            <h4>{{ $t->name }}</h4>
                            <p>{{ $t->position }}</p>
                            <ul class="member-bookmark">
                                <li><a href="{{ $t->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $t->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $t->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="{{ $t->instragram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- expert team section end -->
    <div class="expert-section bg-2" style="background: url('{{ asset('assets/images') }}/{{ $section->counter_image }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-counter wow fadeIn" data-wow-delay="0.2s">
                        <div class="counter-icon">
                            <i class="bi bi-spark"></i>
                        </div>
                        <div class="counter-text">
                            <p class="fact-number">{{ $total_signal }}</p>
                            <h4>Total de Señales</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-counter wow fadeIn" data-wow-delay="0.3s">
                        <div class="counter-icon">
                            <i class="bi bi-link"></i>
                        </div>
                        <div class="counter-text">
                            <p class="fact-number">{{ $total_category }}</p>
                            <h4>Categorías del Blog</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-counter wow fadeIn" data-wow-delay="0.4s">
                        <div class="counter-icon">
                            <i class="bi bi-article"></i>
                        </div>
                        <div class="counter-text">
                            <p class="fact-number">{{ $total_blog }}</p>
                            <h4>Total de Blogs</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-counter wow fadeIn" data-wow-delay="0.5s">
                        <div class="counter-icon">
                            <i class="bi bi-group"></i>
                        </div>
                        <div class="counter-text">
                            <p class="fact-number">{{$total_user}}</p>
                            <h4>Usuarios Felices</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- testimonial area start -->
    <div class="expert-section testimonial-section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="area-heading text-center">
                        <h2 class="area-title">{{ $section->testimonial_title }}</h2>
                        <p>{{ $section->testimonial_description }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-wrapper navigation-one text-center">

                        @foreach($testimonial as $tt)
                        <div class="single-testimonial">
                            <blockquote>
                                <img src="{{asset('assets/images/testimonial')}}/{{$tt->image}}" alt="" class="client-image">
                                <p>{{ $tt->message }}</p>
                                <p class="client-name">{{ $tt->name }}<span class="designation">{{ $tt->position }}</span></p>
                            </blockquote>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->

    <div class="subscribe-section colored-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="subscribe-content">
                        <h3>{{ $section->subscriber_title }}</h3>
                        <p>{{ $section->subscriber_description }}</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="subscription-box">
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
                        <form class="subscription-form" method="POST" action="{{ route('submit-subscribe') }}">
                            {!! csrf_field() !!}
                            <div class="subscribe-input">
                                <input type="email" class="subscribe-control" required name="email" placeholder="Ingresa tu E-mail">
                            </div>
                            <div class="subscribe-input">
                                <button class="button email-submit-btn btn-white" style="background: #ffffff;" type="submit"><i class="fa fa-paper-plane"></i> Suscríbete ahora</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection