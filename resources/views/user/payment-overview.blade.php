@extends('layouts.user')
@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card box-shadow-0">
                                <div class="card-content collpase show">
                                    <div class="card-body text-center">
                                        @php $paymentMethod = \App\PaymentMethod::findOrFail($payment->payment_id)@endphp
                                        <h3 class="text-uppercase font-weight-bold text-center" id="horz-layout-basic">{{$paymentMethod->name}}</h3>
                                        <br>
                                        <img src="{{ asset('assets/images/payment') }}/{{$paymentMethod->image}}" style="width:100%;" alt="">
                                        <br>
                                        <br>
                                        <a href="{{ route('chose-payment-method') }}" class="btn btn-outline-info font-weight-bold text-uppercase btn-min-width mr-1 mb-1">Otro Método</a>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center" id="horz-layout-basic">Resumen de pago</h4>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body text-center">
                            <!--h3>Precio del Plan: {{ $payment->user->plan->price }} {{ $basic->currency }}</h3-->
                            <!--<h3>Precio del Plan: {{ $plan->price }} {{ $basic->currency }}</h3>-->
                            <h3>Precio Total: {{ $payment->amount }} {{ $basic->currency }}</h3>
                            <!--<h3>EN {{ $basic->currency }} : {{ $payment->usd }} {{ $basic->currency }}</h3>-->
                            <hr>

                            @if($payment->payment_id == 1)
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form action="{{ route('paypal-submit') }}" method="post" name="paypal" id="paypal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="custom" value="{{ $payment->order_number }}" />
                                        <br><br><br><br><br>
                                        <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-paypal"></i> Pagar ya</button>
                                        <br><br><br><br><br>
                                    </form>
                                </div>
                            @elseif($payment->payment_id == 2)
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form action="https://perfectmoney.is/api/step1.asp" method="POST" id="myform">
                                        <input type="hidden" name="PAYEE_ACCOUNT" value="{{ $payment->paymentMethod->val1 }}">
                                        <input type="hidden" name="PAYEE_NAME" value="{{ $basic->title }}">
                                        <input type='hidden' name='PAYMENT_ID' value='{{ $payment->order_number }}'>
                                        <input type="hidden" name="PAYMENT_AMOUNT"  value="{{ $payment->usd  }}">
                                        <input type="hidden" name="PAYMENT_UNITS" value="USD">
                                        <input type="hidden" name="STATUS_URL" value="{{ route('perfect-ipn') }}">
                                        <input type="hidden" name="PAYMENT_URL" value="{{ route('user-dashboard') }}">
                                        <input type="hidden" name="PAYMENT_URL_METHOD" value="GET">
                                        <input type="hidden" name="NOPAYMENT_URL" value="{{ route('chose-payment-method') }}">
                                        <input type="hidden" name="NOPAYMENT_URL_METHOD" value="GET">
                                        <input type="hidden" name="SUGGESTED_MEMO" value="{{ $basic->title }}">
                                        <input type="hidden" name="BAGGAGE_FIELDS" value="IDENT"><br>
                                        <br><br><br><br><br>
                                        <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-send"></i> Pagar Ahora</button>
                                        <br><br><br><br>
                                    </form>
                                </div>
                            @elseif($payment->payment_id == 3)
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h4 style="text-align: center;"> Mandar exactamente <strong>{{ $usd }} BTC </strong> a <strong>{{ $add }}</strong><br>
                                        {!! $code !!} <br>
                                        <strong>Escanear para pagar</strong> <br><br>
                                        <strong style="color: red;">NB: 3 confirmaciones necesarias para acreditar tu cuenta</strong>
                                    </h4>
                                </div>
                            @elseif($payment->payment_id == 4)
                                <br>
                                <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 ">
                                    <form role="form" method="POST" action="{{ route('stripe-submit') }}">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="amount" value="{{ $payment->usd }}">
                                        <input type="hidden" name="custom" value="{{ $payment->order_number }}">
                                        <input type="hidden" name="error_url" value="{{ route('chose-payment-method') }}">
                                        <input type="hidden" name="success_url" value="{{ route('user-dashboard') }}">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-12 text-left"><strong style="text-transform: uppercase;">NÚM. DE TARJETA</strong></label>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="tel" class="form-control input-lg" name="cardNumber" placeholder="Valid Card Number" autocomplete="off" required autofocus />
                                                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-md-12 text-left"><strong style="text-transform: uppercase;">MES EXP.</strong></label>
                                                    <div class="col-md-12">
                                                        <input type="tel" class="form-control input-lg" name="cardExpiryMonth" placeholder="MM" autocomplete="off" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-md-12 text-left"><strong style="text-transform: uppercase;">AÑO EXP.</strong></label>
                                                    <div class="col-md-12">
                                                        <input type="tel" class="form-control input-lg" name="cardExpiryYear" placeholder="YYYY" autocomplete="off" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-md-12 text-left"><strong style="text-transform: uppercase;">CÓDIGO CVC</strong></label>
                                                    <div class="col-md-12">
                                                        <input type="tel" class="form-control input-lg" name="cardCVC" placeholder="CVC" autocomplete="off" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button class="subscribe btn btn-primary btn-lg btn-block" type="submit">Pagar Ahora</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                                <br>
                            @elseif($payment->payment_id == 5)
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form action="https://www.moneybookers.com/app/payment.pl" method="post">
                                        <input type="hidden" name="pay_to_email" value="{{ $payment->paymentMethod->val1 }}"/>
                                        <input type="hidden" name="status_url" value="{{ route('skrill-ipn') }}"/>
                                        <input type="hidden" name="language" value="EN"/>
                                        <input name="transaction_id" type="hidden" value="{{ $payment->order_number }}">
                                        <input type="hidden" name="amount" value="{{ $payment->usd }}"/>
                                        <input type="hidden" name="currency" value="USD"/>
                                        <input type="hidden" name="detail1_description" value="{{ $site_title }}"/>
                                        <input type="hidden" name="detail1_text" value="Plan Charge For - {{ $site_title }}"/>
                                        <input type="hidden" name="logo_url" value="{{ asset('assets/images/logo.png') }}"/>
                                        <br><br><br><br>
                                        <button class="btn btn-primary btn-lg bg-softwarezon-x border-0 btn-block"><i class="fa fa-send"></i> Pagar Ahora</button>
                                        <br><br><br>
                                    </form>
                                </div>
                            @elseif($payment->payment_id == 6)
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    {!! $form !!}
                                    {{--<form action="https://www.coinpayments.net/index.php" method="post">
                                        <input type="hidden" name="merchant" value="{{ $payment->paymentMethod->val1 }}">
                                        <input type="hidden" name="item_name" value="Pay Plan Price For {{ $site_title }}">
                                        <input type="hidden" name="currency" value="USD">
                                        <input type="hidden" name="amountf" value="{{ $payment->usd }}">
                                        <input type="hidden" name="ipn_url" value="{{ route('coinpayment-ipn') }}">
                                        <input type="hidden" name="success_url" value="">
                                        <input type="hidden" name="cancel_url" value="">
                                        <input type="hidden" name="custom" value="{{ $payment->order_number }}">
                                        <input type="hidden" name="cmd" value="_pay_simple">
                                        <input type="hidden" name="want_shipping" value="0">
                                        <input type="hidden" name="success_url" value="{{ route('user-dashboard') }}">
                                        <input type="hidden" name="cancel_url" value="{{ route('chose-payment-method') }}">
                                        <br><br><br><br><br>
                                        <button class="btn btn-primary btn-lg border-0 btn-block"><i class="fa fa-send"></i> Pagar Ahora</button>
                                        <br><br><br><br>
                                    </form>
                                    <br><br><br><br><br>
                                    <a href="{{ $coin_link }}" class="btn btn-primary btn-lg border-0 btn-block"><i class="fa fa-send"></i> Pagar Ahora</a>
                                    <br><br><br><br>--}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection