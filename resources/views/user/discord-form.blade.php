<!DOCTYPE html>
<html lang="en">

<head>
    <title>  ESCUELA </title>
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
<body style="background: #f3f3f3">

<div class="theme-loader">
    <div class="loader-track">
        <div class="loader-bar"></div>
    </div>
</div>

    <div class="page-body">
        <div class="row justify-content-md-center" style="margin-top: 60px">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Rellena los siguientes datos para acceder a tu panel de Usuario</h5>
                    </div>
                    <div class="card-block">
                        {!! Form::open(['route'=>'discord-form','role'=>'form','class'=>'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-10 offset-1">
                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Ingresa tu Discord Username</strong></label>
                                        <div class="col-md-12">
                                            <input name="username" type="text" class="form-control input-lg" placeholder="Username" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 offset-1">
                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Ingresa tu id de discord #</strong></label>
                                        <div class="col-md-12">
                                            <input name="discord_id" id="discord_id" type="number" class="form-control input-lg" placeholder="Discord ID" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 offset-1" style="margin: 38px; text-align: center">
                                    <h5>No tienes cuenta en Discord, crea una <a target="_blank" href="https://discordapp.com/invite/QeCHx74?email=contactocancun%40gmail.com&mode=register">aquí</a></h5>
                                </div>
                                <div class="col-md-10 offset-1">
                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">confirma tu nivel de conocimientos</strong></label>
                                        <div class="col-md-12">
                                            <select name="level" id="level" class="form-control input-lg" data-error="Select One Level" style="line-height: 30px!important;" required>
                                                <!--<option value="">Nivel de Conocimientos</option>-->
                                                <option value="Principiante" class="font-weight-bold" @if($level == 'Principiante') selected @endif>Principiante</option>
                                                <option value="Intermedio" class="font-weight-bold" @if($level == 'Intermedio') selected @endif>Intermedio</option>
                                                <option value="Avanzado" class="font-weight-bold" @if($level == 'Avanzado') selected @endif>Avanzado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 offset-1">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> Guardar y Entrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- row -->
                        </div>
                        {!! Form::close() !!}
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
    function setInputFilter(textbox, inputFilter) {
      ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        textbox.addEventListener(event, function() {
          if (inputFilter(this.value)) {
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
          } else if (this.hasOwnProperty("oldValue")) {
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
          }
        });
      });
    }
    
    setInputFilter(document.getElementById("discord_id"), function(value) {
      return /^\d*\.?\d*$/.test(value);
    });
</script>
</body>

</html>
