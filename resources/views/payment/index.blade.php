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
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
@stop

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


                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Gateway Name</th>
                                    <th>Gateway Display Image</th>
                                    <th>Conversion Rate</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($payment as $key => $pm)
                                    <tr class="{{$pm->status == 0 ? 'bg-warning' : ''}}">
                                        <td><b>{{ ++$key }}</b></td>
                                        <td><b>{{ $pm->name }}</b></td>
                                        <td><img src="{{ asset('assets/images/payment') }}/{{ $pm->image }}" width="40%" alt=""></td>
                                        <td><b>1 USD = {{$pm->rate}} {{ $basic->currency }}</b></td>
                                        <td>
                                            @if($pm->status == 1)
                                                <div class="badge badge-primary"><i class="fa fa-check font-medium-1"></i><span class="text-bold-700 text-uppercase">Activate</span></div>
                                            @else
                                                <div class="badge badge-danger"><i class="fa fa-times font-medium-1"></i><span class="text-bold-700 text-uppercase">Deactivate</span></div>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary text-bold-700 text-uppercase delete_button"
                                                    data-toggle="modal" data-target="#EditModal{{$pm->id}}" title="Edit Gateway">
                                                <i class='fa fa-send font-medium-1'></i> <span>Edit Gateway</span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="EditModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" >
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-paypal'></i> Paypal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'payment-method-update','method'=>'post','files'=>true]) !!}
                    <input type="hidden" name="method_id" value="1">

                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Display Image</strong></label>
                        <div class="col-md-12">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 250px; height: 140px;" data-trigger="fileinput">
                                    <img style="width: 250px" src="{{ asset('assets/images/payment') }}/{{ $paypal->image }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 140px"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                        <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                        <input type="file" name="paypal_image" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                                <b style="color: red;">Image Type PNG,JPEG,JPG. Resize - (290X190)</b><br>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Display Name</strong></label>
                        <div class="col-md-12">
                            <input class="form-control" name="paypal_name" value="{{ $paypal->name }}" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Conversion Rate</strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <span class="input-group-addon"><strong>1 USD = </strong></span>
                                <input class="form-control" name="paypal_rate" value="{{ $paypal->rate }}" type="text" required>
                                <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">PayPal Client ID</strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <input class="form-control" name="paypal_client" value="{{ $paypal->val1 }}" required type="text">
                                <span class="input-group-addon"><b><i class="fa fa-code"></i></b></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">PayPal Client Secret</strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <input class="form-control" name="paypal_secret" value="{{ $paypal->val2 }}" required type="text">
                                <span class="input-group-addon"><b><i class="fa fa-code"></i></b></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">PayPal Mode</strong></label>
                        <div class="col-md-12">
                            <input data-toggle="toggle" {{ $paypal->val3 == 'sandbox' ? 'checked' : '' }} data-onstyle="success" data-on="Sandbox" data-off="Live" data-offstyle="primary" data-width="100%" type="checkbox" name="paypal_mode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">STATUS</strong></label>
                        <div class="col-md-12">
                            <input data-toggle="toggle" {{ $paypal->status == 1 ? 'checked' : '' }} data-onstyle="success" data-on="Activate" data-off="Deactivate" data-offstyle="danger" data-width="100%" type="checkbox" name="paypal_status">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="EditModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" >
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-money'></i> Perfect Money</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'payment-method-update','method'=>'post','files'=>true]) !!}
                    <input type="hidden" name="method_id" value="2">

                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Display Image</strong></label>
                        <div class="col-md-12">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 250px; height: 140px;" data-trigger="fileinput">
                                    <img style="width: 250px" src="{{ asset('assets/images/payment') }}/{{ $perfect->image }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 1400px"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                        <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                        <input type="file" name="perfect_image" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                                <b style="color: red;">Image Type PNG,JPEG,JPG. Resize - (250X140)</b>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Display Name</strong></label>
                        <div class="col-md-12">
                            <input class="form-control" name="perfect_name" value="{{ $perfect->name }}" required type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Conversion Rate</strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <span class="input-group-addon"><strong>1 USD = </strong></span>
                                <input class="form-control" name="perfect_rate" value="{{ $perfect->rate }}" type="text" required>
                                <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Perfect Money USD Account</strong></label>
                        <div class="col-md-12" style="margin-bottom: 21px;">
                            <div class="input-group mb15">
                                <input class="form-control" name="perfect_account" value="{{ $perfect->val1 }}" type="text">
                                <span class="input-group-addon"><i class="fa fa-send"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Perfect Money Alternate Passphrase  </strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <input class="form-control" name="perfect_alternate" value="{{ $perfect->val2 }}" type="text">
                                <span class="input-group-addon"><i class="fa fa-bolt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">STATUS</strong></label>
                        <div class="col-md-12">
                            <input data-toggle="toggle" {{ $perfect->status == 1 ? 'checked' : '' }} data-onstyle="success" data-on="Activate" data-off="Deactivate"  data-offstyle="danger" data-width="100%" type="checkbox" name="perfect_status">
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="EditModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" >
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-btc'></i> Bitcoin - (BlockChain)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'payment-method-update','method'=>'post','files'=>true]) !!}
                    <input type="hidden" name="method_id" value="3">

                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Display Image</strong></label>
                        <div class="col-md-12">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 290px; height: 190px;" data-trigger="fileinput">
                                    <img style="width: 290px" src="{{ asset('assets/images/payment') }}/{{ $btc->image }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 290px; max-height: 190px"></div>
                                <div>
                                                <span class="btn btn-info btn-file">
                                                    <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                    <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                    <input type="file" name="btc_image" accept="image/*">
                                                </span>
                                    <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                                <b style="color: red;">Image Type PNG,JPEG,JPG. Resize - (290X190)</b><br>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Display Name</strong></label>
                        <div class="col-md-12">
                            <input class="form-control" name="btc_name" value="{{ $btc->name }}" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Conversion Rate</strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <span class="input-group-addon"><strong>1 USD = </strong></span>
                                <input class="form-control" name="btc_rate" value="{{ $btc->rate }}" type="text" required>
                                <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">BitCoin API Key</strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <input class="form-control" name="btc_api" value="{{ $btc->val1 }}" type="text">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">BitCoin XPUB Code  </strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <input class="form-control" name="btc_xpub" value="{{ $btc->val2 }}" type="text">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">STATUS</strong></label>
                        <div class="col-md-12">
                            <input data-toggle="toggle" {{ $btc->status == 1 ? 'checked' : '' }} data-onstyle="success" data-on="Activate" data-off="Deactivate"  data-offstyle="danger" data-width="100%" type="checkbox" name="btc_status">
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="EditModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" >
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-credit-card-alt'></i> Stripe Card</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'payment-method-update','method'=>'post','files'=>true]) !!}
                    <input type="hidden" name="method_id" value="4">

                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Display Image</strong></label>
                        <div class="col-md-12">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 290px; height: 190px;" data-trigger="fileinput">
                                    <img style="width: 290px" src="{{ asset('assets/images/payment') }}/{{ $stripe->image }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 290px; max-height: 190px"></div>
                                <div>
                                                <span class="btn btn-info btn-file">
                                                    <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                    <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                    <input type="file" name="stripe_image" accept="image/*">
                                                </span>
                                    <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                                <b style="color: red;">Image Type PNG,JPEG,JPG. Resize - (290X190)</b><br>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Display Name</strong></label>
                        <div class="col-md-12">
                            <input class="form-control" name="stripe_name" value="{{ $stripe->name }}" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Conversion Rate</strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <span class="input-group-addon"><strong>1 USD = </strong></span>
                                <input class="form-control" name="stripe_rate" value="{{ $stripe->rate }}" type="text" required>
                                <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">SECRET KEY</strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <input class="form-control" name="stripe_secret" value="{{ $stripe->val1 }}" type="text">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">PUBLISHER KEY</strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <input class="form-control" name="stripe_publishable" value="{{ $stripe->val2 }}" type="text">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">STATUS</strong></label>
                        <div class="col-md-12">
                            <input data-toggle="toggle" {{ $stripe->status == 1 ? 'checked' : '' }} data-onstyle="success" data-offstyle="danger" data-on="Activate" data-off="Deactivate" data-width="100%" type="checkbox" name="stripe_status">
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="EditModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" >
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-money'></i> SKRILL</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'payment-method-update','method'=>'post','files'=>true]) !!}
                    <input type="hidden" name="method_id" value="5">

                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Display Image</strong></label>
                        <div class="col-md-12">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 250px; height: 140px;" data-trigger="fileinput">
                                    <img style="width: 250px" src="{{ asset('assets/images/payment') }}/{{ $skrill->image }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 1400px"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                        <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                        <input type="file" name="skrill_image" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                                <b style="color: red;">Image Type PNG,JPEG,JPG. Resize - (250X140)</b>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Display Name</strong></label>
                        <div class="col-md-12">
                            <input class="form-control" name="skrill_name" value="{{ $skrill->name }}" required type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Conversion Rate</strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <span class="input-group-addon"><strong>1 USD = </strong></span>
                                <input class="form-control" name="skrill_rate" value="{{ $skrill->rate }}" type="text" required>
                                <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Skrill Merchant Email</strong></label>
                        <div class="col-md-12" style="margin-bottom: 21px;">
                            <div class="input-group mb15">
                                <input class="form-control" name="skrill_email" value="{{ $skrill->val1 }}" type="text">
                                <span class="input-group-addon"><strong>@</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Merchant Secret Key  </strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <input class="form-control" name="skrill_secret" value="{{ $skrill->val2 }}" type="text">
                                <span class="input-group-addon"><i class="fa fa-bolt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">STATUS</strong></label>
                        <div class="col-md-12">
                            <input data-toggle="toggle" {{ $skrill->status == 1 ? 'checked' : '' }} data-onstyle="success" data-on="Activate" data-off="Deactivate"  data-offstyle="danger" data-width="100%" type="checkbox" name="skrill_status">
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="EditModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" >
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-credit-card'></i> Coinpayment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'payment-method-update','method'=>'post','files'=>true]) !!}
                    <input type="hidden" name="method_id" value="6">

                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Display Image</strong></label>
                        <div class="col-md-12">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 250px; height: 140px;" data-trigger="fileinput">
                                    <img style="width: 250px" src="{{ asset('assets/images/payment') }}/{{ $coin->image }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 1400px"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                        <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                        <input type="file" name="coin_image" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                                <b style="color: red;">Image Type PNG,JPEG,JPG. Resize - (250X140)</b>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Display Name</strong></label>
                        <div class="col-md-12">
                            <input class="form-control" name="coin_name" value="{{ $coin->name }}" required type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Conversion Rate</strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <span class="input-group-addon"><strong>1 USD = </strong></span>
                                <input class="form-control" name="coin_rate" value="{{ $coin->rate }}" type="text" required>
                                <span class="input-group-addon"><strong>{{ $basic->currency }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Coinpayment Merchant ID</strong></label>
                        <div class="col-md-12" style="margin-bottom: 21px;">
                            <div class="input-group mb15">
                                <input class="form-control" name="coin_merchant" value="{{ $coin->val1 }}" type="text">
                                <span class="input-group-addon"><strong><i class="fa fa-key"></i></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">IPN Secret Key  </strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <input class="form-control" name="coin_ipn" value="{{ $coin->val2 }}" type="text">
                                <span class="input-group-addon"><i class="fa fa-bolt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">IPN URL  </strong></label>
                        <div class="col-md-12">
                            <div class="input-group mb15">
                                <input type="text" class="form-control input-lg" name="coin_url" id="ref" readonly value="{{ route('coinpayment-ipn') }}"/>
                                <span class="input-group-btn">
                                    <button type="button" data-copytarget="#ref" class="btn btn-success btn-lg">CLIPBOARD</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">STATUS</strong></label>
                        <div class="col-md-12">
                            <input data-toggle="toggle" {{ $coin->status == 1 ? 'checked' : '' }} data-onstyle="success" data-on="Activate" data-off="Deactivate"  data-offstyle="danger" data-width="100%" type="checkbox" name="coin_status">
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/clipboard.min.js') }}"></script>
    <script>
        (function() {

            'use strict';

            // click events
            document.body.addEventListener('click', copy, true);

            // event handler
            function copy(e) {

                // find target element
                var
                    t = e.target,
                    c = t.dataset.copytarget,
                    inp = (c ? document.querySelector(c) : null);

                // is element selectable?
                if (inp && inp.select) {

                    // select text
                    inp.select();

                    try {
                        // copy text
                        document.execCommand('copy');
                        inp.blur();

                        // copied animation
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
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>
@stop
