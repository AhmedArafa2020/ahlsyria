@extends('frontend.layouts.master')
@section('title', @$data['title'] ?? 'Blogs')
@section('content')
<!--Bradcam S t a r t -->
@include('frontend.partials.breadcrumb', [
'breadcumb_title' => @$data['title'],
])

<!--End-of Bradcam  -->
<!-- Blog Area S t a r t -->
<div class="ot-sidebar-overlay"></div>
<section class="blog-area mb-30 ot-filter-course forum-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 forum-container">
                <div class="row">
                    <div class="col-lg-12">
                        {{ $data['blogs']->links('frontend.layouts.partials.pagination') }}
                    </div>
                </div>
                <div class="row g-24">
                    @foreach ($data['blogs'] as $key => $blog)
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="blog_outer">
                                <div class="blog_inner">
                                    {{-- <div class="blog_image">
                                        <a href="{{ route('blog_details', $blog->id) }}">
                                            <img src="{{ showImage(@$blog->iconImage->original, 'backend/uploads/default-images/blog/blog'.$key + 1 .'.jpg') }}"
                                                alt="img" class="img-cover">
                                        </a>
                                    </div> --}}
                                    <div class="blog-click-here">
                                        {{-- <a href="{{ route('blog_details', $blog->id) }}">
                                            <img src="{{ showImage(@$blog->iconImage->original, 'backend/uploads/default-images/blog/blog'.$key + 1 .'.jpg') }}"
                                                alt="img" class="img-cover">
                                        </a> --}}
                                        <a href="{{ route('blog_details', $blog->id) }}" class="click-here-btn">
                                            اضغط هنا
                                        </a>
                                    </div>
        
                                    <div class="blog_content">
                                        <h3>
                                            {{-- <a href="{{ route('blog_details', $blog->id) }}" class="title colorEffect line-clamp-2 font-600"> {{ Str::limit(@$blog->title, 20)}}</a> class="title">{{ @$blog->title }}</a> --}}
                                            <a href="{{ route('blog_details', $blog->id) }}" class="title">
                                                {{ @$blog->title }}
                                            </a>
                                        </h3>
                                        {{-- <p class="pera mb-15">{{ Str::limit(strip_tags(@$blog->description), 100) }}</p> --}}
                                        <div class="footer">
                                            <div class="blog_line mt-3"></div>
                                            <div class="content">
                                                <div class="d-flex align-items-center">
                                                    <div class="icon_bg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24">
                                                            <g id="vuesax_outline_calendar" data-name="vuesax/outline/calendar"
                                                                transform="translate(-492 -188)">
                                                                <g id="calendar">
                                                                    <path id="Vector"
                                                                        d="M.75,4.5A.755.755,0,0,1,0,3.75v-3A.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75v3A.755.755,0,0,1,.75,4.5Z"
                                                                        transform="translate(499.25 189.25)" fill="#292d32" />
                                                                    <path id="Vector-2" data-name="Vector"
                                                                        d="M.75,4.5A.755.755,0,0,1,0,3.75v-3A.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75v3A.755.755,0,0,1,.75,4.5Z"
                                                                        transform="translate(507.25 189.25)" fill="#292d32" />
                                                                    <path id="Vector-3" data-name="Vector"
                                                                        d="M1,1.994a1,1,0,0,1-.38-.08A1.032,1.032,0,0,1,.29,1.7,1.033,1.033,0,0,1,0,.994,1,1,0,0,1,.08.614,1.155,1.155,0,0,1,.29.284,1.032,1.032,0,0,1,.62.074a1.021,1.021,0,0,1,1.09.21A1.052,1.052,0,0,1,2,.994a1.5,1.5,0,0,1-.02.2.636.636,0,0,1-.06.18.757.757,0,0,1-.09.18,1.576,1.576,0,0,1-.12.15A1.052,1.052,0,0,1,1,1.994Z"
                                                                        transform="translate(499.5 200.506)" fill="#292d32" />
                                                                    <path id="Vector-4" data-name="Vector"
                                                                        d="M1,2a1,1,0,0,1-.38-.08,1.032,1.032,0,0,1-.33-.21A1.033,1.033,0,0,1,0,1,1,1,0,0,1,.08.619,1.155,1.155,0,0,1,.29.289,1.032,1.032,0,0,1,.62.079a1,1,0,0,1,1.09.21A1.052,1.052,0,0,1,2,1a1.5,1.5,0,0,1-.02.2.636.636,0,0,1-.06.18.757.757,0,0,1-.09.18,1.576,1.576,0,0,1-.12.15A1.052,1.052,0,0,1,1,2Z"
                                                                        transform="translate(503 200.501)" fill="#292d32" />
                                                                    <path id="Vector-5" data-name="Vector"
                                                                        d="M1,2a1,1,0,0,1-.38-.08,1.032,1.032,0,0,1-.33-.21l-.12-.15a.757.757,0,0,1-.09-.18A.636.636,0,0,1,.02,1.2,1.5,1.5,0,0,1,0,1,1.052,1.052,0,0,1,.29.289,1.032,1.032,0,0,1,.62.079a1,1,0,0,1,1.09.21A1.052,1.052,0,0,1,2,1a1.5,1.5,0,0,1-.02.2.636.636,0,0,1-.06.18.757.757,0,0,1-.09.18,1.576,1.576,0,0,1-.12.15A1.052,1.052,0,0,1,1,2Z"
                                                                        transform="translate(506.5 200.501)" fill="#292d32" />
                                                                    <path id="Vector-6" data-name="Vector"
                                                                        d="M1,1.987a1,1,0,0,1-.38-.08A1.155,1.155,0,0,1,.29,1.7,1.052,1.052,0,0,1,0,.987,1,1,0,0,1,.08.607.933.933,0,0,1,.29.278a1.047,1.047,0,0,1,1.42,0A1.052,1.052,0,0,1,2,.987a1.052,1.052,0,0,1-.29.71A1.052,1.052,0,0,1,1,1.987Z"
                                                                        transform="translate(499.5 204.013)" fill="#292d32" />
                                                                    <path id="Vector-7" data-name="Vector"
                                                                        d="M1,1.987A1.052,1.052,0,0,1,.29,1.7,1.052,1.052,0,0,1,0,.987,1,1,0,0,1,.08.607.933.933,0,0,1,.29.278a1.047,1.047,0,0,1,1.42,0,.933.933,0,0,1,.21.33A1,1,0,0,1,2,.987a1.052,1.052,0,0,1-.29.71A1.052,1.052,0,0,1,1,1.987Z"
                                                                        transform="translate(503 204.013)" fill="#292d32" />
                                                                    <path id="Vector-8" data-name="Vector"
                                                                        d="M1,2a1.052,1.052,0,0,1-.71-.29.933.933,0,0,1-.21-.33A1,1,0,0,1,0,1,1,1,0,0,1,.08.621.933.933,0,0,1,.29.291a1,1,0,0,1,.9-.27.6.6,0,0,1,.19.06.757.757,0,0,1,.18.09,1.576,1.576,0,0,1,.15.12A1.052,1.052,0,0,1,2,1a1.052,1.052,0,0,1-.29.71A1.052,1.052,0,0,1,1,2Z"
                                                                        transform="translate(506.5 203.999)" fill="#292d32" />
                                                                    <path id="Vector-9" data-name="Vector"
                                                                        d="M17.75,1.5H.75A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h17a.755.755,0,0,1,.75.75A.755.755,0,0,1,17.75,1.5Z"
                                                                        transform="translate(494.75 196.34)" fill="#292d32" />
                                                                    <path id="Vector-10" data-name="Vector"
                                                                        d="M13.75,20h-8C2.1,20,0,17.9,0,14.25V5.75C0,2.1,2.1,0,5.75,0h8C17.4,0,19.5,2.1,19.5,5.75v8.5C19.5,17.9,17.4,20,13.75,20Zm-8-18.5C2.89,1.5,1.5,2.89,1.5,5.75v8.5c0,2.86,1.39,4.25,4.25,4.25h8c2.86,0,4.25-1.39,4.25-4.25V5.75c0-2.86-1.39-4.25-4.25-4.25Z"
                                                                        transform="translate(494.25 190.75)" fill="#292d32" />
                                                                    <path id="Vector-11" data-name="Vector" d="M0,0H24V24H0Z"
                                                                        transform="translate(492 188)" fill="none" opacity="0" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <p class="font-600 mx-2">
                                                        {{-- {{ $blog->created_at->locale('ar')->diffForHumans() }} --}}
                                                        {{-- {{ $blog->created_at->locale('ar_SA')->format('d F Y') }} --}}
                                                        {{$blog->created_at->locale("ar_SA")->translatedFormat("d F Y")}}
                                                    </p>
                                                </div>
                                                <a href="{{ route('blog_details', $blog->id) }}" {{--
                                                    class="title colorEffect line-clamp-2 font-600">{{ Str::limit(@$blog->title, 20)
                                                    }}</a> --}}
                                                    class="title">
                                                    <p class="font-600">
                                                        قراءة المزيد
                                                        <i class="ri-arrow-left-line"></i>
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 filter-container">
                <div class="sidebar-wrapper filters_container bg-transparent mb-24 mt-40 mb-20">
                    <!-- Mobile Device -->
                    <div id="otSidebarBtnOpen" class="responsive-bar">
                        <div class="sticky-icon">
                            <i class="ri-equalizer-line"></i>
                            <span>{{ ___('forum.Filters') }}</span>
                        </div>
                    </div>
                    <nav class="ot-sidebar" id="ot-sidebar">
                        <div class="ot-sidebar-btn-close" id="otSidebarBtnClose"><i class="ri-close-fill"></i></div>
                        <div class="featured-topic">
                            <h4 class="fourm-title"> التصنيفات </h4>
                            <a href="{{ route('blogs') }}" class="text-hover-question">
                                <div class="d-flex title font-400 mb-2 line-clamp-2 gap-10 text-hover">
                                    <p class="text-title line-clamp-1 colorEffect text-paragraph text-16">
                                        حميع النتائج
                                    </p>
                                    <span>
                                        {{@$data['categories']->sum('blogs_count')}}
                                    </span>
                                </div>
                            </a>
                            @foreach (@$data['categories'] ?? [] as $item)
                                <a href="{{ route('blogs', ['category' => $item->id]) }}" class="text-hover-question">
                                    <div class="d-flex title font-400 mb-2 line-clamp-2 gap-10 text-hover">
                                        <p class="text-title line-clamp-1 colorEffect text-paragraph text-16 mt-10">
                                            {{ $item->title }}
                                        </p>
                                        <span>
                                            {{$item->blogs_count}}
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    <nav>
                </div>
            </div>
        </div>
        
    </div>
</section>
<!-- End-of Blog -->
<style>
</style>
@endsection
@section('scripts')
@endsection