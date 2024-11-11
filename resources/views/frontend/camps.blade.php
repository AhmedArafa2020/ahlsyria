@extends('frontend.layouts.master')
@section('title', $data['title'])
@section('content')

{{-- @include('frontend.partials.breadcrumb', [
    'breadcumb_title' => $data['title'],
]) --}}

<style>
    .camps-breadcrumb {
        background-size: cover;
        background-position: center;
        color: white;
        text-align: center;
        padding: 100px 0;
    }
    .title_text {
        font-weight: 700;
        font-size: 40px;
        color: var(--ot-secondary);
        margin-bottom: 10px;
    }
    .grid_text {
        font-size: 18px;
        color: var(--sy-content);
        line-height: 30px;
        text-justify: auto;
    }
    .title_text2 {
        font-weight: bold;
        font-size: 21px;
        color: #D6D59C;
    }
    .camp-ul{
        list-style-type: disc;
        padding-right: 30px;
    }
    .camp-ul li{
        list-style-type: disc;
    }
    .importance-of-camp .item{
        margin-top: 20px;
        -webkit-box-shadow: 0 0.25rem 0.5625rem -0.0625rem rgba(12, 8, 0, 0.03), 0 0.275rem 1.25rem -0.0625rem rgba(12, 8, 0, 0.05) !important;
        box-shadow: 0 0.25rem 0.5625rem -0.0625rem rgba(12, 8, 0, 0.03), 0 0.275rem 1.25rem -0.0625rem rgba(12, 8, 0, 0.05) !important;
        background: #fff;
        border-radius: 10px;
        padding: 20px
    }
    .importance-of-camp{
        background: #f9f9f9;
        padding: 50px 0;
    }
    .camps-breadcrumb h1{
        font-size: 50px;
        font-weight: 700;
        color: #fff;
    }
    .camps-breadcrumb p{
        color: #fff;
        margin-top: 30px;
        font-size: 30px;
    }
    .about-camp{
        background: #f9f9f9;
        padding-top: 50px
    }
    .res{
        text-align: center;
        width: 200px;
    }
    .res-p{
        display: flex;
        justify-content: center;
    }
    /*  */
    .section {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 28px;
    }
    .section_title {
        font-weight: 400;
        font-size: 36px;
        color: var(--ot-secondary);
    }
    .section_word {
        font-weight: 400;
        font-size: 50px;
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
    .section_title, .section_word{
        text-align: center
    }
    .targeted-people{

    }
    .application-requirements{
        background: #f9f9f9;
        padding: 50px 0 100px 0;
    }
    .application-requirements .section_word{
        margin-bottom: 30px;
    }
    .camp-axes .grid_text{
        font-size: 25px;
        line-height: 1.5;
    }
    .camp-axes .title_text{
        margin-top: 25px
    }
    #carouselExample .carousel-inner{
        text-align: center;
    }
    .carousel-control-prev, .carousel-control-next{
        background: #000;
        width: 40px;
        height: 40px;
        top: 120px;
        border-radius: 31px;
        padding: 10px;
    }
    .testmaonail{
        padding: 50px 0;
    }
    .camp-axes{
        background: #f9f9f9;
        padding: 50px 0;
    }
    #carouselExample p{
        font-size: 22px;
        margin-top: 15px;
    }
</style>
<section class="header text-white camps-breadcrumb">
    <h1>المخيم التدريبي لتطوير الواجهات الخلفية</h1>
    <p>طريقك الأمثل نحو احتراف البرمجة</p>
    {{-- <a href="#register" class="btn btn-primary btn-lg mt-4">سجّل الآن</a> --}}
</section>

<div class="ot-sidebar-overlay"></div>

<section class="mb-50 about-camp">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6">
                <h2 class="title_text" style="margin-top: 50px">
                    عن المخيم
                </h2>
                <p class="grid_text" style="margin-top: 30px">
                    في عالم اليوم الذي يشهد تحولًا رقميًا سريعًا، أصبحت مهارات البرمجة من بين الأكثر طلبًا في سوق العمل؛ ومع ازدياد الحاجة إلى التطبيقات الحديثة والمواقع المتطورة، يقدم المخيم التدريبي لتطوير الواجهات الخلفية فرصة مثالية لتعلم واكتساب المهارات اللازمة لدخول هذا المجال الواعد.
                </p>
                <h2 class="title_text2" style="margin-top: 30px">
                    ما هو مخيم تطوير الواجهات الخلفية؟
                </h2>
                <p class="grid_text">
                    المخيم هو برنامج تدريبي مكثف، ننظمه في مجتمع Syrian Geeks، لتأهيل الشباب السوري في مجال تطوير الواجهات الخلفية لمواقع الويب، من خلال برنامج قيّم ومدروس، ومع مدربين أكفاء وذوو خبرة كافية.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="/frontend/assets/images/13.png" alt="" class="w-100">
            </div>
        </div>
    </div>
