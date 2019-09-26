<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $site_title }} | {{ $page_title }}</title>
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="{{ $basic->description }}" />
    <meta name="keywords" content="{{ $basic->meta_tag }}" />
    <meta name="author" content="{{ $basic->author }}" />

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/jquery.mCustomScrollbar.css') }}">
    @yield('style')
</head>
<body>

<div class="theme-loader">
    <div class="loader-track">
        <div class="loader-bar"></div>
    </div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#">
                        <i class="ti-menu"></i>
                    </a>
                    <a href="{{ route('home') }}">
                        <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="{{ $site_title }}" style="width: 180px;" />
                    </a>
                    <a class="mobile-options">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <a href="#">
                                @if(Auth::user()->image != null)
                                    <img src="{{ asset('assets/images') }}/{{ Auth::user()->image }}" class="img-radius" alt="{{ Auth::user()->name }}">
                                @else
                                    <img src="{{ asset('assets/images/user-default.png') }}" alt="avatar">
                                @endif
                                <span>{{ Auth::user()->name }}</span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li>
                                    <a href="{{ route('user-edit-profile') }}">
                                        <i class="ti-user"></i> Perfil
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user-change-password') }}">
                                        <i class="ti-pencil-alt"></i> Cambiar Contraseña
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="ti-share"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @php
            $userId = Auth::user()->id;
            $newSignal = App\UserSignal::whereUser_id($userId)->whereStatus(0)->count();
            $allSignal = App\UserSignal::whereUser_id($userId)->count();
        @endphp
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="pcoded-navigation-label">Configuraciones Generales</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="{{ Request::is('user-dashboard') ? 'active' : '' }}">
                                <a href="{{ route('user-dashboard') }}">
                                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                    <span class="pcoded-mtext">Panel</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                        @if(Auth::user()->plan_status == 1)
                            <div class="pcoded-navigation-label text-center"><a href="{{ route('welcome') }}" style="background: #f69021; padding: 5px 30px 5px 30px; border-radius: 6px; text-transform: none;">Bienvenido</a></div>
                        @endif
                        <!--<div class="pcoded-navigation-label">Señales</div>-->
                        <!--<ul class="pcoded-item pcoded-left-item">-->

                            <!--<li class="{{ Request::is('user/new-signal') ? 'active' : '' }}">-->
                            <!--    <a href="{{ route('user-new-signal') }}">-->
                            <!--        <span class="pcoded-micon"><i class="ti-pulse"></i><b>D</b></span>-->
                            <!--        <span class="pcoded-mtext">Nueva Señal</span>-->
                            <!--        <span class="pcoded-badge label label-success ">{{ $newSignal }}</span>-->
                            <!--        <span class="pcoded-mcaret"></span>-->
                            <!--    </a>-->
                            <!--</li>-->
                        <!--    <li class="{{ Request::is('user/all-signal') ? 'active' : '' }}">-->
                        <!--        <a href="{{ route('user-all-signal') }}">-->
                        <!--            <span class="pcoded-micon"><i class="ti-stats-up"></i><b>D</b></span>-->
                        <!--            <span class="pcoded-mtext">Todas las Señales</span>-->
                        <!--            <span class="pcoded-badge label label-primary ">{{ $allSignal }}</span>-->
                        <!--            <span class="pcoded-mcaret"></span>-->
                        <!--        </a>-->
                        <!--    </li>-->
                        <!--</ul>-->
                        @if(Auth::user()->plan_status == 1 or Auth::user()->plan->name == 'Equipo' or Auth::user()->plan->name == 'Cortesía')
                            <div class="pcoded-navigation-label" style="text-transform: unset;">Discord</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="{{ Request::is('user/active-discord') ? 'active' : '' }}">
                                    <a href="{{ route('active-discord') }}">
                                        <span class="pcoded-micon"><i class="fa fa-send-o"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Grupo privado</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">Ver materiales</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="{{ Request::is('user/materials') ? 'active' : '' }}">
                                    <a href="{{ route('materials') }}">
                                        <span class="pcoded-micon"><i class="fa fa-paperclip"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Materiales de apoyo</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <!--<li class="{{ Request::is('user/mmaterials') ? 'active' : '' }}">-->
                                <!--    <a href="{{ route('mmaterials') }}">-->
                                <!--        <span class="pcoded-micon"><i class="fa fa-paperclip"></i><b>D</b></span>-->
                                <!--        <span class="pcoded-mtext">Señales del mes</span>-->
                                <!--        <span class="pcoded-mcaret"></span>-->
                                <!--    </a>-->
                                <!--</li>-->
                            </ul>
                        @endif
                        <div class="pcoded-navigation-label">Perfil</div>
                        <ul class="pcoded-item pcoded-left-item">

                            <li class="{{ Request::is('user-edit-profile') ? 'active' : '' }}">
                                <a href="{{ route('user-edit-profile') }}">
                                    <span class="pcoded-micon"><i class="ti-pencil-alt"></i><b>D</b></span>
                                    <span class="pcoded-mtext">Actualizar Perfil</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('user-change-password') ? 'active' : '' }}">
                                <a href="{{ route('user-change-password') }}">
                                    <span class="pcoded-micon"><i class="ti-settings"></i><b>D</b></span>
                                    <span class="pcoded-mtext">Cambiar Contraseña</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{!! route('logout') !!}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <span class="pcoded-micon"><i class="ti-share-alt"></i><b>D</b></span>
                                    <span class="pcoded-mtext">Cerrar Sesión</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>

                    </div>
                </nav>

                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-header card">
                                    <div class="card-block">
                                        <h5 class="m-b-10">Panel de Usuario</h5>
                                        <ul class="breadcrumb-title p-t-10" style="float: right;margin-top: -40px;">
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('user-dashboard') }}"> <i class="fa fa-home"></i> Dashboard </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#">{{ $page_title }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-warning icons-alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>
                                            <p>{!!  $error !!}</p>
                                        </div>
                                    @endforeach
                                @endif

                                @yield('content')


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/modernizr.js') }}"></script>
<script src="{{ asset('assets/admin/js/css-scrollbars.js') }}"></script>
<script src="{{ asset('assets/admin/js/pcoded.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/vertical-layout.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/script.js') }}"></script>
<script src="{{ asset('assets/admin/js/toastr.js') }}"></script>
<script>
            @if(Session::has('message'))
    var type = "{{ Session::get('type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

@yield('scripts')

</body>

</html>
