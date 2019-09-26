@extends('layouts.dashboard')

@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('speciality-create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Speciality</a>
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

                        <form class="form-horizontal" action="{{ route('speciality-title-update') }}" method="post" role="form">
                            {!! csrf_field() !!}
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Speciality Title</strong></label>
                                    <div class="col-md-12">
                                        <input class="form-control input-lg" name="title" placeholder="" value="{{ $basic->specialty_title }}" type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> Update Title</button>
                                </div>
                            </div>
                        </form>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Title</th>
                                    <th>Icon</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menu as $key => $m)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><b>{{ $m->name }}</b></td>
                                    <td>
                                        <p class="text-center" style="font-size: 35px;">
                                            {!! $m->icon !!}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-center">
                                            {!! $m->description !!}
                                        </p>
                                    </td>
                                    <td>
                                        <a href="{{ route('speciality-edit',$m->id) }}" class="btn btn-primary margin-top-20"><i class="fa fa-edit"></i> Edit </a>
                                        <button type="button" class="btn btn-danger margin-top-20 delete_button"
                                                data-toggle="modal" data-target="#DelModal"
                                                data-id="{{ $m->id }}">
                                            <i class='fa fa-trash'></i> Delete
                                        </button>

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
                    <form method="post" action="{{ route('speciality-delete') }}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id" class="abir_id" value="0">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
                        <button type="submit" class="btn btn-danger">DELETE</button>
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

