<?php

namespace Modules\Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialMediaLinksRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "social_media_links" => "required|max:5000"
        ];
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

    public function messages()
    {
        return [
            'social_media_links.required' => ___('validation.Skills are required'),
            'social_media_links.max' => ___('validation.Skills must be less than 5000 characters'),
        ];
    }
}
