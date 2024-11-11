@extends('frontend.layouts.master')
@section('title', @$data['title'] ?? 'Events')


@section('content')

  <!-- القسم الأول: الفعاليات -->
  <section class="container my-5">
    <h2 class="text-end mb-4">الفعاليات</h2>
    <div class="event-banner" style="background-image: url('{{ asset('frontend/assets/images/events.png') }}')">


      <div class="event-banner-content">
        <img src="{{url('backend/uploads/default-images/dark-logo.svg')}}" alt="Logo" class="event-banner-logo">
        <div class="event-banner-text">
          استكشف أحدث الفعاليات الطبية والمؤتمرات لتبقى على اطلاع بأحدث التطورات والابتكارات في مجال الرعاية الصحية
        </div>
      </div>
    </div>
  </section>

<section class="container my-5">
  <h2 class="text-end mb-4">أحدث الفعاليات</h2>
  <div class="row">

@foreach ($data['events'] as $key => $event)
<div class="col-md-4 col-sm-6 col-12 mb-4">
    @include('frontend.event.partials.event-card')
</div>
@endforeach


</div>
</section>

@endsection