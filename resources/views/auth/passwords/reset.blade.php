@extends('layouts.auth')
@section('main')
<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

    <!--begin::Form-->
    <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('password.update') }}" method="post">@csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                {{ __('Reset Password') }} </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <input type="hidden" name="token" value="{{ $token }}">
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group-->
        <div class="fv-row mb-10 fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bold text-dark">{{ __('Email Address') }}</label>
            <!--end::Label-->

            <!--begin::Input-->
            <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            <!--end::Input-->
            @error('email')
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </div>  
            @enderror
            
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Label-->
                <label class="form-label fw-bold text-dark fs-6">
                    Password
                </label>
                <!--end::Label-->

                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg" id="password" type="password" placeholder=""
                        name="password" autocomplete="off">

                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                        id="passwordToggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-fill" id="showpassword" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-slash-fill" style="display:none" id="hidepassword" viewBox="0 0 16 16">
                            <path
                                d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                            <path
                                d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z" />
                        </svg>
                    </span>
                </div>
                <!--end::Input wrapper-->

                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 meter"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 meter"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 meter"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 meter"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px meter"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Hint-->
            <div class="text-muted">
                Use 8 or more characters having atleast a capital letter, small letter, numbers &amp; symbols.
            </div>
            <!--end::Hint-->
            @error('password')
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback d-block">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
        <!--end::Input group--->

        <!--begin::Input group-->
        <div class="fv-row mb-5 fv-plugins-icon-container">
            <label class="form-label fw-bold text-dark fs-6">Confirm Password</label>
            <input class="form-control form-control-lg" type="password" id="confirmpassword"
                name="password_confirmation" autocomplete="off">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            </div>
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">
                    {{ __('Reset Password') }}
                </span>
            </button>
            <!--end::Submit button-->

            
            <!--end::Google link-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
@endsection
@push('scripts')
    <script>
        $('#passwordToggle').on('click', function() {
            if ($('#password').attr('type') == 'password') {
                $('#password').attr('type', 'text');
                $('#showpassword').hide()
                $('#hidepassword').show()

            } else {
                $('#password').attr('type', 'password');
                $('#hidepassword').hide()
                $('#showpassword').show()
            }
        })
        $('#confirmpassword').on('keyup', function() {
            let password = $('#password').val()
            let confirm = $(this).val()
            if (password === confirm) {
                $(this).removeClass('is-invalid')
                $(this).addClass('is-valid')
            } else {
                $(this).removeClass('is-valid')
                $(this).addClass('is-invalid')
            }
        });
    </script>
    <script>
        var code = document.getElementById("password");
        code.addEventListener("keyup", function() {
            checkpassword(code.value);
        });

        function checkpassword(password) {
            var strength = 0;
            if (password.match(/[a-z]+/)) {
                strength += 1;
            }
            if (password.match(/[A-Z]+/)) {
                strength += 1;
            }
            if (password.match(/[0-9]+/)) {
                strength += 1;
            }
            if (password.match(/[$@#&!^]+/)) {
                strength += 1;
            }

            if (password.length > 7) {
                strength += 1;
            }
            switch (strength) {
                case 0:
                    $('.meter').removeClass('active');
                    break;

                case 1:
                    $('.meter').removeClass('active');
                    $('.meter:lt(1)').addClass('active');
                    break;

                case 2:
                    $('.meter').removeClass('active');
                    $('.meter:lt(2)').addClass('active');
                    break;

                case 3:
                    $('.meter').removeClass('active');
                    $('.meter:lt(3)').addClass('active');
                    break;

                case 4:
                    $('.meter').removeClass('active');
                    $('.meter:lt(4)').addClass('active');
                    break;

                case 5:
                    $('.meter').removeClass('active');
                    $('.meter:lt(5)').addClass('active');
                    break;
            }
        }
    </script>
@endpush

