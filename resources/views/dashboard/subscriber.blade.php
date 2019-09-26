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

                        <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Subscriber At</th>
                                <th>Subscriber Email</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($subscriber as $k => $p)
                                <tr>
                                    <td>{{ ++$k }}</td>
                                    <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M, Y h:i A') }}</td>
                                    <td>{{ $p->email }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        <div class="pull-right">
                            {!! $subscriber->links('basic.pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection