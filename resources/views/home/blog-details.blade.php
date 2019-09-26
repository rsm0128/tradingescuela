@extends('layouts.frontEnd')
@section('meta')
    <meta name="description" content="{{ substr(strip_tags($blog->description),0,450) }}">
    <meta name="keyword" content="{{ $blog->tagss }}">
    <meta name="author" content="{{ $basic->author }}">
    <meta property="og:title" content="{{ $site_title }}" />
    <meta property="og:description" content="{{ substr(strip_tags($blog->description),0,450) }}" />
    <meta property="og:image" content="{{ asset('assets/images/post') }}/{{ $blog->image }}" />
@endsection
@section('content')

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1421567158073949";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <div class="expert-section gray-bg breadcrumb-area" style="background: url('{{ asset('assets/images') }}/{{ $basic->breadcrumb }}');">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h3 class="breadcrumb-title">Blogs</h3>
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb-list">
                            <li><a href="{{ route('home') }}">Inicio </a></li>
                            <li><a href="#">Blogs </a></li>
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

                    <article class="blog-post">
                        <div class="post-thumbnail">
                            <a href="#"><img class="img-responsive" src="{{ asset('assets/images/post')}}/{{ $blog->image }}" alt=""></a>
                        </div>
                        <div class="post-content">
                            <div class="post-content-inner">
                                <h3><a href="#">{{ $blog->title }}</a></h3>
                                <ul class="post-date list-inline">
                                    <li><a href="#"><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('dS M, Y h:i A') }}</a></li>
                                    <li><a href="#"><i class="fa fa-flag"></i>{{ $blog->category->name }}</a></li>
                                </ul>
                                <p>{!! $blog->description !!}</p>
                            </div>
                        </div>
                    </article>
                    <div class="blog-comment-section">
                        <h4 class="comment-title">Compartir este blog</h4>
                        <ul class="media-list">
                            <div class="sharethis-inline-share-buttons st-inline-share-buttons  st-left st-has-labels st-animated" id="st-1">
                                <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons"></script>
                            </div>
                        </ul>
                    </div>
                    <div class="blog-comment-section">
                        <h4 class="comment-title">Deja tu comentarios</h4>
                        <div class="comment-form">
                            <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
                        </div>
                    </div>

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