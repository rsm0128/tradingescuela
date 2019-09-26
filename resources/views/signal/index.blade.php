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
                                    <th>Signal Date</th>
                                    <th>Title</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($signal as $k => $p)
                                    <tr>
                                        <td>{{ ++$k }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M, Y h:i A') }}</td>
                                        <td>{{ $p->title }}</td>
                                        @php
                                            $total_signal = \App\SignalRating::whereSignal_id($p->id)->count();
                                            $sum_signal = \App\SignalRating::whereSignal_id($p->id)->sum('rating');
                                            if ($total_signal == 0){
                                                $final_rating = 0;
                                            }else{
                                                $final_rating = round($sum_signal / $total_signal);
                                            }
                                        @endphp
                                        <td>{!! \App\TraitsFolder\CommonTrait::getRating($final_rating) !!} - ({{ $total_signal }})</td>
                                        <td>
                                            @if($p->status == 0)
                                                <div class="badge badge-warning">
                                                    <i class="fa fa-spinner font-medium-2"></i>
                                                    <span>Pending</span>
                                                </div>
                                            @else
                                                <div class="badge badge-success">
                                                    <i class="fa fa-check font-medium-2"></i>
                                                    <span>Success</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('signal-view',$p->id) }}" class="btn btn-primary btn-sm bold uppercase" title="Edit"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{ route('signal-edit',$p->id) }}" class="btn btn-warning btn-sm bold uppercase" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                                            <button type="button" class="btn btn-danger btn-sm bold uppercase delete_button"
                                                    data-toggle="modal" data-target="#DelModal"
                                                    data-id="{{$p->id}}" title="Delete">
                                                <i class='fa fa-trash'></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                            {{$signal->links('basic.pagination')}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-trash'></i> Delete !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('signal-delete') }}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id" class="abir_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);
            });
        });
    </script>
@endsection
