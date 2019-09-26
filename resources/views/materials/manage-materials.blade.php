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
                </div>
                
                <a style="font-size:1em; margin:auto; margin-bottom:1em;" class="btn btn-primary btn-sm bold uppercase block_button" href="https://signals.club/admin/add-material">Añadir Material</a>
                <div class="row">
                    @foreach($materials as $k => $m)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100" style="position:inline-block;">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $m->title }}</h4>
                                    <hr />
                                    <h6>{{ $m->url }}</h6>
                                    <hr />
                                    <?php $var = explode(";", $m->plans);  ?>
                                    @foreach($var as $d)
                                        @php $c = App\Plan::where('id', $d)->first()@endphp
                                        <span class="badge badge-primary">@if($c){{$c->name}}@endif</span>
                                    @endforeach
                                    <hr />
                                    <button type="button" class="btn btn-danger btn-sm bold uppercase confirm_button" data-toggle="modal" data-target="#ConModal" data-id="{{$m->id}}" title="Delete">
                                        <i class='fa fa-trash'></i> Eliminar
                                    </button>
                                    <a href="{{ route('edit-material', $m->id) }}" class="btn btn-primary btn-sm bold uppercase" title="Edit"><i class="fa fa-edit"></i> Editar</a></td>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a style="font-size:1em; margin:auto; margin-bottom:1em;" class="btn btn-primary btn-sm bold uppercase block_button" href="https://signals.club/admin/add-mmaterial">Añadir Monthly Material</a>
                <div class="row">
                    @foreach($mmaterials as $k => $m)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100" style="position:inline-block;">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $m->title }}</h4>
                                    <hr />
                                    <h6>{{ $m->url }}</h6>
                                    <hr />
                                    <?php $var = explode(";", $m->plans);  ?>
                                    @foreach($var as $d)
                                        @php $c = App\Plan::where('id', $d)->first()@endphp
                                        <span class="badge badge-primary">@if($c){{$c->name}}@endif</span>
                                    @endforeach
                                    <hr />
                                    <button type="button" class="btn btn-danger btn-sm bold uppercase confirm_button" data-toggle="modal" data-target="#ConModal" data-id="{{$m->id}}" title="Delete">
                                        <i class='fa fa-trash'></i> Eliminar
                                    </button>
                                    <a href="{{ route('edit-mmaterial', $m->id) }}" class="btn btn-primary btn-sm bold uppercase" title="Edit"><i class="fa fa-edit"></i> Editar</a></td>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$materials->links('basic.pagination')}}
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="ConModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-trash'></i> Borrar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>¿Está seguro que quiere borrar este material?</strong>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ route('material-delete') }}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id" class="confirm_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> BORRAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on("click", '.confirm_button', function (e) {
                var id = $(this).data('id');
                $(".confirm_id").val(id);
            });
        });
    </script>
@endsection
    