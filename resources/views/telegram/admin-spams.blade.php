@extends('layouts.dashboard')

@section('style')
@endsection

@section('content')
    <a style="font-size:1em; margin:auto; margin-bottom:1em;" class="btn btn-primary btn-sm bold uppercase block_button" href="https://signals.club/admin/telegram-spam-create">Add Spam Key</a>
    
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
                    <div id="table-div" class="card-block">
                        <div id="table-div" class="table-responsive"> 
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Keywords</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($spams as $spam)
                                    <tr>
                                        <td>{{ $spam->keyword }}</td>
                                        <td>
                                            {!! str_limit(strip_tags($spam->description), 40) !!}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin-telegram-spam-edit', $spam->id) }}" class="btn btn-warning btn-sm bold" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                                            <button type="button" class="btn btn-danger btn-sm bold uppercase delete_button"
                                                    data-toggle="modal" data-target="#DelModal"
                                                    data-id="{{$spam->id}}" title="Delete">
                                                <i class='fa fa-trash'></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$spams->links('basic.pagination')}}
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
                    <form method="post" action="{{ route('admin-telegram-spam-delete') }}" class="form-inline">
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
    </script>
@endsection