@extends('layouts.user')
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

                            <div class="row">
                                @foreach($method as $pm)
                                    <div class="col-md-3">
                                        <div class="card text-white box-shadow-0 bg-gradient-x2-primary">
                                            <div class="card-content collpase show">
                                                <div class="card-body text-center">
                                                    <h3 class="text-uppercase font-weight-bold text-center" id="horz-layout-basic">{{$pm->name}}</h3>
                                                    <br>
                                                    <img src="{{ asset('assets/images/withdraw') }}/{{$pm->image}}" style="width:100%;" alt="">
                                                    <br>
                                                    <br>
                                                        <a href="{{ route('user-withdraw-method',$pm->id) }}" class="btn text-white btn-grd-primary font-weight-bold text-uppercase">Retirar Ahora</a>
                                                    <br>
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
@endsection
@section('scripts')
@endsection