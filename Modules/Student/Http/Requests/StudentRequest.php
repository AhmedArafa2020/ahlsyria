<?php

namespace Modules\Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|max:100",
            "phone" => "required|max:20",
            "date_of_birth" => "required|max:30",
            "gender" => "required|max:30",
            "address" => "nullable|max:255",
            "designation" => "nullable|max:255",
            "about_me" => "nullable|max:255",
            "profile_image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1048",
            "cv_file" => "nullable|max:5120",
            'name_ar'                   => 'required|max:50',
            'country'                   => 'required|max:50',
            'state'                     => 'required|max:50',
            'nationality'               => 'required|max:50',
            'work_field'                => 'required|max:100',
            'experience_years'          => 'required|numeric|gte:0',
            'freelancer'                => 'required|numeric',
            'freelancer_years'          => 'nullable|numeric|required_if:freelancer,1',
            'phone_dial'                => 'required|numeric',
            'join_reason'               => 'nullable',
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

            "name.required" => ___('validation.name_is_required'),
            "name.max" => ___('validation.name_must_be_less_than_100_characters'),
            "phone.required" => ___('validation.phone_is_required'),
            "phone.max" => ___('validation.phone_must_be_less_than_20_characters'),
            "date_of_birth.required" => ___('validation.date_of_birth_is_required'),
            "date_of_birth.max" => ___('validation.date_of_birth_less_than_30_characters'),
            "gender.required" => ___('validation.gender_is_required'),
            "gender.max" => ___('validation.gender_must_be_less_than_30_characters'),
            "address.required" => ___('validation.address_is_required'),
            "address.max" => ___('validation.address_must_be_less_than_255_characters'),
            "designation.required" => ___('validation.designation_is_required'),
            "designation.max" => ___('validation.designation_must_be_less_than_255_characters'),
            "about_me.required" => ___('validation.about_me_is_required'),
            "about_me.max" => ___('validation.about_me_must_be_less_than_255_characters'),
            "profile_image.image" => ___('validation.profile_image_must_be_an_image'),
            "profile_image.mimes" => ___('validation.profile_image_must_be_a_file_of_type:jpeg,png,jpg,gif,svg'),
            "profile_image.max" => ___('validation.profile_image_must_be_less_than_1048_kilobytes'),
            "cv_file.max" => 'CV must be less than 5mb',
            'name_ar.required'                   => 'الاسم بالعربي مطلوب',
            'name_ar.max'                        => 'Max allowed is 50 characters',
            'country.required'                   => 'البلد مطلوب',
            'country.max'                        => 'Max allowed is 50 characters',
            'state.required'                     => 'المحافظة مطلوبة',
            'state.max'                          => 'Max allowed is 50 characters',
            'education.required'                 => 'مستوى التعليم مطلوب',
            'education.max'                      => 'Max allowed is 50 characters',
            'work_field.required'                => 'مجال العمل مطلوب',
            'work_field.max'                     => 'Max allowed is 50 characters',
            'experience_years.required'          => 'سنوات الخبرة مطلوبة',
            'experience_years.numeric'           => 'This field must be number',
            'experience_years.gte'               => 'Negative values are not allowed',
            'freelancer.required'                => 'العمل كفريلانسر مطلوب',
            'freelancer.numeric'                 => 'This field must be number',
            'freelancer_years.numeric'           => 'This field must be number',
            'freelancer_years.required_if'       => 'You have to specify experience years',
            'phone_dial.required'                => 'نداء الدولة مطلوب',
            'phone_dial.numeric'                 => 'This field must be number',
            'nationality.required'               => 'الجنسية مطلوبة',

        ];
    }
}
