@extends('layouts.dashboard')
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

                        {!! Form::model($email,['route'=>['email-update',$email->id],'method'=>'PUT','class'=>'form form-horizontal']) !!}

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Driver de correo electrónico </strong></label>
                                        <div class="col-md-12">
                                            <select name="driver" id="driver" class="form-control">
                                                @if($email->driver == 'mail')
                                                    <option value="mail" selected>PHP Mailer</option>
                                                    <option value="smtp">SMTP Mailer</option>
                                                @else
                                                    <option value="mail">PHP Mailer</option>
                                                    <option value="smtp" selected>SMTP Mailer</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Correo electrónico del remitente </strong></label>
                                        <div class="col-md-12">
                                            <input name="email" value="{{ $email->email }}" class="form-control input-lg" placeholder="Correo electrónico del remitente" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Nombre del remitente </strong></label>
                                        <div class="col-md-12">
                                            <input name="name" value="{{ $email->name }}" class="form-control input-lg" placeholder="Nombre del remitente" required/>
                                        </div>
                                    </div>
                                    <div id="smtp" style="display: {{ $email->driver == 'smtp' ? 'block' : 'none' }}">
                                        <hr>

                                        <label><strong style="text-transform: uppercase;">SMTP Status : </strong>
                                            @if($email->smtp_status == 0)
                                                <strong style="text-transform: uppercase;" class="red"> (<i class="fa fa-times"></i>no verificado)</strong>
                                            @else
                                                <strong style="text-transform: uppercase;" class="su"> (<i class="fa fa-check"></i>verificado)</strong>
                                            @endif
                                        </label>
                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">SMTP Host </strong></label>
                                            <div class="col-md-12">
                                                <input name="host" value="{{ $email->host }}" class="form-control input-lg" placeholder="SMTP Host"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">SMTP Host Port </strong></label>
                                            <div class="col-md-12">
                                                <input name="port" value="{{ $email->port }}" class="form-control input-lg" placeholder="SMTP Host Port"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">SMTP Username </strong></label>
                                            <div class="col-md-12">
                                                <input name="username" value="{{ $email->username }}" class="form-control input-lg" placeholder="SMTP Username"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Contraseña SMTP  </strong></label>
                                            <div class="col-md-12">
                                                <input name="pass" value="{{ $email->password }}" class="form-control input-lg" placeholder="Contraseña SMTP" type="text"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Encripción SMTP </strong></label>
                                            <div class="col-md-12">
                                                <input name="encryption" value="{{ $email->encryption }}" class="form-control input-lg" placeholder="Encripción SMTP"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block bold btn-lg text-uppercase"><i class="fa fa-send"></i> Actualizar configuración</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $("#driver").on('change',function(e){
            e.preventDefault();
            if($(this).val()== 'smtp'){
                $('#smtp').show();
            }else{
                $('#smtp').hide();
            }
        });
    </script>
@endsection