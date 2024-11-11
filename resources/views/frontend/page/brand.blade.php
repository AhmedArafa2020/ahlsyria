@extends('frontend.layouts.master')
@section('title', @$data['title'])
@section('content')
<!--Bradcam S t a r t -->
@include('frontend.partials.breadcrumb', [
'breadcumb_title' => @$data['title'],
])
<!--End-of Bradcam  -->

<div class="container welcome_screen">
    <div class="head_container">
        <div class="bg2_logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="515.755" height="522.114" viewBox="0 0 515.755 522.114">
                <g id="Group_5" data-name="Group 5" transform="translate(-484.47 -296.91)" opacity="0.06">
                    <g id="Group_1" data-name="Group 1" transform="translate(753.664 298.41)">
                        <path id="Path_1017" data-name="Path 1017"
                            d="M1000.757,450.615v93.4H867.182a18.812,18.812,0,0,1-17.551-12.044v12.044H756.24v-93.4h16.194a18.819,18.819,0,0,1-16.194-18.631V298.41h93.391V386.5l86.438-86.438,63.35,63.35-87.2,87.2Z"
                            transform="translate(-756.24 -298.41)" fill="none" stroke="#707070" stroke-width="3" />
                    </g>
                    <g id="Group_2" data-name="Group 2" transform="translate(753.119 572.997)">
                        <path id="Path_1018" data-name="Path 1018"
                            d="M1001.3,669.031H913.2l86.438,86.438-63.35,63.35-87.211-87.211v88.558H755.69V686.582a18.8,18.8,0,0,1,12.024-17.551H755.69V575.64h93.391v16.254a18.817,18.817,0,0,1,18.641-16.254H1001.3Z"
                            transform="translate(-755.69 -575.64)" fill="none" stroke="#707070" stroke-width="3" />
                    </g>
                    <g id="Group_3" data-name="Group 3" transform="translate(486.515 298.41)">
                        <path id="Path_1019" data-name="Path 1019"
                            d="M714.842,450.615h16.194v93.4H637.645V531.992a18.814,18.814,0,0,1-17.551,12.024H486.52v-93.4h88.548l-87.2-87.2,63.35-63.35L637.655,386.5V298.41h93.391V431.984A18.836,18.836,0,0,1,714.842,450.615Z"
                            transform="translate(-486.52 -298.41)" fill="none" stroke="#707070" stroke-width="3" />
                    </g>
                    <g id="Group_4" data-name="Group 4" transform="translate(485.97 572.997)">
                        <path id="Path_1020" data-name="Path 1020"
                            d="M731.576,669.031H719.552a18.8,18.8,0,0,1,12.024,17.551V820.166H638.185V731.609l-87.211,87.211-63.35-63.35,86.438-86.438H485.97V575.64H619.544a18.821,18.821,0,0,1,18.641,16.194V575.64h93.391Z"
                            transform="translate(-485.97 -575.64)" fill="none" stroke="#707070" stroke-width="3" />
                    </g>
                </g>
            </svg>

        </div>
    </div>
    <div class="section">
        <h3 class="section_title">ماهو</h3>
        <h3 class="section_word">معنى الشعار</h3>
        <div class="section_line"></div>
        <div class="row row-cols-1 row-cols-md-2">

            <div class="grid_text">
                <div>
                    استخدمنا في الشعار فكرة الطيور التي تجتمع لتشكل شكل هندسي متناســق سواء أكانت هذه الطــيور من
                    المدربيـــن المـــلونين أو مـــن المستفيدين من المنصة، والتي تشكل النجمة الثمانية الشـهيرة في التراث
                    السوري والآثار السورية، ونظهر في الفراغ السـالب الأســهم الخارجة التي تعبر عن الفائدة الناتجة عن هذا
                    التجمع
                    <br>
                    <a class="btn btn-primary btn-lg mt-4" href="/frontend/default/download_logo.png" download>
                        حمل الشعار (PNG)
                    </a>
                    <a class="btn btn-primary btn-lg mt-4" href="/frontend/default/download_logo.svg" download>
                        حمل الشعار (SVG)
                    </a>
                </div>
            </div>
            <div class="grid_image {{-- d-none --}} d-md-block">
                <div class="login-image h-100 d-flex justify-content-center align-items-center">
                    {{-- <svg id="Group_951" data-name="Group 951" xmlns="http://www.w3.org/2000/svg" width="498.254"
                        height="180.627" viewBox="0 0 498.254 180.627">
                        <g id="Group_28" data-name="Group 28">
                            <g id="Group_24" data-name="Group 24" transform="translate(93.145 0)">
                                <path id="Path_1025" data-name="Path 1025"
                                    d="M841.321,351.37v32.5H794.843a6.547,6.547,0,0,1-6.107-4.191v4.191h-32.5v-32.5h5.635a6.548,6.548,0,0,1-5.635-6.482V298.41h32.5v30.652l30.077-30.076,22.044,22.043L810.514,351.37Z"
                                    transform="translate(-756.24 -298.41)" fill="#7bc3ec" />
                            </g>
                            <g id="Group_25" data-name="Group 25" transform="translate(92.955 95.543)">
                                <path id="Path_1026" data-name="Path 1026"
                                    d="M841.149,608.136H810.5l30.077,30.076-22.043,22.043L788.186,629.91v30.814h-32.5V614.243a6.543,6.543,0,0,1,4.184-6.107H755.69v-32.5h32.5V581.3a6.548,6.548,0,0,1,6.486-5.656h46.477Z"
                                    transform="translate(-755.69 -575.64)" fill="#d6d49b" />
                            </g>
                            <g id="Group_26" data-name="Group 26" transform="translate(0.19)">
                                <path id="Path_1027" data-name="Path 1027"
                                    d="M565.965,351.37H571.6v32.5H539.1v-4.184A6.547,6.547,0,0,1,533,383.87H486.52v-32.5h30.81l-30.342-30.342,22.043-22.043,30.076,30.076V298.41h32.5v46.478A6.554,6.554,0,0,1,565.965,351.37Z"
                                    transform="translate(-486.52 -298.41)" fill="#212121" />
                            </g>
                            <g id="Group_27" data-name="Group 27" transform="translate(0 95.543)">
                                <path id="Path_1028" data-name="Path 1028"
                                    d="M571.43,608.135h-4.184a6.544,6.544,0,0,1,4.184,6.107v46.481h-32.5V629.909l-30.345,30.346-22.043-22.043,30.076-30.077H485.97v-32.5h46.478a6.549,6.549,0,0,1,6.486,5.635V575.64h32.5Z"
                                    transform="translate(-485.97 -575.64)" fill="#212121" />
                            </g>
                        </g>
                        <g id="Group_104" data-name="Group 104" transform="translate(219.879 27.206)">
                            <g id="Group_29" data-name="Group 29" transform="translate(4.811 0)">
                                <path id="Path_1029" data-name="Path 1029"
                                    d="M390.167,935.883a19.31,19.31,0,0,1-9.1-2.009,21.212,21.212,0,0,1-6.721-5.635l3.363-3.294a15.173,15.173,0,0,0,5.371,4.811,15.721,15.721,0,0,0,7.283,1.581,11.664,11.664,0,0,0,7.051-1.976,6.4,6.4,0,0,0,2.7-5.469,7.461,7.461,0,0,0-1.253-4.448,9.546,9.546,0,0,0-3.261-2.835,31.027,31.027,0,0,0-4.448-1.943q-2.438-.859-4.843-1.814a20.954,20.954,0,0,1-4.448-2.407,10.77,10.77,0,0,1-3.261-3.692,11.911,11.911,0,0,1-1.22-5.734,11.034,11.034,0,0,1,1.781-6.327,11.542,11.542,0,0,1,4.876-4.054,16.766,16.766,0,0,1,7.051-1.419,17.549,17.549,0,0,1,7.876,1.712,16.811,16.811,0,0,1,5.766,4.615l-3.294,3.294a15.561,15.561,0,0,0-4.615-3.822,12.4,12.4,0,0,0-5.868-1.317,10.031,10.031,0,0,0-6.327,1.845,6.142,6.142,0,0,0-2.371,5.14,6.6,6.6,0,0,0,1.22,4.151,9.574,9.574,0,0,0,3.261,2.635,33.192,33.192,0,0,0,4.448,1.879q2.406.825,4.843,1.813a19.543,19.543,0,0,1,4.448,2.5,11.584,11.584,0,0,1,3.261,3.855A12.6,12.6,0,0,1,405,923.49a11.129,11.129,0,0,1-3.989,9.128Q397.017,935.882,390.167,935.883Z"
                                    transform="translate(-374.35 -889.22)" fill="#212121" />
                                <path id="Path_1030" data-name="Path 1030"
                                    d="M514.152,917.675,496.16,891.05h5.668l14.959,22.339h-2.371L529.51,891.05h5.469l-18.123,26.625Zm-.988,18.717V914.183h4.876v22.209Z"
                                    transform="translate(-452.07 -890.388)" fill="#212121" />
                                <path id="Path_1031" data-name="Path 1031"
                                    d="M650.56,936.392V891.05h4.81v45.342Zm3.1-20.3v-4.087H666.84q4.48,0,6.855-2.273a8.936,8.936,0,0,0,0-12.125q-2.372-2.341-6.855-2.338H653.658v-4.217H666.84a16.516,16.516,0,0,1,7.579,1.614,11.6,11.6,0,0,1,4.843,4.448,12.4,12.4,0,0,1,1.68,6.458,12.693,12.693,0,0,1-1.68,6.591,11.207,11.207,0,0,1-4.843,4.384,17.1,17.1,0,0,1-7.579,1.55H653.658Zm24.319,20.3-17-20.957,4.68-1.518,18.518,22.474Z"
                                    transform="translate(-550.584 -890.388)" fill="#212121" />
                                <path id="Path_1032" data-name="Path 1032" d="M792.4,936.392V891.05h4.81v45.342Z"
                                    transform="translate(-641.085 -890.388)" fill="#212121" />
                                <path id="Path_1033" data-name="Path 1033"
                                    d="M857.59,936.392l18.586-45.342H879.8l18.386,45.342h-5.205l-16.016-40.068h1.911L862.73,936.392Zm8.5-11.8v-4.282h23.726v4.282Z"
                                    transform="translate(-682.68 -890.388)" fill="#212121" />
                                <path id="Path_1034" data-name="Path 1034"
                                    d="M1020.18,936.392V891.05h3.427l1.383,5.733v39.608Zm31.37,0-28.667-38.885.724-6.457,28.6,38.885Zm0,0-1.451-5.469V891.05h4.875v45.342Z"
                                    transform="translate(-786.42 -890.388)" fill="#212121" />
                            </g>
                            <g id="Group_30" data-name="Group 30" transform="translate(0 60.519)">
                                <path id="Path_1035" data-name="Path 1035"
                                    d="M361.06,1090.7c0-17.761,13.675-34.284,32.29-34.284h.948a.756.756,0,0,1,.854.854v9.685c0,.666-.286.949-.854.949h-.948c-12.252,0-21.178,10.92-21.178,22.791,0,11.778,8.738,22.792,21.178,22.792,11.112,0,20.9-9.971,20.9-21.083H402.468a2.6,2.6,0,0,1-2.849-2.849v-5.7a2.6,2.6,0,0,1,2.849-2.848h21.75a.508.508,0,0,1,.38.286v.38a30.788,30.788,0,0,1,.854,4.463c.094,1.614.188,3.134.188,4.655,0,17.949-13.58,34.19-32.29,34.19-13.675,0-24.978-9.306-29.822-21.37A35.071,35.071,0,0,1,361.06,1090.7Z"
                                    transform="translate(-361.06 -1056.42)" fill="#212121" />
                                <path id="Path_1036" data-name="Path 1036"
                                    d="M569.1,1059.04h39.127a2.6,2.6,0,0,1,2.848,2.848v5.6a2.6,2.6,0,0,1-2.848,2.849H577.358v12.346h23.459a2.6,2.6,0,0,1,2.848,2.848v5.7a2.6,2.6,0,0,1-2.848,2.849H577.358v20.229h30.868a2.6,2.6,0,0,1,2.848,2.849v5.7a2.6,2.6,0,0,1-2.848,2.848H569.1a2.6,2.6,0,0,1-2.848-2.848v-60.97A2.6,2.6,0,0,1,569.1,1059.04Z"
                                    transform="translate(-491.98 -1058.092)" fill="#212121" />
                                <path id="Path_1037" data-name="Path 1037"
                                    d="M716.568,1059.04H755.7a2.6,2.6,0,0,1,2.849,2.848v5.6a2.6,2.6,0,0,1-2.849,2.849H724.828v12.346h23.458a2.6,2.6,0,0,1,2.849,2.848v5.7a2.6,2.6,0,0,1-2.849,2.849H724.828v20.229H755.7a2.6,2.6,0,0,1,2.849,2.849v5.7a2.6,2.6,0,0,1-2.849,2.848H716.568a2.6,2.6,0,0,1-2.848-2.848v-60.97A2.6,2.6,0,0,1,716.568,1059.04Z"
                                    transform="translate(-586.074 -1058.092)" fill="#212121" />
                                <path id="Path_1038" data-name="Path 1038"
                                    d="M864.038,1059.04h5.416a2.6,2.6,0,0,1,2.848,2.848v40.366l24.406-41.789a2.871,2.871,0,0,1,2.469-1.425h6.458c2.942,0,3.134,1.425,3.134,2.186a3.838,3.838,0,0,1-.666,2.089l-17,29.062,17,29.061a3.849,3.849,0,0,1,.666,2.088c0,.76-.192,2.186-3.134,2.186h-6.458a2.854,2.854,0,0,1-2.469-1.426l-12.059-20.892-12.252,20.9a2.837,2.837,0,0,1-2.468,1.426h-5.889a2.6,2.6,0,0,1-2.848-2.849v-60.972A2.6,2.6,0,0,1,864.038,1059.04Z"
                                    transform="translate(-680.166 -1058.092)" fill="#212121" />
                                <path id="Path_1039" data-name="Path 1039"
                                    d="M1024.811,1059.04h19.756a2.6,2.6,0,0,1,2.848,2.848v5.6a2.6,2.6,0,0,1-2.848,2.849h-19.756a7.331,7.331,0,0,0-6.837,5.128,9,9,0,0,0-.569,3.04c0,3.8,1.615,6.932,5.7,7.6a21.591,21.591,0,0,0,3.8.474l2.849.095h2.848c10.352,0,18.522,9.212,18.522,19.469s-7.692,19.564-18.522,19.564h-21.558a2.6,2.6,0,0,1-2.848-2.85v-5.7a2.6,2.6,0,0,1,2.848-2.849H1032.6a7.322,7.322,0,0,0,6.932-5.128,11.823,11.823,0,0,0,.475-3.041c0-5.317-1.9-7.03-7.124-7.691l-2.374-.192-2.562-.094c-1.807-.094-3.609-.286-5.509-.572a19.3,19.3,0,0,1-16.147-19.09C1006.29,1068.349,1014.267,1059.04,1024.811,1059.04Z"
                                    transform="translate(-772.746 -1058.092)" fill="#212121" />
                            </g>
                        </g>
                    </svg> --}}
                    <img src="/frontend/assets/images/new_logo.png" alt="Logo" style="width: 85%;margin-top: 45px;">
                </div>
            </div>
        </div>
    </div>



