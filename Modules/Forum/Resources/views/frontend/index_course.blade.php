@section('css')
    <link rel="stylesheet" href="{{ asset('modules/forum/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/forum/summernote/summernote.css') }}">
@endsection
<div>
<!-- Get-in Touch S t a r t-->
    <div class="ot-sidebar-overlay"></div>
    <section class="ot-filter-course forum-sidebar section-padding converted-css-forum">
        <div class="container">
            <!-- Search -->
            <div class="row mb-20">
                <div class="col-lg-3">
                    <!-- End Search Box-->
                    <div class="course-details-title">النقاشات</div>
                    <a @if (auth()->check()) href="javascript:void(0);"
                    onclick="mainModalOpen(`{{ route('forum.create_course', ['slug' => @$data['course']->slug]) }}`)"
                    @else
                    href="{{ route('frontend.signIn') }}" @endif
                        class="btn-primary-outline f-right">
                        <i class="ri-add-line"></i>
                        موضوع جديد
                    </a>
                </div>
            </div>
            <div class="row">
                <!-- Left Sidebar -->
                <!-- Right Content Result -->
                <div class="col-xl-9 col-lg-9">

                    <?= $data['html'] ?>
                </div>
            </div>
        </div>
    </section>
<script src="{{ asset('modules/forum/js/app.js') }}"></script>
<script src="{{ asset('/modules/forum/summernote/summernote.js') }}"></script>
</div>
