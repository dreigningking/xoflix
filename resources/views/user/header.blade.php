<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
    <!--begin: Pic-->
    <div class="me-7 mb-4">
        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
            <div class="symbol-label display-1 bg-light-primary text-primary rounded-circle"> {{$user->name[0]}} </div>
            <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
            </div>
        </div>
    </div>
    <!--end::Pic-->

    <!--begin::Info-->
    <div class="flex-grow-1">
        <!--begin::Title-->
        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
            <!--begin::User-->
            <div class="d-flex flex-column">
                <!--begin::Name-->
                <div class="d-flex align-items-center mb-2">
                    <a href="" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                        {{$user->name}}
                    </a>
                    {{-- <a href="https://preview.keenthemes.com/ceres-html-pro/?page=account/referrals#"
                        class="btn btn-sm btn-light-success fw-bold ms-2 fs-8 py-1 px-3"
                        data-bs-toggle="modal"
                        data-bs-target="#kt_modal_upgrade_plan">Affilate
                    </a> --}}
                </div>
                <!--end::Name-->

                <!--begin::Info-->
                <div class="d-flex flex-wrap fw-semibold fs-6 mb-0 pe-2">
                    {{-- <a href="#"
                        class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                        <i class="ki-duotone ki-profile-circle fs-4 me-1"><span
                                class="path1"></span><span class="path2"></span><span
                                class="path3"></span></i> Developer
                    </a>
                    <a href="#"
                        class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                        <i class="ki-duotone ki-geolocation fs-4 me-1"><span
                                class="path1"></span><span class="path2"></span></i> SF,
                        Bay Area
                    </a> --}}
                    <a href="#"
                        class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                        <i class="ki-duotone ki-sms fs-4 me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                              </svg>
                        </i>
                        {{$user->email}}
                    </a>
                </div>
                <!--end::Info-->
            </div>
            <!--end::User-->

            <!--begin::Actions-->
            <div class="d-flex my-4">
                

                <a href="{{route('profile')}}" class="btn btn-primary me-2 d-none d-md-block">Profile</a>

                <!--begin::Menu-->
                {{-- <div class="me-0">
                    <button
                        class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
                        data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <i class="ki-solid ki-dots-horizontal fs-2x"></i> </button>

                    <!--begin::Menu 3-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                        data-kt-menu="true">
                        <!--begin::Heading-->
                        <div class="menu-item px-3">
                            <div
                                class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                Payments
                            </div>
                        </div>
                        <!--end::Heading-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="https://preview.keenthemes.com/ceres-html-pro/?page=account/referrals#"
                                class="menu-link px-3">
                                Create Invoice
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="https://preview.keenthemes.com/ceres-html-pro/?page=account/referrals#"
                                class="menu-link flex-stack px-3">
                                Create Payment

                                <span class="ms-2" data-bs-toggle="tooltip"
                                    aria-label="Specify a target name for future usage and reference"
                                    data-bs-original-title="Specify a target name for future usage and reference"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information fs-6"><span
                                            class="path1"></span><span
                                            class="path2"></span><span
                                            class="path3"></span></i> </span>
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="https://preview.keenthemes.com/ceres-html-pro/?page=account/referrals#"
                                class="menu-link px-3">
                                Generate Bill
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3" data-kt-menu-trigger="hover"
                            data-kt-menu-placement="right-end">
                            <a href="https://preview.keenthemes.com/ceres-html-pro/?page=account/referrals#"
                                class="menu-link px-3">
                                <span class="menu-title">Subscription</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <!--begin::Menu sub-->
                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="https://preview.keenthemes.com/ceres-html-pro/?page=account/referrals#"
                                        class="menu-link px-3">
                                        Plans
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="https://preview.keenthemes.com/ceres-html-pro/?page=account/referrals#"
                                        class="menu-link px-3">
                                        Billing
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="https://preview.keenthemes.com/ceres-html-pro/?page=account/referrals#"
                                        class="menu-link px-3">
                                        Statements
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3">
                                        <!--begin::Switch-->
                                        <label
                                            class="form-check form-switch form-check-custom form-check-solid">
                                            <!--begin::Input-->
                                            <input
                                                class="form-check-input w-30px h-20px"
                                                type="checkbox" value="1"
                                                checked="checked" name="notifications">
                                            <!--end::Input-->

                                            <!--end::Label-->
                                            <span
                                                class="form-check-label text-muted fs-6">
                                                Recuring
                                            </span>
                                            <!--end::Label-->
                                        </label>
                                        <!--end::Switch-->
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu sub-->
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-1">
                            <a href="https://preview.keenthemes.com/ceres-html-pro/?page=account/referrals#"
                                class="menu-link px-3">
                                Settings
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu 3-->
                </div> --}}
                <!--end::Menu-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Title-->

        <!--begin::Stats-->
        <div class="d-flex flex-wrap flex-stack">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-grow-1 pe-8">
                <!--begin::Stats-->
                <div class="d-flex flex-wrap">
                <div class="d-flex">
                    <!--begin::Stat-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <span class="fs-4 fw-semibold text-info pb-1 px-2">Subscriptions</span>
                        <span class="fs-lg-2qx fw-bold d-flex justify-content-center">
                            <span data-kt-countup="true" data-kt-countup-value="{{$user->activeSubscriptions->count()}}">0</span>
                        </span>
                    </div>

                    <!--begin::Stat-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <span class="fs-4 fw-semibold text-primary pb-1 px-2">Referral </span>
                        <span class="fs-lg-2qx fw-bold d-flex justify-content-center">
                            <span data-kt-countup="true" data-kt-countup-value="{{$user->referrals->count()}}">0</span>
                        </span>
                        <!--end::Label-->
                    </div>
                    
                </div>
                <div class="d-flex">
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <span class="fs-4 fw-semibold text-info pb-1 px-2">Earnings</span>
                        <span class="fs-lg-2qx fw-bold d-flex justify-content-center">
                            ₦<span data-kt-countup="true" data-kt-countup-value="{{$user->earnings->sum('amount')}}">0</span>
                        </span>
                    </div>
                    <!--end::Stat-->

                    <!--begin::Stat-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                        
                        <span class="fs-4 fw-semibold text-success pb-1 px-2">Balance</span>
                        <span class="fs-lg-2qx fw-bold d-flex justify-content-center">
                            ₦<span data-kt-countup="true" data-kt-countup-value="{{$user->balance}}">0</span>
                        </span>
                        <!--end::Label-->
                    </div>
                    <!--end::Stat-->

                    <!--begin::Stat-->
                    
                    <!--end::Stat-->
                </div></div>
                <!--end::Stats-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Progress-->
            <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                    <span class="fw-semibold fs-6 text-gray-400">Profile
                        Completion</span>
                    <span class="fw-bold fs-6">
                        @if($user->phone && $user->account_name) 100 @elseif($user->phone) 70 @else 50 @endif%</span>
                </div>

                <div class="h-5px mx-3 w-100 bg-light mb-3">
                    <div class="bg-success rounded h-5px" role="progressbar"
                        style="width: 20%;" aria-valuenow="{{$user->phone && $user->account_name ? 100 : ($user->phone ? 70 : 50)}}" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                
            </div><a href="{{route('profile')}}" class="btn btn-primary me-8 d-md-none">Profile</a>
            <!--end::Progress-->
        </div>
        <!--end::Stats-->
    </div>
    <!--end::Info-->
</div>