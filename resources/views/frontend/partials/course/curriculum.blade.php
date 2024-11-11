<div class="box-content1"  id="accordion1">

  @foreach ($sections as $key => $section)

  <div class="toggle-item">
    <button class="toggle-button collapsed" data-bs-toggle="collapse"
    data-bs-target="#collapseFour{{ $key }}" aria-expanded="false" aria-controls="four4">
    <div class="toggle-text">
      <h4>{{ @$section->title }}</h4>
      <div class="toggle-textbutton">
        <p class="label"> {{ $section->allLesson->count() }} دروس</p>
        <div class="button-time">
          <p class="label"> {{ minutes_to_hours($section->lessons->sum('duration')) }}</p>
        
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_390_395)">
                <path
                  d="M7.625 5.15039L3.875 8.90039L4.75625 9.78164L7.625 6.91914L10.4938 9.78164L11.375 8.90039L7.625 5.15039Z"
                  fill="#555555" />
              </g>
              <defs>
                <clipPath id="clip0_390_395">
                  <rect width="15" height="15" fill="white" transform="translate(0.125 0.150391)" />
                </clipPath>
              </defs>
            </svg>
        
        </div>
      </div>
    </div>
  </button>

  
    <div class="collapse" id="collapseFour{{ $key }}" data-parent="#accordion1">
      @foreach ($section->allLesson as $key => $lesson)
      <div class="p1">
        <div class="p1-1">
          @if ($lesson->is_quiz)
          <i class="ri-question-line icon-color"></i>
          @else
          @if (in_array(@$lesson->lesson_type, ['Youtube', 'Vimeo', 'GoogleDrive', 'VideoFile']))
          <i class="ri-play-circle-line icon-color"></i>
          @elseif(@$lesson->lesson_type == 'Text')
          <i class="ri-text icon-color"></i>
          @elseif(@$lesson->lesson_type == 'ImageFile')
          <i class="ri-image-fill icon-color"></i>
          @elseif(@$lesson->lesson_type == 'DocumentFile' && @$lesson->attachment_type == 1)
          <i class="ri-file-pdf-line icon-color"></i>
          @elseif(@$lesson->lesson_type == 'DocumentFile' && @$lesson->attachment_type == 2)
          <i class="ri-file-text-fill icon-color"></i>
          @endif
          @endif
          <h5 class="h5" dir="rtl">{{ $lesson->title }}</h5>
        </div>
        <div class="p1-2">
          <button>معاينة </button>
          <p class="label" dir="rtl">{{ gmdate('i:s', $lesson->duration * 60) }}</p>
          <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_390_314)">
              <path
                d="M3.37555 6.5632L1.8118 4.99945L1.2793 5.5282L3.37555 7.62445L7.87555 3.12445L7.3468 2.5957L3.37555 6.5632Z"
                fill="#555555" />
            </g>
            <defs>
              <clipPath id="clip0_390_314">
                <rect width="9" height="9" fill="white" transform="translate(0 0.5)" />
              </clipPath>
            </defs>
          </svg>
        </div>

      </div>
      @endforeach
    </div>

  </div>

  @endforeach
</div>


{{-- 
@section('scripts')
    <script src="{{ asset('frontend/assets/js/collapseLessonDetails.js')}}"></script>
@endsection --}}