</div>
<div class="welcome_screen bg-second">
    <div class="container">
        <div class="section">
            <h3 class="section_title">ماهي</h3>
            <h3 class="section_word">لوحة الالوان</h3>
            <div class="section_line"></div>
            <div class="mt-5">
                <img class="brand-colors" src="/frontend/assets/images/brand_colors.png" alt="Brand Colors">
            </div>
            <div class="section_description">
                نستخدم اللون الأزرق للعناوين الرئيسية وللأسطح الأكثر لفتًا للنظر في الهوية البصرية، ونستخدم اللون الأسود
                للخلفيات الثانوية وللنصوص الطويلة والصغيرة، ويبقى اللون الذهبي للعناوين الثانوية وللزخارف والأنماط التي
                تستخدم لزيادة جمالية التصميم
            </div>
            {{-- <div class="bg_number2">
                <img src="/frontend/assets/images/number2.png" alt="Number2">
            </div> --}}
        </div>
    </div>
</div>
<div class="welcome_screen">

    <div class="container">
        <div class="head_container">
            <div class="bg2_logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="515.755" height="522.114" viewBox="0 0 515.755 522.114">
                    <g id="Group_5" data-name="Group 5" transform="translate(-484.47 -296.91)" opacity="0.06">
                        <g id="Group_1" data-name="Group 1" transform="translate(753.664 298.41)">
                            <path id="Path_1017" data-name="Path 1017"
                                d="M1000.757,450.615v93.4H867.182a18.812,18.812,0,0,1-17.551-12.044v12.044H756.24v-93.4h16.194a18.819,18.819,0,0,1-16.194-18.631V298.41h93.391V386.5l86.438-86.438,63.35,63.35-87.2,87.2Z"
                                transform="translate(-756.24 -298.41)" fill="none" stroke="#707070" stroke-width="3" />
                        </g>
                        <g id="Group_2" data-name="Group 2" transform="translate(753.119 572.997)">
                            <path id="Path_1018" data-name="Path 1018"
                                d="M1001.3,669.031H913.2l86.438,86.438-63.35,63.35-87.211-87.211v88.558H755.69V686.582a18.8,18.8,0,0,1,12.024-17.551H755.69V575.64h93.391v16.254a18.817,18.817,0,0,1,18.641-16.254H1001.3Z"
                                transform="translate(-755.69 -575.64)" fill="none" stroke="#707070" stroke-width="3" />
                        </g>
                        <g id="Group_3" data-name="Group 3" transform="translate(486.515 298.41)">
                            <path id="Path_1019" data-name="Path 1019"
                                d="M714.842,450.615h16.194v93.4H637.645V531.992a18.814,18.814,0,0,1-17.551,12.024H486.52v-93.4h88.548l-87.2-87.2,63.35-63.35L637.655,386.5V298.41h93.391V431.984A18.836,18.836,0,0,1,714.842,450.615Z"
                                transform="translate(-486.52 -298.41)" fill="none" stroke="#707070" stroke-width="3" />
                        </g>
                        <g id="Group_4" data-name="Group 4" transform="translate(485.97 572.997)">
                            <path id="Path_1020" data-name="Path 1020"
                                d="M731.576,669.031H719.552a18.8,18.8,0,0,1,12.024,17.551V820.166H638.185V731.609l-87.211,87.211-63.35-63.35,86.438-86.438H485.97V575.64H619.544a18.821,18.821,0,0,1,18.641,16.194V575.64h93.391Z"
                                transform="translate(-485.97 -575.64)" fill="none" stroke="#707070" stroke-width="3" />
                        </g>
                    </g>
                </svg>
            </div>
        </div>
        <div class="section">
            <h3 class="section_title">ماهو</h3>
            <h3 class="section_word">نظام الخطوط</h3>
            <div class="section_line"></div>
            <div class="mt-5 web-brand">
                <img src="/frontend/assets/images/brand.png" class="img-fluid" alt="Brand">
            </div>
            <div class="mobile-brand">
                <div class="mt-5">
                    <img src="/frontend/assets/images/mobile-brand-1.png" class="img-fluid" alt="Brand">
                </div>
                <div class="mt-5">
                    <img src="/frontend/assets/images/mobile-brand-2.png" class="img-fluid" alt="Brand">
                </div>
            </div>
            {{-- <div class="bg_number3">
                <img src="/frontend/assets/images/number3.png" alt="Number3">
            </div> --}}
        </div>
    </div>

