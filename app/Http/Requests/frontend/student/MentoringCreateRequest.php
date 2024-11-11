<?php

namespace App\Http\Requests\frontend\student;

use Illuminate\Foundation\Http\FormRequest;

class MentoringCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required|max:180",
            "phone" => "required",
            "content" => "required|min:10",
            "mentor_id" => 'required|exists:users,id',
            "mentoring_date" => 'required|date|after:today',
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
            "title.required" => ___('validation.title_is_required'),
            "title.max" => ___('validation.title_must_be_less_than_180_characters'),
            "content.required" => ___('validation.content_is_required'),
            "phone.min" => ___('validation.content_must_be_more_than_10_characters'),
            "mentoring_date.required" => ___('validation.mentoring_date_is_required'),
        ];
    }
}
