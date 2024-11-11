@extends('frontend.layouts.master')
@section('title', @$data['title'])
@section('content')
<!--Bradcam S t a r t -->
@include('frontend.partials.breadcrumb', [
'breadcumb_title' => @$data['title'],
])
<!--End-of Bradcam  -->


<!-- get-in touch S t a r t-->
<div>
    <div class="container">
        <div class="section">
            <div class="row row-cols-1 row-cols-md-2 w-100">
                <div class="col">
                    <div class="card1">
                        <div class="icon">
                            <svg id="vuesax_outline_call" data-name="vuesax/outline/call"
                                xmlns="http://www.w3.org/2000/svg" width="54.24" height="54.24"
                                viewBox="0 0 54.24 54.24">
                                <g id="call" transform="translate(0)">
                                    <path id="Vector"
                                        d="M36.612,48.59A20.676,20.676,0,0,1,28.589,46.8a42.432,42.432,0,0,1-8.113-4.656,70.545,70.545,0,0,1-7.616-6.486,67.519,67.519,0,0,1-6.486-7.594,42.175,42.175,0,0,1-4.61-8.046A20.925,20.925,0,0,1,0,11.955,13.619,13.619,0,0,1,.927,6.961,12.071,12.071,0,0,1,3.955,2.576,8.207,8.207,0,0,1,9.808,0a6.111,6.111,0,0,1,2.554.565A5.172,5.172,0,0,1,14.532,2.4l5.243,7.39a8.755,8.755,0,0,1,1.085,1.921,5.077,5.077,0,0,1,.452,2.011,4.8,4.8,0,0,1-.723,2.486,9.041,9.041,0,0,1-1.514,1.921l-1.537,1.6a1.1,1.1,0,0,0,.068.158A17.38,17.38,0,0,0,19.459,22.4c1.107,1.266,2.147,2.418,3.187,3.48,1.333,1.311,2.441,2.35,3.48,3.209a14.719,14.719,0,0,0,2.622,1.876l-.045.113,1.65-1.627a8.441,8.441,0,0,1,2.034-1.559,4.77,4.77,0,0,1,4.407-.249,10.289,10.289,0,0,1,1.9,1.062l7.5,5.334A4.857,4.857,0,0,1,48,36.182a6.54,6.54,0,0,1,.5,2.441,7.537,7.537,0,0,1-.723,3.187,10.525,10.525,0,0,1-1.808,2.712,11.591,11.591,0,0,1-4.317,3.1A13.344,13.344,0,0,1,36.612,48.59ZM9.808,3.39a4.954,4.954,0,0,0-3.5,1.627A8.67,8.67,0,0,0,4.091,8.2a9.888,9.888,0,0,0-.7,3.752A17.424,17.424,0,0,0,4.882,18.69,37.725,37.725,0,0,0,9.13,26.058a62.525,62.525,0,0,0,6.125,7.187,63.633,63.633,0,0,0,7.209,6.147A36.72,36.72,0,0,0,29.9,43.663c3.865,1.65,7.481,2.034,10.464.791a8.344,8.344,0,0,0,3.1-2.237,7.329,7.329,0,0,0,1.266-1.9,4,4,0,0,0,.407-1.74,2.7,2.7,0,0,0-.249-1.13,1.71,1.71,0,0,0-.633-.678l-7.5-5.334a6.479,6.479,0,0,0-1.243-.7,1.189,1.189,0,0,0-1.469.068,5.152,5.152,0,0,0-1.311,1.017l-1.718,1.695a3.221,3.221,0,0,1-3.277.678l-.61-.271a19.266,19.266,0,0,1-3.209-2.283c-1.085-.927-2.26-2.011-3.684-3.413C19.12,27.1,18.012,25.9,16.86,24.566a19.282,19.282,0,0,1-2.305-3.187l-.271-.678a4.219,4.219,0,0,1-.181-1.13,2.9,2.9,0,0,1,.859-2.1l1.695-1.763a6.544,6.544,0,0,0,1.017-1.266,1.449,1.449,0,0,0,.249-.768,2.1,2.1,0,0,0-.181-.723,6.483,6.483,0,0,0-.723-1.2L11.775,4.339a2.083,2.083,0,0,0-.836-.7A2.83,2.83,0,0,0,9.808,3.39ZM28.7,31.1l-.362,1.537.61-1.582A.278.278,0,0,0,28.7,31.1Z"
                                        transform="translate(2.825 2.825)" fill="#231f20" />
                                    <path id="Vector-2" data-name="Vector" d="M0,0H54.24V54.24H0Z" fill="none"
                                        opacity="0" />
                                </g>
                            </svg>


                        </div>
                        <div>
                            <div class="text_head">اتصل بنا</div>
                            <div class="text_value">⁦+4915217679732 | +12017482990</div>

                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="card1">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="55.731" height="55.731"
                                viewBox="0 0 55.731 55.731">
                                <g id="vuesax_outline_sms" data-name="vuesax/outline/sms"
                                    transform="translate(-556 -252)">
                                    <g id="sms" transform="translate(556 252)">
                                        <path id="Vector"
                                            d="M36.573,42.959H13.352C4.876,42.959,0,38.083,0,29.607V13.352C0,4.876,4.876,0,13.352,0H36.573c8.476,0,13.352,4.876,13.352,13.352V29.607C49.926,38.083,45.049,42.959,36.573,42.959ZM13.352,3.483c-6.641,0-9.869,3.228-9.869,9.869V29.607c0,6.641,3.228,9.869,9.869,9.869H36.573c6.641,0,9.869-3.228,9.869-9.869V13.352c0-6.641-3.228-9.869-9.869-9.869Z"
                                            transform="translate(2.903 6.386)" fill="#231f20" />
                                        <path id="Vector-2" data-name="Vector"
                                            d="M13.358,10.742A8.632,8.632,0,0,1,7.925,8.907L.656,3.1A1.735,1.735,0,1,1,2.816.385L10.084,6.19a5.541,5.541,0,0,0,6.525,0L23.878.385a1.714,1.714,0,0,1,2.438.279A1.714,1.714,0,0,1,26.037,3.1L18.769,8.907A8.522,8.522,0,0,1,13.358,10.742Z"
                                            transform="translate(14.506 19.144)" fill="#231f20" />
                                        <path id="Vector-3" data-name="Vector" d="M0,0H55.731V55.731H0Z" fill="none"
                                            opacity="0" />
                                    </g>
                                </g>
                            </svg>



                        </div>
                        <div>
                            <div class="text_head">راسلنا بالبريد الالكتروني</div>
                            {{-- <div class="text_value">info@sygeeks.net</div> --}}
                            <div class="text_value">ahlsyria@gmail.com</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="welcome_screen">
    <div class="section">
        <h3 class="section_title">ارسل لنا</h3>
        <h3 class="section_word">رسالة في اي وقت</h3>
        <div class="section_line"></div>
        <div class="container">
            <form action="{{ route('frontend.contact_us.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="position-relative ot-contact-form mb-24 col-12 col-md-6">
                        <input class="form-control ot-contact-input" type="text"
                            placeholder="الاسم" name="name" id="name"
                            aria-label="default input example">

                        @error('name')
                        <div id="error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="position-relative ot-contact-form mb-24 col-12 col-md-6">
                        <input class="form-control ot-contact-input" type="email"
                            placeholder="البريد الإلكتروني" name="email" id="email"
                            aria-label="default input example">
                        @error('email')
                        <div id="error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="position-relative ot-contact-form mb-24 col-12 col-md-6">
                        <input style="text-align: right" class="form-control ot-contact-input" type="tel" placeholder="رقم الهاتف" name="phone"
                            id="phone" aria-label="default input example">
                        @error('email')
                        <div id="error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="position-relative ot-contact-form mb-24 col-12 col-md-6">
                        <input class="form-control ot-contact-input" type="subject" id="subject"
                            placeholder="الموضوع" name="subject"
                            aria-label="default input example">
                        @error('subject')
                        <div id="error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="position-relative ot-contact-form mb-24 col-12">
                        <textarea class="ot-contact-textarea" placeholder="الرسالة"
                            name="message" id="message" cols="10" rows="8"></textarea>
                        @error('message')
                        <div id="error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn-primary-submit">إرسال</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div>
    <div class="section mb-20">
        <h3 class="section_title">تابعنا الان</h3>
        <h3 class="section_word">على منصات التواصل الاجتماعي</h3>
        <div class="section_line"></div>
        <div class="icons_grid">
            <a href="https://www.facebook.com/sygeeksnet">
                <div class="icon">
                    <svg id="vuesax_bold_facebook" data-name="vuesax/bold/facebook" xmlns="http://www.w3.org/2000/svg"
                        width="57.825" height="57.825" viewBox="0 0 57.825 57.825">
                        <g id="facebook">
                            <path id="BG_111" data-name="BG 111" d="M0,0H57.825V57.825H0Z" fill="none" opacity="0.58" />
                            <path id="Vector"
                                d="M48.188,34.189c0,8.77-5.228,14-14,14H31.322a2.416,2.416,0,0,1-2.409-2.409v-13.9a1.2,1.2,0,0,1,1.181-1.2l4.241-.072a.768.768,0,0,0,.7-.6l.843-4.6a.729.729,0,0,0-.723-.843l-5.132.072a1.225,1.225,0,0,1-1.229-1.181l-.1-5.9a.725.725,0,0,1,.723-.723l5.783-.1A.71.71,0,0,0,35.924,16l-.1-5.783a.71.71,0,0,0-.723-.723l-6.505.1a7.219,7.219,0,0,0-7.108,7.349l.12,6.626a1.193,1.193,0,0,1-1.181,1.229l-2.891.048a.71.71,0,0,0-.723.723l.072,4.578a.71.71,0,0,0,.723.723l2.891-.048A1.225,1.225,0,0,1,21.733,32l.217,13.734a2.412,2.412,0,0,1-2.409,2.458H14c-8.77,0-14-5.228-14-14.023V14C0,5.228,5.228,0,14,0H34.189c8.77,0,14,5.228,14,14V34.189Z"
                                transform="translate(4.819 4.819)" fill="#231f20" />
                            <path id="Vector-2" data-name="Vector" d="M0,0H57.825V57.825H0Z" fill="none" opacity="0" />
                        </g>
                    </svg>
                </div>
            </a>
            <a href="https://www.instagram.com/sygeeksnet/">
                <div class="icon center_icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="46.343" height="46.342" viewBox="0 0 46.343 46.342">
                        <g id="svgexport-6_2_" data-name="svgexport-6 (2)" transform="translate(0)" opacity="0.98">
                            <g id="Group_911" data-name="Group 911" transform="translate(35.518 8.575)">
                                <g id="Group_910" data-name="Group 910">
                                    <path id="Path_3183" data-name="Path 3183"
                                        d="M393.526,94.739a1.125,1.125,0,1,0,1.125,1.125A1.126,1.126,0,0,0,393.526,94.739Z"
                                        transform="translate(-392.401 -94.739)" fill="#231f20" />
                                </g>
                            </g>
                            <g id="Group_913" data-name="Group 913" transform="translate(13.197 13.197)">
                                <g id="Group_912" data-name="Group 912">
                                    <path id="Path_3184" data-name="Path 3184"
                                        d="M155.778,145.8a9.974,9.974,0,1,0,9.974,9.974A9.986,9.986,0,0,0,155.778,145.8Z"
                                        transform="translate(-145.804 -145.804)" fill="#231f20" />
                                </g>
                            </g>
                            <g id="Group_915" data-name="Group 915" transform="translate(0)">
                                <g id="Group_914" data-name="Group 914">
                                    <path id="Path_3185" data-name="Path 3185"
                                        d="M33.639,0H12.7A12.719,12.719,0,0,0,0,12.7V33.638a12.718,12.718,0,0,0,12.7,12.7H33.639a12.718,12.718,0,0,0,12.7-12.7V12.7A12.718,12.718,0,0,0,33.639,0ZM23.171,35.882A12.711,12.711,0,1,1,35.882,23.171,12.725,12.725,0,0,1,23.171,35.882Zm13.471-22.32A3.862,3.862,0,1,1,40.5,9.7,3.866,3.866,0,0,1,36.643,13.562Z"
                                        fill="#231f20" />
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
            </a>
            <a href="https://www.linkedin.com/company/sygeeksnet/">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48.111" height="48.109" viewBox="0 0 48.111 48.109">
                        <g id="linkedin" transform="translate(4 -1.782)">
                            <path id="Path_2520"
                                d="M40.994,42.776H33.865V31.612c0-2.662-.047-6.088-3.708-6.088-3.713,0-4.282,2.9-4.282,5.9V42.776H18.748V19.817h6.845v3.137h.095a7.5,7.5,0,0,1,6.752-3.708C39.666,19.246,41,24,41,30.18ZM10.7,16.678a4.137,4.137,0,1,1,4.137-4.137A4.136,4.136,0,0,1,10.7,16.678h0m3.563,26.1H7.131V19.817h7.136ZM44.547,1.785h-41A3.512,3.512,0,0,0,0,5.253V46.42a3.512,3.512,0,0,0,3.549,3.471h41a3.52,3.52,0,0,0,3.563-3.471V5.251a3.519,3.519,0,0,0-3.563-3.468"
                                transform="translate(-4 0)" />
                        </g>
                    </svg>

                </div>
            </a>
        </div>
    </div>
