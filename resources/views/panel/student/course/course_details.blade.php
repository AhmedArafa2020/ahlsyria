{{-- @extends('panel.student.layouts.course_master') --}}
@extends('frontend.layouts.master')

@section('title', @$data['title'])
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/plyr/plyr.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/css/course-start-learning.css') }}" /> --}}

@endsection
@section('content')


        <div class="container-fluid d-flex flex-wrap">
            <div data-id="{{ encryptFunction(@$data['enroll']->id) }}" class="enroll-id sidebar-body-overlay"></div>

            @include('panel.student.partials.playlist_sidebar', [
                'enroll' => $data['enroll'],
            ])

            <!-- القسم الأيسر (المحتوى الرئيسي) -->
            <div class="col-lg-9 p-3 main-section">
                <div class="shadow-sm p-2 mb-3">
                    <div class="header-container d-flex align-items-center justify-content-between mb-3 flex-wrap">
                        <div class="welcome-section d-flex align-items-center">
                            <img src="icons/arrow2.png" alt="صورة" width="40" height="40" class="arrow-icon">
                            <span class="welcome-text">مرحباً بك في الدورة التدريبية</span>
                        </div>
                        <div class="button-section d-flex align-items-center gap-3">
                            <button class="btn btn-outline-primary small-btn">السابق</button>
                            <button class="btn btn-outline-primary small-btn">التالي</button>
                            @if (!in_array(@$data['lesson']->id, $data['enroll']->completed_lessons ?? []) && @$data['lesson']->is_quiz == 0)
                                <button data-id="{{ encryptFunction(@$data['lesson']->id) }}" id="lesson-progress-btn"
                                    class="btn btn-outline-success small-btn">وضع علامة مكتمل</button>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="video-section">
                        <div class="video-section radius-10 overflow-hidden mb-40">
                            @if (@$data['lesson']->is_quiz == 1)
                                <div class="quize-text-wrapper ot-card white-bg mb-24" id="quiz_load"
                                    data-url="{{ route('student.quiz', [encryptFunction(@$data['lesson']->id)]) }}">
                                </div>
                            @else
                                @if (@$data['lesson']->lesson_type == 'Youtube')
                                    <div class="container video-size ">
                                        <div class="plyr__video-embed" id="player">
                                            <iframe id="player" type="text/html" height="500" width="100%"
                                                src="https://www.youtube.com/embed/{{ course_video_url_preg_match(@$data['lesson']->video_url) }}"
                                                allowfullscreen allowtransparency allow="autoplay"></iframe>
                                        </div>
                                    </div>
                                @elseif (@$data['lesson']->lesson_type == 'Vimeo')
                                    <div class="container video-size">
                                        <div class="plyr__video-embed" id="player">
                                            <iframe
                                                src="https://player.vimeo.com/video/{{ course_video_url_preg_match(@$data['lesson']->video_url) }}?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"></iframe>
                                        </div>
                                    </div>
                                @elseif (@$data['lesson']->lesson_type == 'GoogleDrive')
                                    <div class="container video-size">
                                        <div class="plyr__video-embed" id="player">
                                            <iframe width="100%" height="500px"
                                                src="https://drive.google.com/file/d/{{ course_video_url_preg_match(@$data['lesson']->video_url) }}/preview"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                @elseif (@$data['lesson']->lesson_type == 'VideoFile')
                                    <div class="container video-size">
                                        <video playsinline controls width="100%" height="500px">
                                            @if (video_get_video_extension(@$data['lesson']->video->original) == 'mp4')
                                                <source src="{{ asset(@$data['lesson']->video->original) }}" />
                                            @elseif (video_get_video_extension(@$data['lesson']->video->original) == 'webm')
                                                <source src="{{ asset(@$data['lesson']->video->original) }}"
                                                    type="video/webm" />
                                            @endif
                                        </video>
                                    </div>
                                @elseif (@$data['lesson']->lesson_type == 'Text')
                                    <div class="container video-size border al">
                                        <div class="justify-content-center pt-50 pb-50">
                                            <p>
                                                <?= @$data['lesson']->lesson_text ?>
                                            </p>
                                        </div>
                                    </div>
                                @elseif (@$data['lesson']->lesson_type == 'ImageFile')
                                    <div class="container video-size">
                                        <img src="{{ showImage(@$data['lesson']->image->original) }}" alt="image"
                                            width="100%" height="500px">
                                    </div>
                                @elseif (@$data['lesson']->lesson_type == 'DocumentFile' && @$data['lesson']->attachment_type == 1)
                                    <div class="container video-size">
                                        <iframe src="{{ showImage(@$data['lesson']->attachmentFile->original) }}"
                                            width="100%" height="500px" frameborder="0"></iframe>
                                    </div>
                                @elseif (@$data['lesson']->lesson_type == 'DocumentFile' && @$data['lesson']->attachment_type == 2)
                                    <div class="container video-size">
                                        <iframe class="doc" width="100%" height="500px"
                                            src="https://docs.google.com/gview?url={{ showImage(@$data['lesson']->attachmentFile->original) }}&embedded=true"></iframe>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <h5>{{ @$data['enroll']->course->title }}</h5>
                        <div class="d-flex align-items-center">
                            <img src="icons/profile.png" alt="الصورة" class="rounded-circle me-2" width="40"
                                height="40">
                            <div>
                                <p class="mb-0">{{ @$data['enroll']->course->instructor_name }}</p>
                                <small>{{ @$data['enroll']->course->user->medical_specialization }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="objectives">
                        <h6>مرحبا بكم في الدورة</h6>
                        @if (@$data['enroll']->course->outcomes)
                            <ul class="list-unstyled">
                                <p> <?= @$data['enroll']->course->outcomes ?></p>
                            </ul>
                        @endif

                        @if (@$data['lesson']->content)
                            <h6 class="course-details-title">{{ ___('frontend.Lecture Content') }}
                            </h6>
                            <ul class="list-unstyled">
                                <?= @$data['lesson']->content ?>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>



@endsection
@section('scripts')
    <script src="{{ asset('frontend/plyr/plyr.js') }}"></script>
    <script src="{{ asset('frontend/js/student/main.js') }}" type="module"></script>
    @if (@$data['lesson']->is_quiz == 1)
        <script src="{{ asset('frontend/js/student/quiz.js') }}" type="module"></script>
    @endif
    <script>
        $(document).on("click", "#lesson-progress-btn", function() {
            $("#lesson_{{ @$data['lesson']->id }}").prop("checked", true);
            $("#lesson_{{ @$data['lesson']->id }}").trigger("change");
            $("#lesson-progress-btn").hide();
        });
        $(document).on("click", "#lesson-progress-btn-false", function() {
            $("#lesson_{{ @$data['lesson']->id }}").prop("checked", false);
            $("#lesson_{{ @$data['lesson']->id }}").trigger("change");
            window.location.reload();
        });
    </script>
@endsection
