@extends('layouts.dashboard')
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

                            <div class="col-md-12">

                                <div class="table-scrollable bg-info">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> #Paso </th>
                                            <th> DESCRIPCIÓN </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td><b>#Paso 1</b> </td>
                                            <td><b> Ingresa a tu cPanel.</b></td>
                                        </tr>
                                        <tr>
                                            <td> <b>#Paso 2</b> </td>
                                            <td><b> Ve a "Advance" > Dirígete a "Jobs Panel".</b></td>
                                        </tr>
                                        <tr>
                                            <td> <b>#Paso 3</b> </td>
                                            <td><b> Ajusta el tiempo. 5 minutos es mejor para esto.</b></td>
                                        </tr>
                                        <tr>
                                            <td> <b>#Paso 4</b> </td>
                                            <td><b> Copia la URL de "Cron Job" y pégala en "Command Input Filed".</b></td>
                                        </tr>
                                        <tr>
                                            <td> <b>#Paso 5</b> </td>
                                            <td><b> Presiona el botón "Add New Cron Job".</b></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label><strong>Asignar Cron Job URL :</strong></label>
                                <div class="input-group mb15">
                                    <input type="text" class="form-control input-lg" id="ref" readonly value="wget {{ route('cron-fire') }}"/>
                                    <span class="input-group-btn">
                                        <button data-copytarget="#ref" class="btn btn-success btn-lg">COPIAR AL PORTAPAPELES</button>
                                    </span>
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
                        setTimeout(function() { t.classList.remove('copiado'); }, 1500);
                    }
                    catch (err) {
                        alert('por favor presione Ctrl/Cmd+C para copiar');
                    }
                }
            }

        })();
    </script>


@endsection