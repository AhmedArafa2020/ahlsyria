@extends('forum::layouts.master')
@section('title', @$data['title'])

@section('css')
    <link rel="stylesheet" href="{{ asset('modules/forum/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/forum/summernote/summernote.css') }}">

<link rel="stylesheet" href="{{ url('frontend/assets/css/forum.css') }}">


@endsection


@section('content')
    <section class="my-3">
        <div class="container">
            <h3 class="mb-3 title">المجتمع</h3>
            <div class="inquiry card flex-md-row text-center text-md-start align-items-center mb-4 border-0">
                <img class="p-2" src="{{ url('frontend/assets/images/forum.png') }}" alt="Group">
                <div
                    class="p-4 d-flex flex-column justify-content-center align-items-lg-start align-items-md-center flex-nowrap">
                    <h5 class="mb-2">هل لديك استفسار معين</h5>
                    <p class="mb-2">لا تتردد في طرح النقاشات نحن هنا من أجل أن نقوم بمساعدتك</p>
                    <button class="btn text-light btn-primary-submit f-right"
                        @if (auth()->check()) onclick="mainModalOpen(`{{ route('forum.create') }}`)" 
    @else 
        onclick="window.location.href='{{ route('frontend.signIn') }}'" @endif>
                        اطرح سؤالاً
                    </button>

                </div>
            </div>

            <div class="discussions">
                <h4 class="mb-3 title2">النقاشات</h4>
                <div class="row">
                    {{-- JS call component->indexdata.blade.php by app.js --}}
                    <div id="questions-list">
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
@section('scripts')
    <script src="{{ asset('modules/forum/js/app.js') }}"></script>
    <script src="{{ asset('/modules/forum/summernote/summernote.js') }}"></script>
@endsection
