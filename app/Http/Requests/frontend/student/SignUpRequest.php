<?php

namespace App\Http\Requests\frontend\student;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'                      => 'required|max:50',
            'email'                     => 'required|email|max:50|unique:users,email',
            'phone'                     => 'required|numeric|unique:users,phone',
            'password'                  => 'required|confirmed|min:6',
            'agree'                     => 'required',
            'name_ar'                   => 'required|max:50',
            'gender'                    => 'required',
            'date_of_birth'             => 'required|date|before:-16 years',
            'country'                   => 'required|max:50',
            'state'                     => 'required|max:50',
            'education'                 => 'required|max:50',
            'nationality'               => 'required|max:50',
            'work_field'                => 'required|max:100',
            'other_work_field'          => 'nullable|required_if:work_field,other',
            'experience_years'          => 'required|numeric|gte:0',
        /*    'freelancer'                => 'required|numeric',
            'freelancer_years'          => 'nullable|numeric|required_if:freelancer,1',
            */
            'cv_file'                   => 'nullable|file|mimes:doc,docx,pdf',
            'phone_dial'                => 'required|numeric',
            'join_reason'               => 'nullable',
            'place'                     => 'required',
            'disability'                => 'required',
            'location'                => 'required',
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
            'name.required'                      => 'هذا الحقل مطلوب',
            'name.max'                           => 'يجب الا يتجاوز الاسم 255 حرفاً',
            'email.required'                     => 'هذا الحقل مطلوب',
            'email.max'                          => 'يجب الا يتجاوز البريد 50 حرفاُ',
            'email.unique'                       => 'البريد الالكتروني مستخدم مسبقاُ',
            'email.email'                        => 'البريد الالكتروني يجب ان يكون صحيحاً',
            'phone.required'                     => 'رقم الهاتف مطلوب',
            'phone.numeric'                      => 'يجب ان يحتوي الرقم على ارقام فقط',
            'phone.unique'                       => 'رقم الهاتف مستخدم مسبقاً',
            'password.required'                  => 'كلمة المرور مطلوبة',
            'password.min'                       => 'يجب ان تتجاوز كلمة المرور الـ 6 محارف',
            'agree.required'                     => 'يجب الموافقة على الشروط والاحكام',
            'name_ar.required'                   => 'هذا الحقل مطلوب',
            'name_ar.max'                        => 'يجب الا يتجاوز الاسم 50 حرفا',
            'date_of_birth.required'             => 'هذا الحقل مطلوب',
            'date_of_birth.date'                 => 'يجب ادخال تاريخ فقط',
            'date_of_birth.before'               => 'العمر يجب ان يكون 16 سنة على الاقل',
            'country.required'                   => 'هذا الحقل مطلوب',
            'country.max'                        => 'يجب الا يتجاوز الحقل 50 حرفاً',
            'state.required'                     => 'هذا الحقل مطلوب',
            'state.max'                          => 'يجب الا يتجاوز الحقل 50 حرفاً',
            'education.required'                 => 'هذا الحقل مطلوب',
            'education.max'                      => 'يجب الا يتجاوز الحقل 50 حرفاً',
            'work_field.required'                => 'هذا الحقل مطلوب',
            'work_field.max'                     => 'يجب الا يتجاوز الحقل 50 حرفاً',
            'other_work_field.required_if'       => 'يجب تحديد مجال العمل',
            'experience_years.required'          => 'هذا الحقل مطلوب',
            'experience_years.numeric'           => 'يجب ان يحتوي الحقل على ارقام فقط',
            'experience_years.gte'               => 'القيم السالبة غير مسموحة',
            /*'freelancer.required'                => 'هذا الحقل مطلوب',
            'freelancer.numeric'                 => 'يجب ان يحتوي الحقل على ارقام فقط',
            'freelancer_years.numeric'           => 'يجب ان يحتوي الحقل على ارقام فقط',
            'freelancer_years.required_if'       => 'يجب ان تقوم بتحديد عدد السنوات',
            */
            'cv_file.file'                       => 'يجب ان يحتوي الحقل على ملف فقط',
            'cv_file.mimes'                      => 'السيرة الذاتية يجب ان تكون ملف pdf او doc فقط',
            'phone_dial.required'                => 'نداء الهاتف مطلوب',
            'phone_dial.numeric'                 => 'يجب ان يحتوي نداء الهاتف على ارقام فقط',
            'nationality.required'               => 'هذا الحقل مطلوب',
            'gender.required'                    => 'هذا الحقل مطلوب',
            'place.required'                     => 'هذا الحقل مطلوب',
            'disability.required'                => 'هذا الحقل مطلوب',
            'location.required'                  => 'هذا الحقل مطلوب',
        ];
    }
}
