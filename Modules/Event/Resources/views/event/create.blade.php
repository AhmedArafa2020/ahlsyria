@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/summernote/summernote.css') }}">
@endpush
@section('content')
    <div class="event-content">

        {{-- breadecrumb Area S t a r t --}}
        @include('backend.ui-components.breadcrumb', [
            'title' => @$data['title'],
            'routes' => [
                route('dashboard') => ___('common.Dashboard'),
                route('events.index') => ___('event.Event'),
                '#' => @$data['title'],
            ],
            'buttons' => 0,
        ])
        {{-- breadecrumb Area E n d --}}

        <!--  category create start -->
        <div class="card ot-card">

            <div class="card-body">
                <form action="{{ route('events.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    {{-- Style Two --}}
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mb-3">
                                    <label for="title" class="form-label ">{{ ___('common.Title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('title') is-invalid @enderror" name="title"
                                        list="datalistOptions" id="title"
                                        placeholder="{{ ___('placeholder.Enter Title') }}" value="{{ old('title') }}">
                                    @error('title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-md-6 mb-3">
                                    <label for="address" class="form-label ">{{ ___('common.Address') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('address') is-invalid @enderror" name="address"
                                        list="datalistOptions" id="address"
                                        placeholder="{{ ___('placeholder.Enter Address') }}" value="{{ old('address') }}">
                                    @error('address')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="col-xl-6 col-md-6 mb-3">
                                    <label for="start_date" class="form-label ">{{ ___('course.Start Date') }}
                                        <span class="fillable">*</span></label>
                                    </label>
                                    <input type="datetime-local" class="form-control ot-input" id="start_date" name="start_date"
                                        required placeholder="{{ ___('course.Start Date') }}" value="{{ old('start_date') }}" />
                                    @error('start_date')
                                        <div id="validationServer04Feedback" class="invalid-feedback error-show">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-md-6 mb-3">
                                    <label for="end_date" class="form-label ">{{ ___('course.End Date') }}
                                        <span class="fillable">*</span></label>
                                    </label>
                                    <input type="datetime-local" class="form-control ot-input" id="end_date" name="end_date"
                                        required placeholder="{{ ___('course.End Date') }}" value="{{ old('end_date') }}" />
                                    @error('end_date')
                                        <div id="validationServer04Feedback" class="invalid-feedback error-show">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-md-6 mb-3">
                                    <label for="status" class="form-label ">{{ ___('common.Status') }}<span
                                            class="fillable">*</span></label>
                                    <select class="form-select ot-input select2 @error('status') is-invalid @enderror"
                                        id="status" required name="status">
                                        <option @if (old('status') == 'active') {{ 'selected' }} @endif value="active">
                                            {{ ___('common.Active') }}</option>
                                        <option @if (old('status') == 'disabled') {{ 'selected' }} @endif
                                            value="disabled">
                                            {{ ___('common.Disabled') }}</option>
                                    </select>
                                    @error('status')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-md-6">
                                    <label for="icon" class="form-label ">الصورة المصغرة
                                        <span class="fillable">*</span>
                                    </label>
                                    <div data-name="image" class="file @error('image') is-invalid @enderror"
                                        data-height="200px"></div>
                                    <small
                                        class="text-muted">{{ ___('placeholder.NB : Image will not more than 1mb') }}</small>
                                    @error('image')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-md-6 mb-3 custom-height">
                                    <label for="status" class="form-label ">المحتوى<span
                                            class="fillable">*</span></label>
                                    <textarea id="short_description" name="short_description" class="ckeditor-editor @error('short_description') is-invalid @enderror">{!! old('short_description') !!}</textarea>
                                    @error('short_description')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="col-xl-12 col-md-6 mb-3 event-type-content">
                                    <label for="content" class="form-label ">{{ ___('event.Content') }}<span
                                            class="fillable">*</span></label>
                                    <textarea class="form-control summernote @error('content') is-invalid @enderror" name="content"
                                        list="datalistOptions" rows="9" id="content" placeholder="{{ ___('placeholder.Enter Content') }}"></textarea>
                                    @error('content')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="text-left">
                                <button class="btn btn-lg ot-btn-primary" type="submit">
                                    </span>{{ @$data['button'] }}</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <!--  category create end -->
    </div>
@endsection
@push('script')
    <script src="{{ asset('backend/assets/summernote/summernote.js') }}"></script>
@endpush
