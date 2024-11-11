@extends('frontend.layouts.master')
@section('title', @$data['blog']->title ?? 'Blogs')
@section('content')
    
{{-- <!--Bradcam S t a r t -->
@include('frontend.partials.levels_breadcrumb', [
    'breadcumb_title'       => 'المدونة',
    'breadcumb_sub_title'   => @$data['blog']->title,
    
])
 --}}

    <div class="header-top">
        <a href="#" class="logo">{{ @$data['blog']->category->title }}</a>
    </div>

    <article class="main-article">
        <h1>{{ @$data['blog']->title }}</h1>
        <div class="author-info">
            <img src="{{ showImage(@$data['blog']->user->image->original, 'default-1.jpeg') }}" alt="img"
                class="author-image">
            <div class="author-details">
                <h3>{{ @$data['blog']->user->name }}</h3>
                <p>{{ @$data['blog']->user->email }}</p>
                <p class="date">
                    {{ @$data['blog']->created_at->locale('ar_SA')->translatedFormat('d F Y') }}
                </p>
            </div>
        </div>


        <div class="featured-image">
          <img src="{{ showImage(@$data['blog']->metaImage->paths['700x700'], 'default-blog.jpg') }}" alt="{{ @$blog->title }}"  class="main-image">
      </div>

      <div class="article-content">
        <p>{!! @$data['blog']->description !!}</p>
    </div>
  
    </article>
{{-- 
    @if (!empty($data['latest_blogs']))
    <section class="related-posts">
  <h2>المدونات ذات الصلة</h2> 
    
      <div class="posts-grid">
      
        @foreach ($data['latest_blogs'] as $latest_blog)
          <a href="{{ route('blog_details', $latest_blog->id) }}" class="post-card">
              <img src="{{ showImage(@$latest_blog->iconImage->paths['220x300'], 'default-1.jpeg') }}" alt=img/>
              <div class="post-content">
                  <h3>{{ Str::limit(@$latest_blog->title, 60) }}</h3>
                  <div class="post-meta">
                      <span>{{ $latest_blog->category->title }}</span>
                      <span>{{ $latest_blog->created_at->locale('ar_SA')->translatedFormat('d F Y') }}</span>
                  </div>
              </div>
          </a>    
@endforeach
@endif        </div>
  </section>
--}}
@if (!empty($data['latest_blogs']))
<section class="related-posts">
  <h2>المدونات ذات الصلة</h2> 
<div class="wrapper">
  <i class="fas fa-angle-left" id="left"></i>



  <ul class="carousel">
    @foreach ($data['latest_blogs'] as $latest_blog)

    <li class="card">
      <a href="{{ route('blog_details', $latest_blog->id) }}" class="post-card">
        <img src="{{ showImage(@$latest_blog->iconImage->paths['220x300'], 'default-blog.jpg') }}" alt="img" draggable="false" />

        <div class="post-content">
          <h3>{{ Str::limit(@$latest_blog->title, 60) }}</h3>
          <div class="post-meta">
              <span>{{ $latest_blog->category->title }}</span>
              <span>{{ $latest_blog->created_at->locale('ar_SA')->translatedFormat('d F Y') }}</span>
          </div>
      </div>
    </a>    
    </li>
    @endforeach

  </ul>
  <i class="fas fa-angle-right" id="right"></i>
  
</div>

</section>
@endif        

    

@endsection
