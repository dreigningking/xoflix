@extends('layouts.auth')
@section('main')
<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

    <!--begin::Form-->
    <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('password.email') }}" method="post">@csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                {{ __('Reset Password') }} </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-400 fw-semibold fs-4">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group-->
        <div class="fv-row mb-10 fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bold text-dark">Email</label>
            <!--end::Label-->

            <!--begin::Input-->
            <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <!--end::Input-->
            @error('email')
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </div>  
            @enderror
            
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">
                    {{ __('Send Password Reset Link') }}
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
