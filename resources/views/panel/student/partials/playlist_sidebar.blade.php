<div class="col-lg-3 p-3 content-section">
    <!-- القسم الأيمن (محتوى الدورة) -->
    <div class="panel-sidebar-close-main">

        <div class="video-playlist white-bg mb-24">
            <h5>محتوى الدورة</h5>
            <hr>


            <!-- Course module & Live class TAB -->
            @if (module('LiveClass'))
                <div class="tab-menu text-center mb-40">
                    <ul class="listing">
                        <li class="single-list">
                            <a @if (@$enroll->course->firstLesson) href="{{ route('student.course.learn', [$enroll->course->slug, encryptFunction($enroll->course->firstLesson->id)]) }}" @else href="javascript:void(0)" @endif
                                class="@if (!@$data['is_live_class']) active @endif" data-rel="tab-1">
                                {{ ___('frontend.Lessons') }}
                            </a>
                        </li>
                        @if (module('LiveClass'))
                            <li class="single-list">
                                <a href="{{ route('student.course.live_class', $enroll->id) }}"
                                    class="@if (@$data['is_live_class']) active @endif">
                                    {{ ___('live_class.Live_Classes') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            @endif
            <!--End-of  Course module & Live class TAB -->

            <!-- محتوى وحدات الدورة التعليمية -->
            @if (!@$data['is_live_class'] && @$enroll->course->sections)
                <div class="singleTab-items d-block" id="tab-1">
                    <!-- قسم قائمة تشغيل الفيديو الخاصة بالدورة -->
                    <div class="listing-video-wrapper">
                        <div class="accordion" id="accordionExample2">
                            <!-- تكرار لكل قسم دراسي داخل الدورة -->
                            @foreach ($enroll->course->sections as $key => $section)
                                <ul class="list-unstyled text-end">
                                  <li>
                                    <!-- العنوان الرئيسي للقسم والذي يمكن فتحه أو إغلاقه -->
                                        <button id="heading{{ $key }}" class="btn btn-link d-flex justify-content-between align-items-center text-end w-100" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $key }}" aria-expanded="true"
                                            aria-controls="collapse{{ $key }}">
                                            <span> {{ @$section->title }}</span>
                                        </button>
                                  
                                    <!-- محتوى القسم المتغير بناءً على ما إذا كانت الدروس مفتوحة أو مغلقة -->
                                    <div id="collapse{{ $key }}"
                                        class="collapse {{ in_array(@$data['lesson_id'], @$section->allLesson->pluck('id')->toArray()) ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $key }}"
                                        data-bs-parent="#accordionExample2">
                                        <div class="">
                                            <!-- قائمة الدروس داخل كل قسم -->
                                            <ul class="listing-video">
                                                @foreach ($section->allLesson as $lesson)
                                                    <li
                                                        class="single-list {{ @$lesson->id == @$data['lesson_id'] ? ' active' : '' }}">
                                                        <div class="mb-8 d-flex align-items-center w-100">
                                                            <!-- عرض خيار الاختبار إذا كان الدرس عبارة عن اختبار -->
                                                            @if (@$lesson->is_quiz)
                                                                <div class="check-remember-me">
                                                                    <label>
                                                                        <input class="ot-checkbox" type="checkbox"
                                                                            {{ in_array(@$lesson->id, $enroll->completed_quizzes ?? []) ? 'checked' : '' }} />
                                                                        <span class="ot-checkmark"></span>
                                                                    </label>
                                                                </div>
                                                            @else
                                                                <!-- متابعة تقدم الدروس للطالب عبر وضع علامة إذا كانت مكتملة -->
                                                                <div class="check-remember-me" id="lesson-progress"
                                                                    data-id="{{ encryptFunction(@$lesson->id) }}">
                                                                    <label>
                                                                        <input class="ot-checkbox" type="checkbox"
                                                                            id="{{ 'lesson_' . @$lesson->id }}"
                                                                            name="lesson_id[]"
                                                                            value="{{ encryptFunction(@$lesson->id) }}"
                                                                            {{ in_array(@$lesson->id, $enroll->completed_lessons ?? []) ? 'checked' : '' }} />
                                                                        <span class="ot-checkmark"></span>
                                                                    </label>
                                                                </div>
                                                            @endif
                                                            <div class="d-flex align-items-center w-100"
                                                                id="lesson-start"
                                                                data-id="{{ encryptFunction(@$lesson->id) }}">
                                                                <!-- أيقونات توضح نوع المحتوى (فيديو، نص، اختبار، صورة) -->
                                                                <div class="play-btn">
                                                                    @if (@$lesson->is_quiz)
                                                                        <i class="ri-question-line"></i>
                                                                    @else
                                                                        @if (in_array(@$lesson->lesson_type, ['Youtube', 'Vimeo', 'GoogleDrive', 'VideoFile']))
                                                                            <i class="ri-play-circle-line"></i>
                                                                        @elseif(@$lesson->lesson_type == 'Text')
                                                                            <i class="ri-text"></i>
                                                                        @elseif(@$lesson->lesson_type == 'ImageFile')
                                                                            <i class="ri-image-fill"></i>
                                                                        @elseif(@$lesson->lesson_type == 'DocumentFile' && @$lesson->attachment_type == 1)
                                                                            <i class="ri-file-pdf-line"></i>
                                                                        @elseif(@$lesson->lesson_type == 'DocumentFile' && @$lesson->attachment_type == 2)
                                                                            <i class="ri-file-text-fill"></i>
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                                <!-- عنوان الدرس -->
                                                                <h6> {{ @$lesson->title }} </h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                
                                            </ul>
                                        </div>
                                    </div>
                                  </li>
                                  </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <!-- قائمة الفصول المباشرة إذا كانت خاصية الفصل المباشر مفعّلة -->
            @if (@$data['is_live_class'] && module('LiveClass'))
                @include('liveclass::playlist.live_class_list')
            @endif
        </div>
    </div>
</div>
