@extends('layouts.dashboard')
@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary bold uppercase" data-toggle="modal" data-target="#DelModal"><i class='fa fa-send'></i> Crear nuevo resplado</button>
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

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Nombre Base de Datos</th>
                                <th>Respaldo hace</th>
                                <th>Edad de resplado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($backup as $key => $product)
                                <tr id="product{{$product->id}}">
                                    <td>{{++$key}}</td>
                                    <td> {{$product->name}}</td>
                                    <td> {{ \Carbon\Carbon::parse($product->created_at)->format('dS-F-Y h:i A') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($product->created_at)->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('database-backup-download',$product->id) }}" class="btn btn-success bold uppercase"> <i class='fa fa-download'></i> Descargar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="text-right">
                            {!! $backup->links('basic.pagination') !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-exclamation-triangle'></i> Confirmation !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>¿Seguro que desea hacer esta acción?</strong>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default bold uppercase" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>&nbsp;
                    <a href="{{ route('backup-submit') }}" class="btn btn-success deleteButton bold uppercase"><i class="fa fa-send"></i> Confirmar</a>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')


@endsection