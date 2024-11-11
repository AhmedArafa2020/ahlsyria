<div class="modal fade lead-modal" id="lead-modal" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content data">
            <div class="modal-header modal-header-image mb-3">
                <h5 class="modal-title">{{ @$data['title'] }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ $data['url'] }}" class="row p-2" method="post" id="modal_values"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- start document_file -->
                        <div class="col-xl-12 col-md-6 mb-3">
                            <label for="title" class="form-label ">{{ ___('common.Title') }} <span
                                    class="fillable">*</span></label>
                            <input class="form-control ot-input @error('title') is-invalid @enderror" name="title"
                                list="datalistOptions" id="title"
                                placeholder="{{ ___('placeholder.Enter Title') }}" value="{{ @$data['category']['title'] }}">
                            @error('title')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-xl-12 col-md-6 mb-3">
                            <label for="status" class="form-label ">الفلاتر<span
                                    class="fillable">(اترك فارغاً لتحديد الكل)</span></label>
                            <select class="form-select ot-input modal_select2 @error('filters') is-invalid @enderror"
                                id="filters" name="filters[]" multiple="multiple">
                                <option @if(in_array('state_idlib',@$data['category']['filters'])) selected @endif value="state_idlib">سكان منطقة ادلب</option>
                                <option @if(in_array('state_aleppo',@$data['category']['filters'])) selected @endif value="state_aleppo">سكان منطقة حلب</option>
                                <option @if(in_array('country_turkey',@$data['category']['filters'])) selected @endif value="country_turkey">سكان تركيا</option>
                                <option @if(in_array('country_syria',@$data['category']['filters'])) selected @endif value="country_syria">سكان سوريا</option>
                                <option @if(in_array('work_field_web_programming',@$data['category']['filters'])) selected @endif value="work_field_web_programming">العاملين في مجال برمجة المواقع</option>
                                <option @if(in_array('work_field_content_creator',@$data['category']['filters'])) selected @endif value="work_field_content_creator">العاملين في مجال صناعة المحتوى</option>
                                <option @if(in_array('work_field_graphic_design',@$data['category']['filters'])) selected @endif value="work_field_graphic_design">العاملين في مجال التصميم</option>
                                <option @if(in_array('gender_1',@$data['category']['filters'])) selected @endif value="gender_1">الذكور</option>
                                <option @if(in_array('gender_2',@$data['category']['filters'])) selected @endif value="gender_2">الإناث</option>
                            </select>
                        </div>

                        <div class="col-xl-12 col-md-6 mb-3">
                            <label for="status" class="form-label ">{{ ___('common.Status') }}<span
                                    class="fillable">*</span></label>
                            <select class="form-select ot-input modal_select2 @error('status_id') is-invalid @enderror"
                                id="status" required name="status_id">
                                <option @if( @$data['category']['status_id']  == '1') {{'selected'}} @endif value="1">{{ ___('common.Active') }}</option>
                                <option @if( @$data['category']['status_id']  == '2') {{'selected'}} @endif value="2">{{ ___('common.Inactive') }}</option>
                            </select>
                            @error('status_id')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- end document_file -->
                        <div class="col-xl-12 col-md-12 mt-4">

                            <div class="form-group d-flex justify-content-end">
                                <button type="button" onclick="submitForm()"
                                    class="btn btn-lg ot-btn-primary">{{ @$data['button'] }}</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('backend/assets/js/modal/__modal.min.js') }}"></script>
