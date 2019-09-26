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
                                    <th>Created At</th>
                                    <th>Transaction ID</th>
                                    <th>Transaction For</th>
                                    <th>Transaction Type</th>
                                    <th>Transaction Amount</th>
                                    <th>Post Amount</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($log as $k => $p)
                                    <tr>
                                        <td>{{ ++$k }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M, Y') }}</td>
                                        <td>{{ $p->custom }}</td>
                                        <td>
                                            {{ $p->user->name }} <br>
                                            {{ $p->user->email }} <br>
                                            {{ $p->user->country_code }}{{$p->user->phone}}
                                        </td>
                                        <td>
                                            @if($p->type == 1)
                                                <div class="badge badge-primary">
                                                    <i class="fa fa-line-chart font-medium-2"></i>
                                                    <span>Provide Signal</span>
                                                </div>
                                            @elseif($p->type == 2)
                                                <div class="badge badge-success">
                                                    <i class="fa fa-send font-medium-2"></i>
                                                    <span>Subscription Plan</span>
                                                </div>
                                            @elseif($p->type == 3)
                                                <div class="badge badge-warning">
                                                    <i class="fa fa-cloud-upload font-medium-2"></i>
                                                    <span>Withdraw</span>
                                                </div>
                                            @elseif($p->type == 4)
                                                <div class="badge badge-warning">
                                                    <i class="fa fa-bolt font-medium-2"></i>
                                                    <span>Withdraw Charge</span>
                                                </div>
                                            @elseif($p->type == 5)
                                                <div class="badge badge-danger">
                                                    <i class="fa fa-cloud-download font-medium-2"></i>
                                                    <span>Withdraw Refund</span>
                                                </div>
                                            @elseif($p->type == 6)
                                                <div class="badge badge-danger">
                                                    <i class="fa fa-bolt font-medium-2"></i>
                                                    <span>Withdraw Charge Refund</span>
                                                </div>
                                            @elseif($p->type == 7)
                                                <div class="badge badge-success">
                                                    <i class="fa fa-cloud-download font-medium-2"></i>
                                                    <span>Reference Bonus</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <b>{{ $p->balance }} {{ $basic->currency }}</b>
                                        </td>
                                        <td>
                                            <b>{{ $p->post_balance }} {{ $basic->currency }}</b>
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