
{{-- to enter text --}}
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
                        <div class="ot-contact-form position-relative">
                            <label class="ot-contact-label">{{ ___('forum.Comment') }}</label>
                            <div class="comment-box mb-20">
                                <!-- Add the class to the textarea -->
                                <textarea class="form-control custom-textarea summernote" name="comment" id="comment" rows="5" placeholder=""></textarea>
                            </div>
                        </div>
                        @error('comment')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                        @enderror
                        <!-- Submit button -->
                        <div class="btn-wrapper d-flex flex-wrap gap-15 mt-20">
                            <button class="btn-primary-fill" type="button" onclick="submitMainForm()">{{ @$data['button'] }}</button>
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
