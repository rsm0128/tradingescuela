@extends('layouts.user')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
@endsection
@section('content')


    <div class="page-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Título : {{$signal->title}}</h4>
                    </div>
                    <hr>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            {!!$signal->description!!}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div><!---ROW-->

@endsection

