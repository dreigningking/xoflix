@extends('layouts.app')
@section('main')
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Layout - Activity-->
        <div class="d-flex flex-column flex-xl-row">
            <!--begin::Sidebar-->
            <div class="d-none d-md-flex flex-column flex-lg-row-auto w-100 w-xl-325px mb-10">
                <!--begin::Card-->
                @include('layouts.menu.admin_desktop')
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-10">
                <!--begin::Timeline-->
                <div class="card">
                    <form action="{{route('admin.settings')}}" method="post">@csrf
                        <!--begin::Card head-->
                        <div class="card-header card-header-stretch">
                            <!--begin::Title-->
                            <div class="card-title d-flex align-items-center">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->

                                <h3 class="fw-bolder m-0 text-gray-800">Settings</h3>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->

                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card head-->
                        <!--begin::Card body-->
                        <div class="card-body">
                            
                                <div class="card-body border-top py-0 px-9">
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Subscription 1 Month</label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="number" value="{{$settings->firstWhere('name','subscription_1month')->value}}" name="subscription_1month" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                        placeholder="">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Subscription 3 Month</label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="number" value="{{$settings->firstWhere('name','subscription_3month')->value}}" name="subscription_3month" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                        placeholder="" >
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Subscription 6 Month</label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="number" value="{{$settings->firstWhere('name','subscription_6month')->value}}" name="subscription_6month" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                        placeholder="" >
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Subscription 12 Month</label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="number" value="{{$settings->firstWhere('name','subscription_12month')->value}}" name="subscription_12month" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                        placeholder="">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Referral Bonus %</label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="number" value="{{$settings->firstWhere('name','referral_bonus_percentage')->value}}" name="referral_bonus_percentage" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                        placeholder="" >
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Minimum Withdrawal </label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="number" name="minimum_withdrawal" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                        placeholder="" value="{{$settings->firstWhere('name','minimum_withdrawal')->value}}">
                                            
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Maximum Withdrawal </label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="number" name="maximum_withdrawal" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                        placeholder="" value="{{$settings->firstWhere('name','maximum_withdrawal')->value}}">
                                            
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Pagination </label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="number" name="pagination" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                        placeholder="" value="{{$settings->firstWhere('name','pagination')->value}}">
                                            <div class="form-text">
                                                How many records per page.
                                            </div>
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                </div>
                                
                            
                        </div>
                        <div class="card-header border-0">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Email Preferences</h3>
                            </div>
                        </div>
                        <!--begin::Card header-->
                        <!--begin::Content-->
                        <div class="card-body pt-0">
                            <!--begin::Form-->
                            
                                <!--begin::Card body-->
                                <div class="card-body border-top px-9 py-9">
                                    <!--begin::Option-->
                                    <label class="form-check form-check-custom form-check-solid align-items-start">
                                        <!--begin::Input-->
                                        <input type='hidden' value='0' id="get_payment_email" name='get_payment_email'>
                                        <input class="form-check-input me-3" type="checkbox" name="get_payment_email" value="1" @if($settings->firstWhere('name','get_payment_email')->value) checked @endif>
                                        <!--end::Input-->

                                        <!--begin::Label-->
                                        <span class="form-check-label d-flex flex-column align-items-start">
                                            <span class="fw-bold fs-5 mb-0">Successful Payments</span>
                                            <span class="text-muted fs-6">Receive a notification for every successful
                                                payment.</span>
                                        </span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Option-->

                                    <!--begin::Option-->
                                    <div class="separator separator-dashed my-6"></div>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label class="form-check form-check-custom form-check-solid align-items-start">
                                        <!--begin::Input-->
                                        <input type='hidden' value='0' id="get_withdrawal_email" name='get_withdrawal_email'>
                                        <input class="form-check-input me-3" type="checkbox" name="get_withdrawal_email"
                                        @if($settings->firstWhere('name','get_withdrawal_email')->value) checked @endif value="1">
                                        <!--end::Input-->

                                        <!--begin::Label-->
                                        <span class="form-check-label d-flex flex-column align-items-start">
                                            <span class="fw-bold fs-5 mb-0">Withdrawal</span>
                                            <span class="text-muted fs-6">Receive a notification for every initiated
                                                payout.</span>
                                        </span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Option-->

                                    <!--begin::Option-->
                                    <div class="separator separator-dashed my-6"></div>
                                    <!--end::Option-->
                                    
                                    <label class="form-check form-check-custom form-check-solid align-items-start">
                                        <!--begin::Input-->
                                        <input type='hidden' value='0' id="send_subscription_email" name='send_subscription_email'>
                                        <input class="form-check-input option me-3" type="checkbox" name="send_subscription_email"
                                        @if($settings->firstWhere('name','send_subscription_email')->value) checked @endif value="1">
                                        <!--end::Input-->
                                        
                                        <!--begin::Label-->
                                        <span class="form-check-label d-flex flex-column align-items-start">
                                            <span class="fw-bold fs-5 mb-0">Subscription</span>
                                            <span class="text-muted fs-6">Send subscription details to users by email.</span>
                                        </span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <div class="separator separator-dashed my-6"></div>
                                    <!--end::Option-->
                                    
                                    <label class="form-check form-check-custom form-check-solid align-items-start">
                                        <!--begin::Input-->
                                        <input type='hidden' value='0' id="get_support_email" name='get_support_email'>
                                        <input class="form-check-input me-3" type="checkbox" name="get_support_email"
                                        @if($settings->firstWhere('name','get_support_email')->value) checked @endif value="1">
                                        <!--end::Input-->

                                        <!--begin::Label-->
                                        <span class="form-check-label d-flex flex-column align-items-start">
                                            <span class="fw-bold fs-5 mb-0">Support</span>
                                            <span class="text-muted fs-6">Receive Support Messages by email.</span>
                                        </span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Option-->
                                    
                                    <!--end::Option-->

                                    
                                </div>
                                <!--end::Card body-->

                                <!--begin::Card footer-->
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                    <button class="btn btn-primary  px-6">Save Changes</button>
                                </div>
                                <!--end::Card footer-->
                            
                            <!--end::Form-->
                        </div>
                    </form>
                </div>

                 
                {{--
                <div class="card  mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_notifications" aria-expanded="true" aria-controls="kt_account_notifications">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Notifications</h3>
                        </div>
                    </div>
                    <!--begin::Card header-->
                
                    <!--begin::Content-->
                    <div id="kt_account_settings_notifications" class="collapse show">
                        <!--begin::Form-->
                        <form class="form">
                            <!--begin::Card body-->
                            <div class="card-body border-top px-9 pt-3 pb-4">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-row-dashed border-gray-300 align-middle gy-6">
                                        <tbody class="fs-6 fw-semibold">
                                            <!--begin::Table row-->
                                            <tr>
                                                <td class="min-w-250px fs-4 fw-bold">Notifications</td>
                                                <td class="w-125px">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_email" checked="" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=email]">
                                                        <label class="form-check-label ps-2" for="kt_settings_notification_email">
                                                            Email
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="w-125px">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_phone" checked="" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=phone]">
                                                        <label class="form-check-label ps-2" for="kt_settings_notification_phone">
                                                            Phone
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--begin::Table row-->
                
                                            <!--begin::Table row-->
                                            <tr>
                                                <td>Billing Updates</td>
                                                <td>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" id="billing1" checked="" data-kt-settings-notification="email">
                                                        <label class="form-check-label ps-2" for="billing1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="billing2" checked="" data-kt-settings-notification="phone">
                                                        <label class="form-check-label ps-2" for="billing2"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--begin::Table row-->
                
                                            <!--begin::Table row-->
                                            <tr>
                                                <td>New Team Members</td>
                                                <td>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="team1" checked="" data-kt-settings-notification="email">
                                                        <label class="form-check-label ps-2" for="team1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="team2" data-kt-settings-notification="phone">
                                                        <label class="form-check-label ps-2" for="team2"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--begin::Table row-->
                
                                            <!--begin::Table row-->
                                            <tr>
                                                <td>Completed Projects</td>
                                                <td>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="project1" data-kt-settings-notification="email">
                                                        <label class="form-check-label ps-2" for="project1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="project2" checked="" data-kt-settings-notification="phone">
                                                        <label class="form-check-label ps-2" for="project2"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--begin::Table row-->
                
                                            <!--begin::Table row-->
                                            <tr>
                                                <td class="border-bottom-0">Newsletters</td>
                                                <td class="border-bottom-0">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="newsletter1" data-kt-settings-notification="email">
                                                        <label class="form-check-label ps-2" for="newsletter1"></label>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="newsletter2" data-kt-settings-notification="phone">
                                                        <label class="form-check-label ps-2" for="newsletter2"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--begin::Table row-->
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                
                            <!--begin::Card footer-->
                            
                            <!--end::Card footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div> --}}

            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout - Activity-->
    </div>
@endsection
