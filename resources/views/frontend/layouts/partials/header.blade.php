<body class="light-mode {{ @findDirectionOfLang() }}" dir="{{ @findDirectionOfLang() }}">
    <header class="header-sticky">

        <!-- START NAV -->
        <nav class=" @if (Route::is('home') || Route::is('frontend.about_us')) nav-home @else nav @endif">
            <div class="nav-bar">

                <a class="d-none d-lg-block" href="./index.html">
                    {{ lightLogo() }}
                </a>
                {{-- logo mobile --}}
                <a class="d-block d-lg-none" href="./index.html">
                    <img src="{{ url('frontend/assets/images/logo-mobile.svg') }}" alt="Logo" class="logo-mobile">
                </a>

                <div class="menu" id="menu">
                    <ul class="nav-links">
                      <li class="d-block d-lg-none">
                        <a class="link d-flex align-items-center" href="{{ route('student.dashboard') }}">
                            <i class="ri-dashboard-line" style="font-size: 31px; margin-right: 8px;"></i>
                            {{ ___('common.Dashboard') }}
                        </a>
                    </li> 

                        <li >
                            <a href="{{ route('home') }}" class="link {{ Route::currentRouteName() === 'home' ? 'active' : '' }}">الرئيسية</a>
                        </li>
                        <li>
                            <a href="{{ route('courses') }}" class="link {{ Route::currentRouteName() ==='courses' ? 'active' : '' }}">التدريبات</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs') }}" class="link {{ Route::currentRouteName() ==='blogs' ? 'active' : '' }}">المدونة</a>
                        </li>
                        <li>
                            <a href="{{ route('forum.index') }}" class="link {{ Route::currentRouteName() ==='forum.index' ? 'active' : '' }}">المجتمع</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.event.index') }}" class="link {{ Route::currentRouteName() ==='frontend.event.index' ? 'active' : '' }}">الفعاليات</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.about_us') }}" class="link {{ Route::currentRouteName() ==='frontend.about_us' ? 'active' : '' }}">من نحن</a>
                        </li>
                    </ul>
                </div>

                <div class=" d-flex box-icon">
                    <div class="navbar-icon">

                        <button class="sun-icon change-mode">
                            <i class="ri-sun-line"></i>
                        </button>
                    </div>

                    <!-- heart icon -->
                    @auth
                        @if (auth()->user()->role_id == \App\Enums\Role::STUDENT || auth()->user()->role_id == \App\Enums\Role::INSTRUCTOR)
                            <a href="{{ route('frontend.bookmark') }}" class="navbar-icon icon-nav">
                                <svg width="26" height="26" viewBox="0 0 25 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.9932 21.4529C12.5383 21.5878 12.0541 21.5878 11.5992 21.4529C8.34018 20.3399 1.05618 15.6979 1.05618 7.82988C1.05381 7.00698 1.21358 6.19167 1.52637 5.43053C1.83916 4.66939 2.29883 3.97732 2.87913 3.39387C3.45943 2.81041 4.14899 2.34699 4.90842 2.03008C5.66785 1.71317 6.48228 1.54897 7.30518 1.54688C8.27616 1.54645 9.23367 1.77408 10.1006 2.21144C10.9675 2.6488 11.7195 3.28366 12.2962 4.06488C13.0804 3.00918 14.1783 2.22848 15.4329 1.8344C16.6876 1.44031 18.0347 1.45302 19.2817 1.87072C20.5287 2.28842 21.6117 3.08971 22.3758 4.16001C23.14 5.23032 23.5461 6.51483 23.5362 7.82988C23.5362 15.6979 16.2562 20.3399 12.9932 21.4529Z"
                                        class="svg-nav-heart" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <span class="number-icon">
                                    @auth
                                        {{ auth()->user()->bookmarks()->count() }}
                                    @else
                                        0
                                    @endauth
                                </span>
                            </a>
                        @endif
                    @endauth


                    @auth
                        <!-- Bell icon -->
                        @include('frontend.partials.notifications')

                        <!-- profile image -->
                        @if (auth()->user()->role_id == App\Enums\Role::STUDENT)
                            @include('panel.student.include.profile_menu')
                        @elseif (auth()->user()->role_id == App\Enums\Role::INSTRUCTOR)
                            @include('panel.instructor.include.profile_menu')
                        @else
                            @include('panel.instructor.include.admin_profile_menu')
                        @endif
                    @endauth

                    @guest


                        <!-- sign In button -->
                        {{-- <a href="{{ route('frontend.signIn') }}" class="btn-primary-fill ml-20"
                            style="border-radius: 8px !important;">
                            <div class="d-flex fs-5">
                                <i class="ri-user-line" style="font-size:22px;"></i>
                                {{ ___('frontend.Sign In') }}
                            </div>
                        </a> --}}
                        <button class="login-button"
                            onclick="window.location.href='{{ route('frontend.signIn') }}'">{{ ___('frontend.Sign In') }}</button>
                    @endguest



                    <div class=" d-flex d-lg-none nav-icon-mobile" id="drop">
                        <i class="bi bi-list icon open" id="menuOpen"></i>
                        <i class="bi bi-x icon close" id="menuClose"></i>
                    </div>
                </div>

            </div>
        </nav>

        <!-- END NAV -->

    </header>

    @section('scripts')
        <script>
            // نقل مسارات الصور من Laravel إلى JavaScript كمتغيرات.
            const lightLogo = "{{ url('frontend/assets/images/light-logo.svg') }}";
            const darkLogo = "{{ url('frontend/assets/images/dark-logo.svg') }}";
            const isHome = {{ Route::is('home') ? 'true' : 'false' }};
        </script>
    @endsection
