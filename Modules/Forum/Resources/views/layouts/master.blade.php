@include('frontend.include.header_script')
@include('frontend.layouts.partials.header')

<main>
    @yield('content')
</main>

@include('forum::layouts.scripts')
@include('frontend.layouts.partials.footer')
@include('frontend.include.footer_script')