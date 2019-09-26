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
        <div class="main-header-area sticky-header" style="background-image:url('{{ asset('assets/images/welcome/topbanne-1.jpg') }}');height: 112px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-sm-6 col-xs-7">
                        <div class="logo-wrapper">
                            <a class="logo" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo_blanco.png') }}" alt="logo"></a>
                        </div>
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
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <div class="footer-copyright-info">
                            <p>{!! $basic->copy_text !!}</p>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <div class="footer-bottom-menu">
                            <ul class="footer-main-menu">
                                <li>
                                    <a href="{{ route('terms-condition') }}">Términos y Condiciones</a>
                                </li>
                                <li>
                                    <a href="{{ route('privacy-policy') }}">Aviso de Privacidad</a>
                                </li>
                                <li>
                                    <a href="#">info@signals.club</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>

</html>