</div>
<!-- End-of get-in touch-->

<!-- Map S t a r t -->
{{-- <div class="map-area bottom-padding">
    <div class="container">
        <div class="col-lg-12">
            <div class="map-wrapper">
                <iframe src="<?= Setting('application_map') ?>" width="600" height="450" allowfullscreen=""
                    loading="lazy" width="100%" height="370px"></iframe>
            </div>
        </div>
    </div>
</div> --}}
<!-- End-of Map -->

<style>
    .welcome_screen {
        --ot-primary: #231f20;
        --ot-secondary: #7cc3ed;
        --ot-tertiary: #7cc3ed;
        --ot-fourth: #D6D59C;
        color: black;
        background: var(--sy-bg2);
        padding-bottom: 28px;
        margin-top: 28px;

    }

    .head_container {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-bottom: 110px;
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
        right: 0;
        margin-right: -300px;
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
        color: black;
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
        margin-top: 88px;
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
        text-align: center
    }

    .section_line {
        width: 130px;
        height: 4px;
        background-color: black;
        border-radius: 99px;
        margin-top: 9px;
        margin-bottom: 19px;
    }

    .section_description {
        font-weight: 400;
        font-size: 20px;
        color: #707070;
        padding: 0px 60px;
        margin-top: 16px;
        text-align: center;
        line-height: 44px;
        margin-bottom: 16px;
    }

    .double_grid {
        display: grid;
        width: 100%;
        grid-template-columns: 50% 50%;
    }

    .grid_text {
        padding-top: 60px;
        font-size: 28px;
        color: #707070;
        line-height: 60px;
        text-justify: auto;
    }

    .card1 {
        display: flex;
        border: 1px solid var(--unnamed-color-d2d5d5);
        background: var(--white) 0% 0% no-repeat padding-box;
        border: 1px solid #D2D5D5;
        border-radius: 8px;
        opacity: 1;
        padding: 20px;
        align-items: center;
        margin-top: 16px;
    }

    .card1 .text {
        font-size: 24px;
        color: var(--ot-primary);
        font-weight: 500;
        margin-right: 20px;
    }

    .card1 .text_head {
        font-size: 24px;
        color: var(--ot-primary);
        font-weight: 700;
        margin-right: 20px;
    }

    .card1 .text_value {
        font-size: 24px;
        color: gray;
        margin-right: 20px;
    }


    .card1 .icon {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 12px;
        background-color: var(--ot-fourth);
        border-radius: 999px;
        width: 100px;
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
        font-size: 22px;
        color: var(--ot-primary);
        text-align: center;
        background: #fff;
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
        color: var(--ot-primary);
        text-align: center;
        height: 100%;
        background: #fff;
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

    .icons_grid {
        display: flex;
    }

    .icons_grid .icon {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 12px;
        background-color: var(--ot-fourth);
        border-radius: 999px;
        width: 100px;
        height: 100px;
    }

    .icons_grid .center_icon {
        margin-left: 70px;
        margin-right: 70px;
        margin-bottom: 25px;
    }
</style>
@endsection
@section('scripts')

@endsection