@extends('layouts.dashboard')
@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">{{$page_title}}</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">


                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Created At</th>
                                    <th>Transaction Number</th>
                                    <th>User Details</th>
                                    <th>Withdraw Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($log as $k => $p)
                                    <tr>
                                        <td>{{ ++$k }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M, Y') }}</td>
                                        <td>{{ $p->custom }}</td>
                                        <td>
                                            {{ $p->user->name }}<br>
                                            {{ $p->user->email }}<br>
                                            {{ $p->user->country_code.$p->user->phone }}
                                        </td>
                                        <td>
                                            {{ $p->amount }} {{ $basic->currency }}
                                        </td>
                                        <td>
                                            @if($p->status == 0)
                                                <div class="badge badge-warning">
                                                    <i class="fa fa-spinner font-medium-2"></i>
                                                    <span>Pending</span>
                                                </div>
                                            @elseif($p->status == 1)
                                                <div class="badge badge-success">
                                                    <i class="fa fa-check font-medium-2"></i>
                                                    <span>Success</span>
                                                </div>
                                            @else
                                                <div class="badge badge-danger">
                                                    <i class="fa fa-times font-medium-2"></i>
                                                    <span>Refund</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('withdraw-request-view',$p->custom) }}" class="btn btn-primary btn-sm text-uppercase"><i class="fa fa-eye font-medium-2"></i> View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pull-right">
                                {!! $log->links('basic.pagination') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
@endsection