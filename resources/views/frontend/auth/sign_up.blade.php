@extends('frontend.layouts.auth_master')
@section('title', @$data['title'])
@section('content')
<!-- LOGIN::START  -->
<section class="ot-login-area" id="ot_registration_area">
    <div class="container">

        <div class="row gutter-x-120 align-items-center">
            <div class="col-lg-6" style="z-index: 1">
                <div class="ot-login-card">
                    <div class="logo">
                        {{ lightLogo() }}
                    </div>
                    <div class="title text-center">
                        <h2 style="font-weight: bold">إنشاء حساب</h2>
                    </div>
                    <form action="{{ route('student.sign_up_post') }}" method="POST" id="studentSignUp">
                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                الاسم باللغة الانجليزية
                                <span class="text-danger">*</span>
                            </label>
                            <input id="input_name" class="form-control ot-contact-input" name="name" type="text"
                                placeholder="Enter Your Name">
                            <span class="text-danger custom-error-text" id="error_name"></span>

                        </div>
                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                {{ ___('student.name_arabic') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input id="input_name_ar" class="form-control ot-contact-input" name="name_ar" type="text"
                                placeholder="ادخل الاسم هنا" aria-label="default input example">
                            <span class="text-danger custom-error-text" id="error_name_ar"></span>

                        </div>
                        <div class="position-relative ot-contact-form mb-24">
                            <label for="date_input" class="ot-contact-label">
                                {{ ___('student.date_of_birth') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input id="input_date_of_birth" class="form-control flip-horizontal" name="date_of_birth"
                                type="date" placeholder="سنة / شهر / يوم" aria-label="default input example">
                            <span class="text-danger custom-error-text" id="error_date_of_birth"></span>

                        </div>
                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                {{ ___('student.gender') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select  ot-contact-input" name="gender"
                                aria-label="Default select example">
                                <option value="{{null}}" disabled selected>{{ ___('student.Select Gender') }}</option>
                                <option value="{{ App\Enums\Gender::MALE }}">{{ ___('student.Male') }}</option>
                                <option value="{{ App\Enums\Gender::FEMALE }}">{{ ___('student.Female') }}</option>
                            </select>
                            <span class="text-danger custom-error-text" id="error_gender"></span>

                        </div>

                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                {{ ___('student.nationality') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select  ot-contact-input" name="nationality"
                                aria-label="Default select example">
                                <option value="{{null}}" selected>{{ ___('student.Select Nationality') }}</option>
                                <option value="syrian">{{ ___('student.Syrian') }}</option>
                                <option value="other">{{ ___('student.Other') }}</option>
                            </select>
                            <span class="text-danger custom-error-text" id="error_nationality"></span>

                        </div>
                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                {{ ___('student.education') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select  ot-contact-input" name="education"
                                aria-label="Default select example">
                                <option value="{{null}}" selected>{{ ___('student.Select Education') }}</option>
                                <option value="primary_school">{{ ___('student.Primary School') }}</option>
                                <option value="middle_school">{{ ___('student.Middle School') }}</option>
                                <option value="high_school">{{ ___('student.High School') }}</option>
                                <option value="institute">{{ ___('student.Institute') }}</option>
                                <option value="university">طالب جامعي</option>
                                <option value="graduated">خريج جامعي</option>
                                <option value="higher_education">{{ ___('student.Higher Education') }}</option>
                            </select>
                            <span class="text-danger custom-error-text" id="error_education"></span>

                        </div>


                      <div class="position-relative ot-contact-form mb-24">
                        <label for="exampleInputEmail1" class="ot-contact-label">
                            {{ ___('student.التخصص الطبي (إن وجد)') }}
                        </label>
                        <select id="medical_specialization_select" class="form-select  ot-contact-input" name="medical_specialization"
                            aria-label="Default select example">
                            <option value="{{null}}" selected>{{ ___('student.اختر تخصصك الطبي') }}</option>
                            <option value="nursing">{{ ___('student.تمريض') }}</option>
                            <option value="Family medicine">{{ ___('student.طب الأسرة') }}</option>
                            <option value="surgery">{{ ___('student.جراحة') }}</option>
                            <option value="other">{{ ___('student.Other') }}</option>
                        </select>
                        <input id="other_medical_specialization_input" class="form-control" name="other_medical_specialization" type="text"
                            placeholder="{{ ___('student.Enter Work Field') }}" aria-label="default input example">
                        <span class="text-danger custom-error-text" id="error_other_medical_specialization"></span>
                        <span class="text-danger custom-error-text" id="error_medical_specialization"></span>

                    </div>

                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                {{ ___('student.work_field') }}
                                <span class="text-danger">*</span>
                            </label>

                            


                            <select id="work_field_select" class="form-select  ot-contact-input" name="work_field"
                                aria-label="Default select example">
                                <option value="{{null}}" selected>{{ ___('student.Select Work Field') }}</option>
                                <option value="Clinical Medicine">{{ ___('student.الطب السريري') }}</option>
                                <option value="Medical Research and Epidemiology">{{ ___('student.البحوث الطبية وعلم الأوبئة') }}</option>
                                <option value="Public Health">{{ ___('student.الصحة العامة') }}</option>
                                <option value="other">{{ ___('student.Other') }}</option>
                            </select>
                            <input id="other_work_field_input" class="form-control" name="other_work_field" type="text"
                                placeholder="{{ ___('student.Enter Work Field') }}" aria-label="default input example">
                            <span class="text-danger custom-error-text" id="error_other_work_field"></span>
                            <span class="text-danger custom-error-text" id="error_work_field"></span>

                        </div>
                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                {{ ___('student.experience_years') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" name="experience_years" type="number" value="1" min="1"
                                placeholder="{{ ___('student.Enter Experience Years') }}"
                                aria-label="default input example">
                            <span class="text-danger custom-error-text" id="error_experience_years"></span>

                        </div>

                      {{-- hide because if deleted then choices country dosnt appear --}}
                   <div class="position-relative ot-contact-form mb-24 " style="display: none;">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                هل عملت كمستقل\عامل حر من قبل؟
                                <span class="text-danger">*</span>
                            </label>
                            <select id="freelancer_select" class="form-select  ot-contact-input" name="freelancer"
                                aria-label="Default select example">
                                <option value="{{null}}" selected>{{ ___('student.Select') }}</option>
                                <option value="1">{{ ___('student.Yes') }}</option>
                                <option value="0">{{ ___('student.No') }}</option>
                            </select>
                            <div id="freelancer_years">
                                <label for="exampleInputEmail1" class="ot-contact-label">
                                    {{ ___('student.For How Many Years?') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" name="freelancer_years" type="number" value="1" min="1"
                                    required placeholder="{{ ___('student.Enter Freelancer Years') }}"
                                    aria-label="default input example">
                                <span class="text-danger custom-error-text" id="error_freelancer_years"></span>
                            </div>
                            <span class="text-danger custom-error-text" id="error_freelancer"></span>

                        </div>
                      

                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                ملف السيرة الذاتية
                            </label>
                            <label class="label" style="cursor: pointer">
                                <input id="cv_file" name="cv_file" type="file" accept=".doc,.docx,.pdf" />
                                <span id="selected_file_name">اختيار ملف</span>
                            </label>
                            <span class="text-danger custom-error-text" id="error_cv_file"></span>

                        </div>
                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                دولة الاقامة
                                <span class="text-danger">*</span>
                            </label>
                            <select id="countries_options" class="form-select select_2  ot-contact-input" name="country"
                                aria-label="Default select example">
                                <option value="{{null}}" selected>{{ ___('student.Select Country') }}</option>
                            </select>
                            <span class="text-danger custom-error-text" id="error_country"></span>

                        </div>
                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                المدينة
                                <span class="text-danger">*</span>
                            </label>
                            <select id="states_options" class="form-select select_2  ot-contact-input" name="state"
                                aria-label="Default select example">
                                <option value="{{null}}" selected>اختر المدينة</option>
                            </select>
                            <span class="text-danger custom-error-text" id="error_state"></span>

                        </div>

                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                المنطقة
                                <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" name="location" type="text" required placeholder="اختر المنطقة"
                                aria-label="default input example">
                            <span class="text-danger custom-error-text" id="error_location"></span>

                        </div>

                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                حالة الاقامة
                                <span class="text-danger">*</span>
                            </label>
                            <select required id="place_select" class="form-select  ot-contact-input" name="place"
                                aria-label="Default select example">
                                <option value="{{null}}" disabled selected>{{ ___('student.Select') }}</option>
                                <option value="placed">مقيم</option>
                                <option value="displaced">نازح</option>
                            </select>
                            <span class="text-danger custom-error-text" id="error_place"></span>

                        </div>

                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                هل تعرف نفسك كذوي احتياجات خاصة؟
                                <span class="text-danger">*</span>
                            </label>
                            <select required id="disability_select" class="form-select  ot-contact-input"
                                name="disability" aria-label="Default select example">
                                <option value="{{null}}" disabled selected>{{ ___('student.Select') }}</option>
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            </select>
                            <span class="text-danger custom-error-text" id="error_disability"></span>

                        </div>

                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                {{ ___('student.Email Address') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input id="input_email" class="form-control ot-contact-input" name="email" type="text"
                                placeholder="{{ ___('student.Enter Email') }}" aria-label="default input example">
                            <span class="text-danger custom-error-text" id="error_email"></span>

                        </div>
                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                {{ ___('student.Phone Number') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="d-flex">
                                <p class="flex-grow-1 text-start">EX: 1231231234</p>
                                <p class="w-25 text-start">EX: 00XXX</p>
                            </div>
                            <div class="d-flex">

                                <input class="form-control flex-grow-1" name="phone" type="number" required
                                    style="direction: ltr !important" aria-label="default input example">
                                <input class="form-control w-25" name="phone_dial" type="text" required
                                    style="direction: ltr !important;margin-right: 12px"
                                    aria-label="default input example">
                            </div>
                            <div>

                                <span class="text-danger custom-error-text" id="error_phone"></span>
                            </div>
                            <span class="text-danger custom-error-text" id="error_phone_dial"></span>

                        </div>
                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                {{ ___('student.Password') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input class="form-control ot-contact-input" name="password" type="password"
                                placeholder="*******" aria-label="default input example">
                            <span class="text-danger custom-error-text" id="error_password"></span>
                        </div>

                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                {{ ___('student.Confirm Password') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input class="form-control ot-contact-input" name="password_confirmation" type="password"
                                placeholder="*******" aria-label="default input example">
                            <span class="text-danger custom-error-text" id="error_password_confirmation"></span>
                        </div>
                        {{-- <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                {{ ___('student.join_reason') }}
                            </label>
                            <textarea class="form-control" rows="40" style="height: 150px !important;"
                                name="join_reason" id="exampleFormControlTextarea1" rows="6"></textarea>
                            <span class="text-danger custom-error-text" id="error_join_reason"></span>

                        </div> --}}

                        <div class="position-relative ot-contact-form mb-24">
                            <div class="remember-me terms-condition mb-0">
                                <label>
                                    <input class="ot-checkbox" type="checkbox" value="1" name="newsletter" />
                                    <small>{{ ___('student.Subscribe to news letter') }}
                                    </small>
                                    <span class="ot-checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="position-relative ot-contact-form mb-40">
                            <div class="remember-me terms-condition mb-0">
                                <label>
                                    <input class="ot-checkbox" type="checkbox" value="programming" name="agree" />
                                    <small>{{ ___('student.I agree to all the') }}
                                        <a href="{{ route('frontend.privacy_policy')}}"><span>سياسة الخصوصية</span></a>
                                    </small>
                                    <span class="ot-checkmark"></span>
                                </label>
                            </div>
                            <span class="text-danger custom-error-text" id="error_agree"></span>
                        </div>

                        <div class="position-relative ot-contact-form mb-40">
                            <div id="error_all" class="text-danger custom-error-text"></div>
                        </div>


                        <div class="d-grid">
                            <a type="button" class="btn-primary-submit" id="studentSignUpButton">{{ ___('student.SignUp') }}</a>
                        </div>
                    </form>
                    <div class="login-footer">
                        <div class="create-account">
                            <p>{{ ___('student.Already have an account?') }} <a
                                    href="{{ route('frontend.signIn') }}"><span>{{ ___('auth.Sign In') }}</span></a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center align-items-center"
                style="position: fixed;top:0; height: 100vh; left: 0; z-index: 0">
                <div class="login-image ">
                    <img src="{{ @showImage(gallery('sign-up'), 'frontend/default/login.png') }}" alt="img">
                </div>
            </div>
        </div>


    </div>

</section>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    if(/iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream)
        {
            var inputs = document.querySelectorAll('input[type="number"]');
            for(var i = inputs.length; i--;)
                inputs[i].setAttribute('pattern', '\\d*');
        }
        const optionsSelect = document.getElementById("freelancer_select");
        const inputContainer = document.getElementById("freelancer_years");
        inputContainer.style.display = "none";

        optionsSelect.addEventListener("change", function() {
            const selectedValue = optionsSelect.value;
            
            if (selectedValue === "1") {
                inputContainer.style.display = "block";
            } else {
                inputContainer.style.display = "none";
            }
        });

        const workFieldSelect = document.getElementById("work_field_select");
        const otherWorkFieldInput = document.getElementById("other_work_field_input");
        otherWorkFieldInput.style.display = "none";

        workFieldSelect.addEventListener("change", function() {
            const selectedValue = workFieldSelect.value;
            
            if (selectedValue === "other") {
                otherWorkFieldInput.style.display = "block";
            } else {
                otherWorkFieldInput.style.display = "none";
            }
        });

        const MedicalSpecializationSelect = document.getElementById("medical_specialization_select");
        const otherMedicalSpecializationInput = document.getElementById("other_medical_specialization_input");
        otherMedicalSpecializationInput.style.display = "none";

        MedicalSpecializationSelect.addEventListener("change", function() {
            const selectedValue = MedicalSpecializationSelect.value;
            
            if (selectedValue === "other") {
                otherMedicalSpecializationInput.style.display = "block";
            } else {
                otherMedicalSpecializationInput.style.display = "none";
            }
        });


        const countries_options = document.getElementById("countries_options");
        const states_options = document.getElementById("states_options");
        var country_id;
        
        fetch('frontend/assets/countries.json')
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                const option = document.createElement("option");
                option.value = item.name;
                option.textContent = item.name;
                country_id = item.id
                countries_options.appendChild(option);
                });
        })
        .catch(error => {
            console.error("Error fetching JSON:", error);
        });

        $(document).ready(function() {
        $('#countries_options').on('select2:select', function (e) {
            var selected_country = e.params.data.id;
            $('#states_options').val(null).trigger('change');
            fetch('frontend/assets/states.json')
                .then(response => response.json())
                .then(data2 => {
                    data2 = data2.filter(o => o.country_name == selected_country)
                    data2.forEach(item => {
                        //const option = document.createElement("option");
                        //option.value = item.name;
                        //option.textContent = item.name;
                        //states_options.appendChild(option);
                        var newOption = new Option(item.name, item.name, false, false);
                        $('#states_options').append(newOption).trigger('change');
                    });
                })
                .catch(error => {
                    console.error("Error fetching JSON:", error);
                });
            
        });

        $('#cv_file').change(function() {
            $('#selected_file_name').text($('#cv_file')[0].files[0].name);
        });

        $('#input_name').on('input',function() {
            $('#error_name').text('');
            if(/^[A-Za-z ][A-Za-z ]*$/.test($('#input_name').val()) == false){
                $('#error_name').text('استخدم فقط الاحرف الانجليزية');
            }
        });
        $('#input_name_ar').on('input',function() {
            $('#error_name_ar').text('');
            if(/^[\u0621-\u064A ]+$/.test($('#input_name_ar').val()) == false){
                $('#error_name_ar').text('استخدم فقط الاحرف العربية');
            }
        });
        const validateEmail = (email) => {
            return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
        };
        
        $('#input_email').on('input',function() {
            $('#error_email').text('');
            if(!validateEmail($('#input_email').val())){
                $('#error_email').text('البريد الالكتروني غير صالح');
            }
        });

        const getAge = (DOB) => {
            var today = new Date();
            var birthDate = new Date(DOB);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }    
            return age;
        }
         $('#input_date_of_birth').on('input',function() {
            $('#error_date_of_birth').text('');
            if(getAge($('#input_date_of_birth').val()) < 16){
                $('#error_date_of_birth').text('يجب ان يكون العمر 16 سنة على الاقل');
            }
        });

    });
    
    countries_options.addEventListener("change", function() {
        
        while (states_options.options.length > 1) {
            states_options.remove(1);
        }
        fetch('frontend/assets/states.json')
            .then(response => response.json())
            .then(data2 => {
                data2 = data2.filter(o => o.country_name == countries_options.value)
                data2.forEach(item => {
                    const option = document.createElement("option");
                    option.value = item.name;
                    option.textContent = item.name;
                    states_options.appendChild(option);
                });
            })
            .catch(error => {
                console.error("Error fetching JSON:", error);
            });
    });
</script>
{{-- <style>
    ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: lightgray !important;
        opacity: 1;
        /* Firefox */
    }

    :-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: lightgray !important;
    }

    ::-ms-input-placeholder {
        /* Microsoft Edge */
        color: lightgray !important;
    }
</style> --}}
<style>
    ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: gray !important;
        opacity: 1;
        /* Firefox */
    }

    :-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: gray !important;
    }

    ::-ms-input-placeholder {
        /* Microsoft Edge */
        color: gray !important;
    }

    select.null-selected {
        background-color: #f2f2f2 !important;
        /* Change the background color */
        color: blue !important;
        border: 2px solid #333 !important;
        /* Add a border */
        padding: 10px !important;
        /* Add padding */
        font-size: 16px !important;
        /* Change the font size */
        /* Add other styles as needed */
    }

    label.label input[type="file"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .label {
        color: var(--ot-primary-title);
        height: 49px;
        width: 100%;
        font-size: 16px;
        padding: 11px 14px 11px 14px;
        position: relative;
        border-radius: 8px;
        background: none;
        border: 1px solid var(--ot-primary-border);
        text-transform: none;
        cursor: pointer;
    }

    .label:hover {
        cursor: pointer;
    }

    .label:invalid+span {
        color: #000000;
    }

    .label:valid+span {
        color: #ffffff;
    }
</style>


<!-- LOGIN::END  -->

@endsection