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
                route('admin.faq.index') =>  ___('common.Faq List'),
                '#' => @$data['title'],
            ],
            'buttons' => 0,
        ])
        {{-- breadecrumb Area E n d --}}

        <!--  category create start -->
        <div class="card ot-card">

            <div class="card-body">
                <form action="{{ route('admin.faq.store') }}" enctype="multipart/form-data" method="post">
                    @csrf

                    {{-- Style Two --}}
                    <div class="row mb-3 row mb-3 d-flex justify-content-center">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mb-3">
                                    <label for="title" class="form-label ">{{ ___('common.title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('title') is-invalid @enderror" name="title"
                                        list="datalistOptions" id="title"
                                        placeholder="{{ ___('placeholder.Enter Title') }}">
                                    @error('title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-md-6 mb-3">
                                    <label for="status" class="form-label ">{{ ___('common.Status') }}
                                        <span class="fillable">*</span></label>
                                    <select class="form-select ot-input select2 @error('status_id') is-invalid @enderror"
                                        id="status_id" required name="status_id">
                                        <option value="1">{{ ___('common.Active') }}</option>
                                        <option value="2">{{ ___('common.Inactive') }}</option>
                                    </select>
                                    @error('status_id')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xl-12 col-md-12 mb-3">
                                    <label for="content" class="form-label ">{{ ___('common.Content') }} <span
                                            class="fillable">*</span></label>
                                    <textarea class="form-control ot-textarea @error('content') is-invalid @enderror" name="content" list="datalistOptions"
                                        rows="9" id="content" placeholder="{{ ___('placeholder.Enter Content') }}"></textarea>
                                    @error('content')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="text-end">
                                <button class="btn btn-lg ot-btn-primary" type="submit">
                                    {{ @$data['button'] }}
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <!--  category create end -->
    </div>
@endsection
