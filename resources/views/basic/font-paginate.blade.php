@if ($paginator->hasPages())
    <div class="blog-nav p-t-b-80">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <div class="col-xs-3 p0 pull-left text-left">
                    <a href="#" disabled="" class="ion-ios-arrow-thin-left icon-2x"></a>
                </div>
            @else
                <div class="col-xs-3 p0 pull-left text-left">
                    <a href="{{ $paginator->previousPageUrl() }}" class="ion-ios-arrow-thin-left icon-2x"></a>
                </div>
            @endif

            <div class="col-xs-6 text-center">
                <ul class="list-inline">
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="disabled"><span>{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="blog-other-pages"><a class="text-light">{{ $page }}</a></li>
                                @else
                                    <li class="blog-other-pages"><a class="text-light" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </ul>
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <div class="col-xs-3 p0 pull-right text-right">
                    <a href="{{ $paginator->nextPageUrl() }}" class="ion-ios-arrow-thin-right icon-2x"></a>
                </div>
            @else
                <div class="col-xs-3 p0 pull-right text-right">
                    <a href="" disabled="" class="ion-ios-arrow-thin-right icon-2x"></a>
                </div>
            @endif
    </div>
@endif


{{--
<div class="blog-nav p-t-b-80">
    <div class="col-xs-3 p0 pull-left text-left">
        <a href="" class="ion-ios-arrow-thin-left icon-2x"></a>
    </div>
    <div class="col-xs-6 text-center">
        <ul class="list-inline">
            <li class="blog-other-pages"><a class="text-light" href="">1</a></li>
            <li class="blog-other-pages"><a class="text-light" href="">2</a></li>
            <li class="blog-other-pages"><a class="text-light" href="">3</a></li>
            <li class="blog-other-pages"><a class="text-light" href="">4</a></li>
        </ul>
    </div>
    <div class="col-xs-3 p0 pull-right text-right">
        <a href="" class="ion-ios-arrow-thin-right icon-2x"></a>
    </div>
</div>--}}