</div>
{{-- @foreach ($data['section'] as $key => $section)
@if ($section->snake_title == 'slider')
@include('frontend.home.hero_area')
@elseif($section->snake_title == 'featured_courses')
@include('frontend.home.featured_courses')
@elseif($section->snake_title == 'popular_category')
@include('frontend.home.popular_category')
@elseif($section->snake_title == 'latest_courses')
@include('frontend.home.latest_courses')
@elseif($section->snake_title == 'best_rated_courses')
@include('frontend.home.best_rated_courses')
@elseif($section->snake_title == 'discount_courses')
@include('frontend.home.discount_courses')
@elseif($section->snake_title == 'most_popular_courses')
@include('frontend.home.most_popular_courses')

@elseif(module('Subscription') && $section->snake_title == 'subscription_packages')
@include('subscription::frontend.packages')

@elseif($section->snake_title == 'become_an_instructor')
@include('frontend.home.become_an_instructor')
@elseif($section->snake_title == 'testimonials')
@include('frontend.home.testimonials')
@elseif($section->snake_title == 'blogs')
@include('frontend.home.blogs')
@elseif($section->snake_title == 'brands')
@include('frontend.home.brands')
@endif
@endforeach --}}
<style>
    .welcome_screen {
        --ot-primary: #231f20;
        --ot-secondary: #7cc3ed;
        --ot-tertiary: #7cc3ed;
        --ot-fourth: #D6D59C;
        color: black;
        padding-bottom: 80px;
    }

    .head_container {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .bg1 {
        position: absolute;
        z-index: -1;
        top: 0;
        margin-top: -180px;
    }

    .bg2_logo {
        position: absolute;
        z-index: -1;
        left: 0;
        margin-left: -300px;
        margin-top: 450px;
    }

    .title_row {
        display: flex;
        gap: 12px;
        margin-top: 4rem;
    }

    .title_text {
        font-weight: 700;
        font-size: 50px;
        color: var(--ot-secondary)
    }

    .welcome_text {
        font-weight: 400;
        font-size: 50px;
    }

    .start_row {
        display: flex;
    }

    .start_title {
        display: inline;
        margin-top: 29px;
        font-size: 30px;
        background: transparent linear-gradient(0deg, #7CC3ED00 0%, #7CC3ED 100%) 0% 0% no-repeat padding-box;
    }

    .start_title p {
        display: inline;
        color: var(--ot-primary-title);
        margin-top: 24px;
        font-size: 30px;
        margin-top: 60px;
        margin-bottom: 30px;
    }

    .section {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 28px;
    }

    .bg-second {
        background: var(--sy-bg2);

    }

    .bg_number2 {
        position: absolute;
        left: 0;
        z-index: -1;
        margin-top: -200px;
    }

    .bg_number3 {
        position: absolute;
        right: 0;
        z-index: -1;
        margin-top: -200px;
        margin-right: 90px;
    }

    .bg_number4 {
        position: absolute;
        left: 0;
        z-index: -1;
        margin-top: -200px;
    }

    .section_title {
        font-weight: 400;
        font-size: 36px;
        color: var(--ot-secondary)
    }

    .section_word {
        font-weight: 400;
        font-size: 50px;
    }

    .section_line {
        width: 130px;
        height: 4px;
        background-color: var(--ot-primary-title);
        border-radius: 99px;
        margin-top: 9px;
    }

    .section_description {
        font-weight: 400;
        font-size: 28px;
        color: var(--sy-content);
        line-height: 60px;
        padding: 0px 60px;
        margin-top: 16px;
        text-align: center;
        word-spacing: 18px;
        margin-bottom: 16px;
        margin-top: 26px;
    }

    .double_grid {
        display: grid;
        width: 100%;
        grid-template-columns: 50% 50%;
    }

    .grid_text {
        padding-top: 60px;
        font-size: 28px;
        color: var(--sy-content);
        line-height: 60px;
        text-justify: auto;
    }

    .card1 {
        display: flex;
        box-shadow: 0px 0px 12px #D2D5D57A;
        border-radius: 16px;
        padding: 20px;
        align-items: center;
        margin-top: 16px;
    }

    .card1 .text {
        font-size: 24px;
        color: var(--dark);
        font-weight: 500;
        margin-right: 20px;
    }

    .card1 .icon {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 12px;
        background-color: var(--ot-fourth);
        border-radius: 16px;
        width: 127px;
        height: 100px;
    }

    .third_grid {
        display: grid;
        width: 100%;
        grid-template-columns: 33% 33% 33%;
        column-gap: 32px;
    }

    .grid_container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card2 {
        display: flex;
        flex-direction: column;
        box-shadow: 0px 0px 24px #D2D5D57A;
        border-radius: 16px;
        padding: 40px 30px;
        align-items: center;
        margin-top: 16px;
        font-size: 28px;
        color: var(--dark);
        text-align: center;
        background: var(--white);
    }

    .card2 .icon {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 12px;
        background-color: var(--ot-fourth);
        border-radius: 16px;
        width: 90px;
        height: 90px;
        margin: 20px 0px;
    }

    @media only screen and (max-width: 575px) {
        .mt_card {
            margin-top: 0px;
        }
    }

    @media only screen and (min-width: 575px) {
        .mt_card {
            margin-top: 48px;
        }
    }

    .fourth_grid {
        display: grid;
        width: 100%;
        grid-template-columns: 33% 33% 33%;
        column-gap: 48px;
    }

    .card3 {
        position: relative;
        display: flex;
        flex-direction: column;
        box-shadow: 0px 0px 24px #D2D5D57A;
        border-radius: 16px;
        padding: 40px 30px;
        align-items: center;
        justify-content: center;
        margin-top: 16px;
        font-size: 28px;
        color: var(--dark);
        text-align: center;
        height: 100%;
        background: var(--white);
    }

    .card3 .icon {
        position: absolute;
        top: 0;
        right: 0;
        margin-top: -30px;
        margin-right: -30px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 12px;
        background-color: var(--ot-fourth);
        border-radius: 100%;
        width: 90px;
        height: 90px;
        font-size: 50px;
        font-weight: 700;
    }
</style>
@endsection