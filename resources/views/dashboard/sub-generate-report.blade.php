@extends('layouts.subdashboard')

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
                        
                        <form id='my-form' action={{ route('create-report') }} method="GET">
                            <div id="user" class="card-block">
                                <h6>Tipo de Usuario</h6>
                                <select id="user_type" name="user_type_select">
                                    <option value="1">Todos</option>
                                    <option value="2">Pagado</option>
                                    <option value="3">Sin Pagar</option>
                                </select>
                            </div>
                            <div id="payment" class="card-block" style="padding-top:0px">
                                <h6>Tipo de Pago</h6>
                                <select id="payment_type" name="payment_type_select">
                                    <option value="1">Todos</option>
                                    <option value="2">PayPal</option>
                                    <option value="3">Coinpayments</option>
                                    <option value="4">Manual</option>
                                </select>
                            </div>
                            <div class="card-block" style="padding-top:0px">
                                <div id="date-since" class="form-check form-check-inline" style="padding-left:25px">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="sinceRadio" value="1" checked="checked">
                                    <label class="form-check-label" for="sinceRadio">
                                        <h6>Desde</h6>
                                        <select name="date_since_select">
                                            <option value="1">Siempre</option>
                                            <option value="2">Hace 6 meses</option>
                                            <option value="3">Hace 3 meses</option>
                                            <option value="4">Hace 1 mes</option>
                                        </select>    
                                    </label>
                                </div>
                                <div id="date-range" class="form-check form-check-inline" style="padding-left:25px">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rangeRadio" value="2">
                                    <label class="form-check-label" for="rangeRadio">
                                        <h6>Rango de fecha</h6>
                                        <input id="date-1" type="date" name="date_A">
                                        <label>hasta el</label>
                                        <input id="date-2" type="date" name="date_B">
                                    </label>
                                </div>
                                <div class="card-block" style="padding-left:0px">
                                    <button id="generate-button" type="submit" class="btn btn-primary btn-sm bold uppercase" title="Edit" style="font-size:1.2em"><i class="fa fa-edit"></i> Generar reporte</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            $('#rangeRadio').on('click',function(){
                if($('#rangeRadio').is(':checked') ){
                    document.getElementById("date-1").required = true;
                    document.getElementById("date-2").required = true;
                }
                else{
                    document.getElementById("date-1").required = false;
                    document.getElementById("date-2").required = false; 
                }
            });
            
            $('#sinceRadio').on('click',function(){
                if($('#sinceRadio').is(':checked') ){
                    document.getElementById("date-1").required = false;
                    document.getElementById("date-2").required = false;
                }
                else{
                    document.getElementById("date-1").required = true;
                    document.getElementById("date-2").required = true; 
                }
            });
        });
    </script>
@endsection