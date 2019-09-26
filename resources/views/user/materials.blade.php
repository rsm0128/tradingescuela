@extends('layouts.user')

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
                <div class="row">
                    @if($size==0)
                        <div class="text-center">
                            <h5>¡Parece que tu plan no tiene material aún!</h5>
                        </div>
                    @else
                        @foreach($materials as $k => $m)
                            @if(!$m->is_video)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card" style="position:inline-block;">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $m->title }}</h4>
                                            <hr />
                                            <a href="{{ $m->url }}" target="_blank">
                                                <img src=" {{ asset('assets/images/material') }}/{{ $m->picture }}" alt="{{$m->url}}" class="img-responsive" style="max-height: 210px">
                                            </a>
                                            <p class="pt-3">{{$m->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card" style="position:inline-block;">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $m->title }}</h4>
                                            <hr />
                                            <iframe
                                                width="100%" height="210px"
                                                frameBorder="0"
                                                src="{{ $m->url }}"
                                                allowfullscreen="allowfullscreen">
                                            </iframe>
                                            <p class="pt-3">{{$m->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif    
                </div>    
            </div>
        </div>
    </div>
@endsection
    