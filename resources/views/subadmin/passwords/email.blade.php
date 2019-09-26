<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $site_title }} | Reset Password</title>


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
</head>
<body class="fix-menu">

<div class="theme-loader">
    <div class="loader-track">
        <div class="loader-bar"></div>
    </div>
</div>

<section class="login p-fixed d-flex text-center bg-primary common-img-bg">

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="login-card card-block auth-body mr-auto ml-auto">
                    <form class="md-float-material" action="{{ route('admin.password.email') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="text-center">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo.png">
                        </div>
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Reset Log In Password</h3>
                                </div>
                            </div>
                            <hr />
                            @if (session('status'))
                                <div class="alert alert-success background-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session()->has('message'))
                                <div class="alert alert-primary alert-dismissable background-primary">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            @if($errors->any())
                                @foreach ($errors->all() as $error)

                                    <div class="alert alert-danger alert-dismissable background-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {!!  $error !!}
                                    </div>
                                @endforeach
                            @endif
                            <div class="input-group m-t-25">
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                <span class="md-line"></span>
                            </div>
                            <hr>
                            <div class="row m-t-25">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Send Reset Request..!</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/modernizr.js') }}"></script>
<script src="{{ asset('assets/admin/js/common-pages.js') }}"></script>
</body>

</html>

