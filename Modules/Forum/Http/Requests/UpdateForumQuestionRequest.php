<?php

namespace Modules\Forum\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateForumQuestionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category' => 'required|max:255|',
            'title' => 'required|unique:forum_questions,id,' . decryptFunction($this->id),
            'question' => 'required|max:3000',
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

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required'            => ___('forum.title_is_required'),
            'title.max'                 => ___('forum.title_must_be_less_than_255_characters'),
            'title.unique'              => ___('forum.title_has_already_been_taken'),
            'status_id.required'        => ___('forum.status_is_required'),
            'question.required'         => ___('forum.question is required'),
            'question.max'              => ___('forum.question must be less than 3000 characters'),
        ];
    }
}
