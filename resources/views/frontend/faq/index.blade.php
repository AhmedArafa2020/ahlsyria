@extends('frontend.layouts.master')
@section('title', @$data['title'])
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plyr/plyr.css') }}">
@endsection


@section('content')
<!--Bradcam S t a r t -->
@include('frontend.partials.levels_breadcrumb', [
    'breadcumb_title'       => 'الاسئلة الشائعة',
    'breadcumb_sub_title'   => null,
])
<!--End-of Bradcam  -->


<!-- course-details  S t a r t-->
<div class="ot-course-details section-padding2 mt-10 faq-container">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="ot-course-details-inner">
                    

                    <div class="theme-according mb-24" id="accordion1">
                        @foreach ($data['faqs'] as $item)
                            <div class="card">
                                <div class="card-header pink_bg" id="four{{ $item->id }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link text-white collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour{{ $item->id }}" aria-expanded="false" aria-controls="four{{ $item->id }}">
                                            <span class="course-curriculum-title">
                                                {{ $item->title }}
                                            </span>
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseFour{{ $item->id }}" data-parent="#accordion1">
                                    <div class="card-body">
                                        {!! nl2br($item->content) !!}
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
<!-- End-of course-details-->

@endsection


@section('scripts')
<script src="{{ asset('frontend/js/__course.js') }}" type="module"></script>
@endsection