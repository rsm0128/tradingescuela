@extends('layouts.frontEnd')
@section('slider')
    <div class="slider-area clearfix">
        <div id="expert-slider">
            @foreach($slider as $s)
                <div class="expert-single-slide" style="background-image: url('{{ asset('assets/images/slider') }}/{{$s->image}}');">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="slide-content-wrapper">
                                    <div class="slide-content text-center">
                                        <span class="slide-subtitle colored-text" data-animation="fadeInLeft" data-delay="0.5s">{{ $s->main_title }}</span>
                                        <div class="slide-title colored-text">{{ $s->sub_title }}</div>
                                        @if($slider_is_video == 1)
                                            <div class="slide-video">
                                                {!! $slider_video  !!}
                                            </div>
                                        @else
                                            <div class="slide-video">
                                                <img src="{{ asset('assets/images') }}/{{$slider_image}}" alt="" class="img-responsive" style="margin: auto;">
                                            </div>
                                        @endif
                                        <!--<p class="slide-description colored-text" data-animation="fadeInDown" data-delay="1.5s">{{ $s->slider_text }}</p>-->
                                        <div style="margin-top:18px;">
                                            <a href="https://tradingescuela.com/register" class="button">Suscribirse</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            @endforeach
        </div>
        <!--<div class="slider-bottom"></div>-->
    </div>
