@extends('layouts.entry')

@section('content')

    <div class="expert-section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="area-heading welcome-heading">
                        <h2 class="area-title">Cómo conseguir la independencia financiera</h2>
                    </div>
                </div>
            </div>
            
            <!--errors-->
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {!!  $error !!}
                    </div>
                @endforeach
            @endif
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {!!  session()->get('message') !!}
                    </div>
                @endif
            
            <div id="video" class="row text-center">
                <div class="col-md-12 text-center" style="margin-bottom:3.5em">
                    <iframe class="third-vid embed-responsive-item" allowfullscreen="" mozallowfullscreen="" msallowfullscreen="" oallowfullscreen="" scrolling="no" webkitallowfullscreen="" width="620" height="349" frameborder="0" id="video-iframe" src="https://www.youtube.com/embed/y3MNfVa7iqw" style="margin-bottom:2em"></iframe>
                </div>
                <div class="congras-panal">
                	<div class="row">
                		<div class="col-sm-6">
                			<p align="justify">
                				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
                				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit<br>
                				in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br>
                				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                			</p>
                		</div>
                		<div class="col-sm-6">
                			<img class="img-responsive" src="{{ asset('assets/images/landing/200-shareing.jpg')}}" width="100%"/>
                		</div>
                	</div>
                </div>
                
                <!--<div class="col-md-12">
                    <img id="imagen-derecha" style="margin-top:2em;" src="{{ asset('assets/images/welcome/imagen-derecha.jpg') }}">
                </div>-->
                
                 <div class="row">
                     
                <div class="expert-section testimonial-section gray-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="area-heading text-center">
                                    <h2 class="area-title">Comentarios de usuarios satisfechos</h2>
                                    <p>Mira lo que nuestros clientes opinan</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="testimonial-wrapper navigation-one text-center" data-interval="5000">
                                    <blockquote style="height:330px">
                                        <p>Primeramente con $500 y después metí $500 más, entonces al final fueron $1000.<br>Y ya llevo $2866</p>
                                        <p class="client-name">Edgard<span class="designation"></span></p>
                                    </blockquote>
                                    <blockquote style="height:330px">
                                        <p>Llevo con vosotros poco más de una semana y ya llevo un 20% de ganancias, eso sin contar mis operaciones locas y que no se están mandando todas las órdenes por sms. Seamos pacientes que por poco que entendamos y hagamos medio bien las cosas nuestro capital se seguirá multiplicando como nunca lo hemos visto antes.</p>
                                        <p class="client-name">Fernando<span class="designation"></span></p>
                                    </blockquote>
                                    <blockquote style="height:330px">
                                        <p>Yo empecé con 100€ y llevo 140€</p>
                                        <p class="client-name">Alberto<span class="designation"></span></p>
                                    </blockquote>
                                    <blockquote style="height:330px">
                                        <p>Esta semana saqué 80 USD de gannacia pero en el global llevo 27 de beneficio, vamos poco a poco sumando.</p>
                                        <p class="client-name">Gustavo<span class="designation"></span></p>
                                    </blockquote>
                                    <blockquote style="height:330px">
                                        <p>Pues yo con las señales estoy contento jejeje no las he seguido al pie de la letra, pero ya me han generado 800 usd en apenas 2 semanas lo cual me hace muy bien ya que inicié con 150 USD.<br>¡Así que felicidades y seguir generando!</p>
                                        <p class="client-name">Edi<span class="designation"></span></p>
                                    </blockquote>
                                    <blockquote style="height:330px">
                                        <p>Esoooo<br>Me gusta ver azul<br>En 1 semanita ya llevo un 10% ganado.</p>
                                        <p class="client-name">Nahuel<span class="designation"></span></p>
                                    </blockquote>
                                    <blockquote style="height:330px">
                                        <p>Llevo una semana y estoy muy contento.<br>Mis ganancias fueron 223 dólares y cometí algunos errores de principiante.</p>
                                        <p class="client-name">Juan<span class="designation"></span></p>
                                    </blockquote>
            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!--<div class="IntroducingPnal">
                  <div class="container-mid">
                    <span style="text-align: center; color:white;font-size:2.6em;font-weight: bold;">
                      Pips
                    </span>
                  </div>
                </div>-->
                
                <div class="col-md-12" id="topbanne1" style="background:black; margin-top:3em">
                    <span>Pips</span>
                </div>
                
                <div class="col-md-12" id="signals-table">
                    <table>
                        <tr>
                            <th>Pips</th>
                            <th>Fecha</th> 
                         </tr>
                         <tr>
                            <td>+1300</td>
                            <td>Octubre (Puntos porcentuales a favor)</td>
                        </tr>
                         <tr>
                            <td>+1392</td>
                            <td>Noviembre (Puntos porcentuales a favor)</td>
                        </tr>
                         <tr>
                            <td>+2048</td>
                            <td>Diciembre hasta el momento (Puntos porcentuales a favor)</td>
                        </tr>
                         <tr>
                            <td>+1226</td>
                            <td>Enero hasta el momento (Puntos porcentuales a favor) </td>
                        </tr>
                    </table>
                </div>
                
                <buttton id="next-card" type="button" class="btn btn-success">Siguiente paso</buttton>
            </div>
                
            <!--card-->
            <div id="card-promotion" class="row">
                <div class="col-md-12 text-center">
                    <div class="expert-section gray-bg">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="area-heading text-center">
                                        <h2 class="area-title">PAQUETE ESPECIAL</h2>
                                        <p>Estas a un paso de unirte a un grupo selecto de inversión.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-md-offset-4">
                                        <div class="single-price-table table-active wow fadeIn" data-wow-delay="0.6s">
                                            <div class="pricing-head">
                                                <h4 class="pricing-title">Promoción Bienvenida</h4>
                                            </div>
                                            <div class="pricing-content">
                                                <div class="pricing-value-wrapper">
                                                    
                                                        <h2 class="pricing-value">
                                                            <sup>USD</sup>
                                                            99
                                                                <sub>/ 90 días</sub>
                                                        </h2>
                                                </div>
                                                <ul class="table-content">
                                                    <li>Alertas Telegram - SI</li>
                                                    <li>Acceso a Seminarios  - SI</li>
                                                    <li>Curso Básico de Forex  - SI</li>
                                                    <li>Consultoría en grupo de Telegram - SI</li>
                                                    <li>Soporte - Por Correo</li>
                                                </ul>
                                            </div>
                                            <div class="pricibg-footer">
                                                <buttton id="show-form" type="button" class="btn btn-success">Estoy listo, quiero la promoción</buttton>
                                            </div>
                                        </div>
                                    </div>
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- formulario -->
            <div id="form" class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-12">
                    <form class="m-t-20" action="{{ route('register') }}" autocomplete="off" method="post" data-aos="fade-up" data-aos-duration="1200">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-lg-12">
                                @if (session()->has('message'))
                                    <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            {!!  $error !!}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" name="name" type="text" placeholder="Nombre completo" autocomplete="false" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" name="email" type="email" placeholder="Dirección de correo electrónico" required>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <select name="country_code" id="country_code" class="form-control input-lg" required>
                                        <option value="">Código del país</option>
                                        @foreach($country as $cn)
                                            <option value="{{$cn['dial_code']}}">{{ $cn['name'] }} ({{$cn['dial_code']}})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <input class="form-control" name="phone" type="text" placeholder="Número telefónico" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select name="plan_id" id="plan_id" class="form-control input-lg" required data-error="Select One Subscription Plan" style="line-height: 30px!important;">
                                            <option value="9">Promoción Bienvenida</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" name="password" type="password" placeholder="Contraseña" autocomplete="rrr" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" name="password_confirmation" type="password" placeholder="Confirmar contraseña" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                        <input type="checkbox" class="custom-control-input" required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Acepto <a href="{{ route('terms-condition') }}" target="_blank" class="link">términos y condiciones</a> y <a href="{{ route('privacy-policy') }}" target="_blank" class="link">políticas de privacidad</a></span>
                                    </label>
                                </div>
                            </div>
                            @if($basic->captcha_status == 1)
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Captcha::display() !!}
                                    </div>
                                </div>
                            @endif
                            <input type="hidden" id="welcome" name="welcome" value="1">
                            <div class="col-lg-12" style="margin-top: 20px;">
                                <button type="submit" class="btn btn-lg btn-block btn-primary btn-arrow"><span> Pagar <i class="ti-arrow-right"></i></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="row">
                <div id="counter" class="col-md-12">
                    <span class="first-span" style="font-size: 1.5em;">¡Quedan tan solo:</span>
                    <span id="countdown" name="countdown" style="font-size: 1.5em;"></span>
                    <span class="last-span" style="font-size: 1.5em;">no dejes pasar esta increible oportunidad!</span>
                </div>
            </div>
            
        </div>
    </div>
@endsection
