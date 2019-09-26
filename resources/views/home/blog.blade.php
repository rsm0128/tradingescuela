@extends('layouts.frontEnd')
@section('content')

    <div class="expert-section gray-bg breadcrumb-area" style="background: url('{{ asset('assets/images') }}/{{ $basic->breadcrumb }}');">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h3 class="breadcrumb-title">{{ $page_title }}</h3>
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb-list">
                            <li><a href="{{ route('home') }}">Home </a></li>
                            <li><a href="#">{{ $page_title }} </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="expert-section expert-blog-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-lg-push-3 col-md-8 col-md-push-4 col-sm-12">

                    @if(count($blog) == 0)
                        <article class="blog-post">
                            <div class="post-thumbnail">
                                <h3 class="text-center">¡Blog no encontrado!</h3>
                            </div>
                        </article>
                    @else
                        @foreach($blog as $b)

                            <article class="blog-post">
                                <div class="post-thumbnail">
                                    <a href="#"><img class="img-responsive" src="{{ asset('assets/images/post') }}/{{ $b->image }}" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <div class="post-content-inner">
                                        <h3><a href="{{ route('blog-details',$b->slug) }}">{{ substr($b->title,0,35) }}</a></h3>
                                        <ul class="post-date list-inline">
                                            <li><a href="{{ route('blog-details',$b->slug) }}"><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($b->created_at)->format('dS M, Y') }}</a></li>
                                            <li><a href="{{ route('category-blog',$b->category->slug)}}"><i class="fa fa-flag"></i>{{ $b->category->name }}</a></li>
                                        </ul>
                                        <p>{{ substr(strip_tags($b->description),0,450) }}{{ strlen($b->description) > 450 ? '...' : '' }}</p>
                                    </div>
                                    <div class="read-more">
                                        <a href="{{ route('blog-details',$b->slug) }}" class="button">Leer más</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        <div class="text-center">
                            {!! $blog->links('basic.pagination') !!}
                        </div>
                    @endif

                </div>
                <div class="col-lg-3 col-lg-pull-9 col-md-4 col-md-pull-8 col-sm-12">
                    <aside class="single-widget">
                        <h4 class="widget-title">Categorías</h4>
                        <ul class="post-cat-list">
                            @foreach($category as $cat)
                            <li><a href="{{ route('category-blog',$cat->slug) }}">{{ $cat->name }} <span>[{{ \App\Post::whereCategory_id($cat->id)->count() }}]</span></a></li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="single-widget">
                        <h4 class="widget-title">Post Popular</h4>
                        <div class="recent-post-widget">
                            @foreach($popular as $p)
                            <div class="single-post-widget clearfix">
                                <img src="{{ asset('assets/images/post') }}/{{ $p->image }}" alt="" style="width: 80px;">
                                <div class="post-widget-content">
                                    <h4><a href="{{ route('blog-details',$p->slug) }}">{{ substr($p->title,0,15) }}..</a></h4>
                                    <p>{{ \Carbon\Carbon::parse($p->created_at)->format('dS M, y h:i A') }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>


@endsection