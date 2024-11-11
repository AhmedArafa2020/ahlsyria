@extends('backend.master')

@section('title', @$data['title'])
@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/tagify.css') }}">
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/summernote/summernote.css') }}">
@endpush
@section('content')
    <div>
        <div class="card ot-card">

            <div class="card-body">
        
                <form method="POST"  action="{{ route('admin.newsletter.save') }}" >
                    @csrf
        
                    <div class="row mb-3 row mb-3 d-flex justify-content-center">
        
                        <div class="col-12">
                            <div class="small-tittle-two border-bottom mb-20 pb-8">
                                <h4 class="title text-capitalize font-600">
                                    {{ $data['title'] }}
                                </h4>
                            </div>
                            <div class="row">
        
                                <div class="col-xl-12 col-md-6 mb-3">
                                    <label for="title" class="form-label ">{{ ___('instructor.title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('title') is-invalid @enderror" name="title"
                                        value="{{ @$data['newsletter']->title }}" id="title"
                                        placeholder="{{ ___('placeholder.title') }}">
                                    @error('title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-md-6 mb-3">
                                    <label for="sub_title" class="form-label ">عنوان فرعي </label>
                                    <input class="form-control ot-input" name="sub_title"
                                        value="{{ @$data['newsletter']->sub_title }}" id="sub_title">
                                </div>


                                <div class="col-xl-12 col-md-12 mb-3 event-type-content">
                                    <label for="content" class="form-label ">المحتوى<span
                                            class="fillable">*</span></label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" list="datalistOptions"
                                        rows="20" id="content" placeholder="{{ ___('placeholder.Enter Content') }}"><?= @$data['newsletter']->content ?></textarea>
                                    @error('content')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
        
                            </div>
                        </div>
                        <div class="col-md-12 mt-24">
                            @if (isset($data['newsletter']))
                                <div class="text-end">
                                    <p class="p-2 badge badge-warning text-black"> تم الارسال </p>
                                </div>
                            @else
                                <div class="text-end">
                                    <p>لا يمكنك تعديل الرسالة بعد الارسال </p>
                                    <button class="btn btn-lg ot-btn-primary"><span>
                                        </span>ارسال</button>
                                </div>
                            @endif
                        </div>

                    </div>
                </form>
            </div>
        </div>
        
    </div>

@endsection

@push('script')
    <script src="{{ asset('backend/assets/summernote/summernote.js') }}"></script>

    <script>
        $(document).ready(function() {
        $('#content').summernote({
            height: 200,   // Set editor height
            toolbar: [
                // Basic text formatting
                ['style', ['bold', 'italic', 'underline']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                // Paragraph formatting
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],  // Enable links and images
            ]
        });
        });
    </script>
@endpush
