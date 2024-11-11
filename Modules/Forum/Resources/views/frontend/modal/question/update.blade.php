<div class="modal fade boostrap-modal" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content data">

            <div class="modal-body">
                <button type="button" class="close-icon" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line" aria-hidden="true"></i>
                </button>
                <div class="custom-modal-body ">
                    <form action="{{ @$data['url'] }}" method="post" id="modal_values" enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <div class="small-tittle-two border-bottom mb-30 pb-8">
                            <h4 class="title text-capitalize font-600">{{ $data['title'] }} </h4>
                        </div>

                        <div class="ot-contact-form mb-15 mt-6">
                            <label for="category" class="ot-contact-label mb-2"> {{ ___('forum.Category') }} <span
                                    class="text-danger">*</span></label>
                            <select class="modal_select2" name="category" id="category">
                                <option disabled selected>{{ ___('forum.Select Category') }}</option>
                                @foreach ($data['categories'] as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == @$data['question']['forum_category_id'] ? 'selected' : '' }}>
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="ot-contact-form mb-24">
                            <label for="title" class="ot-contact-label"> {{ ___('forum.Question Title') }} <span
                                    class="text-danger">*</span></label>
                            <input class="form-control ot-contact-input" type="text"
                                placeholder="{{ ___('forum.Write Short Title Here') }}" aria-label="Question Title"
                                name="title" id="title" value="{{ @$data['question']['title'] }}">
                            <span class="text-danger custom-error-text" id="error_email"></span>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="ot-contact-form mb-24 forum-question">
                            <label for="question" class="ot-contact-label"> {{ ___('forum.Your Question') }} <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control h-100 summernote" id="question" name="question" rows="10"
                                placeholder="{{ ___('forum.Write Your Question') }}"><?= @$data['question']->question ?></textarea>
                            @error('question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Submit button -->
                        <div class="btn-wrapper d-flex flex-wrap gap-10 mt-20">
                            <button class="btn-primary-fill" type="button"
                                onclick="submitMainForm()">{{ @$data['button'] }}</button>
                            <button class="btn-primary-outline close-modal"
                                type="button">{{ ___('student.Discard') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('frontend/js/student/__modal.min.js') }}"></script>
