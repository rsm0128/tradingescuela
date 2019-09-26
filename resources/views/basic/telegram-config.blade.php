@extends('layouts.dashboard')
@section('style')


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

                                    <div class="table-scrollable bg-info">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th> #Paso </th>
                                                <th> DESCRIPCION </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td><b>#Paso 1</b> </td>
                                                <td><b> Instala Telegram para Android, IOS or Desktop App.</b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Paso 2</b> </td>
                                                <td><b> Abre la aplicación y busca <code class="white">BotFather</code></b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Paso 3</b> </td>
                                                <td><b> Inicia una nuevaa conversación con <code class="white">/newbot</code></b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Paso 4</b> </td>
                                                <td><b> Elige un nombre para un bot y envía.</b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Paso 5 5</b> </td>
                                                <td><b> Ahora elige un nombre de usuario para tu bot. Debe terminar con -'bot'. Por ejemplo: TetrisBot o tetris_bot.</b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Paso 6</b> </td>
                                                <td><b> Encuentra la URL de tu bot y tu API key. Cópiala y pégala.</b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Paso 7</b> </td>
                                                <td><b> Manda <code class="white">/setdescription</code> y elige el bot deseado para después escribir su descripción.</b></td>
                                            </tr>
                                            <tr>
                                                <td> <b>#Paso 8</b> </td>
                                                <td><b> Manda <code class="white">/setprivacy</code> y elige el bot deseado para ddespués ajustar la configuración de privacidad del bot.</b></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE FORM PORTLET-->
                                    <div class="card">
                                        <div class="card-content collpase show">
                                            <div class="card-body">

                                                <form class="form-horizontal" action="{{ route('update-template-config') }}" method="post" role="form">
                                                    {!! csrf_field() !!}
                                                    <div class="form-body">

                                                        <div class="form-group">
                                                            <label class="col-md-12"><strong>Telegram Bot URL</strong><br></label>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" value="{{$basic->telegram_url}}" name="telegram_url" placeholder="Bot URL">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-12"><strong>Telegram Bot Token</strong><br></label>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" value="{{$basic->telegram_token}}" name="telegram_token" placeholder="Bot Token">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> ACTUALIZAR</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
