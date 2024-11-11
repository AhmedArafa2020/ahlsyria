<?php

namespace Modules\CMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFaqRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
            'status_id' => 'required|max:9|numeric|exists:statuses,id',
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
            'title.required' => ___('validation.Title is required.'),
            'title.max' => ___('validation.Title may not be greater than 255 characters.'),
            'content.required' => ___('validation.Content is required.'),
            'status_id.required' => ___('validation.Status is required.'),
            'status_id.max' => ___('validation.Status may not be greater than 9 characters.'),
            'status_id.numeric' => ___('validation.Status must be a number.'),
            'status_id.exists' => ___('validation.Status not found.'),            
        ];
    }
}
