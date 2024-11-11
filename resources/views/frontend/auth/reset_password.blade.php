@extends('frontend.layouts.auth_master')
@section('title', 'تعيين كلمة مرور جديدة')
@section('content')


<!-- login area S t a r t  -->
<section class="ot-login-area">
    <div class="container">
        <div class="row gutter-x-120 align-items-center">
            <div class="col-lg-6">
                <div class="ot-login-card">
                    <div class="logo">
                        {{ lightLogo() }}
                    </div>
                    <div class="title">
                        <h4>تعيين كلمة مرور جديدة</h4>
                    </div>
                    <!-- Form -->
                    <form action="{{ route('frontend.reset_password_post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="email" value="{{ @$data['email'] }}">
                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                ادخل كلمة المرور الجديدة
                                <span class="text-danger">*</span>
                            </label>
                            <input class="form-control ot-contact-input" name="password" type="password"
                                placeholder="*******" aria-label="default input example">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="position-relative ot-contact-form mb-24">
                            <label for="exampleInputEmail1" class="ot-contact-label">
                                تأكيد كلمة المرور الجديدة
                                <span class="text-danger">*</span>
                            </label>
                            <input class="form-control ot-contact-input" name="confirm_password" type="password"
                                placeholder="*******" aria-label="default input example">
                            @if ($errors->has('confirm_password'))
                            <span class="error">لايوجد تطابق</span>
                            @endif
                        </div>
                        <button class="btn-primary-submit w-100">تعيين كلمة المرور</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <div class="login-image ">
                    <img src="{{ @showImage(gallery('reset-password'), 'frontend/default/login.png') }}" alt="img">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End-of Login -->

@endsection