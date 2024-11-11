

<div class="card ot-card">

    <div class="card-body">

        <form method="POST" action="{{ @$data['url'] }}" enctype="multipart/form-data">
            @csrf

            {{-- Style Two --}}
            <div class="row mb-3 row mb-3 d-flex justify-content-center">

                <div class="col-lg-12">
                    <div class="small-tittle-two border-bottom mb-20 pb-8">
                        <h4 class="title text-capitalize font-600">
                            النوادي المتاحة
                        </h4>
                    </div>
                    <div class="row">

                        <div class="col-xl-12 col-md-6 mb-3">
                            <label for="address" class="form-label ">
                                قم بتحديد النوادي
                                <span class="fillable">*</span>
                            </label>
                            <select class="forums_list @error('forums') is-invalid @enderror" name="forums[]" multiple="true">
                                @foreach ($data['all_forums'] as $item)
                                    @php
                                        $selected = in_array($item->id, $data['student']?->user?->allowedForums?->pluck('id')?->values()?->toArray() ?? []) ? 'selected' : '';
                                    @endphp
                                    <option value="{{ @$item->id }}" {!! $selected !!}> {{ @$item->title }}</option>
                                @endforeach
                            </select>
                            @error('forums')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('address')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                    </div>
                </div>

                <div class="col-md-12 mt-24">
                    <div class="text-end">
                        <button class="btn btn-lg ot-btn-primary"><span>
                            </span>{{ ___('common.Update') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
