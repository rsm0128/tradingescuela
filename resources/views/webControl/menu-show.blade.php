@extends('layouts.dashboard')
@section('title', 'Menu Show')

@section('content')


    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('menu-create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Menu</a>
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

                            <div class="row">
                                @foreach($menu as $m)
                                <div class="col-md-6">
                                    <div class="box box-primary box-solid">
                                        <div class="box-header with-border">
                                            <div class="box-title text-center">
                                                <div class="text-center"><b>{{ $m->name }}</b></div>
                                            </div>
                                        </div>
                                        <div class="box-body pad">
                                            <p class="text-center">
                                                {!! $m->description !!}
                                            </p>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('menu-edit',$m->id) }}" class="btn btn-primary btn-block margin-top-20"><i class="fa fa-edit"></i> Edit Menu </a>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-danger btn-block margin-top-20 delete_button"
                                                        data-toggle="modal" data-target="#DelModal"
                                                        data-id="{{ $m->id }}">
                                                    <i class='fa fa-trash'></i> Delete Menu
                                                </button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
                    <form method="post" action="{{ route('menu-delete') }}" class="form-inline">
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

