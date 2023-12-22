@extends('layouts.app')
@push('styles')
@endpush
@section('main')
    <div class="content flex-row-fluid" id="kt_content">

        <!--begin::Navbar-->
        @if(auth()->user()->role == 'user')
        <div class="card mb-5 mb-xl-10">
            <div class="card-body pt-9 pb-0">
                
                @include('user.header')
                <!--end::Details-->
                
                <!--begin::Navs-->
                @include('layouts.menu.user_desktop')
                
                <!--begin::Navs-->
            </div>
        </div>
        @endif
        <!--end::Navbar-->
        <!--begin::Referral program-->
        <div class="tab-content">
            <div id="overview" class="tab-pane fade active show" role="tabpanel" aria-labelledby="overview_tab">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card mb-5 mb-xl-10">
                            <!--begin::Card header-->
                            <div class="card-header border-0 ">
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Profile Details</h3>
                                </div>
                            </div>
                            <!--begin::Card header-->

                            <!--begin::Content-->
                            <div id="kt_account_settings_profile_details">
                                <!--begin::Form-->
                                <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('profile')}}" method="POST" enctype="multipart/form-data">@csrf
                                    <!--begin::Card body-->
                                    <div class="card-body border-top p-9">
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label text-center text-md-left fw-semibold fs-6">Image</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-center text-md-left">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url({{asset('media/svg/avatars/blank.svg')}})">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url({{$user->avatar}})">
                                                    </div>
                                                    <!--end::Preview existing avatar-->

                                                    <!--begin::Label-->
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        aria-label="Change avatar" data-bs-original-title="Change avatar">
                                                        <i class="ki-duotone ki-pencil fs-7">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                              </svg>
                                                        </i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                                        {{-- <input type="hidden" name="avatar_remove"> --}}
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->

                                                    <!--begin::Cancel-->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" 
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        aria-label="Remove avatar" data-bs-original-title="Remove avatar"
                                                        data-kt-initialized="1">
                                                        <i class="ki-duotone ki-cross fs-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                              </svg>
                                                        </i> 
                                                    </span>
                                                    <!--end::Cancel-->

                                                    <!--begin::Remove-->
                                                    
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->

                                                <!--begin::Hint-->
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                <!--end::Hint-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="firstname" value="{{$user->firstname}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                            placeholder="First name" value="Max">
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->

                                                    <!--begin::Col-->
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="lastname" value="{{$user->lastname}}" class="form-control form-control-lg form-control-solid"
                                                            placeholder="Last name" value="Smith">
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                <span class="required">Contact Phone</span>


                                                <span class="ms-1" data-bs-toggle="tooltip" aria-label="Phone number must be active" data-bs-original-title="Phone number must be active" data-kt-initialized="1">
                                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span> 
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <input type="tel" name="phone"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Phone number" value="{{$user->phone}}">
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">State</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <!--begin::Input-->
                                                <select id="state" name="state" data-control="select2" data-placeholder="Select a State..."
                                                    class="form-select form-select-solid form-select-lg ">
                                                        <option value=""></option>
                                                        @foreach ($states as $state)
                                                            <option value="{{$state}}" @if($user->state == $state) selected @endif>{{$state}}</option>
                                                        @endforeach
                                                        
                                                </select>
                                                

                                                <!--begin::Hint-->
                                                <div class="form-text">
                                                    Please select a preferred language, including date, time, and number formatting.
                                                </div>
                                                <!--end::Hint-->
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->


                                        
                                        <div class="fw-bold my-3">
                                            This section is only required for withdrawal of balance to bank account.
                                        </div>

                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                <span class="">Bank</span>
                                                <span class="ms-1" data-bs-toggle="tooltip" aria-label="Bank"
                                                    data-bs-original-title="Bank" data-kt-initialized="1">
                                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span> 
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <select id="banks" name="bank_code" data-placeholder="Select a Bank..." data-control="select2"
                                                    class="form-select form-select-lg fw-semibold">
                                                    @foreach ($banks as $bank)
                                                        <option value="{{$bank->code}}" data-bank_name="{{$bank->name}}" @if($user->bank_code == $bank->code) selected @endif>{{$bank->name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                                <input type="hidden" name="bank_name" value="{{$user->bank_name}}" id="bank_name">
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Account Number</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="account_number" value="{{$user->account_number}}" id="account_number"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="10 digit Nuban" value="">
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--begin::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Account Name</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <input type="text" name="account_name" id="account_name" value="{{$user->account_name}}" class="form-control form-control-lg form-control-solid"
                                                    placeholder="" value="" readonly>
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback" id="account_name_error">

                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Notification of Subscription Expiry</label>
                                            <!--begin::Label-->
                                        
                                            <!--begin::Label-->
                                            <div class="col-lg-8 d-flex align-items-center">
                                                <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                                    <input name="email_notify" value="0" type="hidden">
                                                    <input class="form-check-input w-45px h-30px" name="email_notify" value="1" type="checkbox" id="email_notify" @if($user->email_notify) checked @endif>
                                                    <label class="form-check-label" for="status"></label>
                                                </div>
                                                @error('email_notify')
                                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                            <!--begin::Label-->
                                        </div>
                                        
                                       

                                       
                                    </div>
                                    <!--end::Card body-->

                                    <!--begin::Actions-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button type="reset"
                                            class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                        <button type="submit" class="btn btn-primary"
                                            id="kt_profile_details_submit">Save Changes</button>
                                    </div>
                                    <!--end::Actions-->
                                    <input type="hidden">
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Content-->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-5 mb-xl-10">
                            <!--begin::Card header-->
                            <div class="card-header border-0 ">
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Password Change</h3>
                                </div>
                            </div>
                            <!--begin::Card header-->

                            <!--begin::Content-->
                            <div id="kt_account_settings_profile_details">
                                <!--begin::Form-->
                                <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('password_update')}}" method="POST">@csrf
                                    <!--begin::Card body-->
                                    <div class="card-body border-top p-9">

                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="form-label fw-bold text-dark fs-6 required">Current Password</label>
                                            <input class="form-control form-control-lg @error('oldpassword') is-invalid @enderror" type="password" name="oldpassword" autocomplete="off">
                                            @error('oldpassword')
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
                                                <label class="form-label fw-bold text-dark required fs-6">
                                                    New Password
                                                </label>
                                                <!--end::Label-->

                                                <!--begin::Input wrapper-->
                                                <div class="position-relative mb-3">
                                                    <input class="form-control form-control-lg" id="password" type="password" placeholder="" name="password" autocomplete="off">

                                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" id="passwordToggle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill"  id="showpassword" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" style="display:none" id="hidepassword" viewBox="0 0 16 16">
                                                            <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <!--end::Input wrapper-->

                                                <!--begin::Meter-->
                                                {{-- <div class="d-flex align-items-center mb-3">
                                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 meter"></div>
                                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 meter"></div>
                                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 meter"></div>
                                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 meter"></div>
                                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px meter"></div>
                                                </div> --}}
                                                <!--end::Meter-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Hint-->
                                            {{-- <div class="text-muted">
                                                Use 8 or more characters having atleast a capital letter, small letter, numbers &amp; symbols.
                                            </div> --}}
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
                                            <label class="form-label fw-bold text-dark required fs-6">Confirm Password</label>
                                            <input class="form-control form-control-lg" type="password" id="confirmpassword" name="password_confirmation" autocomplete="off">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card body-->

                                    <!--begin::Actions-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button type="reset"
                                            class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                        <button type="submit" class="btn btn-primary"
                                            id="profile_submit">Save Changes</button>
                                    </div>
                                    <!--end::Actions-->
                                    <input type="hidden">
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Content-->
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
@push('scripts')
<script>
    $('#passwordToggle').on('click',function(){
        if($('#password').attr('type') == 'password'){
            $('#password').attr('type','text');
            $('#showpassword').hide()
            $('#hidepassword').show()

        }else{
            $('#password').attr('type','password');
            $('#hidepassword').hide()
            $('#showpassword').show()
        }
    })
    $('#confirmpassword').on('keyup',function(){
        let password = $('#password').val()
        let confirm = $(this).val()
        if(password === confirm){
            $(this).removeClass('is-invalid')
            $(this).addClass('is-valid')
        }else{
            $(this).removeClass('is-valid')
            $(this).addClass('is-invalid')
        }
    });

    // var code = document.getElementById("password");
    // code.addEventListener("keyup", function() {
    //     checkpassword(code.value);
    // });
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
<script>
    $(document).on('change','#banks',function(){
        
        let bank_name = $('#banks').find(':selected').text()
        $('#bank_name').val(bank_name)
        if($('account_number').val() && $('account_number').val().length == 10){
            getAccountName();
        }
      
    })

    $(document).on('input','#account_number',function(){
        if($(this).val() && $(this).val().length == 10 && $('#banks').val()){
            $('#profile_submit').addClass('disabled')
            getAccountName();
        }else{
            $('#profile_submit').removeClass('disabled')
        }
    })

    function getAccountName(){
        var bank_code = $('#banks').val()
        var account_number = $('#account_number').val()
        $.ajax({
        type:'POST',
        async: false,
        dataType: 'json',
        url: "{{route('resolve_account')}}",
        data:{
            '_token' : $('meta[name="csrf-token"]').attr('content'),
            'bank_code': bank_code,
            'account_number': account_number,
        },
        success:function(data) {
            if(data.data){
                $('#account_name').val(data.data)
                $('#profile_submit').removeClass('disabled')
            }
            
            else if(!data.status){
                name = data.message;
                $('#account_name_error').text(name)
                $('#profile_submit').addClass('disabled')
            }
        },
        error: function (data, textStatus, errorThrown) {
            return false
        },
      })

    }
    
</script>
@endpush
