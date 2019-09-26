@extends('layouts.dashboard')

@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/bootstrap4-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/customstyle.css')}}" rel="stylesheet">
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
                                <div class="col-md-10 offset-1">
                                    <form action="{{route('plan-update')}}" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="form-body">
                                        <div class="form-body">

                                        <input type="hidden" name="id" value="{{$plan->id}}">
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label"><b>Nombre del plan : </b></label>
                                            <div class="col-sm-12">
                                                <input name="name" value="{{$plan->name}}" class="form-control input-lg" type="text" required placeholder="Nombre del Plan">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label"><b>Subtítulo Del plano : </b></label>
                                            <div class="col-sm-12">
                                                <input name="subtitle" value="{{$plan->subtitle}}" class="form-control input-lg" type="text" placeholder="Subtítulo del Plano">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label"><b>Mostrar en: </b></label>
                                            <div class="col-sm-12">
                                                <select name="pages[]" id="pages" multiple class="form-control input-lg font-weight-bold">
                                                @foreach ($pages as $page)
                                                    <option value="{{ $page->id }}" {{ in_array($page->id, $pages_selected) ? 'selected' : '' }}>{{ $page->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                            <div class="form-group">
                                                <label class="col-sm-12 control-label"><b>Tipo de Pago: </b></label>
                                                <div class="col-sm-12">
                                                    <select name="price_type" id="price_type" class="form-control input-lg font-weight-bold">
                                                        @if($plan->price_type == 0)
                                                            <option value="0" class="font-weight-bold" selected>Plan GRATUITO</option>
                                                            <option value="1" class="font-weight-bold">Plan de PAGA</option>
                                                        @else
                                                            <option value="0" class="font-weight-bold">Plan GRATUITO</option>
                                                            <option value="1" class="font-weight-bold" selected>Plan de PAGA</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group" id="price" style="display: {{ $plan->price_type == 0 ? 'none' : 'block' }}">
                                                <label class="col-sm-12 control-label"><b>Precio del Plan: </b></label>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input name="price" value="{{$plan->price}}" class="form-control input-lg" type="text" placeholder="Plan Price" >
                                                        <span class="input-group-addon"><strong>{{$basic->currency}}</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="" style="display: {{ $plan->price_type == 0 ? 'none' : 'block' }}">
                                                <label class="col-sm-12 control-label"><b>Precio del Plan Original: </b></label>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input name="high_price" value="{{$plan->high_price}}" class="form-control input-lg" type="text" placeholder="Original Plan Price" >
                                                        <span class="input-group-addon"><strong>{{$basic->currency}}</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label"><b>Tipo de plan : </b></label>
                                                <div class="col-sm-12">
                                                    <select name="plan_type" id="plan_type" class="form-control input-lg font-weight-bold">
                                                        <option value="" class="font-weight-bold">Select One</option>
                                                        @if($plan->plan_type == 0)
                                                            <option value="0" class="font-weight-bold" selected>Limitado</option>
                                                            <option value="1" class="font-weight-bold">Ilimitado</option>
                                                        @else
                                                            <option value="0" class="font-weight-bold">Limitado</option>
                                                            <option value="1" class="font-weight-bold" selected>Ilimitado</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="duration" style="display: {{$plan->plan_type == 0 ? 'block' : 'none'}}">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label"><b>Duración : </b></label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <input name="duration" value="{{$plan->duration}}" class="form-control input-lg" type="text" placeholder="Duration" >
                                                            <span class="input-group-addon"><strong>Días</strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label"><b>descripción del plano : </b></label>
                                                <div class="col-sm-12">
                                                    <textarea name="description" id="ckview" rows="6" class="form-control input-lg">{!! $plan->description !!}</textarea>
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <label class="col-md-12 control-label"><b>Promoción: </b></label>
                                            <div class="col-md-12">
                                                <input id="has-promo" data-toggle="toggle" {{ $plan->has_promo == 1 ? 'checked' : '' }} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="has_promo">
                                            </div>
                                        </div>

                                        <div id="promo-duration" style="display: {{$plan->has_promo == 1 ? 'block' : 'none'}}">
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label"><b>Duración de la promoción: </b></label>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input name="promo_duration" id="promo_duration" value="{{ $plan->promo_duration }}" class="form-control input-lg" type="text">
                                                        <span class="input-group-addon"><strong>Fecha</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 control-label flex-label"><b>Alertas por SMS: </b>
                                                <input type="checkbox" name="sms_visible" class="pricing-visible-option" <?php if($plan->sms_visible) echo 'checked' ?>>Show
                                            </label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle" {{ $plan->sms_status == 1 ? 'checked' : ''}} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="sms_status">
                                            </div>
                                        <div class="form-group">
                                            <label class="col-md-12 control-label flex-label"><b>Alertas por Telegram: </b>
                                                <input type="checkbox" name="telegram_visible" class="pricing-visible-option" <?php if($plan->telegram_visible) echo 'checked' ?>>Show
                                            </label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle" {{ $plan->telegram_status == 1 ? 'checked' : ''}} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="telegram_status">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-12 control-label flex-label"><b>Soporte: </b>
                                                <input type="checkbox" name="support_visible" class="pricing-visible-option" <?php if($plan->support_visible) echo 'checked' ?>>Show
                                            </label>
                                            <div class="col-sm-12">
                                            <div class="input-group">
                                                <input name="support" value="{{$plan->support}}" class="form-control input-lg" type="text" required placeholder="Support">
                                                <span class="input-group-addon"><strong><i class="fa fa-question-circle"></i></strong></span>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-12 control-label flex-label"><b>Acceso a seminarios: </b>
                                                <input type="checkbox" name="seminars_visible" class="pricing-visible-option" <?php if($plan->seminars_visible) echo 'checked' ?>>Show
                                            </label>
                                            <div class="col-md-12">
                                                   <input data-toggle="toggle" {{ $plan->seminar_status == 1 ? 'checked' : ''}} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="seminar_status">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-12 control-label flex-label"><b>Acceso a curso básico de Forex: </b>
                                                <input type="checkbox" name="forex_course_visible" class="pricing-visible-option" <?php if($plan->forex_course_visible) echo 'checked' ?>>Show
                                            </label>
                                            <div class="col-md-12">
                                                   <input data-toggle="toggle" {{ $plan->forex_course == 1 ? 'checked' : ''}} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="forex_course">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-12 control-label flex-label"><b>Consultoría por Telegram: </b>
                                                <input type="checkbox" name="telegram_group_visible" class="pricing-visible-option" <?php if($plan->telegram_group_visible) echo 'checked' ?>>Show
                                            </label>
                                            <div class="col-md-12">
                                                   <input data-toggle="toggle" {{ $plan->telegram_group_status == 1 ? 'checked' : ''}} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="telegram_group_status">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-12 control-label flex-label"><b>Alertas por Email : </b>
                                                <input type="checkbox" name="email_alert_visible" class="pricing-visible-option" <?php if($plan->email_alert_visible) echo 'checked' ?>>Show
                                            </label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle" {{ $plan->email_status == 1 ? 'checked' : ''}} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="email_status">
                                            </div>
                                        </div>

                                        <!--
                                        <div class="form-group">
                                            <label class="col-md-12 control-label"><b>Consultoría por Teléfono  : </b></label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle" {{ $plan->call_status == 1 ? 'checked' : ''}} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="call_status">
                                            </div>
                                        </div>-->

                                        <div class="form-group">
                                            <label class="col-md-12 control-label"><b>Estatus de la publicación : </b></label>
                                            <div class="col-md-12">
                                                   <input data-toggle="toggle" {{ $plan->status == 1 ? 'checked' : ''}}  data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="status">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-offset-12 col-md-12">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block "> <i class="fa fa-send"></i> Actualizar Plan</button>
                                            </div>
                                        </div>
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


@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap4-datetimepicker.min.js') }}"></script>
    <script src="{{asset('assets/admin/js/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('assets/admin/ckeditor/ckeditor.js')}}"></script>
    <script>
        var ckview = document.getElementById("ckview");
            CKEDITOR.replace(ckview,{
                language:'en-gb'
        });
        $(document).ready(function () {
            $(document).on("change", '#plan_type', function (e) {
                var type = $(this).val();
                if (type == "0"){
                    var duration = document.getElementById('duration');
                    duration.style.display='block';
                }else if (type == "1"){
                    var duration = document.getElementById('duration');
                    duration.style.display='none';
                }
            });
            $(document).on("change", '#price_type', function (e) {
                var type = $(this).val();
                if (type == "0"){
                    var duration = document.getElementById('price');
                    duration.style.display='none';
                }else if (type == "1"){
                    var duration = document.getElementById('price');
                    duration.style.display='block';
                }
            });

            $('#has-promo').change(function() {
                var check = $(this).prop('checked');
                if (check)
                    $('#promo-duration').fadeIn();
                else
                    $('#promo-duration').fadeOut();
            });

            $('#promo_duration').datetimepicker({
                viewMode: 'days',
                format: 'YYYY-MM-DD LT'
            });
        });
    </script>
@endsection
