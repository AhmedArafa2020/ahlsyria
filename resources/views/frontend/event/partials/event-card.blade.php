
{{-- 'id', 'title', 'slug', 'short_description', 'image_id', 'start_date' --}}

<a href="{{route('frontend.event.show',  @$event->slug) }}">


    <div class="event-card">
      <img src="{{ showImage(@$event->image->original, 'backend/uploads/default-images/event/event'.$key + 1 .'.jpg') }}" alt="event-img">
      <h5>      {{ @$event->title }}</h5>
      <p class="event-date"> 
        {{$event->start_date->locale('ar_SA')->translatedFormat('d F Y') }}           
      </p>


    </div>


  </a>