</section>

{{-- <section class="mt-50 mb-50 camp-axesaa">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="/frontend/assets/images/11.png" alt="">
            </div>
            <div class="col-lg-6">
                <h2 class="title_text">
                    محاور المخيم التدريبي
                </h2>
                <div>
                    <h3 class="title_text2">الأساسيات العامة لتصميم وتطوير المواقع (20 ساعة تدريبية):</h3>
                    <ul class="camp-ul">
                        <li class="grid_text">HTML وCSS: الأساسيات المستخدمة في بناء وتصميم صفحات الويب.</li>
                        <li class="grid_text">مبادئ البرمجة باستخدام JavaScript: اكتساب المهارات الأولية في البرمجة وتعلم كيفية التحكم في التفاعل على صفحات الويب.</li>
                    </ul>
                </div>
                <div>
                    <h3 class="title_text2">تطوير الواجهات الخلفية (80 ساعة تدريبية):</h3>
                    <ul class="camp-ul">
                        <li class="grid_text">إدارة الشيفرات باستخدام Git وGitHub: كيفية العمل بشكل متزامن مع فرق تطوير البرمجيات باستخدام نظام التحكم في الإصدارات.لأساسيات المستخدمة في بناء وتصميم صفحات الويب.</li>
                        <li class="grid_text">JavaScript المتقدم: دراسة وظائف البرمجة المعقدة، مثل البرمجة غير المتزامنة (Async/Await)، وإدارة البيانات باستخدام الكائنات والمصفوفات.</li>
                        <li class="grid_text">البرمجة باستخدام Node.js وExpress.js: بناء وتطوير تطبيقات الويب باستخدام Node.js مع إطارات العمل الأكثر شيوعًا مثل Express.js.</li>
                        <li class="grid_text">تصميم قواعد البيانات: تعلم كيفية التعامل مع قواعد البيانات العلائقية (SQL) وغير العلائقية (NoSQL) لإنشاء تطبيقات قوية ومرنة.</li>
                        <li class="grid_text">RESTful API: بناء وتصميم واجهات برمجة التطبيقات باستخدام تقنيات RESTful، بما يتيح التكامل بين الأنظمة المختلفة.</li>
                        <li class="grid_text">الأمان واختبارات البرمجيات: تعلم أفضل الممارسات لتأمين التطبيقات واختبار الكود لضمان الجودة.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<div class="section">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 d-flex align-items-center justify-content-between">
            <div class="col">
                <div class="d-none d-md-block">
                    <img src="/frontend/assets/images/persona2.png" alt="Person Waving" class="w-100">
                </div>
            </div>
            <div class="col">
                <h2 class="title_text text-right">محاور المخيم التدريبي</h2>
                <h3 class="title_text2 mb-30">الأساسيات العامة لتصميم وتطوير المواقع (20 ساعة تدريبية)</h3>
                <div class="card1">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="76.37" height="76.37" viewBox="0 0 76.37 76.37">
                            <g id="vuesax_linear_devices" data-name="vuesax/linear/devices"
                                transform="translate(-620 -252)">
                                <g id="devices" transform="translate(620 252)">
                                    <path id="Vector" d="M6.81,3.4A3.4,3.4,0,1,1,3.4,0,3.4,3.4,0,0,1,6.81,3.4Z"
                                        transform="translate(50.722 33.698)" fill="none" stroke="#231f20"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                    <path id="Vector-2" data-name="Vector"
                                        d="M57.277,12.728v5.7a22.935,22.935,0,0,0-2.7-.159H40.953c-6.81,0-9.069,2.259-9.069,9.069v16.26H12.728C2.546,43.594,0,41.049,0,30.866V12.728C0,2.546,2.546,0,12.728,0H44.549C54.732,0,57.277,2.546,57.277,12.728Z"
                                        transform="translate(6.364 6.364)" fill="none" stroke="#231f20"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                    <path id="Vector-3" data-name="Vector" d="M0,0V13.683"
                                        transform="translate(28.639 49.959)" fill="none" stroke="#231f20"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                    <path id="Vector-4" data-name="Vector" d="M0,0H31.821"
                                        transform="translate(6.364 37.867)" fill="none" stroke="#231f20"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                    <path id="Vector-5" data-name="Vector" d="M0,0H19.251"
                                        transform="translate(18.933 63.641)" fill="none" stroke="#231f20"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                    <g id="Group" transform="translate(38.249 24.629)">
                                        <path id="Vector-6" data-name="Vector"
                                            d="M6.81,3.4A3.4,3.4,0,1,1,3.4,0,3.4,3.4,0,0,1,6.81,3.4Z"
                                            transform="translate(12.474 9.069)" fill="none" stroke="#231f20"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                        <path id="Vector-7" data-name="Vector"
                                            d="M25.393.159A22.935,22.935,0,0,0,22.688,0H9.069C2.259,0,0,2.259,0,9.069V36.308c0,6.81,2.259,9.069,9.069,9.069H22.688c6.81,0,9.069-2.259,9.069-9.069V9.069C31.757,3.246,30.1.764,25.393.159Zm-9.514,8.91a3.4,3.4,0,1,1-3.4,3.4A3.408,3.408,0,0,1,15.879,9.069Zm0,27.238a6.81,6.81,0,1,1,4.455-11.965A6.912,6.912,0,0,1,22.688,29.5,6.817,6.817,0,0,1,15.879,36.308Z"
                                            transform="translate(0)" fill="none" stroke="#231f20" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" />
                                        <path id="Vector-8" data-name="Vector"
                                            d="M13.619,6.81a6.8,6.8,0,1,1-2.355-5.155A6.912,6.912,0,0,1,13.619,6.81Z"
                                            transform="translate(9.069 22.688)" fill="none" stroke="#231f20"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                        <path id="Vector-9" data-name="Vector"
                                            d="M6.81,3.4A3.4,3.4,0,1,1,3.4,0,3.4,3.4,0,0,1,6.81,3.4Z"
                                            transform="translate(12.474 9.069)" fill="none" stroke="#231f20"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                    </g>
                                    <path id="Vector-10" data-name="Vector" d="M0,0H76.37V76.37H0Z" fill="none"
                                        opacity="0" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="text">
                        HTML وCSS: الأساسيات المستخدمة في بناء وتصميم صفحات الويب.
                    </div>
                </div>
                <div class="card1">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="78.619" height="78.619"
                            viewBox="0 0 78.619 78.619">
                            <g id="vuesax_linear_profile-2user" data-name="vuesax/linear/profile-2user"
                                transform="translate(-172 -252)">
                                <g id="profile-2user" transform="translate(172 252)">
                                    <path id="Vector"
                                        d="M15.069,29.056a5.955,5.955,0,0,0-1.081,0,14.561,14.561,0,1,1,1.081,0Z"
                                        transform="translate(14.938 6.552)" fill="none" stroke="#231f20"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                    <path id="Vector-2" data-name="Vector"
                                        d="M.426,0A11.457,11.457,0,0,1,11.891,11.465,11.481,11.481,0,0,1,.852,22.93a3.7,3.7,0,0,0-.852,0"
                                        transform="translate(53.33 13.103)" fill="none" stroke="#231f20"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                    <path id="Vector-3" data-name="Vector"
                                        d="M5.946,4.5c-7.927,5.307-7.927,13.955,0,19.229,9.008,6.027,23.782,6.027,32.791,0,7.927-5.307,7.927-13.955,0-19.229C29.76-1.5,14.987-1.5,5.946,4.5Z"
                                        transform="translate(7.682 43.199)" fill="none" stroke="#231f20"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                    <path id="Vector-4" data-name="Vector"
                                        d="M0,19.655A15.846,15.846,0,0,0,6.421,16.8c5.11-3.833,5.11-10.155,0-13.988A16.292,16.292,0,0,0,.1,0"
                                        transform="translate(60.078 45.861)" fill="none" stroke="#231f20"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                    <path id="Vector-5" data-name="Vector" d="M0,0H78.619V78.619H0Z"
                                        transform="translate(78.619 78.619) rotate(180)" fill="none" opacity="0" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="text">
                        مبادئ البرمجة باستخدام JavaScript: اكتساب المهارات الأولية في البرمجة وتعلم كيفية التحكم في التفاعل على صفحات الويب.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section" style="margin-top: 0px !important">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 d-flex align-items-center justify-content-between">
            <div class="col">
                <h2 class="title_text text-right">محاور المخيم التدريبي</h2>
                <h3 class="title_text2 mb-30">تطوير الواجهات الخلفية (80 ساعة تدريبية)</h3>
                <ul class="camp-ul">
                    <li class="grid_text">إدارة الشيفرات باستخدام Git وGitHub: كيفية العمل بشكل متزامن مع فرق تطوير البرمجيات باستخدام نظام التحكم في الإصدارات.لأساسيات المستخدمة في بناء وتصميم صفحات الويب.</li>
                    <li class="grid_text">JavaScript المتقدم: دراسة وظائف البرمجة المعقدة، مثل البرمجة غير المتزامنة (Async/Await)، وإدارة البيانات باستخدام الكائنات والمصفوفات.</li>
                    <li class="grid_text">البرمجة باستخدام Node.js وExpress.js: بناء وتطوير تطبيقات الويب باستخدام Node.js مع إطارات العمل الأكثر شيوعًا مثل Express.js.</li>
                    <li class="grid_text">تصميم قواعد البيانات: تعلم كيفية التعامل مع قواعد البيانات العلائقية (SQL) وغير العلائقية (NoSQL) لإنشاء تطبيقات قوية ومرنة.</li>
                    <li class="grid_text">RESTful API: بناء وتصميم واجهات برمجة التطبيقات باستخدام تقنيات RESTful، بما يتيح التكامل بين الأنظمة المختلفة.</li>
                    <li class="grid_text">الأمان واختبارات البرمجيات: تعلم أفضل الممارسات لتأمين التطبيقات واختبار الكود لضمان الجودة.</li>
                </ul>
            </div>
            <div class="col">
                <div class="d-none d-md-block">
                    <img src="/frontend/assets/images/11.png" alt="Person Waving" class="w-100">
                </div>
            </div>
        </div>
    </div>
</div>

<section class="mt-30 mb-20 importance-of-camp">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-lg-6">
                <img src="/frontend/assets/images/12.png" alt="" class="w-100">
            </div>
            <div class="col-lg-6">
                <h2 class="title_text">
                    أهمية المخيم ومخرجاته
                </h2>
                <p class="grid_text">
                    يعد المخيم أكثر من مجرد برنامج تعليمي، فهو بوابتك إلى سوق العمل الاحترافي في مجال تطوير البرمجيات، فبمجرد إتمام البرنامج، ستكون مؤهلاً لتحقيق التالي:
                </p>
                <ul class="camp-ul">
                    <li class="grid_text">القدرة على تطوير مواقع وتطبيقات متكاملة: من تصميم الواجهة الأمامية إلى بناء قاعدة البيانات والواجهة الخلفية.</li>
                    <li class="grid_text">تحسين كفاءة العمل ضمن فرق برمجية: باستخدام أدوات مثل Git وGitHub لإدارة الشيفرة البرمجية.</li>
                    <li class="grid_text">تصميم قواعد بيانات متقدمة: سواء كنت تعمل مع SQL أو NoSQL، ستكون قادرًا على اختيار التصميم الأنسب للمشروع.</li>
                    <li class="grid_text">بناء مسار وظيفي قوي في البرمجة: سواء كنت تبحث عن العمل كموظف أو كمطور مستقل، المخيم سيجهزك للمنافسة في السوق.</li>
                    <li class="grid_text">التحضير لمشاريع حقيقية: ستحصل على الخبرة العملية اللازمة لبناء مشاريع فعلية يمكن استخدامها كعينات عمل في المستقبل.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="section targeted-people">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title_text" style="text-align: center">المستهدفون في المخيم</h3>
                <h3 class="section_word">الشباب السوري الراغبون في:</h3>
                <div class="section_line"></div>
                <div class="row row-cols-md-3 row-cols-1">
                    <div class="col mt_card">
                        <div class="card2">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="61.646" height="61.646"
                                    viewBox="0 0 61.646 61.646">
                                    <g id="vuesax_outline_medal-star" data-name="vuesax/outline/medal-star"
                                        transform="translate(-684 -252)">
                                        <g id="medal-star" transform="translate(684 252)">
                                            <path id="Vector"
                                                d="M19.907,39.813a16.841,16.841,0,0,1-3.031-.257,19.886,19.886,0,1,1,5.985.026A17.9,17.9,0,0,1,19.907,39.813Zm0-35.96a16.025,16.025,0,0,0-2.44,31.876,13.565,13.565,0,0,0,4.778,0A16.023,16.023,0,0,0,19.907,3.853Z"
                                                transform="translate(10.916 3.211)" fill="#231f20" />
                                            <path id="Vector-2" data-name="Vector"
                                                d="M13.471,26.875a4.919,4.919,0,0,1-1.053-.128,4.433,4.433,0,0,1-3.339-3.339l-.9-3.776a.671.671,0,0,0-.488-.488l-4.238-1A4.47,4.47,0,0,1,.166,15.008,4.535,4.535,0,0,1,1.322,10.59L11.34.573a1.906,1.906,0,0,1,2.954.283A16.092,16.092,0,0,0,25.261,7.791a13.565,13.565,0,0,0,4.778,0A16.084,16.084,0,0,0,41.058.855,1.881,1.881,0,0,1,42.471.008a1.935,1.935,0,0,1,1.541.565L54.029,10.59a4.535,4.535,0,0,1,1.156,4.418A4.468,4.468,0,0,1,51.9,18.142l-4.238,1a.671.671,0,0,0-.488.488l-.9,3.776a4.486,4.486,0,0,1-7.808,1.849L27.676,12.851,16.888,25.283A4.453,4.453,0,0,1,13.471,26.875ZM12.5,4.888,4.045,13.339a.6.6,0,0,0-.154.642.571.571,0,0,0,.462.437l4.238,1a4.433,4.433,0,0,1,3.339,3.339l.9,3.776a.659.659,0,0,0,.488.488.646.646,0,0,0,.642-.205L23.8,11.489A19.952,19.952,0,0,1,12.5,4.888Zm19.059,6.576,9.838,11.3A.61.61,0,0,0,42.06,23a.651.651,0,0,0,.488-.488l.9-3.776a4.433,4.433,0,0,1,3.339-3.339l4.238-1a.647.647,0,0,0,.308-1.079L42.882,4.862A20.017,20.017,0,0,1,31.554,11.464Z"
                                                transform="translate(3.147 31.149)" fill="#231f20" />
                                            <path id="Vector-3" data-name="Vector"
                                                d="M15.373,20.934a4.67,4.67,0,0,1-2.414-.745l-2.44-1.464-2.44,1.438c-2.235,1.336-3.7.565-4.238.18s-1.7-1.541-1.1-4.084l.616-2.646L1.3,11.713A3.694,3.694,0,0,1,.141,7.988,3.639,3.639,0,0,1,3.249,5.625L6,5.163l1.31-2.877A3.675,3.675,0,0,1,10.518,0a3.676,3.676,0,0,1,3.211,2.312l1.515,3.031,2.543.308A3.706,3.706,0,0,1,20.9,8.014a3.694,3.694,0,0,1-1.156,3.724L17.607,13.87l.668,2.389c.591,2.543-.565,3.7-1.1,4.084A2.861,2.861,0,0,1,15.373,20.934ZM4.379,9.375l1.772,1.772a3.806,3.806,0,0,1,.976,3.339l-.488,2.055,2.055-1.207a3.742,3.742,0,0,1,3.673,0l2.055,1.207-.462-2.055a3.77,3.77,0,0,1,.95-3.339l1.772-1.772L14.448,8.99A3.82,3.82,0,0,1,11.8,7.038L10.518,4.521,9.234,7.089a3.793,3.793,0,0,1-2.62,1.952Z"
                                                transform="translate(20.305 12.175)" fill="#231f20" />
                                            <path id="Vector-4" data-name="Vector" d="M0,0H61.646V61.646H0Z" fill="none"
                                                opacity="0" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div>الطلاب الجامعيون وخريجو الجامعات.</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card2">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="66.956" height="66.956"
                                    viewBox="0 0 66.956 66.956">
                                    <g id="vuesax_outline_crown" data-name="vuesax/outline/crown"
                                        transform="translate(-172 -380)">
                                        <g id="crown" transform="translate(172 380)">
                                            <path id="Vector"
                                                d="M43.322,51.612H17.1a5.405,5.405,0,0,1-4.854-3.4L.693,15.874C-.729,11.8.3,9.932,1.419,9.095s3.208-1.339,6.723,1.172l10.88,7.784a1.252,1.252,0,0,0,.865.223,1.015,1.015,0,0,0,.586-.7l4.91-13.084C26.862.586,29.038,0,30.21,0s3.348.586,4.826,4.492l4.91,13.084a1.081,1.081,0,0,0,.586.7.929.929,0,0,0,.865-.251l10.211-7.281c3.738-2.678,5.914-2.148,7.114-1.283,1.172.893,2.26,2.874.725,7.2L48.176,48.208A5.405,5.405,0,0,1,43.322,51.612ZM4.209,12.777a7.547,7.547,0,0,0,.446,1.674L16.2,46.785a1.3,1.3,0,0,0,.893.642H43.322a1.2,1.2,0,0,0,.893-.642L55.485,15.26a8.033,8.033,0,0,0,.53-2.2,7.622,7.622,0,0,0-1.981,1.116L43.824,21.454a5,5,0,0,1-7.811-2.371L31.1,6a5.347,5.347,0,0,0-.893-1.674,5.441,5.441,0,0,0-.893,1.646l-4.91,13.084a5.09,5.09,0,0,1-3.292,3.208,5.225,5.225,0,0,1-4.52-.837L5.715,13.642A7.7,7.7,0,0,0,4.209,12.777Z"
                                                transform="translate(3.268 3.432)" fill="#292d32" />
                                            <path id="Vector-2" data-name="Vector"
                                                d="M32.78,4.185H2.092A2.108,2.108,0,0,1,0,2.092,2.108,2.108,0,0,1,2.092,0H32.78a2.108,2.108,0,0,1,2.092,2.092A2.108,2.108,0,0,1,32.78,4.185Z"
                                                transform="translate(16.041 59.284)" fill="#292d32" />
                                            <path id="Vector-3" data-name="Vector"
                                                d="M16.041,4.185H2.092A2.108,2.108,0,0,1,0,2.092,2.108,2.108,0,0,1,2.092,0H16.041a2.108,2.108,0,0,1,2.092,2.092A2.108,2.108,0,0,1,16.041,4.185Z"
                                                transform="translate(24.411 36.965)" fill="#292d32" />
                                            <path id="Vector-4" data-name="Vector" d="M0,0H66.956V66.956H0Z" fill="none"
                                                opacity="0" />
                                        </g>
                                    </g>
                                </svg>

                            </div>
                            <div>المهتمون بتطوير الواجهات الخلفية.</div>
                        </div>
                    </div>
                    <div class="col mt_card">
                        <div class="card2">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="63.231" height="63.231"
                                    viewBox="0 0 63.231 63.231">
                                    <g id="vuesax_outline_signpost" data-name="vuesax/outline/signpost"
                                        transform="translate(-300 -700)">
                                        <g id="signpost" transform="translate(300 700)">
                                            <path id="Vector"
                                                d="M34.119,22.394H12.356a6.52,6.52,0,0,1-4.11-1.449l-5.77-4.611a6.567,6.567,0,0,1,0-10.275l5.77-4.611A6.677,6.677,0,0,1,12.356,0H34.119a6.589,6.589,0,0,1,6.587,6.587v9.221A6.589,6.589,0,0,1,34.119,22.394ZM12.356,3.952a2.575,2.575,0,0,0-1.633.58L4.953,9.142a2.61,2.61,0,0,0,0,4.11l5.77,4.611a2.687,2.687,0,0,0,1.633.58H34.119a2.642,2.642,0,0,0,2.635-2.635V6.587a2.642,2.642,0,0,0-2.635-2.635Z"
                                                transform="translate(11.25 3.293)" fill="#231f20" />
                                            <path id="Vector-2" data-name="Vector"
                                                d="M28.349,22.394H6.587A6.589,6.589,0,0,1,0,15.808V6.587A6.589,6.589,0,0,1,6.587,0H28.349a6.467,6.467,0,0,1,4.11,1.449l5.77,4.611a6.567,6.567,0,0,1,0,10.275l-5.77,4.611A6.467,6.467,0,0,1,28.349,22.394ZM6.587,3.952A2.642,2.642,0,0,0,3.952,6.587v9.221a2.642,2.642,0,0,0,2.635,2.635H28.349a2.575,2.575,0,0,0,1.633-.58l5.77-4.611a2.61,2.61,0,0,0,0-4.11l-5.77-4.611a2.687,2.687,0,0,0-1.633-.58Z"
                                                transform="translate(11.328 29.64)" fill="#231f20" />
                                            <path id="Vector-3" data-name="Vector"
                                                d="M1.976,11.856A1.99,1.99,0,0,1,0,9.88v-7.9A1.99,1.99,0,0,1,1.976,0,1.99,1.99,0,0,1,3.952,1.976v7.9A1.99,1.99,0,0,1,1.976,11.856Z"
                                                transform="translate(29.64 21.736)" fill="#231f20" />
                                            <path id="Vector-4" data-name="Vector"
                                                d="M1.976,11.856A1.99,1.99,0,0,1,0,9.88v-7.9A1.99,1.99,0,0,1,1.976,0,1.99,1.99,0,0,1,3.952,1.976v7.9A1.99,1.99,0,0,1,1.976,11.856Z"
                                                transform="translate(29.64 48.082)" fill="#231f20" />
                                            <path id="Vector-5" data-name="Vector"
                                                d="M17.784,3.952H1.976A1.99,1.99,0,0,1,0,1.976,1.99,1.99,0,0,1,1.976,0H17.784A1.99,1.99,0,0,1,19.76,1.976,1.99,1.99,0,0,1,17.784,3.952Z"
                                                transform="translate(21.736 55.986)" fill="#231f20" />
                                            <path id="Vector-6" data-name="Vector" d="M0,0H63.231V63.231H0Z" fill="none"
                                                opacity="0" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div>المهتمون بالعمل الحر والعمل عن بعد.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section application-requirements">
    <h3 class="title_text">شروط التقديم والقبول</h3>
    <h3 class="section_word">للتسجيل يجب أن تتوفر لديك الشروط التالية:</h3>
    <div class="section_line"></div>
    <div class="row row-cols-md-3 row-cols-1">
        <div class="col">
            <div class="card3 mx-3">
                <div>أن تكون سوري الجنسية.</div>
                <div class="icon">
                    1
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card3 mx-3">
                <div>قادرًا على الالتزام بحضور كافة الساعات التدريبية.</div>
                <div class="icon">
                    2
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card3 mx-3">
                <div>أن يكون لديك إلمام بسيط بأساسيات البرمجة أو التصميم.</div>
                <div class="icon">
                    3
                </div>
            </div>
        </div>
    </div>
</div>

<section class="testmaonail">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title_text" style="text-align: center;margin-bottom:20px">آراء المشاركين في المخيم</h2>
            </div>
            <div class="col-12">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img style="width:200px" src="/frontend/assets/images/a.jpg" alt="">
                        <h2>سامر</h2>
                        <p>
                            هذا المخيم منحني الفرصة لتعلم تقنيات جديدة لم أكن أعلم عنها من قبل
                            <br>
                            أشعر أني مع نهاية هذه الرحلة سأكون مستعدًا لدخول سوق العمل.
                        </p>
                      </div>
                      <div class="carousel-item">
                        <img style="width:200px" src="/frontend/assets/images/b.png" alt="">
                        <h2>رانيا</h2>
                        <p>
                            التدريب العملي والدعم المستمر من المدرب ومساعده جعلا تجربتي في المخيم فريدة، استطعت من خلاله بناء أول مشروع ويب خاص بي،
                            <br>
                            وما زلت مستمرة في تطويره.
                        </p>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="camp-axes">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 res-p">
                <div class="res">
                    {{ darkLogo() }}
                </div>
            </div>
            <div class="col-lg-12" style="text-align: center">
                <h2 class="title_text">الخاتمة</h2>
                <p class="grid_text">
                    إذا كنت تبحث عن فرصة لتطوير مهاراتك والانضمام إلى مجتمع من المبرمجين المحترفين، فالمخيم التدريبي لتطوير الواجهات الخلفية هو الخيار المثالي،
                    <br>
                    سجّل الآن عبر التواصل معنا عبر البريد الإلكتروني أو واتساب.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')

@endsection