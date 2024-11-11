<?php

namespace Modules\Event\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = [
            'title' => 'required|max:190|unique:events,title,' . $this->id,
            'status' => 'required|in:active,disabled',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
        ];

        return $rule;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [

            'title.required' => ___('validation.title_field_is_required'),
            'title.max' => ___('validation.title_field_must_be_less_than_80_characters'),
            'status.required' => ___('validation.status_is_required'),
            'content.required' => ___('validation.content_field_is_required'),
            'image.required' => ___('validation.image_field_is_required'),
            'image.image' => ___('validation.image_field_must_be_image'),
            'image.mimes' => ___('validation.image_field_must_be_image_type'),
            'image.max' => ___('validation.image_field_must_be_less_than_2048_kb'),
        ];
    }
}
