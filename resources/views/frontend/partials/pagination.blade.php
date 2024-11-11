@if ($paginator->hasPages())
    <div class="pagination mt-30">
        <ul class="pagination-list mb-10">
            @if ($paginator->onFirstPage())
                <li class="wow ladeInRight disabled"  data-wow-delay="0.0s">
                    <a href="javascript:;" class="btn-pagination">
                        {{-- <i class="ri-arrow-left-s-fill"></i> --}}
                      السابق
                    </a>
                </li>
            @else
                <li>
                    <a class="btn-pagination {{@$event}}" href="{{ $paginator->previousPageUrl() }}" rel="prev" onclick="scrollToTop()">
                        {{-- <i class="ri-arrow-left-s-fill"></i> --}}
                      السابق
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled page-number"><span>{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a href="javascript:;" class="page-number current">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}" class="page-number {{@$event}}" onclick="scrollToTop()">{{ $page }} </a></li>
                          
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li>
                    <a class="btn-pagination {{$event}}" href="{{ $paginator->nextPageUrl() }}" rel="prev" onclick="scrollToTop()">
                        {{-- <i class="ri-arrow-right-s-fill"></i> --}}
                        التالي
                    </a>
                </li>
            @else
                <li class="disabled" >
                    {{-- <span>
                        <i class="ri-arrow-right-s-fill"></i>
                        »
                    </span> --}}
                    <a class="btn-pagination " href="javascript:;" >
                        {{-- <i class="ri-arrow-right-s-fill"></i> --}}
                        التالي
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif
