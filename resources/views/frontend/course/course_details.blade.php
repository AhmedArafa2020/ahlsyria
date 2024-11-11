@extends('frontend.layouts.master')
@section('title', @$data['title'])
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plyr/plyr.css') }}">
@endsection

@push('meta')
    <meta itemprop="name" content="{{ @$data['course']->meta_title }}">
    <meta itemprop="image" content="{{ showImage(@$data['course']->metaImage->original) }}">
    <meta itemprop="description" content="{{ @$data['course']->meta_description }}">
    <meta name="twitter:title" content="{{ @$data['course']->meta_title }}">
    <meta name="twitter:image" content="{{ showImage(@$data['course']->metaImage->original) }}">
    <meta name="twitter:description" content="{{ @$data['course']->meta_description }}">
    <meta property="og:site_name" content="{{ @$data['course']->meta_title }}" />
    <meta property="og:title" content="{{ @$data['course']->meta_title }}" />
    <meta property="og:description" content="{{ @$data['course']->meta_description }}" />
    <meta property="og:image" content="{{ showImage(@$data['course']->metaImage->original) }}" />
    <meta name="description" content="{{ @$data['course']->meta_description }}">
    <meta name="keywords" content="{{ @$data['course']->meta_keyword }}">
@endpush
@section('content')
    <section class="d-flex flex-column justify-content-center align-items-center container-fluid top">
        <div class="d-flex flex-column justify-content-center align-items-start  right">
            <div class="d-flex justify-content-center align-items-center top-1">
                @if (!empty($data['course']->category))
                    <button>{{ $data['course']->category->title }}</button>
                @endif
                <p>بواسطة {{ $data['course']->instructor_name }}</p>
            </div>

            <div class="top-2">
                <p> {{ @$data['course']->title }}</p>
            </div>

            <div class="d-flex justify-content-center align-items-center top-3">
                <div class="top-3-1">
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_389_1630)">
                            <path
                                d="M8.75 1.15039H2.75C2.2 1.15039 1.75 1.60039 1.75 2.15039V9.15039H2.75V2.15039H8.75V1.15039ZM8.25 3.15039L11.25 6.15039V11.1504C11.25 11.7004 10.8 12.1504 10.25 12.1504H4.745C4.195 12.1504 3.75 11.7004 3.75 11.1504L3.755 4.15039C3.755 3.60039 4.2 3.15039 4.75 3.15039H8.25ZM7.75 6.65039H10.5L7.75 3.90039V6.65039Z"
                                fill="#29ABE2" />
                        </g>
                        <defs>
                            <clipPath id="clip0_389_1630">
                                <rect width="12" height="12" fill="white" transform="translate(0.75 0.650391)" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span>{{ $data['course']->lessons->count() }} درساً</span>
                </div>
                <div class="top-3-1">
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_389_1619)">
                            <path
                                d="M10.5 -0.0996094H13.5V13.4004H10.5V-0.0996094ZM0 7.40039H3V13.4004H0V7.40039ZM5.25 3.65039H8.25V13.4004H5.25V3.65039Z"
                                fill="#29ABE2" />
                        </g>
                        <defs>
                            <clipPath id="clip0_389_1619">
                                <rect width="12" height="12" fill="white" transform="translate(0.75 0.650391)" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span>جميع المستويات</span>
                </div>
                <div class="top-3-1">
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_389_1608)">
                            <path
                                d="M3.25 7.24039V9.24039L6.75 11.1504L10.25 9.24039V7.24039L6.75 9.15039L3.25 7.24039ZM6.75 2.15039L1.25 5.15039L6.75 8.15039L11.25 5.69539V9.15039H12.25V5.15039L6.75 2.15039Z"
                                fill="#29ABE2" />
                        </g>
                        <defs>
                            <clipPath id="clip0_389_1608">
                                <rect width="12" height="12" fill="white" transform="translate(0.75 0.650391)" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span> 156 طالباً</span>
                </div>
                <div class="top-3-1">
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_389_1595)">
                            <path
                                d="M6.75195 1.64941C4.00195 1.64941 1.75195 3.89941 1.75195 6.64941C1.75195 9.39941 4.00195 11.6494 6.75195 11.6494C9.50195 11.6494 11.752 9.39941 11.752 6.64941C11.752 3.89941 9.50195 1.64941 6.75195 1.64941ZM8.85195 8.74941L6.25195 7.14941V4.14941H7.00195V6.74941L9.25195 8.09941L8.85195 8.74941Z"
                                fill="#29ABE2" />
                        </g>
                        <defs>
                            <clipPath id="clip0_389_1595">
                                <rect width="12" height="12" fill="white" transform="translate(0.75 0.650391)" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span>{{ minutes_to_hours($data['course']->lessons()->where('is_quiz', 0)->sum('duration')) }}
                        ساعة</span>
                </div>
            </div>
        </div>



        <div class="left">
            <img src="{{ showImage(@$data['course']->metaImage->original, 'cource-details.png') }}" alt="images">
            <div class="d-flex justify-content-center align-items-center top-2"  id="course-summary" data-val="{{ encrypt(@$data['course']->id) }}">

              
                @if (auth()->check() &&
                        auth()->user()->userCourseEnroll->where('course_id', $data['course']->id)->count() > 0)
                    @if (auth()->user()->userCourseEnroll->where('course_id', $data['course']->id)->where('approved', 1)->count() > 0)
                        <a @if (@$data['course']->firstLesson) href="{{ route('student.course.learn', [@$data['course']->slug, encryptFunction(@$data['course']->firstLesson->id)]) }}"
                @else
                href="{{ route('student.course.learn', [@$data['course']->slug, 'no_lesson']) }}" @endif
                            class="btn-primary-outline w-100">{{ ___('student.Start Learning') }}</a>
                    @else
                        <div class="border border-2 rounded-pill p-2 text-center">
                            {{ ___('student.Pending Approval') }}
                        </div>
                    @endif
                @else
                    <button
                        class="btn-primary-fill mb-16 d-flex align-items-center justify-content-center w-100 offer_couter checkout">
                        انضم للتدريب
                    </button>
                    
                @endif



                @if ($data['course']->is_free === 1)
                    <p>مجاناً</p>
                @elseif(module('Subscription') && setting('subscription_setup') && @$data['package_included'])
                    <h4>{{ ___('frontend.Free') }}</h4>
                    <small class="ml-2 text-tertiary">
                        ({{ ___('subscription.Package') }})
                    </small>
                    <!-- package course enroll end-->
                @else
                    @if ($data['course']->is_discount === 11)
                        <h4>{{ showPrice(discount_price($data['course'])) }}</h4>
                        <h5 class="text-decoration-line-through m-0">
                            {{ showPrice(@$data['course']->price) }}
                        </h5>
                    @else
                        <h4> {{ showPrice(@$data['course']->price) }}</h4>
                    @endif
                @endif

            </div>
        </div>
    </section>

    <section class="container bottom">
        <div class="box-container">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item li-right" role="presentation">
                    <a class="li-right" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">نظرة عامة</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="li-center active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                        type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">المنهج</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="li-left" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                        type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">المدرس</a>
                </li>
            </ul>


            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">


                    @if (@$data['course']->outcomes)
                        <!-- course outcomes s t a r t  -->
                        <div class="course-tab-widget">
                            <h3 class="course-details-title">
                                {{ ___('frontend.What You will Learn From This course') }}</h3>
                            <ul class="course-details-list">
                                <?= $data['course']->outcomes ?>
                            </ul>
                        </div>
                        <!--End-of outcomes tab  -->
                    @endif

                    <div class="course-tab-widget">
                        <h3 class="course-details-title">{{ ___('frontend.Description') }}</h3>
                        <ul class="course-details-list">
                            <?= $data['course']->description ?>
                        </ul>
                    </div>

                </div>
                <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel"
                    aria-labelledby="profile-tab" tabindex="0" style="width: 100%">
                    <div class="box-content">
                        <p>
                            {{ @$data['course']->short_description }}
                        </p>
                    </div>

                    @if (@$data['course']->sections->count() > 0)
                        {{-- go to  frontend.partials.course.curriculum --}}
                        <?= $data['curriculum'] ?>
                    @else
                        <div class="text-left">
                            <p class="text-left">{{ ___('frontend.No Curriculum Found') }}</p>
                        </div>
                    @endif

                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">
                    {{ @$data['course']->instructor_name }}
                </div>
            </div>




        </div>
    </section>
@endsection


@section('scripts')
    <script src="{{ asset('frontend/js/__course.js') }}" type="module"></script>
@endsection
