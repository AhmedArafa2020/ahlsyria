@extends('frontend.layouts.master')
@section('title', @$data['title'])
@section('content')
    <!--Bradcam S t a r t -->
    @include('frontend.partials.breadcrumb', [
        'breadcumb_title' => @$data['title'],
    ])
    <!--End-of Bradcam  -->

    <!-- About section S t a r t-->
    <section class="about-seciton section-padding2 mt-10">
    <div class="container">
        <div class="row align-items-top mt-4" style="margin-bottom: 80px">
            <div class="col-lg-9">
                <h4 id="intro" class="privacy-section-title">مقدمة</h4>
                <p class="privacy-content">
                    في منصة SyrianGeeks الخاصة بنا، نحن ملتزمون بحماية خصوصية وأمن المعلومات الشخصية لمستخدمينا. توضح سياسة الخصوصية هذه كيفية جمع المعلومات المقدمة لنا واستخدامها والكشف عنها وحمايتها. من خلال الوصول إلى منصة (SyrianGeeks) الخاصة بنا أو استخدامها، فإنك توافق على الشروط والممارسات الموضحة في سياسة الخصوصية هذه.
                </p>
                <h4 id="sec1" class="privacy-section-title">المعلومات التي نجمعها</h4>
                <p class="privacy-content">1- قد نقوم بجمع معلومات شخصية معينة من المستخدمين من أجل توفير تجربة تعليمية محسنة. تشمل أنواع المعلومات التي قد نجمعها ما يلي:</p>
                <p class="privacy-content">1.1. معلومات شخصية:</p>
                <p class="privacy-content">الاسم الكامل</p>
                <p class="privacy-content">عنوان البريد الإلكتروني</p>
                <p class="privacy-content">بيانات المتصل</p>
                <p class="privacy-content">اسم المستخدم و كلمة السر</p>
                <p class="privacy-content">1.2. المعلومات المتعلقة بالدورة:</p>
                <p class="privacy-content">تفضيلات الدورة</p>
                <p class="privacy-content">بيانات التقدم والأداء</p>
                <p class="privacy-content">سجلات إتمام الدورة</p>
                <p class="privacy-content">ردود الفعل والتقييمات</p>
                <p class="privacy-content"></p>
                <h4 id="sec2" class="privacy-section-title">استخدام المعلومات المجمعة</h4>
                <p class="privacy-content">2- يجوز لنا استخدام المعلومات التي تم جمعها للأغراض التالية:</p>
                <p class="privacy-content">2.1. تقديم خدمات نظام إدارة التعلم:</p>
                <p class="privacy-content">إنشاء وإدارة حسابات المستخدمين</p>
                <p class="privacy-content">تقديم محتوى الدورة والمواد</p>
                <p class="privacy-content">تتبع ومراقبة تقدم المستخدم</p>
                <p class="privacy-content">توليد التقارير والتحليلات</p>
                <p class="privacy-content">2.2. تواصل:</p>
                <p class="privacy-content">إرسال رسائل البريد الإلكتروني والإخطارات الإدارية</p>
                <p class="privacy-content">الرد على استفسارات المستخدمين وطلبات الدعم</p>
                <p class="privacy-content">إرسال محتوى ترويجي أو تعليمي </p>
                <p class="privacy-content">2.3. تحسين تجربة المستخدم:</p>
                <p class="privacy-content">تخصيص توصيات الدورة والمحتوى</p>
                <p class="privacy-content">تحليل سلوك المستخدم وتفضيلاته</p>
                <p class="privacy-content">تعزيز وظائف وميزات نظام</p>
                <p class="privacy-content"></p>
                <h4 id="sec3" class="privacy-section-title">مشاركة المعلومات</h4>
                <p class="privacy-content">3- نحن ندرك أهمية حماية المعلومات الشخصية ولا نبيع أو نتاجر أو نؤجر المعلومات الشخصية للمستخدمين لأطراف ثالثة. ومع ذلك، يجوز لنا مشاركة بعض المعلومات في ظل الظروف التالية:</p>
                <p class="privacy-content">يجوز لنا مشاركة المعلومات الشخصية مع مقدمي خدمات خارجيين موثوقين يساعدوننا في تشغيل . يلتزم مقدمو الخدمات هؤلاء باتفاقيات سرية صارمة ويحق لهم استخدام المعلومات فقط لغرض تقديم الخدمات لنا.</p>
                <p class="privacy-content">3.2. الامتثال القانوني:</p>
                <p class="privacy-content">يجوز لنا الكشف عن المعلومات الشخصية إذا كان ذلك مطلوبًا بموجب القانون أو استجابة لطلبات قانونية صحيحة أو إجراءات قانونية.</p>
                <h4 id="sec4" class="privacy-section-title">امن البيانات</h4>
                <p class="privacy-content">4- نحن نتخذ إجراءات معقولة لحماية أمن المعلومات الشخصية التي يتم جمعها من خلال المنصة الخاصة بنا. ومع ذلك، يرجى ملاحظة أنه لا توجد طريقة آمنة تمامًا للنقل أو التخزين، ولا يمكننا ضمان الأمان المطلق لبياناتك. نحن نشجع المستخدمين على اتخاذ خطوات لحماية معلوماتهم الشخصية، مثل استخدام كلمات مرور قوية والحفاظ على سريتها.</p>
                <h4 id="sec5" class="privacy-section-title">روابط الطرف الثالث</h4>
                <p class="privacy-content">5- قد تحتوي المنصة الخاصة بنا على روابط لمواقع أو موارد تابعة لجهات خارجية. نحن لسنا مسؤولين عن ممارسات الخصوصية أو محتوى مواقع الطرف الثالث هذه. نحن نشجع المستخدمين على مراجعة سياسات الخصوصية لتلك المواقع عند الوصول إليها من خلال منصتنا.</p>
                <h4 id="sec6" class="privacy-section-title">خصوصية الاطفال</h4>
                <p class="privacy-content">6- إن منصة Syrian Geeks الخاصة بنا ليست مخصصةً للاستخدام من قبل الأطفال الذين تقل أعمارهم عن 13 عامًا. ونحن لا نجمع معلومات شخصية من الأطفال عمدًا. إذا علمنا أن المعلومات الشخصية قد تم جمعها عن غير قصد من طفل يقل عمره عن 13 عامًا، فسنتخذ خطوات معقولة لحذف هذه المعلومات من سجلاتنا.</p>
                <h4 id="sec7" class="privacy-section-title">التغييرات في سياسة الخصوصية</h4>
                <p class="privacy-content">7- نحن نحتفظ بالحق في تعديل سياسة الخصوصية هذه في أي وقت. ستصبح أي تغييرات سارية فور نشر سياسة الخصوصية المحدثة على منصة(SyrianGeeks)  الخاصة بنا. من خلال الاستمرار في استخدام منصة Syrian Geeks بعد إجراء أي تعديلات، فإنك توافق على الالتزام بسياسة الخصوصية المعدلة.</p>
                <h4 id="sec8" class="privacy-section-title">اتصل بنا</h4>
                <p class="privacy-content">8- إذا كانت لديك أي أسئلة أو مخاوف بشأن سياسة الخصوصية هذه أو ممارسات البيانات لدينا، فيرجى الاتصال بنا.</p>
            </div>
            <div class="col-lg-3">
                <div class="privacy-nav-container">
                    <h4 class="privacy-section-title">جدول المحتويات</h4>
                    <a class="privacy-link" href="#intro">مقدمة</a>
                    <a class="privacy-link" href="#sec1">المعلومات التي نجمعها</a>
                    <a class="privacy-link" href="#sec2">استخدام المعلومات المجمعة</a>
                    <a class="privacy-link" href="#sec3">مشاركة المعلومات</a>
                    <a class="privacy-link" href="#sec4">امن البيانات</a>
                    <a class="privacy-link" href="#sec5">روابط الطرف الثالث</a>
                    <a class="privacy-link" href="#sec6">خصوصية الاطفال</a>
                    <a class="privacy-link" href="#sec7">التغييرات في سياسة الخصوصية</a>
                    <a class="privacy-link" href="#sec8">اتصل بنا</a>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--End-of About section -->

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
.privacy-section-title{
    font-size: 28px;
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 10px;
}
.privacy-content{
    font-size: 20px;
    color: #707070;
}
.privacy-link{
    display: block !important;
    font-size: 24px;
    color: #0092E8;
    margin-top: 20px;
    margin-bottom: 20px;
}
.privacy-nav-container{
    margin-top: 20px;
    padding: 12px 12px 12px 12px;
    border: 1px solid #D2D5D5;
    border-radius: 8px;
    border: 1px solid var(--ot-primary-border);
}
</style>
@endsection

