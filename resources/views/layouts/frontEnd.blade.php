<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $site_title }} | {{ $page_title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if($meta == 1)
        <meta name="description" content="{{ $basic->description }}">
        <meta name="keyword" content="{{ $basic->meta_tag }}">
        <meta name="author" content="{{ $basic->author }}">
        <meta property="og:title" content="{{ $site_title }}" />
        <meta property="og:description" content="{{ $basic->description }}" />
        <meta property="og:image" content="{{ asset('assets/images/logo.png') }}" />
    @else
        @yield('meta')
    @endif
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/elements.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color.php') }}?color={{ $basic->color }}">
    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
<!-- expert loader start -->
<div id="expert-loader">
    <div class="loader-wrapper">
        <div class="loader-content">
            <div class="loader-dot dot-four"></div>
            <div class="loader-dot dot-three"></div>
            <div class="loader-dot dot-two"></div>
            <div class="loader-dot dot-one"></div>
        </div>
    </div>
</div>
<!-- expert loader End -->
<!-- Main wrapper start -->
<div class="wrapper">
    <!-- Header area start -->
    <header class="header-area">
        <!--<div class="header-top-area header-top-2">-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-sm-8 col-md-8">-->
        <!--                <div class="header-top-left">-->
        <!--                    <ul class="email-phone">-->
        <!--                        <li><a href="#"><i class="fa fa-envelope"></i> Correo Electrónico: <span class="text-bold">{{ $basic->email }}</span></a></li>-->
        <!--                    </ul>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-sm-4 col-md-4">-->
        <!--                <div class="header-top-right">-->
        <!--                    @if(Auth::check())-->
        <!--                        <ul class="user-area">-->
        <!--                            <li><a href="{{ route('user-dashboard') }}"><i class="fa fa-user user-icon" style="margin-right: 5px;!important;"></i>Hola. {{ Auth::user()->name }}</a></li>-->
        <!--                        </ul>-->
        <!--                    @else-->
        <!--                        <ul class="user-area">-->
        <!--                            <li style="max-height:40px; min-width:100px"><a href="{{ route('login') }}"><i class="fa fa-sign-in user-icon"></i>Ingresar</a></li>-->
        <!--                            <li style="max-height:40px; min-width:130px"><a href="{{ route('register') }}"><i class="fa fa-user-plus user-icon"></i>Registrarse</a></li>-->
        <!--                        </ul>-->
        <!--                    @endif-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="main-header-area sticky-header" style="background: #031d42;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-sm-6 col-xs-7">
                        <div class="logo-wrapper">
                            <a class="logo" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="" style=""></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-8 hidden-xs hidden-sm">
                        <nav class="expert-menu">
                            <ul class="main-menu">
                        <!--        <li><a href="{{ route('home') }}">Inicio</a></li>-->
                        <!--        <li><a href="{{ route('about-us') }}">Sobre Nosotros</a></li>-->
                        <!--        @foreach($menus as $m)-->
                        <!--            <li><a href="{{ url('menu') }}/{{ $m->id }}/{{ urldecode(strtolower(str_slug($m->name))) }}">{{ $m->name }}</a></li>-->
                        <!--        @endforeach-->
                        <!--        <li>-->
                        <!--            <a href="https://signals.club/#prices">Precios</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="{{route('faq')}}">Faqs</a>-->
                        <!--        </li>-->
                            @if($basic->phone_visible)
                            <div style="color: white; font-size: 20px;line-height: 90px;">
                                <i class="fa fa-phone"></i>+ <span style="color: #f69021">{{ substr($basic->phone, 0, 2) }}</span><span>{{ substr($basic->phone, 2) }}</span>
                            </div>
                            @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-2 hidden-sm hidden-xs">
                        <div class="header-btn">
                            <a href="{{ route('login') }}" class="button" style="background: #3464d6">Login</a>
                        </div>
                    </div>
                    <!-- Mobile menu area start -->
                    <div class="mobile-menu-area clearfix hidden-md">
                        <nav class="mobile-menu">
                            <ul class="mobile-menu-nav">
                                <li><a href="{{ route('home') }}">Inicio</a></li>
                                <li><a href="{{ route('about-us') }}">Acerca de nosostros</a></li>
                                @foreach($menus as $m)
                                    <li><a href="{{ url('menu') }}/{{ $m->id }}/{{ urldecode(strtolower(str_slug($m->name))) }}">{{ $m->name }}</a></li>
                                @endforeach
                                <li><a href="{{ route('blog') }}">Blog</a>
                                    <ul>
                                        @foreach($category as $cat)
                                            <li><a href="{{ route('category-blog',$cat->slug) }}">{{ $cat->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route('contact-us') }}">Contacto</a></li>
                                <li><a href="{{ route('login') }}">Log in</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('slider')
    <section class="content">

        @yield('content')

    </section>
    <footer class="footer-section">
        <div class="footer-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-about-info-area footer-top-content" style="display: inline-block">
                            <div class="footer-widget-heading">
                                <a class="logo" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo_blanco.png') }}" alt="Logo"></a>
                            </div>
                            <!--<div class="footer-widget-content">-->
                            <!--    <p>{{$basic->footer_text}}</p>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-top-content" style="display: inline-block">
                            <div class="footer-widget-heading">
                                <h3>Blog</h3>
                            </div>
                            <div class="footer-widget-content">
                                <ul class="links">
                                    @foreach($footer_category as $fc)
                                    <li>
                                        <!--<i class="fa fa-angle-right"></i>-->
                                        <a href="{{ route('category-blog',$fc->slug) }}">{{ $fc->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-top-content" style="display: inline-block">
                            <div class="footer-widget-heading">
                                <h3>Blog Popular</h3>
                            </div>
                            <div class="footer-widget-content">
                                <ul class="links">
                                    @foreach($footer_blog as $fb)
                                        <li>
                                            <!--<i class="fa fa-angle-right"></i>-->
                                            <a href="{{ route('blog-details',$fb->slug) }}">{{ substr($fb->title,0,25) }}{{ strlen($fb->title) > 25 ? '...' : '' }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-top-content" style="display: inline-block">
                            <div class="footer-widget-heading">
                                <h3>Detalles de contacto</h3>
                            </div>
                            <div class="footer-widget-content">
                                <ul class="footer-conatct-menu">
                                    <li>
                                        <a href="#"><i class="fa fa-envelope"></i><span>Email :</span> {{ $basic->email }}</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-map-o"></i><span>Domicilio:</span>{{ $basic->address }}</a>
                                    </li>
                                    <!--<li>-->
                                    <!--    <a href="https://t.me/joinchat/AAAAAFQDzkhPafeTVIcegw"><i class="fa fa-envelope"></i><span>Grupo de Telegram:</span> Unirse.</a>-->
                                    <!--</li>-->
                                    <li>
                                        @if($basic->phone_visible)
                                        <div style="color: white;">
                                            <i class="fa fa-phone"></i>+ {{ $basic->phone }}
                                        </div>
                                        @endif
                                    </li>
                                </ul>
                                <ul class="footer-social-menu list-inline">
                                    @foreach($social as $s)
                                    <li><a href="{{ $s->link }}" target="_blank">{!! $s->code !!}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                    <div class="text-center">
                        <!--<div class="footer-bottom-menu">-->
                        <div class="">
                            <!--<ul class="footer-main-menu">-->
                            <ul class="footer-main-menu">
                                <li>
                                    <a href="{{ route('faq') }}">F.A.Q.</a>
                                </li>
                                <li>
                                    <a href="{{ route('terms-condition') }}">Términos y Condiciones</a>
                                </li>
                                <li>
                                    <a href="{{ route('warning') }}">Aviso Legal</a>
                                </li>
                                <li>
                                    <a href="{{ route('cookies') }}">Cookies</a>
                                </li>
                                <li>
                                    <a href="{{ route('privacy-policy') }}">Aviso de Privacidad</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact-us') }}"><span>Contáctanos</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="footer-copyright-info">
                            <p>{!! $basic->copy_text !!}</p>
                        </div>
                    </div>
            </div>
        </div>
    </footer>
</div>
<script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>

{!! $basic->google_analytic !!}
{!! $basic->chat !!}

@yield('scripts')
</body>

</html>