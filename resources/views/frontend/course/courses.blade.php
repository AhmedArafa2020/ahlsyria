@extends('frontend.layouts.master')
@section('title', 'التدريبات')
@section('content')

    <section class="ot-filter-course container mb-5 container-page">
        <section class="header">
            <div class="d-flex justify-content-between flex-column flex-lg-row ContainerHeaderCard">
                <h1>التدريبات</h1>
                <div class="d-flex justify-content-end align-items-center container-button">
                    <div class="d-flex box-button1 ">
                        <button type="button" class="btn-options @if (@$_GET['sort'] == 'best_rated') text-primary @endif"
                            data-val="best_rated">{{ ___('frontend.Best Rated') }}</button>
                        <span class="line"></span>
                        <button type="button" class="btn-options @if (@$_GET['sort'] == 'popular') text-primary @endif"
                            data-val="popular">{{ ___('frontend.Most Popular') }}</button>
                        <span class="line"></span>
                        <button type="button" class="btn-options @if (@$_GET['sort'] == 'latest') text-primary @endif"
                            data-val="new">{{ ___('frontend.Latest') }}</button>
                        @if (@$_GET['type'])
                            <button type="button" data-val="{{ $_GET['type'] }}">{{ Str::ucfirst($_GET['type']) }}</button>
                        @endif
                    </div>


                    <div class="d-flex box-button2">
                        <button class="tab-view active" type="button">
                            <span>
                                <svg width="27" height="28" viewBox="0 0 27 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M24.4309 12.9039V5.38773C24.4309 3.72975 23.7234 3.06641 21.9656 3.06641H17.5004C15.7427 3.06641 15.0352 3.72975 15.0352 5.38773V12.9039C15.0352 14.5618 15.7427 15.2252 17.5004 15.2252H21.9656C23.7234 15.2252 24.4309 14.5618 24.4309 12.9039Z"
                                        stroke="#707070" stroke-width="1.52318" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M24.4309 22.8516V20.8623C24.4309 19.2044 23.7234 18.541 21.9656 18.541H17.5004C15.7427 18.541 15.0352 19.2044 15.0352 20.8623V22.8516C15.0352 24.5096 15.7427 25.1729 17.5004 25.1729H21.9656C23.7234 25.1729 24.4309 24.5096 24.4309 22.8516Z"
                                        stroke="#707070" stroke-width="1.52318" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M11.719 15.335V22.8511C11.719 24.5091 11.0115 25.1724 9.25371 25.1724H4.78851C3.03076 25.1724 2.32324 24.5091 2.32324 22.8511V15.335C2.32324 13.677 3.03076 13.0137 4.78851 13.0137H9.25371C11.0115 13.0137 11.719 13.677 11.719 15.335Z"
                                        stroke="#707070" stroke-width="1.52318" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M11.719 5.38773V7.377C11.719 9.03498 11.0115 9.69833 9.25371 9.69833H4.78851C3.03076 9.69833 2.32324 9.03498 2.32324 7.377V5.38773C2.32324 3.72975 3.03076 3.06641 4.78851 3.06641H9.25371C11.0115 3.06641 11.719 3.72975 11.719 5.38773Z"
                                        stroke="#707070" stroke-width="1.52318" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </button>
                        <span class="line"></span>
                        <button class="grid-view" type="button">
                            <span>
                                <svg width="35" height="27" viewBox="0 0 35 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.5303 5.16497H32.822C33.1859 5.15646 33.532 5.00593 33.7864 4.74555C34.0407 4.48518 34.1831 4.13563 34.1831 3.77164C34.1831 3.40765 34.0407 3.0581 33.7864 2.79772C33.532 2.53735 33.1859 2.38682 32.822 2.37831H10.5303C10.3446 2.37397 10.1599 2.4068 9.98702 2.47487C9.81417 2.54294 9.65668 2.64487 9.5238 2.77469C9.39091 2.9045 9.28532 3.05957 9.21323 3.23077C9.14114 3.40198 9.104 3.58587 9.104 3.77164C9.104 3.9574 9.14114 4.1413 9.21323 4.3125C9.28532 4.48371 9.39091 4.63878 9.5238 4.76859C9.65668 4.8984 9.81417 5.00034 9.98702 5.06841C10.1599 5.13648 10.3446 5.16931 10.5303 5.16497Z"
                                        class="svg-fill" />
                                    <path
                                        d="M32.822 12.1322H10.5303C10.3446 12.1279 10.1599 12.1607 9.98702 12.2288C9.81417 12.2968 9.65668 12.3988 9.5238 12.5286C9.39091 12.6584 9.28532 12.8135 9.21323 12.9847C9.14114 13.1559 9.104 13.3398 9.104 13.5255C9.104 13.7113 9.14114 13.8952 9.21323 14.0664C9.28532 14.2376 9.39091 14.3927 9.5238 14.5225C9.65668 14.6523 9.81417 14.7542 9.98702 14.8223C10.1599 14.8904 10.3446 14.9232 10.5303 14.9189H32.822C33.1859 14.9104 33.532 14.7598 33.7864 14.4995C34.0407 14.2391 34.1831 13.8895 34.1831 13.5255C34.1831 13.1616 34.0407 12.812 33.7864 12.5516C33.532 12.2913 33.1859 12.1407 32.822 12.1322Z"
                                        fill="#231F20" />
                                    <path
                                        d="M32.822 21.8871H10.5303C10.3446 21.8828 10.1599 21.9156 9.98702 21.9837C9.81417 22.0517 9.65668 22.1537 9.5238 22.2835C9.39091 22.4133 9.28532 22.5684 9.21323 22.7396C9.14114 22.9108 9.104 23.0947 9.104 23.2804C9.104 23.4662 9.14114 23.6501 9.21323 23.8213C9.28532 23.9925 9.39091 24.1476 9.5238 24.2774C9.65668 24.4072 9.81417 24.5091 9.98702 24.5772C10.1599 24.6453 10.3446 24.6781 10.5303 24.6738H32.822C33.1859 24.6652 33.532 24.5147 33.7864 24.2543C34.0407 23.994 34.1831 23.6444 34.1831 23.2804C34.1831 22.9164 34.0407 22.5669 33.7864 22.3065C33.532 22.0461 33.1859 21.8956 32.822 21.8871Z"
                                        class="svg-fill" />
                                    <path
                                        d="M3.37406 6.2657C4.84621 6.2657 6.03962 5.07228 6.03962 3.60013C6.03962 2.12798 4.84621 0.93457 3.37406 0.93457C1.90191 0.93457 0.708496 2.12798 0.708496 3.60013C0.708496 5.07228 1.90191 6.2657 3.37406 6.2657Z"
                                        class="svg-fill" />
                                    <path
                                        d="M3.37406 16.1661C4.84621 16.1661 6.03962 14.9727 6.03962 13.5005C6.03962 12.0284 4.84621 10.835 3.37406 10.835C1.90191 10.835 0.708496 12.0284 0.708496 13.5005C0.708496 14.9727 1.90191 16.1661 3.37406 16.1661Z"
                                        class="svg-fill" />
                                    <path
                                        d="M3.37406 26.0675C4.84621 26.0675 6.03962 24.874 6.03962 23.4019C6.03962 21.9297 4.84621 20.7363 3.37406 20.7363C1.90191 20.7363 0.708496 21.9297 0.708496 23.4019C0.708496 24.874 1.90191 26.0675 3.37406 26.0675Z"
                                        class="svg-fill" />
                                </svg>
                            </span>
                        </button>
                    </div>

                    {{-- <!-- results total -->
                    <!--يتم عرض 12 من إجمالي 17 الدورات -->
                    <span class="tag-cout text-tertiary text-16 font-600 mr-10" id="showResults"></span>
                    <!-- End result total --> --}}
                </div>
            </div>
        </section>

        <section class="row body" id="course_list">

            <!-- list & Grid  view -->

            <!-- close search?? -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="search-tags flex-grow-1 bd-highlight">
                </div>
            </div>

            <!-- list & Grid  view -->
            {{-- call this  resources\views\frontend\partials\render\course_list.blade.php --}}
            {{-- then is show resources/views/frontend/partials/course/course_widget.blade.php --}}
            <div class="item-list mb-24" id="course-load">

            </div>
        </section>
    </section>

@endsection

@section('scripts')
    <script src="{{ asset('frontend/js/__filter.js') }}"></script>
@endsection
