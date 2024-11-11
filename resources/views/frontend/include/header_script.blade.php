<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ setting('meta_description') }}">
    <meta name="keywords" content="{{ setting('meta_keyword') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="{{ setting('author') }}">
    <meta name="baseurl" content="{{ url('/') }}">
    @stack('meta')
    <link rel="icon" type="image/x-icon" href="{{ @showImage(setting('favicon'), 'favicon.png') }}">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ setting('application_name') }} </title>


    <link rel="stylesheet" type="text/css" href="{{ url('frontend/assets/css/bootstrap-5.3.0.min.css') }}">
    <!-- fonts & icon -->
    <link rel="stylesheet" type="text/css" href="{{ url('frontend/assets/css/fonts-icon.css') }}">
    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="{{ url('frontend/assets/css/plugin.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('frontend/assets/css/main-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('frontend/css/custom.css') }}">  

    
    
 <!-- new style bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- bootstrap icons -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- main css --> 
    
  <!--PATH: public/frontend -->
  <link rel="stylesheet" href="{{ url('frontend/assets/css/main.css') }}">
  <!-- home css -->
  <link rel="stylesheet" href="{{ url('frontend/assets/css/home.css') }}">

  <link rel="stylesheet" href="{{ url('frontend/assets/css/BlogDetails.css') }}">
  <link rel="stylesheet" href="{{ url('frontend/assets/css/forum-details.css') }}">
  {{-- <link rel="stylesheet" href="{{ url('frontend/assets/css/forum.css') }}"> --}}
  <link rel="stylesheet" href="{{ url('frontend/assets/css/courses.css') }}">
  <link rel="stylesheet" href="{{ url('frontend/assets/css/Blogs.css') }}">
  <link rel="stylesheet" href="{{ url('frontend/assets/css/cource-details.css') }}">
  {{-- <link rel="stylesheet" href="{{ url('frontend/assets/css/event-show.css') }}"> --}}

  <link rel="stylesheet" href="{{ url('frontend/assets/css/event-index.css') }}">

  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
/>


    @yield('css')


</head>