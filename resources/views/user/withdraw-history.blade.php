@extends('layouts.user')
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

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Creado el</th>
                                    <th>Número de transaccióon</th>
                                    <th>Método de Retiro</th>
                                    <th>Catidad de Retiro</th>
                                    <th>Cargo por Retiro</th>
                                    <th>Estado</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($log as $k => $p)
                                    <tr>
                                        <td>{{ ++$k }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M, Y') }}</td>
                                        <td>{{ $p->custom }}</td>
                                        <td>{{ $p->withdrawMethod->name }}</td>
                                        <td>{{ $p->amount }} {{ $basic->currency }}</td>
                                        <td>{{ $p->charge }} {{ $basic->currency }}</td>
                                        <td>
                                            @if($p->status == 0)
                                                <div class="badge badge-warning">
                                                    <i class="fa fa-spinner font-medium-2"></i>
                                                    <span>Pendiente</span>
                                                </div>
                                            @elseif($p->status == 1)
                                                <div class="badge badge-success">
                                                    <i class="fa fa-check font-medium-2"></i>
                                                    <span>Éxito</span>
                                                </div>
                                            @else
                                                <div class="badge badge-danger">
                                                    <i class="fa fa-times font-medium-2"></i>
                                                    <span>Refund</span>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                            <div class="pull-right">
                                {!! $log->links('basic.pagination') !!}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection