<div class="card box-card">
    <div class="box-imag">
        {{-- {{ showImage(@$data['course']->thumbnailImage->original) }}" --}}
        <img src="{{ showImage(@$course->metaImage->original, 'default-course.jpg') }}" alt="imgcard">

        @if (auth()->check() && $course->userBookmark()->exists())
            <button href="javascript:void(0)" class="icon-img bookmark bookmark-destroy "
                data-id="{{ encryptFunction(@$course->id) }}">
                <svg width="24" height="24" viewBox="0 0 22 20" fill="#292D32" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.493 18.919C11.153 19.039 10.593 19.039 10.253 18.919C7.35305 17.929 0.873047 13.799 0.873047 6.79898C0.873047 3.70898 3.36305 1.20898 6.43305 1.20898C8.25305 1.20898 9.86305 2.08898 10.873 3.44898C11.883 2.08898 13.503 1.20898 15.313 1.20898C18.383 1.20898 20.873 3.70898 20.873 6.79898C20.873 13.799 14.393 17.929 11.493 18.919Z"
                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        @else
            <button href="javascript:void(0)" class="icon-img bookmark bookmark-added"
                data-id="{{ encryptFunction(@$course->id) }}">
                <svg width="24" height="24" viewBox="0 0 22 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.493 18.919C11.153 19.039 10.593 19.039 10.253 18.919C7.35305 17.929 0.873047 13.799 0.873047 6.79898C0.873047 3.70898 3.36305 1.20898 6.43305 1.20898C8.25305 1.20898 9.86305 2.08898 10.873 3.44898C11.883 2.08898 13.503 1.20898 15.313 1.20898C18.383 1.20898 20.873 3.70898 20.873 6.79898C20.873 13.799 14.393 17.929 11.493 18.919Z"
                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        @endif

    </div>

    <div class="card-body bodyCard">
        <p class="card-text"> {{ @$course->title }}</p>
        @if (@$course->instructor_name)
            <div class="d-flex box-personal">
                <span>
                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.8845 4.82447C10.8845 5.419 10.7135 6.00017 10.3932 6.4945C10.0729 6.98884 9.6176 7.37414 9.08493 7.60169C8.55225 7.82924 7.96611 7.88881 7.4006 7.77288C6.8351 7.65696 6.31562 7.37073 5.90787 6.95039C5.50012 6.53006 5.2224 5.99449 5.10982 5.41141C4.99725 4.82834 5.05487 4.22393 5.27542 3.67462C5.49596 3.12531 5.86951 2.65577 6.34884 2.32536C6.82818 1.99495 7.39176 1.81851 7.96833 1.81836C8.35125 1.81826 8.73043 1.89594 9.08423 2.04696C9.43803 2.19799 9.7595 2.4194 10.0303 2.69856C10.3011 2.97771 10.5159 3.30914 10.6625 3.67391C10.809 4.03867 10.8845 4.42964 10.8845 4.82447Z"
                            stroke="white" stroke-width="1.11358" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M12.9789 13.8425C12.9789 11.5164 10.7335 9.63379 7.97005 9.63379C5.20657 9.63379 2.96045 11.5156 2.96045 13.8425"
                            stroke="white" stroke-width="1.11358" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <h5>{{ $course->instructor_name }}</h5>
            </div>
        @endif


        <div class="d-flex box-info">
            <div class="d-flex info">
                <svg width="16" height="16" viewBox="0 0 16 15" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.8643 1.40951C14.5096 1.11286 14.0938 0.897955 13.6467 0.780055C13.1995 0.662154 12.7318 0.644149 12.2769 0.727319L9.86496 1.16528C9.3081 1.26755 8.80179 1.55404 8.42738 1.97874C8.05199 1.55331 7.54423 1.26675 6.986 1.16528L4.57783 0.727319C4.12292 0.644077 3.65528 0.661845 3.208 0.779367C2.76073 0.89689 2.34475 1.11129 1.98952 1.4074C1.63429 1.7035 1.34849 2.07407 1.15235 2.49288C0.956207 2.91168 0.854523 3.36848 0.854492 3.83094L0.854492 10.6421C0.854528 11.381 1.11385 12.0964 1.58725 12.6637C2.06066 13.231 2.71812 13.6141 3.44505 13.7464L7.41198 14.4677C8.08341 14.5897 8.77134 14.5897 9.44277 14.4677L13.4129 13.7464C14.1392 13.6135 14.7959 13.23 15.2687 12.6628C15.7415 12.0956 16.0004 11.3805 16.0003 10.6421V3.83094C16.0005 3.36864 15.8989 2.91197 15.7026 2.49344C15.5062 2.07491 15.22 1.70481 14.8643 1.40951V1.40951ZM7.7963 13.2516C7.74329 13.244 7.69028 13.2352 7.63727 13.2257L3.67097 12.505C3.23475 12.4257 2.84022 12.1957 2.55617 11.8553C2.27212 11.5148 2.11657 11.0855 2.11664 10.6421V3.83094C2.11664 3.32883 2.3161 2.84728 2.67115 2.49223C3.0262 2.13718 3.50775 1.93772 4.00986 1.93772C4.12414 1.93799 4.23818 1.94834 4.35064 1.96864L6.76134 2.41039C7.05139 2.46347 7.3137 2.61642 7.50275 2.84271C7.69181 3.06899 7.79566 3.35433 7.7963 3.64919V13.2516ZM14.7381 10.6421C14.7382 11.0855 14.5826 11.5148 14.2986 11.8553C14.0145 12.1957 13.62 12.4257 13.1838 12.505L9.21748 13.2257C9.16447 13.2352 9.11146 13.244 9.05845 13.2516V3.64919C9.05841 3.3536 9.16211 3.06738 9.35147 2.84041C9.54084 2.61345 9.80386 2.46015 10.0947 2.40724L12.506 1.96549C12.7791 1.9158 13.0597 1.92677 13.3281 1.99761C13.5965 2.06846 13.846 2.19744 14.059 2.37543C14.2719 2.55343 14.4432 2.77607 14.5605 3.0276C14.6779 3.27912 14.7385 3.55338 14.7381 3.83094V10.6421Z"
                        class="svg-fill" />
                </svg>
                <p>
                    <span>{{ @$course->allLessons->count() }}</span>
                    درس
                </p>
            </div>
            <div class="d-flex info">
                <svg width="16" height="16" viewBox="0 0 17 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.08386 0.642578C6.50637 0.642578 4.9643 1.11036 3.65266 1.98677C2.34102 2.86318 1.31873 4.10885 0.715046 5.56626C0.111366 7.02367 -0.0465843 8.62737 0.261169 10.1746C0.568923 11.7217 1.32856 13.1429 2.44401 14.2584C3.55947 15.3738 4.98065 16.1335 6.52783 16.4412C8.07501 16.749 9.67871 16.591 11.1361 15.9873C12.5935 15.3837 13.8392 14.3614 14.7156 13.0497C15.592 11.7381 16.0598 10.196 16.0598 8.61852C16.0575 6.50387 15.2165 4.47649 13.7212 2.9812C12.2259 1.48592 10.1985 0.644865 8.08386 0.642578V0.642578ZM8.08386 15.2651C6.76928 15.2651 5.48422 14.8753 4.39119 14.145C3.29816 13.4146 2.44625 12.3766 1.94318 11.1621C1.44011 9.94756 1.30849 8.61115 1.56495 7.32183C1.82141 6.03251 2.45444 4.8482 3.38399 3.91865C4.31353 2.98911 5.49785 2.35608 6.78717 2.09962C8.07648 1.84315 9.4129 1.97478 10.6274 2.47785C11.8419 2.98091 12.88 3.83283 13.6103 4.92586C14.3407 6.01889 14.7305 7.30395 14.7305 8.61852C14.7285 10.3807 14.0277 12.0702 12.7816 13.3163C11.5355 14.5623 9.84606 15.2632 8.08386 15.2651V15.2651Z"
                        class="svg-fill" />
                    <path
                        d="M8.08368 4.62988C7.9074 4.62988 7.73834 4.69991 7.61369 4.82456C7.48905 4.94921 7.41902 5.11826 7.41902 5.29454V8.1692L5.17844 9.57297C5.02861 9.66657 4.92209 9.81586 4.88233 9.988C4.84256 10.1601 4.87281 10.341 4.96642 10.4909C5.06002 10.6407 5.20931 10.7472 5.38145 10.787C5.55359 10.8267 5.73448 10.7965 5.88431 10.7029L8.43662 9.1077C8.53305 9.04728 8.61235 8.96312 8.66694 8.86326C8.72152 8.76341 8.74955 8.65122 8.74834 8.53742V5.29454C8.74834 5.11826 8.67832 4.94921 8.55367 4.82456C8.42902 4.69991 8.25996 4.62988 8.08368 4.62988Z"
                        class="svg-fill" />
                </svg>
                <p>
                    <span>{{ minutes_to_hours(@$course->lessons()->where('is_quiz', 0)->sum('duration')) }}</span>

                </p>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-between mt-18">
            @if (auth()->check() &&
                    auth()->user()->userCourseEnroll->where('course_id', $course->id)->count() > 0)
                @if (auth()->user()->userCourseEnroll->where('course_id', $course->id)->where('approved', 0)->count() > 0)
                    <div class="border border-2 rounded-pill p-2 text-center">PENDING APPROVAL</div>
                @else
                    <div class="d-flex justify-content-end align-items-center flex-wrap">
                        <a @if (@$course->firstLesson) href="{{ route('student.course.learn', [@$course->slug, encryptFunction(@$course->firstLesson->id)]) }}"
                          @else
                          href="{{ route('student.course.learn', [@$course->slug, 'no_lesson']) }}" @endif
                            class="btn-primary-outline w-100">{{ ___('student.Start Learning') }}
                        </a>
                    </div>
                @endif
            @endif


            <!-- عنصر التفاصيل مع تحديد `ms-auto` لجعله يلتصق بأقصى اليسار -->
            <a class="d-flex align-items-center justify-content-end flex-nowrap gap-2 me-auto indexa"
                href="{{ route('frontend.courseDetails', $course->slug) }}">
                <p>التفاصيل</p>
                <svg width="20" height="20" viewBox="0 0 21 21" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="19.6855" y="20.1489" width="19.061" height="19.061" rx="9.53049"
                        transform="rotate(-180 19.6855 20.1489)" stroke="#29ABE2" stroke-width="1.24912" />
                    <path d="M12.5928 10.7686L7.40881 10.7686" stroke="#29ABE2" stroke-width="0.897808"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M9.26611 12.6475L7.37321 10.7546L9.26611 8.86166" stroke="#29ABE2" stroke-width="0.897808"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>

    </div>


</div>
<script src="{{ asset('frontend/js/__course.js') }}" type="module"></script>
