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
                    <div id="table-div" class="card-block">
                        @include('dashboard.table-users')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-exclamation-triangle"></i> Confirmación</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>¿Está seguro de que desea modificar el estatus a este usuario?</strong>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ route('user-block') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="block_id" class="block_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Sí</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="EmailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-exclamation-triangle"></i> Confirmación</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>¿Está seguro de que desea modificar la verificación de email de este usuario?</strong>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ route('email-block') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input  type="hidden" id="email_id_input" name="email_id" class="email_id"  value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Sí</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="PhoneModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-exclamation-triangle"></i> Confirmación</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>¿Está seguro de que desea modificar la verificación de teléfono de este usuario?</strong>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ route('phone-block') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="phone_id" class="phone_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Sí</button>
                    </form>
                </div>
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
                    <strong>¿Está seguro que quiere borrar a este usuario?</strong>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ route('user-delete') }}" class="form-inline">
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
            $(document).on("click", '.block_button', function (e) {
                var id = $(this).data('id');
                $(".block_id").val(id);
            });
            
             $(document).on("click", '.email_button', function (e) {
                var id = $(this).data('id');
                $("#email_id_input").val(id);
                $(".email_id").val(id);
            });
            
            $(document).on("click", '.phone_button', function (e) {
                var id = $(this).data('id');
                $(".phone_id").val(id);
            });
            
            
            $(document).on("click", '.confirm_button', function (e) {
                var id = $(this).data('id');
                $(".confirm_id").val(id);
            });
            
            $('#payment').on('change', function() {
            window.location.href =  $('#payment').val();
            });
         
            $('#search-btn').on('click', function() {
                const input = document.getElementById('search_input').value;
                if(input !== '')
                    window.location.href =  "https://tradingescuela.com/admin/manage-user-email" + "/" + input;
            });
            
            
        });
        
        //disable space input in search input box
        $(document).ready(function () {
            search_input.oninput = function() {
                str = this.value.replace(/ /g,'');
                this.value = str;
            };
        });
    </script>
@endsection