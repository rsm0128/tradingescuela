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
                        <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="{{ $site_title }}" style="max-width: 60px;" />
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
                                <img src="{{ asset('assets/images') }}/{{ Auth::guard('admin')->user()->image }}" class="img-radius" alt="{{ Auth::guard('admin')->user()->name }}">
                                <span>{{ Auth::guard('admin')->user()->name }}</span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">

                                <li>
                                    <a href="{{ route('edit-profile') }}">
                                        <i class="ti-user"></i> Perfil
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-change-password') }}">
                                        <i class="ti-pencil-alt"></i> Cambiar Contraseña
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.logout') }}">
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
                            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                                <a href="{{ route('admin-dashboard') }}">
                                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                    <span class="pcoded-mtext">Panel</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu @if(Request::is('admin/signal-create') or Request::is('admin/signal-all') ) active pcoded-trigger @endif " dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-stats-up"></i><b>MB</b></span>
                                    <span class="pcoded-mtext">Administrar Señales</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('admin/signal-create') ? 'active' : '' }}">
                                        <a href="{{ route('signal-create') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Nueva Señal</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/signal-all') ? 'active' : '' }}">
                                        <a href="{{ route('signal-all') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Todas las señales</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="pcoded-hasmenu @if(Request::is('admin/plan-create') or Request::is('admin/plan-all') ) active pcoded-trigger @endif " dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-layout-column3"></i><b>MB</b></span>
                                    <span class="pcoded-mtext">Administrar Plan</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('admin/plan-create') ? 'active' : '' }}">
                                        <a href="{{ route('plan-create') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Nuevo Plan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/plan-all') ? 'active' : '' }}">
                                        <a href="{{ route('plan-all') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Todos los Planes</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="pcoded-hasmenu @if(Request::is('admin/post-create') or Request::is('admin/post-all') ) active pcoded-trigger @endif " dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="fa fa-newspaper-o"></i><b>MB</b></span>
                                    <span class="pcoded-mtext">Administrar Blog</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('admin/post-create') ? 'active' : '' }}">
                                        <a href="{{ route('post-create') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Nuevo Blog</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/post-all') ? 'active' : '' }}">
                                        <a href="{{ route('post-all') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Todos los Blogs</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{ Request::is('admin/manage-category') ? 'active' : '' }}">
                                <a href="{{ route('manage-category') }}">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2"></i><b>D</b></span>
                                    <span class="pcoded-mtext">Categoría de Blog</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/manage-materials') ? 'active' : '' }}">
                                <a href="{{ route('manage-materials') }}">
                                    <span class="pcoded-micon"><i class="ti-bookmark-alt"></i><b>D</b></span>
                                    <span class="pcoded-mtext">Administrar Materiales</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/speciality-control') ? 'active' : '' }}">
                                <a href="{{ route('speciality-control') }}">
                                    <span class="pcoded-micon"><i class="ti-package"></i><b>D</b></span>
                                    <span class="pcoded-mtext">Administrar Especialidad</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/payment-method') ? 'active' : '' }}">
                                <a href="{{ route('payment-method') }}">
                                    <span class="pcoded-micon"><i class="ti-credit-card"></i><b>D</b></span>
                                    <span class="pcoded-mtext">Gateway de Pago</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/manage-subscriber') ? 'active' : '' }}">
                                <a href="{!! route('manage-subscriber') !!}">
                                    <span class="pcoded-micon"><i class="ti-face-smile"></i><b>MS</b></span>
                                    <span class="pcoded-mtext">Administrar Suscripciones</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

                            <li class="pcoded-hasmenu @if(Request::is('admin/user-create') or Request::is('admin/manage-user') ) active pcoded-trigger @endif " dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-user"></i><b>MB</b></span>
                                    <span class="pcoded-mtext">Administrar Usuarios</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('admin/user-create') ? 'active' : '' }}">
                                        <a href="{{ route('user-create') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Añadir Usuario</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/manage-user') ? 'active' : '' }}">
                                        <a href="{{ route('manage-user') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Todos los Usuarios</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/expired-memberships') ? 'active' : '' }}">
                                        <a href="{{ route('expired-memberships') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Membresias Vencidas</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/generate-report') ? 'active' : '' }}">
                                        <a href="{{ route('generate-report') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Generar reportes</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{ Request::is('admin/reg-codes') ? 'active' : '' }}">
                                <a href="{{ route('reg-codes') }}">
                                    <span class="pcoded-micon"><i class="ti-credit-card"></i><b>D</b></span>
                                    <span class="pcoded-mtext"> Código</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                        <div class="pcoded-navigation-label">Control Básico</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="{{ Request::is('admin/basic-setting') ? 'active' : '' }} ">
                                <a href="{!! route('basic-setting') !!}">
                                    <span class="pcoded-micon"><i class="ti-settings"></i><b>BS</b></span>
                                    <span class="pcoded-mtext">Ajuste Básico</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/google-recaptcha') ? 'active' : '' }}">
                                <a href="{!! route('google-recaptcha') !!}">
                                    <span class="pcoded-micon"><i class="ti-control-shuffle"></i><b>GR</b></span>
                                    <span class="pcoded-mtext">Google Recaptcha</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/email-setting') ? 'active' : '' }}">
                                <a href="{!! route('email-setting') !!}">
                                    <span class="pcoded-micon"><i class="ti-settings"></i><b>ES</b></span>
                                    <span class="pcoded-mtext">Ajuste de Correo Electrónico</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/email-template') ? 'active' : '' }}">
                                <a href="{!! route('email-template') !!}">
                                    <span class="pcoded-micon"><i class="ti-email"></i><b>ET</b></span>
                                    <span class="pcoded-mtext">Plantilla de Email</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/sms-setting') ? 'active' : '' }}">
                                <a href="{!! route('sms-setting') !!}">
                                    <span class="pcoded-micon"><i class="ti-link"></i><b>SA</b></span>
                                    <span class="pcoded-mtext">SMS API</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <!--
                            <li class="{{ Request::is('admin/telegram-sms') ? 'active' : '' }}">
                                <a href="{!! route('telegram-sms') !!}">
                                    <span class="pcoded-micon"><i class="ti-loop"></i><b>PS</b></span>
                                    <span class="pcoded-mtext">SMS Teléfono</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            -->
                            <li class="{{ Request::is('admin/telegram-config') ? 'active' : '' }}">
                                <a href="{!! route('telegram-config') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-send-o"></i><b>TB</b></span>
                                    <span class="pcoded-mtext">Bot de Telegram</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/currency-widget') ? 'active' : '' }}">
                                <a href="{!! route('currency-widget') !!}">
                                    <span class="pcoded-micon"><i class="ti-desktop"></i><b>CW</b></span>
                                    <span class="pcoded-mtext">Widget de Denominaciones</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/google-analytic') ? 'active' : '' }}">
                                <a href="{!! route('google-analytic') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-google"></i><b>GA</b></span>
                                    <span class="pcoded-mtext">Google Analytics</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/live-chat') ? 'active' : '' }}">
                                <a href="{!! route('live-chat') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-comments-o"></i><b>LC</b></span>
                                    <span class="pcoded-mtext">Chat en vivo</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/cron-job') ? 'active' : '' }}">
                                <a href="{!! route('cron-job') !!}">
                                    <span class="pcoded-micon"><i class="ti-link"></i><b>CB</b></span>
                                    <span class="pcoded-mtext">Configuración Cron</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/database-backup') ? 'active' : '' }}">
                                <a href="{!! route('database-backup') !!}">
                                    <span class="pcoded-micon"><i class="ti-layout-list-thumb"></i><b>CB</b></span>
                                    <span class="pcoded-mtext">Respaldo de Base de Datos</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/manage-welcome') ? 'active' : '' }}">
                                <a href="{!! route('manage-welcome') !!}">
                                    <span class="pcoded-micon"><i class="ti-face-smile"></i><b>CB</b></span>
                                    <span class="pcoded-mtext">Página de bienvenida</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/manage-welcome-message') ? 'active' : '' }}">
                                <a href="{!! route('manage-welcome-message') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-send-o"></i><b>CB</b></span>
                                    <span class="pcoded-mtext">Correo de bienvenida</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu @if(Request::is('admin/telegram-commands') or Request::is('admin/telegram-command-create') or Request::is('admin/telegram-spams')) active pcoded-trigger @endif " dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="fa fa-telegram"></i><b>MB</b></span>
                                    <span class="pcoded-mtext">Bot Management</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('admin/telegram-command-create') ? 'active' : '' }}">
                                        <a href="{{ route('admin-telegram-command-create') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Create</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/telegram-commands') ? 'active' : '' }}">
                                        <a href="{{ route('admin-telegram-commands') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Commands</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/telegram-spams') ? 'active' : '' }}">
                                        <a href="{{ route('admin-telegram-spams') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Spam words</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="pcoded-navigation-label">Ajustes Web</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="{{ Request::is('admin/manage-logo') ? 'active' : '' }}">
                                <a href="{!! route('manage-logo') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-picture-o"></i><b>ML</b></span>
                                    <span class="pcoded-mtext">Administrar Logo</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/manage-footer') ? 'active' : '' }}">
                                <a href="{!! route('manage-footer') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-sitemap"></i><b>MF</b></span>
                                    <span class="pcoded-mtext">Administrar Footer</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/manage-social') ? 'active' : '' }}">
                                <a href="{!! route('manage-social') !!}">
                                    <span class="pcoded-micon"><i class="ti-share"></i><b>MS</b></span>
                                    <span class="pcoded-mtext">Administrar Social</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/manage-breadcrumb') ? 'active' : '' }}">
                                <a href="{!! route('manage-breadcrumb') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-file-image-o"></i><b>MB</b></span>
                                    <span class="pcoded-mtext">Administrar Breadcrumb</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/manage-slider') ? 'active' : '' }}">
                                <a href="{!! route('manage-slider') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-sliders"></i><b>MS</b></span>
                                    <span class="pcoded-mtext">Administrar Slider</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/menu-control') ? 'active' : '' }}">
                                <a href="{!! route('menu-control') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-rss"></i><b>MM</b></span>
                                    <span class="pcoded-mtext">Administrar Menu</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

                            <li class="pcoded-hasmenu @if(Request::is('admin/member-create') or Request::is('admin/member-all') ) active pcoded-trigger @endif " dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="fa fa-users"></i><b>IM</b></span>
                                    <span class="pcoded-mtext">Miembros de Equipo</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('admin/member-create') ? 'active' : '' }}">
                                        <a href="{{ route('member-create') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Nuevo Miembro</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/member-all') ? 'active' : '' }}">
                                        <a href="{{ route('member-all') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Todos los Miembros</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="pcoded-hasmenu @if(Request::is('admin/testimonial-create') or Request::is('admin/testimonial-all') ) active pcoded-trigger @endif " dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="fa fa-desktop"></i><b>I</b></span>
                                    <span class="pcoded-mtext">Administrar Testimonios</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('admin/testimonial-create') ? 'active' : '' }}">
                                        <a href="{{ route('testimonial-create') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Nuevo Testimonio</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/testimonial-all') ? 'active' : '' }}">
                                        <a href="{{ route('testimonial-all') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Todos los Testimonios</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="{{ Request::is('admin/manage-terms') ? 'active' : '' }}">
                                <a href="{!! route('manage-terms') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-quote-left"></i><b>TC</b></span>
                                    <span class="pcoded-mtext">Términos & Condiciones</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/manage-warning') ? 'active' : '' }}">
                                <a href="{!! route('manage-warning') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-quote-left"></i><b>LW</b></span>
                                    <span class="pcoded-mtext">Legal Warning</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin/manage-cookies') ? 'active' : '' }}">
                                <a href="{!! route('manage-cookies') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-quote-left"></i><b>CK</b></span>
                                    <span class="pcoded-mtext">Cookies</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu @if(Request::is('admin/manage-faq-create') or Request::is('admin/manage-faq')) active pcoded-trigger @endif " dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="fa fa-question-circle"></i><b>MB</b></span>
                                    <span class="pcoded-mtext">FAQ Management</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('admin/manage-faq') ? 'active' : '' }}">
                                        <a href="{{ route('manage-faq') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">FAQs</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/manage-faq-create-show') ? 'active' : '' }}">
                                        <a href="{{ route('manage-faq-create-show') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Create</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{ Request::is('admin/manage-privacy') ? 'active' : '' }}">
                                <a href="{!! route('manage-privacy') !!}">
                                    <span class="pcoded-micon"><i class="fa fa-cogs"></i><b>PP</b></span>
                                    <span class="pcoded-mtext">Políticas de Privacidad</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                        <div class="pcoded-navigation-label">Administrar Sección</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu
                            @if(Request::is('admin/speciality-section') or Request::is('admin/subscriber-section') or Request::is('admin/provider-section') or Request::is('admin/trading-section') or Request::is('admin/currency-section') or Request::is('admin/team-section') or Request::is('admin/blog-section') or Request::is('admin/testimonial-section') or Request::is('admin/plan-section') or Request::is('admin/counter-section') or Request::is('admin/about-section') or Request::is('admin/plan-section') ) active pcoded-trigger @endif" dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-desktop"></i><b>I</b></span>
                                    <span class="pcoded-mtext">Administrar Sección</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('admin/speciality-section') ? 'active' : '' }}">
                                        <a href="{{ route('speciality-section') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Sección de Especialidad</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/currency-section') ? 'active' : '' }}">
                                        <a href="{{ route('currency-section') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Sección de Divisas</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/trading-section') ? 'active' : '' }}">
                                        <a href="{{ route('trading-section') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Sección de Cambio en Tiempo Real</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/plan-section') ? 'active' : '' }}">
                                        <a href="{{ route('plan-section') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Sección de Plan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/about-section') ? 'active' : '' }}">
                                        <a href="{{ route('about-section') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Sección Acerca de Nosotros</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/advertise-section') ? 'active' : '' }}">
                                        <a href="{{ route('advertise-section') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Sección de Publicidad</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/counter-section') ? 'active' : '' }}">
                                        <a href="{{ route('counter-section') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Sección de Contador</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/testimonial-section') ? 'active' : '' }}">
                                        <a href="{{ route('testimonial-section') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Sección de Testimonios</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/subscriber-section') ? 'active' : '' }}">
                                        <a href="{{ route('subscriber-section') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Sección de Suscriptores</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/blog-section') ? 'active' : '' }}">
                                        <a href="{{ route('blog-section') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Sección de Blogs</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('admin/team-section') ? 'active' : '' }}">
                                        <a href="{{ route('team-section') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Sección de Equipos</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>

                                </ul>
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
                                                <a href="{{ route('admin-dashboard') }}"> <i class="fa fa-home"></i> Dashboard </a>
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
