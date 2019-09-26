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
                            <a href="#" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <a href="#">
                                <img src="{{ asset('assets/images') }}/{{ Auth::guard('subadmin')->user()->image }}" class="img-radius" alt="{{ Auth::guard('subadmin')->user()->name }}">
                                <span>{{ Auth::guard('subadmin')->user()->name }}</span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">

                                <li>
                                    <a href="{{ route('sub-edit-profile') }}">
                                        <i class="ti-user"></i> Perfil
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('subadmin-change-password') }}">
                                        <i class="ti-pencil-alt"></i> Cambiar Contraseña
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('subadmin.logout') }}">
                                        <i class="ti-share"></i> Salir
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="pcoded-navigation-label">Configuración General</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="{{ Request::is('subadmin-dashboard') ? 'active' : '' }}">
                                <a href="{{ route('sub-dashboard') }}">
                                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                    <span class="pcoded-mtext">Panel</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu @if(Request::is('subadmin/signal-create') or Request::is('subadmin/signal-all') ) active pcoded-trigger @endif " dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-stats-up"></i><b>MB</b></span>
                                    <span class="pcoded-mtext">Administrar Señales</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('subadmin/signal-create') ? 'active' : '' }}">
                                        <a href="{{ route('sub-signal-create') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Nueva Señal</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('subadmin/signal-all') ? 'active' : '' }}">
                                        <a href="{{ route('sub-signal-all') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Todas las señales</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="pcoded-hasmenu @if(Request::is('subadmin/post-create') or Request::is('subadmin/post-all') ) active pcoded-trigger @endif " dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="fa fa-newspaper-o"></i><b>MB</b></span>
                                    <span class="pcoded-mtext">Administrar Blog</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('subadmin/post-create') ? 'active' : '' }}">
                                        <a href="{{ route('sub-post-create') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Nuevo Blog</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('subadmin/post-all') ? 'active' : '' }}">
                                        <a href="{{ route('sub-post-all') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Todos los Blogs</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{ Request::is('subadmin/manage-materials') ? 'active' : '' }}">
                                <a href="{{ route('sub-manage-materials') }}">
                                    <span class="pcoded-micon"><i class="ti-bookmark-alt"></i><b>D</b></span>
                                    <span class="pcoded-mtext">Administrar Materiales</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu @if(Request::is('subadmin/user-create') or Request::is('subadmin/manage-user') ) active pcoded-trigger @endif " dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-user"></i><b>MB</b></span>
                                    <span class="pcoded-mtext">Administrar Usuarios</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('subadmin/user-create') ? 'active' : '' }}">
                                        <a href="{{ route('sub-user-create') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Añadir Usuario</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('subadmin/manage-user') ? 'active' : '' }}">
                                        <a href="{{ route('sub-manage-user') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Todos los Usuarios</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('subadmin/expired-memberships') ? 'active' : '' }}">
                                        <a href="{{ route('sub-expired-memberships') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Membresias Vencidas</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('subadmin/generate-report') ? 'active' : '' }}">
                                        <a href="{{ route('sub-generate-report') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Generar reportes</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu @if(Request::is('subadmin/telegram-commands') or Request::is('subadmin/telegram-command-create') or Request::is('subadmin/telegram-spams')) active pcoded-trigger @endif " dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="fa fa-telegram"></i><b>MB</b></span>
                                    <span class="pcoded-mtext">Telegram Bot</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('subadmin/telegram-command-create') ? 'active' : '' }}">
                                        <a href="{{ route('subadmin-telegram-command-create') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Create</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('subadmin/telegram-commands') ? 'active' : '' }}">
                                        <a href="{{ route('subadmin-telegram-commands') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Commands</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('subadmin/telegram-spams') ? 'active' : '' }}">
                                        <a href="{{ route('subadmin-telegram-spams') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Spam words</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <div class="pcoded-navigation-label">Control Básico</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="{{ Request::is('subadmin/manage-welcome') ? 'active' : '' }}">
                                <a href="{!! route('sub-manage-welcome') !!}">
                                    <span class="pcoded-micon"><i class="ti-face-smile"></i><b>CB</b></span>
                                    <span class="pcoded-mtext">Página de bienvenida</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('subadmin/manage-welcome-message') ? 'active' : '' }}">
                                <a href="{!! route('sub-manage-welcome-message') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-send-o"></i><b>CB</b></span>
                                    <span class="pcoded-mtext">Correo de bienvenida</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
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
                                                <a href="{{ route('sub-dashboard') }}"> <i class="fa fa-home"></i> Dashboard </a>
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
