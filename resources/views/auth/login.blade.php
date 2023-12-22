@extends('layouts.auth')
@section('main')
<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

    <!--begin::Form-->
    <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('login') }}" method="post">@csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                Sign In to XOFLIX </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-400 fw-semibold fs-4">
                New Here?

                <a href="{{route('register')}}"
                    class="link-primary fw-bold">
                    Create an Account
                </a>
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->
        @if(Session::has('account_status'))
            <h2 class="text-danger text-center">{{session('account_status')}}</h2>
        @endif
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

        <!--begin::Input group-->
        <div class="fv-row mb-10 fv-plugins-icon-container">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bold text-dark fs-6 mb-0">Password</label>

                <!--begin::Link-->
                @if (Route::has('password.request'))
                    <a class="link-primary fs-6 fw-bold" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
               
            </div>
            <!--end::Wrapper-->
            <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
            
            @error('password')
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
                    Login
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
