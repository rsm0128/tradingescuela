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
                        <h4 class="card-title" id="horz-layout-basic">Title : {{$signal->title}}</h4>
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

    <div class="page-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Comentarios y puntaje</h4>
                    </div>
                    <hr>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active text-uppercase" id="active-tab" data-toggle="tab" href="#active" aria-controls="active" aria-expanded="true">
                                            <h4>Comentarios de Señal</h4>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" id="link-tab" data-toggle="tab" href="#link" aria-controls="link" aria-expanded="false">
                                            <h4>Puntajes de Señal</h4>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div role="tabpanel" class="tab-pane in active" id="active" aria-labelledby="active-tab" aria-expanded="true">

                                        <div class="comments-container">
                                            <h3>Comentarios ({{ $total_comment }})</h3>

                                            <ul id="comments-list" class="comments-list">
                                                @foreach($comments as $com)

                                                    @if($com->user_id == 0)
                                                        <li>
                                                            <div class="comment-main-level">
                                                                <div class="comment-avatar">
                                                                    <img src="{{ asset('assets/images/user-default.png') }}" alt="">
                                                                </div>
                                                                <div class="comment-box">
                                                                    <div class="comment-head">
                                                                        <h6 class="comment-name">Admin</h6>
                                                                        <span style="margin-top: -4px;">{{ \Carbon\Carbon::parse($com->created_at)->diffForHumans() }}</span>
                                                                    </div>
                                                                    <div class="comment-content">
                                                                        {{ $com->comment }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <div class="comment-main-level">
                                                                <div class="comment-avatar">
                                                                    @if(Auth::user()->image != null)
                                                                        <img src="{{ asset('assets/images') }}/{{ $com->user->image }}" alt="">
                                                                    @else
                                                                        <img src="{{ asset('assets/images/user-default.png') }}" alt="">
                                                                    @endif
                                                                </div>
                                                                <div class="comment-box">
                                                                    <div class="comment-head">
                                                                        <h6 class="comment-name">{{ $com->user->name }}</h6>
                                                                        <span style="margin-top: -4px;">{{ \Carbon\Carbon::parse($com->created_at)->diffForHumans() }}</span>
                                                                    </div>
                                                                    <div class="comment-content">
                                                                        {{ $com->comment }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endif

                                                @endforeach
                                                <li>
                                                    <div class="comment-main-level">
                                                        <!-- Avatar -->
                                                        <div class="comment-avatar">
                                                            @if(Auth::user()->image != null)
                                                                <img src="{{ asset('assets/images') }}/{{ Auth::user()->image }}" alt="">
                                                            @else
                                                                <img src="{{ asset('assets/images/user-default.png') }}" alt="">
                                                            @endif
                                                        </div>
                                                        <div class="comment-box">
                                                            <div class="comment-head">
                                                                <h6 class="comment-name">{{ Auth::user()->name }} - {{ Auth::user()->plan->name }}</h6>
                                                            </div>
                                                            <div class="comment-content">
                                                                <form action="{{ route('comment-submit') }}" method="post">
                                                                    {!! csrf_field() !!}
                                                                    <input type="hidden" name="signal_id" value="{{ $signal->id }}">
                                                                    <textarea name="comment" id="" required cols="30" rows="3" placeholder="Escribe tu comentario aquí." class="form-control"></textarea>
                                                                    <br>
                                                                    <button type="submit" class="btn btn-primary btn-lg btn-block bg-softwarezon-x "> <i class="fa fa-send"></i> Subir Comentario</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="link" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                        <div class="comments-container">
                                            <h3>Puntajes - {!! \App\TraitsFolder\CommonTrait::getRating($final_rating) !!} ({{ $total_rating }})</h3>

                                            <ul id="comments-list" class="comments-list">
                                                @foreach($rating as $com)
                                                    @if($com->user_id == 0)
                                                        <li>
                                                            <div class="comment-main-level">
                                                                <div class="comment-avatar">
                                                                    <img src="{{ asset('assets/images/user-default.png') }}" alt="">
                                                                </div>
                                                                <div class="comment-box">
                                                                    <div class="comment-head">
                                                                        <h6 class="comment-name">Admin - {!! \App\TraitsFolder\CommonTrait::getRating($com->rating)  !!} ({{$com->rating}})</h6>
                                                                        <span style="margin-top: -4px;">{{ \Carbon\Carbon::parse($com->created_at)->diffForHumans() }}</span>
                                                                    </div>
                                                                    <div class="comment-content">
                                                                        {{ $com->comment }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <div class="comment-main-level">
                                                                <div class="comment-avatar">
                                                                    @if(Auth::user()->image != null)
                                                                        <img src="{{ asset('assets/images') }}/{{ $com->user->image }}" alt="">
                                                                    @else
                                                                        <img src="{{ asset('assets/images/user-default.png') }}" alt="">
                                                                    @endif
                                                                </div>
                                                                <div class="comment-box">
                                                                    <div class="comment-head">
                                                                        <h6 class="comment-name">{{ $com->user->name }} - {!! \App\TraitsFolder\CommonTrait::getRating($com->rating)  !!} ({{$com->rating}})</h6>
                                                                        <span style="margin-top: -4px;">{{ \Carbon\Carbon::parse($com->created_at)->diffForHumans() }}</span>
                                                                    </div>
                                                                    <div class="comment-content">
                                                                        {{ $com->comment }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endif

                                                @endforeach
                                                @if($user_rating == null)
                                                    <li>
                                                        <div class="comment-main-level">
                                                            <!-- Avatar -->
                                                            <div class="comment-avatar"><img src="{{ asset('assets/images') }}/{{ Auth::user()->image }}" alt=""></div>
                                                            <div class="comment-box">
                                                                <div class="comment-head">
                                                                    <h6 class="comment-name">{{ Auth::user()->name }} - {{ Auth::user()->plan->name }}</h6>
                                                                </div>
                                                                <div class="comment-content">
                                                                    <form action="{{ route('rating-submit') }}" method="post">
                                                                        {!! csrf_field() !!}
                                                                        <input type="hidden" name="signal_id" value="{{ $signal->id }}">
                                                                        <div class="listing_rating" style="margin-top:10px;">
                                                                            <input name="rating" id="rating-1" value="5" type="radio" required="">
                                                                            <label for="rating-1" class="fa fa-star"></label>
                                                                            <input name="rating" id="rating-2" value="4" type="radio" required="">
                                                                            <label for="rating-2" class="fa fa-star"></label>
                                                                            <input name="rating" id="rating-3" value="3" type="radio" required="">
                                                                            <label for="rating-3" class="fa fa-star"></label>
                                                                            <input name="rating" id="rating-4" value="2" type="radio" required="">
                                                                            <label for="rating-4" class="fa fa-star"></label>
                                                                            <input name="rating" id="rating-5" value="1" type="radio" required="">
                                                                            <label for="rating-5" class="fa fa-star"></label>
                                                                        </div>
                                                                        <textarea name="comment" id="" required cols="30" rows="3" placeholder="Escribe tu comentario aquí." class="form-control"></textarea>
                                                                        <br>
                                                                        <button type="submit" class="btn btn-primary btn-lg btn-block bg-softwarezon-x "> <i class="fa fa-send"></i> Subir Comentario</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!---ROW-->

@endsection

