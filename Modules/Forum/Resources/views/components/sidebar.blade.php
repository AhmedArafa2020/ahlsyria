    {{-- <div class="ot-sidebar-btn-close" id="otSidebarBtnClose"><i class="ri-close-fill"></i></div>
    <div class="featured-topic">
        <h4 class="fourm-title"> أهم المناقشات </h4>
        @foreach ($featured_questions as $featured_question)
        <a href="{{ route('forum.details', $featured_question->slug) }}" class="text-hover-question">
            <div class="d-flex items-center title font-400 mb-2 line-clamp-2 gap-10 text-hover">
                <div class="text-16 text-paragraph">
                    <i class="ri-question-line"></i>
                </div>
                <p class="text-title line-clamp-1 colorEffect text-paragraph text-16">
                    {{ $featured_question->title }}
                </p>
            </div>
        </a>
        @endforeach
    </div>

    <style></style> --}}


    @if(isset($featured_questions))
    <div class="col-12 col-lg-3">
      <aside>
        <div class="mb-5">
          <h3 class="label mb-3">مواضيع المناقشات</h3>
@foreach ($featured_questions as $featured_question)
          <a href="{{ route('forum.details', $featured_question->slug) }}" class="d-block sub mb-2">
            <span class="title-a">مناقشة</span>
            <p class="title1 d-flex justify-content-between align-items-center gap-3">
              {{ $featured_question->title }}
              <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M7 1L1 7L7 13" class="svg-number" stroke-opacity="0.62" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </p>
            <span class="number">  {{$featured_question->answers($featured_question->id)->count()}}</span>
          </a>
          @endforeach
        </div>

        @endif


        @if(isset($featured_users))
        <div>
          <h3 class="label mb-3">أهم المساهمين</h3>
          @foreach ($featured_users as $featured_user)
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="person d-flex align-items-center gap-2">
              <img src="images/Person-3.jpg" alt="Person-3">
              <div class="info3">
                <p>   {{ $featured_user->name }}</p>
                <p class="job">  {{ $featured_user->medical_specialization }}</p>
              </div>
            </div>
            <a href="" class="btn">تصفح</a>
          </div>
          @endforeach
        </div>
          @endif
      


{{--   
@if(isset($forum_category))
    <h4 class="fourm-title">
        العلامات:
    </h4>
    <div class="tags">
        @foreach($forum_category as $category)
            <a href="javascript:;">
                {{$category->title}}
            </a>
        @endforeach
    </div>
@endif --}}