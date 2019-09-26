@extends('layouts.subdashboard')
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
                                    <th width="5%">ID#</th>
                                    <th width="25%">Title</th>
                                    <th width="15%"> Image</th>
                                    <th width="35%">Details</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($testimonial as $k => $p)
                                    <tr>
                                        <td>{{ ++$k }}</td>
                                        <td style="width: 25%"><b>{{ $p->title }}</b></td>
                                        <td>
                                            <img style="width:100%;" class="img-responsive" src="{{ asset('assets/images/post') }}/{{ $p->image }}">
                                        </td>
                                        <td style="width: 20%">{!! str_limit(strip_tags($p->description),90) !!}</td>
                                        <td>
                                            @if($p->status == 1)
                                            <label class="label label-success">Active</label>
                                            @else
                                            <label class="label label-warning">Deactive</label>
                                            @endif
                                        </td>
                                        <td style="width: 14%">

                                            @if($p->status)
                                                <button type="button" class="btn btn-sm btn-warning bold uppercase publish_button"
                                                        data-toggle="modal" data-target="#StatusModal"
                                                        data-id="{{ $p->id }}" title="Unpublish">
                                                    <i class='fa fa-times'></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-success bold uppercase publish_button"
                                                        data-toggle="modal" data-target="#StatusModal"
                                                        data-id="{{ $p->id }}" title="Publish">
                                                    <i class='fa fa-check'></i>
                                                </button>
                                            @endif

                                            <a href="{{ route('sub-post-edit',$p->id) }}" class="btn btn-sm btn-primary bold uppercase" title="Edit"><i class="fa fa-edit"></i> </a>

                                            <button type="button" class="btn btn-sm btn-danger bold uppercase delete_button"
                                                    data-toggle="modal" data-target="#DelModal"
                                                    data-id="{{ $p->id }}" title="Delete">
                                                <i class='fa fa-trash'></i>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                                <div class="text-right">
                                    {{$testimonial->links('basic.pagination')}}
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
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('sub-post-delete') }}" class="form-inline">
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

    <div class="modal fade" id="StatusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-exclamation-triangle'></i> Confirmation !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure you want to Change Publication Status ?</strong>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ route('sub-post-publish') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" class="confirm_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Yes </button>
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

    <script>
        $(document).ready(function (e) {
            $(document).on("click", '.publish_button', function (e) {
                var id = $(this).data('id');
                $(".confirm_id").val(id);
            });
        });
    </script>

@endsection
