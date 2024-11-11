@extends('frontend.layouts.master')
@section('title', @$data['title'])

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aboutus.css')}}" />
@endsection
@section('content')

    <!-- Section 1 -->
    <section class="section-1">
      <div class="container">
          <div class="sub-section1">
              <p>من نحن</p>
              <h1>أهـــــل ســـــــوريا</h1>
              <div class="image-grid">
                  <div>
                      <img src="{{url('frontend/assets/images/aboutus1.png')}}" alt="Image 1" class="small-image">
                      <div style="margin-top: 20px;"></div>
                      <img src="{{url('frontend/assets/images/aboutus2.png')}}" alt="Image 2" class="small-image">
                  </div>
                  <div>
                      <img src="{{url('frontend/assets/images/aboutus3.png')}}" alt="Large Image" class="large-image">
                  </div>
                  <div>
                      <img src="{{url('frontend/assets/images/aboutus4.png')}}" alt="Image 3" class="small-image">
                      <div style="margin-top: 20px;"></div>
                      <img src="{{url('frontend/assets/images/aboutus5.png')}}" alt="Image 4" class="small-image">
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="section-1-text">
      <div class="container">
          <p>نحن فريق من الأطباء والممارسين الصحيين السوريين الذين نؤمن بأن تبادل المعرفة والخبرات هو المفتاح لتطوير القطاع الصحي في سوريا وخارجها. تأسست منصة "أهل سوريا" بهدف جمع مزودي الرعاية الصحية السوريين من مختلف التخصصات والمناطق في مكان واحد لخلق مجتمع صحي متكامل يساعد في تحسين الرعاية الصحية المقدمة للسوريين أينما كانوا.</p>
      </div>
  </section>

  <!-- Section 2 -->
  <section class="section-2">
      <div class="container">
          <p>أرقامنا</p>
          <p>
              تعكس الأرقام التالية التأثير المتزايد للمنصة ومدى استفادة الممارسين الصحيين من خدماتنا. هذه الأرقام ليست مجرد إحصاءات، بل هي دليل على الجهود المستمرة لتطوير القطاع الصحي ودعم العاملين فيه من السوريين أينما كانوا.
          </p>
          <div class="stats">
              <div>
                  <h3>50</h3>
                  <p>تخصص طبي</p>
              </div>
              <div>
                  <h3>500</h3>
                  <p>مزود رعاية صحية</p>
              </div>
              <div>
                  <h3>10,000</h3>
                  <p>مستفيد</p>
              </div>
          </div>
      </div>
  </section>

  <!-- Section 3 -->
  <section class="section-3">
      <div class="container">
          <h2>رؤيتنا</h2>
          <img src="{{url('frontend/assets/images/Ourvision.png')}}" alt="Vision Image" class="standard-image" width="100%" height="400">
          <p style="margin-top: 60px;">
              نطمح لأن نكون المرجع الأساسي لمزودي الرعاية الصحية السوريين في كافة أنحاء العالم، من خلال توفير محتوى علمي دقيق وموثوق يجمع بين آخر التطورات الطبية واحتياجات القطاع الصحي في سوريا. رؤيتنا هي بناء مجتمع صحي متكامل يرتقي بالممارسات الصحية ويعزز من قدرة الأطباء والممارسين الصحيين السوريين على تقديم أفضل مستوى من الرعاية.
          </p>
      </div>
  </section>

  <!-- Section 4 -->
  <section class="section-4">
      <div class="container">
          <h2>مهمتنا</h2>
          <img src="{{url('frontend/assets/images/Task.png')}}" alt="Mission Image" class="standard-image" width="100%" height="400">
          <p style="margin-top: 60px;">
              نسعى إلى تسهيل عملية التواصل بين مزودي الرعاية الصحية السوريين، وتعزيز تبادل الخبرات والمعرفة الطبية بينهم. نهدف إلى تقديم محتوى تعليمي نوعي ومتاح بسهولة ليصل إلى كل مزود رعاية صحية سوري، بغض النظر عن موقعه الجغرافي، بهدف تطوير مهاراتهم ورفع مستوى الكفاءة الطبية.
          </p>
      </div>
  </section>


@endsection