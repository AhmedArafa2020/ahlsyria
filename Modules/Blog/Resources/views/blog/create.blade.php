@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <div class="page-content">

        {{-- breadecrumb Area S t a r t --}}
        @include('backend.ui-components.breadcrumb', [
            'title' => @$data['title'],
            'routes' => [
                route('dashboard') => ___('common.Dashboard'),
                route('blog.index') => ___('blog.Blog'),
                '#' => @$data['title'],
            ],
            'buttons' => 0,
        ]) 
        {{-- breadecrumb Area E n d --}}

        <!--  category create start -->
        <div class="card ot-card">

            <div class="card-body">
                <form action="{{ route('blog.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    {{-- Style Two --}}
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xl-12 col-md-6 mb-3">
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
                                    <label for="status" class="form-label ">{{ ___('common.Status') }}<span
                                            class="fillable">*</span></label>
                                    <select class="form-select ot-input select2 @error('status_id') is-invalid @enderror"
                                        id="status" required name="status_id">
                                        <option @if (old('status_id') == '1') {{ 'selected' }} @endif value="1">
                                            {{ ___('common.Active') }}</option>
                                        <option @if (old('status_id') == '2') {{ 'selected' }} @endif value="2">
                                            {{ ___('common.Inactive') }}</option>
                                    </select>
                                    @error('status_id')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-md-6 mb-3">
                                    <label for="status" class="form-label ">{{ ___('blog.Category') }}<span
                                            class="fillable">*</span></label>
                                    <select
                                        class="form-select ot-input select2 @error('blog_categories_id') is-invalid @enderror"
                                        id="blogCatId" name="blog_categories_id">
                                        @if ($data['categoriesArr'])
                                            @foreach ($data['categoriesArr'] as $catId => $category)
                                                <option @if (old('blog_categories_id') == $catId) {{ 'selected' }} @endif
                                                    value="{{ $catId }}">{{ $category }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('blog_categories_id')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-md-6 mb-3 custom-height">
                                    <label for="status" class="form-label ">المحتوى<span
                                            class="fillable">*</span></label>
                                    <textarea id="description" name="description" class="ckeditor-editor @error('description') is-invalid @enderror">{!! old('description') !!}</textarea>
                                    @error('description')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-md-6">
                                    <label for="icon" class="form-label ">الصورة المصغرة
                                        <span class="fillable">*</span>
                                    </label>
                                    <div data-name="image_id" class="file @error('image_id') is-invalid @enderror"
                                        data-height="200px"></div>
                                    <small
                                        class="text-muted">{{ ___('placeholder.NB : Image will not more than 1mb') }}</small>
                                    @error('image_id')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-md-6 mb-3">
                                    <label for="title" class="form-label ">عنوان Meta</label>
                                    <input class="form-control ot-input @error('meta_title') is-invalid @enderror"
                                        name="meta_title" list="datalistOptions" id="title"
                                        placeholder="{{ ___('placeholder.Enter Meta Title') }}"
                                        value="{{ old('meta_title') }}">
                                    @error('meta_title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-md-6 mb-3">
                                    <label for="title" class="form-label ">كلمات مفتاحية Meta</label>
                                    <input class="form-control ot-input @error('meta_keywords') is-invalid @enderror"
                                        name="meta_keywords" list="datalistOptions" id="meta_keywords"
                                        placeholder="{{ ___('placeholder.Enter Meta Keywords') }}"
                                        value="{{ old('meta_keywords') }}">
                                    @error('meta_keywords')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-md-6 mb-3 custom-height">
                                    <label for="status" class="form-label ">وصف Meta</label>
                                    <textarea id="metaDescription" rows="4" cols="10" name="meta_description"
                                        class="ckeditor-editor @error('meta_description') is-invalid @enderror">{!! old('meta_description') !!}</textarea>
                                    @error('meta_description')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-md-6">
                                    <label for="icon" class="form-label ">الصورة داخل المدونة
                                    </label>
                                    <div data-name="meta_image_id"
                                        class="file @error('meta_image_id') is-invalid @enderror" data-height="200px">
                                    </div>
                                    <small
                                        class="text-muted">{{ ___('placeholder.NB : Image will not more than 1mb') }}</small>
                                    @error('meta_image_id')
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