@endsection
@section('content')
    <style>
        .timers {
            padding: 0 10px;
            text-align: center;
            color: red;
            font-weight: 600;
            font-size: 16px;
        }
    </style>
    <div id="prices" class="expert-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="area-heading text-center" style="margin-bottom: 50px;">
                        <h2 class="area-title" style="color: black">Nuestros planes</h2>
                        <p style="color: black">Elige el que más te convenga.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @php $c_plan_promos = count($plan_promos) @endphp
                @foreach($plan_promos as $pl)
                    <div id="plan-wrapper_{{ $pl->id }}" class="col-lg-4 col-md-4 col-sm-6 {{ $c_plan_promos == 1 ? 'col-sm-offset-3 col-md-offset-4' : '' }}" style="margin-top: 20px;">
                        <div class="text-center" style="margin-bottom: 15px">
                            <label>
                                <span style="color: white;">Promo termina en:</span>
                                <input type="text" class="timers" id="timer_{{ $pl->id }}" disabled value="">
                            </label>
                        </div>
                        <div class="single-price-table table-active wow fadeIn" data-wow-delay="0.6s">
                            <div class="<?php if($pl->has_promo == 1){ echo ' pricing-head-green'; }else{echo ' pricing-head';}?>">
                                <h4 class="pricing-title">{{ $pl->name }}</h4>
                                <h6 class="pricing-subtitle">{{$pl->subtitle}}</h6>
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
                                            @if($pl->high_price)
                                                <span class="pricing-cross">({{ $pl->high_price }})</span>
                                            @endif
                                            @if($pl->plan_type == 0)
                                                <sub>/ {{$pl->duration}} días</sub>
                                            @else
                                                <sub>/ ilimitado</sub>
                                            @endif
                                        </h2>
                                    @endif
                                </div>
                                <ul class="table-content">
                                    @if($pl->telegram_visible)
                                        <li>Alertas Telegram - {{ $pl->telegram_status == 1 ? 'SI' : 'NO' }}</li>
                                    @endif
                                    @if($pl->sms_visible)
                                        <li>Alertas SMS - {{ $pl->sms_status == 1 ? 'SI' : 'NO' }}</li>
                                    @endif
                                    @if($pl->seminars_visible)
                                        <li>Acceso a Seminarios  - {{ $pl->seminar_status == 1 ? 'SI' : 'NO' }}</li>
                                    @endif
                                    @if($pl->forex_course_visible)
                                        <li>Curso Básico de Forex  - {{ $pl->forex_course == 1 ? 'SI' : 'NO' }}</li>
                                    @endif
                                    @if($pl->telegram_group_visible)
                                        <li>Consultoría en grupo de Telegram - {{ $pl->telegram_group_status == 1 ? 'SI' : 'NO' }}</li>
                                    @endif
                                    @if($pl->support_visible)
                                        <li>Soporte - {{ $pl->support }}</li>
                                    @endif
                                    @if($pl->email_alert_visible)
                                        <li>Alerts by Email - {{ $pl->email_status == 1 ? 'SI' : 'NO' }}</li>
                                    @endif
                                </ul>
                                <div class="pricing-description">{!!$pl->description!!}</div>
                            </div>
                            <div class="pricibg-footer">
                                <a href="{{ route('register') }}" class="button button-small">Suscríbete ahora</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row" style="display: flex; justify-content: center;">
                @foreach($plan as $pl)
                    <div class="col-lg-4 col-md-4 col-sm-6" style="margin-top: 20px;">
                        <div class="single-price-table table-active wow fadeIn" data-wow-delay="0.6s">
                            <div class="pricing-oharra">AHORRA 20%</div>
                            <div class="<?php if($pl->has_promo == 1){ echo ' pricing-head-green'; }else{echo ' pricing-head';}?>">
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
                                            @if($pl->high_price)
                                                <span class="pricing-cross">({{ $pl->high_price }})</span>
                                            @endif
                                            @if($pl->plan_type == 0)
                                                <sub>/ {{$pl->duration}} días</sub>
                                            @else
                                                <sub>/ ilimitado</sub>
                                            @endif
                                        </h2>
                                    @endif
                                </div>
                                <ul class="table-content">
                                    @if($pl->telegram_visible)
                                        <li>Alertas Telegram - {{ $pl->telegram_status == 1 ? 'SI' : 'NO' }}</li>
                                    @endif
                                    @if($pl->sms_visible)
                                        <li>Alertas SMS - {{ $pl->sms_status == 1 ? 'SI' : 'NO' }}</li>
                                    @endif
                                    @if($pl->seminars_visible)
                                        <li>Acceso a Seminarios  - {{ $pl->seminar_status == 1 ? 'SI' : 'NO' }}</li>
                                    @endif
                                    @if($pl->forex_course_visible)
                                        <li>Curso Básico de Forex  - {{ $pl->forex_course == 1 ? 'SI' : 'NO' }}</li>
                                    @endif
                                    @if($pl->telegram_group_visible)
                                        <li>Consultoría en grupo de Telegram - {{ $pl->telegram_group_status == 1 ? 'SI' : 'NO' }}</li>
                                    @endif
                                    @if($pl->support_visible)
                                        <li>Soporte - {{ $pl->support }}</li>
                                    @endif
                                    @if($pl->email_alert_visible)
                                        <li>Alerts by Email - {{ $pl->email_status == 1 ? 'SI' : 'NO' }}</li>
                                    @endif
                                </ul>
                                <div class="pricing-description">{!!$pl->description!!}</div>
                                <!--<ul class="table-content">-->
                                <!--    <li>Alertas Telegram - {{ $pl->telegram_status == 1 ? 'SI' : 'NO' }}</li>-->
                                <!--    <li>Alertas SMS - {{ $pl->sms_status == 1 ? 'SI' : 'NO' }}</li>-->
                                <!--    <li>Acceso a Seminarios  - {{ $pl->seminar_status == 1 ? 'SI' : 'NO' }}</li>-->
                                <!--    <li>Curso Básico de Forex  - {{ $pl->forex_course == 1 ? 'SI' : 'NO' }}</li>-->
                                <!--    <li>Consultoría en grupo de Telegram - {{ $pl->telegram_group_status == 1 ? 'SI' : 'NO' }}</li>-->
                                <!--    <li>Soporte - {{ $pl->support }}</li>-->
                                <!--</ul>-->
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
    <div class="white-bg expert-section">
        <div class="container">
            <div class="row" style="margin-bottom: 90px;">
                <div class="col-md-6">
                    <div class="intro-content wow fadeIn" data-wow-delay="0.2s">
                        <div class="intro-heading">
                            <h3>{{ $section->about_title }}</h3>
                        </div>
                        <div class="intro-description">
                            <p class="text-justify">{{ $section->about_description }}</p>
                        </div>
                        <a href="{{ $about_demo_link }}" class="button">TRY DEMO</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="intro-image wow fadeIn" data-wow-delay="0.2s">
                        <img src="{{ asset('assets/images/slider/about2.png') }}" alt="" class="img-responsive">
                    </div>
                    <!--@if(!$section->about_is_video)-->
                        <!--<div class="intro-image wow fadeIn" data-wow-delay="0.2s">-->
                        <!--    <img src="{{ asset('assets/images') }}/{{ $section->about_image }}" alt="" class="img-responsive" style="max-width: 60%; max-height: 340px;">-->
                        <!--</div>-->
                    <!--@else-->
                    <!--    <iframe-->
                    <!--        width="80%" style="height: 400px"-->
                    <!--        frameBorder="0"-->
                    <!--        src="{{ $section->about_video }}">-->
                    <!--    </iframe>-->
                    <!--@endif-->
                </div>
            </div>
            <div class="row" style="margin-bottom: 90px;">
                <div class="col-md-6">
                    <div class="intro-image wow fadeIn" data-wow-delay="0.2s">
                        <img src="{{ asset('assets/images') }}/{{ $section->about2_image }}" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="intro-content wow fadeIn" data-wow-delay="0.2s">
                        <div class="intro-heading">
                            <h3>{{ $section->about2_title }}</h3>
                        </div>
                        <div class="intro-description">
                            <p class="text-justify">{{ $section->about2_description }}</p>
                        </div>
                        <a href="{{ $about_demo_link }}" class="button">TRY DEMO</a>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 90px;">
                <div class="col-md-6">
                    <div class="intro-content wow fadeIn" data-wow-delay="0.2s">
                        <div class="intro-heading">
                            <h3>{{ $section->about3_title }}</h3>
                        </div>
                        <div class="intro-description">
                            <p class="text-justify">{{ $section->about3_description }}</p>
                        </div>
                        <a href="{{ $about_demo_link }}" class="button">TRY DEMO</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="intro-image wow fadeIn" data-wow-delay="0.2s">
                        <img src="{{ asset('assets/images') }}/{{ $section->about3_image }}" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 90px;">
                <div class="col-md-6">
                    <div class="intro-image wow fadeIn" data-wow-delay="0.2s">
                        <img src="{{ asset('assets/images') }}/{{ $section->about4_image }}" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="intro-content wow fadeIn" data-wow-delay="0.2s">
                        <div class="intro-heading">
                            <h3>{{ $section->about4_title }}</h3>
                        </div>
                        <div class="intro-description">
                            <p class="text-justify">{{ $section->about4_description }}</p>
                        </div>
                        <a href="{{ $about_demo_link }}" class="button">TRY DEMO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--<div style="background: url('assets/images/slider/fondo.png') no-repeat center center; background-size: cover;padding-top: 300px;padding-bottom: 350px;">-->
    <div style="background-color: #143596;">
        <div class="feature-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="area-heading text-center">
                            <h4 class="area-title">{{ $basic->specialty_title }}</h4>
                            <p>{{ $section->speciality_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($speciality as $key => $sp)
                    <div class="col-md-4 col-sm-6" style="display: inline-block">
                        <div class="single-feature wow fadeIn" style=" min-height:330px; margin: 40px 32px;" data-wow-delay="0.2s">
                            <div class="extraSpeciality">{!! $sp->icon !!}</div>
                            <!--<div class="extraSpeciality"><img src="{{ asset('assets/images/slider/Grupo 67.png') }}"></div>-->
                            <div class="feature-content">
                                <h4>{{$sp->name}}</h4>
                                <p>{{$sp->description}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>
    <!--<div class="expert-section" style="background: url('{{ asset('assets/images') }}/{{ $section->counter_image }}')">
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
    </div>-->

    <div class="expert-section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="area-heading text-center">
                        <h2 class="area-title" style="font-size: 24px; color: #1e3e88;">{{ $section->trading_title }}</h2>
                        <!--<p>{{ $section->trading_description }}</p>-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    {!! $section->trading_script !!}

                </div>
            </div>
        </div>
    </div>

    <!--<div class="colored-bg call-to-action-area">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-8">-->
    <!--                <div class="action-content">-->
    <!--                    <div class="action-heading">-->
    <!--                        <h3>{{ $section->advertise_title }}</h3>-->
    <!--                        <p>{{ $section->advertise_description }}</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-4">-->
    <!--                <div class="action-button">-->
    <!--                    <a href="{{ route('register') }}" class="btn button btn-primary btn-white" style="background: #ffffff;"><i class="fa fa-send"></i> ¡Regístrate ahora!</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->


    <div class="expert-section testimonial-section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="area-heading text-center">
                        <h2 class="area-title" style="font-size: 24px; color: #1e3e88;">{{ $section->testimonial_title }}</h2>
                        <!--<p>{{ $section->testimonial_description }}</p>-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-wrapper navigation-one text-center">

                        @foreach($testimonial as $key => $t)
                            <div class="single-testimonial">
                                <blockquote>
                                    <img src="{{ asset('assets/images/testimonial') }}/{{ $t->image }}" alt="{{ $t->name }}" class="client-image">
                                    <p>{{ $t->message }}</p>
                                    <p class="client-name">{{ $t->name }} <span class="designation">{{ $t->position }}</span></p>
                                </blockquote>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="subscribe-section colored-bg">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-sm-12 col-md-12 col-lg-6">-->
    <!--                <div class="subscribe-content">-->
    <!--                    <h3>{{ $section->subscriber_title }}</h3>-->
    <!--                    <p>{{ $section->subscriber_description }}</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-sm-12 col-md-12 col-lg-6">-->
    <!--                <div class="subscription-box">-->
    <!--                    @if (session()->has('message'))-->
    <!--                        <div class="alert alert-warning alert-dismissable">-->
    <!--                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
    <!--                            {{ session()->get('message') }}-->
    <!--                        </div>-->
    <!--                    @endif-->
    <!--                    @if($errors->any())-->
    <!--                        @foreach ($errors->all() as $error)-->
    <!--                            <div class="alert alert-danger alert-dismissable">-->
    <!--                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
    <!--                                {!!  $error !!}-->
    <!--                            </div>-->
    <!--                        @endforeach-->
    <!--                    @endif-->
    <!--                    <form class="subscription-form" method="POST" action="{{ route('submit-subscribe') }}">-->
    <!--                        {!! csrf_field() !!}-->
    <!--                        <div class="subscribe-input">-->
    <!--                            <input type="email" class="subscribe-control" required name="email" placeholder="Ingresa tu E-mail">-->
    <!--                        </div>-->
    <!--                        <div class="subscribe-input">-->
    <!--                            <button class="button email-submit-btn btn-white" type="submit" style="background: #ffffff;"><i class="fa fa-paper-plane"></i> Suscríbete ahora</button>-->
    <!--                        </div>-->
    <!--                    </form>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="expert-section blog-section">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-12">-->
    <!--                <div class="area-heading text-center">-->
    <!--                    <h2 class="area-title">{{ $section->blog_title }}</h2>-->
    <!--                    <p>{{ $section->blog_description }}</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="row">-->
    <!--            @foreach($blog as $b)-->
    <!--                <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">-->
    <!--                    <article class="blog-post">-->
    <!--                        <div class="post-thumbnail">-->
    <!--                            <a href="#"><img src="{{ asset('assets/images/post') }}/{{ $b->image }}" alt=""></a>-->
    <!--                        </div>-->
    <!--                        <div class="post-content">-->
    <!--                            <h5 class="post-title"><a href="{{ route('blog-details',$b->slug) }}">{{ substr($b->title,0,30) }}{{ strlen($b->title) > 33 ? '...' : '' }}</a></h5>-->
    <!--                            <ul class="post-date list-inline">-->
    <!--                                <li><a href="#"><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($b->created_at)->format('dS M, Y') }}</a></li>-->
    <!--                                <li><a href="#"><i class="fa fa-flag"></i>{{ $b->category->name }}</a></li>-->
    <!--                            </ul>-->
    <!--                            <p>{{ substr(strip_tags($b->description),0,120) }}..</p>-->
    <!--                            <a class="button" href="{{ route('blog-details',$b->slug) }}">View Details</a>-->
    <!--                        </div>-->
    <!--                    </article>-->
    <!--                </div>-->
    <!--            @endforeach-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

        <?php foreach ($promos as $promo) : ?>
            var seconds{{$promo['id']}} = {{$promo['timeout']}};
            function secondPassed{{$promo['id']}}() {
                var minutes = Math.round((seconds{{$promo['id']}} - 30)/60);
                var remainingSeconds = seconds{{$promo['id']}} % 60;

                var hours = Math.round((minutes - 30)/60);
                var remainingMinutes = minutes % 60;

                if (remainingSeconds < 10) { 
                    remainingSeconds = "0" + remainingSeconds; 
                }

                if (remainingMinutes < 10) { 
                    remainingMinutes = "0" + remainingMinutes; 
                }

                var message = '';

                if (hours > 0)
                    message += hours + ' hrs. ';
                if (remainingMinutes > 0)
                    message += remainingMinutes + ' min. ';
                message += remainingSeconds + ' seg.';

                $('#timer_{{$promo['id']}}').val(message); 
                if (seconds{{$promo['id']}} == 0) { 
                    clearInterval(countdownTimer{{$promo['id']}});
                    $('#plan-wrapper_{{$promo['id']}}').remove();
                } else { 
                    seconds{{$promo['id']}}--; 
                } 
            }

            var countdownTimer{{$promo['id']}} = setInterval(secondPassed{{$promo['id']}}, 1000);
        <?php endforeach ?>

        });
    </script>
@endsection