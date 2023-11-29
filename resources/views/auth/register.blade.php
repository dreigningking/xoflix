@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control is-valid"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

        <!--begin::Form-->
        <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('register') }}"
            id="kt_sign_up_form" method="post">@csrf
            @if (isset($user))
                <input type="hidden" name="referrer_id" value="{{ $user->id }}">
            @endif
            <div class="mb-10 text-center">
                <!--begin::Title-->
                <h1 class="text-dark mb-3">
                    Create an Account
                </h1>
                <!--end::Title-->

                <!--begin::Link-->
                <div class="text-gray-400 fw-semibold fs-4">
                    Already have an account?

                    <a href="{{ route('login') }}" class="link-primary fw-bold">
                        Sign in here
                    </a>
                </div>
                <!--end::Link-->
            </div>
            <!--end::Heading-->


            <!--end::Separator-->
            @if (isset($user))
                <!--begin::Input group-->
                <div class="fv-row mb-7 fv-plugins-icon-container">
                    <label class="form-label fw-bold text-dark fs-6">Referrer</label>
                    <input class="form-control form-control-lg " type="text" value="{{ $user->name }}" readonly>

                </div>
            @endif

            <div class="row fv-row mb-7 fv-plugins-icon-container">
                <!--begin::Col-->
                <div class="col-xl-6">
                    <label class="form-label fw-bold text-dark fs-6">First Name</label>
                    <input class="form-control form-control-lg" type="text" value="{{ old('firstname') }}"
                        name="firstname" autocomplete="off">
                    @error('firstname')
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-6">
                    <label class="form-label fw-bold text-dark fs-6">Last Name</label>
                    <input class="form-control form-control-lg" type="text" value="{{ old('lastname') }}"
                        name="lastname" autocomplete="off">
                    @error('lastname')
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="form-label fw-bold text-dark fs-6">Email</label>
                <input class="form-control form-control-lg " type="email" value="{{ old('email') }}" name="email"
                    autocomplete="off">
                @error('email')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
            <!--end::Input group-->
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="form-label fw-bold text-dark fs-6">Whatsapp Number</label>
                <input class="form-control form-control-lg " type="text" value="{{ old('phone') }}"
                    name="phone" autocomplete="off">
                @error('phone')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

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

            <!--begin::Input group-->
            <div class="fv-row mb-10 fv-plugins-icon-container">
                <label class="form-check form-check-custom form-check-solid form-check-inline">
                    <input class="form-check-input" type="checkbox" name="terms" value="1" required>
                    <span class="form-check-label fw-semibold text-gray-700 fs-6">
                        I Agree <a href="#" class="ms-1 link-primary">Terms and conditions</a>.
                    </span>
                </label>
                @error('terms')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
            <!--end::Input group-->

            <!--begin::Actions-->
            <div class="text-center">
                <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                    <span class="indicator-label">
                        Submit
                    </span>

                </button>
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
