<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <title>{{ $site_title }} | {{ $page_title }}</title>
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    
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
                                <img src="{{ asset('assets/images') }}/{{ Auth::guard('subscriber')->user()->image }}" class="img-radius" alt="{{ Auth::guard('subscriber')->user()->name }}">
                                <span>{{ Auth::guard('subscriber')->user()->name }}</span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">

                                <li>
                                    <a href="{{ route('subscriber-edit-profile') }}">
                                        <i class="ti-user"></i> Perfil
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('subscriber-change-password') }}">
                                        <i class="ti-pencil-alt"></i> Cambiar Contraseña
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('subscriber.logout') }}">
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
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu @if(Request::is('subscriber/user-create') or Request::is('subscriber/manage-user') ) active pcoded-trigger @endif " dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-user"></i><b>MB</b></span>
                                    <span class="pcoded-mtext">Usuarios</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="{{ Request::is('subscriber/manage-user') ? 'active' : '' }}">
                                        <a href="{{ route('subscriber-manage-user') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Todos los Usuarios</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('subscriber/expired-memberships') ? 'active' : '' }}">
                                        <a href="{{ route('subscriber-expired-memberships') }}">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Membresias Vencidas</span>
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
