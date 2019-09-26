@extends('layouts.subscriberdashboard')

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
                        @include('dashboard.subscriber-table-users-expired-memberships')
                    </div>
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
                    window.location.href =  "https://tradingescuela.com/subscriber/manage-user-email" + "/" + input;
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