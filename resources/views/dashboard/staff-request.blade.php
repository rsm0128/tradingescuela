@extends('layouts.dashboard')
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
                    </div>
                    <div class="card-block">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Request Date</th>
                                    <th>User Details</th>
                                    <th>User Plan</th>
                                    <th>Email Verify</th>
                                    <th>Phone Verify</th>
                                    <th>Status</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($user as $k => $p)
                                    <tr class="{{ $p->user->plan_status == 1 ? '' : 'bg-danger white' }}">
                                        <td>{{ ++$k }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS F, Y') }}</td>
                                        <td>{{$p->user->name}}<br>{{$p->user->email}}<br>{{$p->user->country_code}}{{$p->user->phone}}</td>
                                        <td>{{$p->user->plan->name}}</td>
                                        <td>
                                            @if($p->user->email_status == 1)
                                                <button type="button" class="btn btn-primary btn-sm bold uppercase email_button"
                                                        data-toggle="modal" data-target="#EmailModal"
                                                        data-id="{{$p->user->id}}" title="Unverified">
                                                    <i class='fa fa-check'></i> Verified
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-warning btn-sm bold uppercase email_button"
                                                        data-toggle="modal" data-target="#EmailModal"
                                                        data-id="{{$p->user->id}}" title="Verified">
                                                    <i class='fa fa-times'></i> Unverified
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->user->phone_status == 1)
                                                <button type="button" class="btn btn-primary btn-sm bold uppercase phone_button"
                                                        data-toggle="modal" data-target="#PhoneModal"
                                                        data-id="{{$p->user->id}}" title="Unverified">
                                                    <i class='fa fa-check'></i> Verified
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-warning btn-sm bold uppercase phone_button"
                                                        data-toggle="modal" data-target="#PhoneModal"
                                                        data-id="{{$p->user->id}}" title="Verified">
                                                    <i class='fa fa-times'></i> Unverified
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->user->status == 0)
                                                <button type="button" class="btn btn-primary btn-sm bold uppercase block_button"
                                                        data-toggle="modal" data-target="#DelModal"
                                                        data-id="{{$p->user->id}}" title="Block">
                                                    <i class='fa fa-check'></i> Active
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-danger btn-sm bold uppercase block_button"
                                                        data-toggle="modal" data-target="#DelModal"
                                                        data-id="{{$p->user->id}}" title="Active">
                                                    <i class='fa fa-times'></i> Block
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->user->plan_status == 1)
                                                <div class="badge badge-success"><i class="fa fa-check"></i> Payment</div>
                                            @else
                                                <div class="badge badge-warning"><i class="fa fa-times"></i> Not Payment</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->status == 0)
                                            <button type="button" class="btn btn-success btn-sm bold uppercase confirm_button"
                                                    data-toggle="modal" data-target="#ConModal"
                                                    data-id="{{$p->user->id}}" title="Approve">
                                                <i class='fa fa-check'></i> Approve
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm bold uppercase reject_button"
                                                    data-toggle="modal" data-target="#RejModal"
                                                    data-id="{{$p->user->id}}" title="Reject">
                                                <i class='fa fa-times'></i> Reject
                                            </button>
                                            @elseif($p->status == 1)
                                                <button type="button" class="btn btn-success btn-md bold uppercase confirm_button"
                                                        data-toggle="modal" data-target="#ConModal"
                                                        data-id="{{$p->user->id}}" title="Approve">
                                                    <i class='fa fa-check'></i> Approved
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm bold uppercase reject_button"
                                                        data-toggle="modal" data-target="#RejModal"
                                                        data-id="{{$p->user->id}}" title="Reject">
                                                    <i class='fa fa-times'></i> Reject
                                                </button>
                                            @elseif($p->status == 2)
                                                <button type="button" class="btn btn-success btn-sm bold uppercase confirm_button"
                                                        data-toggle="modal" data-target="#ConModal"
                                                        data-id="{{$p->user->id}}" title="Approve">
                                                    <i class='fa fa-check'></i> Approve
                                                </button>
                                                <button type="button" class="btn btn-danger btn-md bold uppercase reject_button"
                                                        data-toggle="modal" data-target="#RejModal"
                                                        data-id="{{$p->user->id}}" title="Reject">
                                                    <i class='fa fa-times'></i> Rejected
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                            {{$user->links('basic.pagination')}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-exclamation-triangle"></i> Confirmation.!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure you want to Do this ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('user-block') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="block_id" class="block_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Yes sure</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="EmailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-exclamation-triangle"></i> Confirmation.!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure you want to Do This ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('email-block') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="email_id" class="email_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Yes sure</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="PhoneModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-exclamation-triangle"></i> Confirmation.!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure you want to Do This ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('phone-block') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="phone_id" class="phone_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Yes sure</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="ConModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-check'></i> Approve !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure you want to Approve ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('staff-request-approve') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="confirm_id" class="confirm_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Yes Sure</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="RejModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-times'></i> Reject !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <strong>Are you sure you want to Reject ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('staff-request-reject') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="reject_id" class="reject_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Yes Sure</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on("click", '.block_button', function (e) {
                var id = $(this).data('id');
                $(".block_id").val(id);
            });
            $(document).on("click", '.email_button', function (e) {
                var id = $(this).data('id');
                $(".email_id").val(id);
            });
            $(document).on("click", '.phone_button', function (e) {
                var id = $(this).data('id');
                $(".phone_id").val(id);
            });
            $(document).ready(function () {
                $(document).on("click", '.confirm_button', function (e) {
                    var id = $(this).data('id');
                    $(".confirm_id").val(id);
                });
            });
            $(document).ready(function () {
                $(document).on("click", '.reject_button', function (e) {
                    var id = $(this).data('id');
                    $(".reject_id").val(id);
                });
            });
        });
    </script>
@endsection
