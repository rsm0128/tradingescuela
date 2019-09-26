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


                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Fecha de Señal</th>
                                    <th>Título</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($signal as $k => $p)
                                    <tr>
                                        <td>{{ ++$k }}</td>
                                        <td>{{\Carbon\Carbon::parse($p->created_at)->format('dS M, Y - h:i:s A')}}</td>
                                        <td>{{ $p->signal->title }}</td>
                                        <td>
                                            <a href="{{ route('user-signal-view',$p->id) }}" class="btn btn-primary bold uppercase" title="Edit"><i class="fa fa-eye"></i> Ver Señal</a>
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
@endsection