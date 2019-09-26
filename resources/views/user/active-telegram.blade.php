@extends('layouts.user')
@section('style')
    <style>

        ::-moz-focus-inner {
            padding: 0;
            border: 0;
        }

        button {
            position: relative;
            /*  background-color: #aaa;
              border-radius: 0 3px 3px 0;
              cursor: pointer;*/
        }
        .copied::after {
            position: absolute;
            top: 12%;
            right: 110%;
            display: block;
            content: "COPIED";
            font-size: 1.40em;
            padding: 2px 10px;
            color: #fff;
            background-color: #22a;
            border-radius: 3px;
            opacity: 0;
            will-change: opacity, transform;
            animation: showcopied 1.5s ease;
        }
        @keyframes showcopied {
            0% {
                opacity: 0;
                transform: translateX(100%);
            }
            70% {
                opacity: 1;
                transform: translateX(0);
            }
            100% {
                opacity: 0;
            }
        }

    </style>
@endsection
@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $page_title }}</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="fa fa-chevron-left"></i></li>
                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                <li><i class="fa fa-minus minimize-card"></i></li>
                                <li><i class="fa fa-times close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">

                            <div class="row">

                                <div class="col-md-12">

                                    <!--
                                    <div class="table-scrollable bg-info">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th> #PASO </th>
                                                <th> DESCRIPCIÓN </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td><b>#Paso 1</b> </td>
                                                <td><b> Instalar Telegram para Android, IOS o Aplicación de Escritorio.</b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Paso 2</b> </td>
                                                <td><b> Copia tu Token de activación de Telegram.</b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Paso 3</b> </td>
                                                <td><b> Dirígete a esta URL : <a href="{{$basic->telegram_url}}" class="white" target="_blank">{{$basic->telegram_url}}.</a></b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Paso 4</b> </td>
                                                <td><b> Presiona el botón de Inicio.</b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Paso 5</b> </td>
                                                <td><b> Copia y pega éste Tokenen el MessageBox y envíalo.</b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Paso 6</b> </td>
                                                <td><b> Después de mandar el mensaje, regresa a ésta página y presiona el botón de activar Telegram.</b></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div> -->
                                </div>

                                <div class="col-md-12">
                                    <label><strong>Grupo privado de Telegram.</strong></label>
                                    <div class="input-group mb15">
                                        <input type="text" class="form-control input-lg" id="ref" value="https://t.me/joinchat/HIxsXlkpAll3GNxj96S2ZQ" readonly/>
                                        <span class="input-group-btn">
                                            <a href="https://t.me/joinchat/HIxsXlkpAll3GNxj96S2ZQ" target="_blank" class="btn btn-success btn-lg">UNIRSE AL GRUPO</a>
                                        </span>
                                    </div>
                                    <br>
                                </div>
                                
                                 <div class="col-md-12">
                                    <label><strong>Grupo de difusión de señales.</strong></label>
                                    <div class="input-group mb15">
                                        <input type="text" class="form-control input-lg" id="ref2" value="https://t.me/joinchat/AAAAAE2X7REbWuhKhXK6AQ" readonly/>
                                        <span class="input-group-btn">
                                            <a href="https://t.me/joinchat/AAAAAE2X7REbWuhKhXK6AQ" target="_blank" class="btn btn-success btn-lg">UNIRSE AL GRUPO</a>
                                        </span>
                                    </div>
                                    <br>
                                </div>
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>

        (function() {

            'use strict';
            document.body.addEventListener('click', copy, true);
            // event handler
            function copy(e) {
                var
                    t = e.target,
                    c = t.dataset.copytarget,
                    inp = (c ? document.querySelector(c) : null);
                if (inp && inp.select) {
                    inp.select();
                    try {
                        document.execCommand('copy');
                        inp.blur();
                        t.classList.add('copied');
                        setTimeout(function() { t.classList.remove('copied'); }, 1500);
                    }
                    catch (err) {
                        alert('please press Ctrl/Cmd+C to copy');
                    }
                }
            }

        })();
    </script>
@endsection