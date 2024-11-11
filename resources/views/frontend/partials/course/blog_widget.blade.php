<a href="{{ route('blog_details', $blog->id) }}">
    <div class="course-widget radius-12 h-calc ">
        <div class="course-widget-img position-relative overflow-hidden">
            <img src="{{ showImage(@$blog->iconImage->original, 'backend/uploads/default-images/blog/blog'.$key + 1 .'.jpg') }}"
                class="img-cover" alt="img">
            {{-- <a class="course-badge position-absolute text-12 font-500 radius-4 d-inline-flex "
                href="{{ route('blog_details', $blog->id) }}">{{ @$blog->title }}</a> --}}


            {{-- <div class="bookmark-wrapper">
                @if (auth()->check() && $course->userBookmark()->exists())
                <a href="javascript:void(0)" class="bookmark bookmark-destroy"
                    data-id="{{ encryptFunction(@$blog->id) }}">
                    <i class="ri-heart-fill"></i></a>
                @else
                <a href="javascript:void(0)" class="bookmark bookmark-added"
                    data-id="{{ encryptFunction(@$blog->id) }}">
                    <i class="ri-heart-line"></i></a>
                @endif
            </div> --}}
            {{ @$blog->title }}
        </div>
        <div class="widget-mid w-100 ">
            {{ @$blog->title }}
            {{-- <div class="course-widget-info mb-18">
                <div class="course-widget-info-title mb-15">
                    <div class="d-flex align-items-center gap-5 mb-10">
                        <div class="d-flex align-items-center gap-2">
                            {{ rating_ui($course->rating, 12) }}
                        </div>
                        <span class="text-primary text-12 font-500 ">{{ number_format($course->rating, 1) }}</span>
                    </div>

                    <a href="{{ route('frontend.courseDetails', $course->slug) }}">
                        <h4 class="title colorEffect line-clamp-2 text-16 font-500">
                            {{ Str::limit(@$course->title, @$limit ?? 29) }}</h4>
                    </a>
                </div>
                <div class="course-widget-info_rating">
                    <div class="d-flex align-items-center gap-20 mb-0 flex-wrap">
                        <div class="d-flex align-items-center gap-5">
                            <i class="ri-time-line"></i>
                            <h5 class="text-14 font-700">
                                <span class="text-primary ">{{ @$course->allLessons->count() }}</span>
                                {{ ___('frontend.Lesson') }}
                            </h5>
                        </div>
                        <div class="d-flex align-items-center gap-5">
                            <i class="ri-time-line"></i>
                            <h5 class="text-12 font-400 text-gray">{{ minutes_to_hours($course->course_duration) }}</h5>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- @if (@$course->user->role_id != 5)
            <div class="course-widget-author d-flex align-items-center gap-12">
                <div class="course-widget-author-img">
                    <img src="{{ showImage(@$course->user->image->original) }}" class="img-cover" alt="img">
                </div>
                <div class="">
                    <a href="javascript:void(0);">
                        <h4 class="text-14 font-500 text-primary-hover  mb-0">{{ @$course->user->name }}</h4>
                    </a>
                    <p class="text-gray text-12 font-400  line-clamp-1">{{ ___('common.Admin') }}</p>
                </div>
            </div>
            @else
            <div class="course-widget-author d-flex align-items-center gap-12">
                <div class="course-widget-author-img">
                    <img src="{{ showImage(@$course->user->image->original) }}" class="img-cover" alt="img">
                </div>
                <div class="">
                    <a href="{{ route('frontend.instructor.details', [$course->user->name, $course->user->id]) }}">
                        <h4 class="text-14 font-500 text-primary-hover  mb-0">{{ @$course->user->name }}</h4>
                    </a>
                    <p class="text-gray text-12 font-400  line-clamp-1">{{ @$course->user->instructor->designation }}
                    </p>
                </div>
            </div>
            @endif --}}

            {{-- <div class="widget-footer">
                test
            </div> --}}
        </div>

    </div>
</a>