<div class="card card-flush" data-kt-sticky="true" data-kt-sticky-name="account-navbar" data-kt-sticky-offset="{default: false, xl: '80px'}" data-kt-sticky-width="{lg: '250px', xl: '325px'}" data-kt-sticky-left="auto" data-kt-sticky-top="90px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
    <!--begin::Card header-->
    
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-10">
        <!--begin::Summary-->
        <div class="d-flex flex-start flex-column mb-5">
            <!--begin::Avatar-->
            
            <!--end::Avatar-->
            <!--begin::Name-->
            <a href="#" class="fs-2 text-gray-800 text-hover-primary fw-bolder mb-1">Admin Menu</a>
            <!--end::Name-->
            <!--begin::Position-->
            {{-- <div class="fs-6 fw-bold text-gray-400 mb-2">Software Enginer</div> --}}
            <!--end::Position-->
            <!--begin::Actions-->
            
            <!--end::Actions-->
        </div>
        <!--end::Summary-->
        <!--begin::Menu-->
        <ul class="menu menu-column menu-pill menu-title-gray-700 menu-bullet-gray-300 menu-state-bg menu-state-bullet-primary fw-bolder fs-5 mb-10 scroll-y h-400px" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-offset="0px">
            <!--begin::Menu item-->
            <li class="menu-item mb-1">
                <!--begin::Menu link-->
                <a class="menu-link px-6 py-4 @if(Route::is('admin.dashboard')) active @endif" href="{{route('admin.dashboard')}}">
                    <span class="menu-bullet">
                        <span class="bullet"></span>
                    </span>
                    <span class="menu-title">Overview</span>
                </a>
                <!--end::Menu link-->
            </li>
            <li class="menu-item mb-1">
                <!--begin::Menu link-->
                <a class="menu-link px-6 py-4 @if(Route::is('admin.subscriptions')) active @endif" href="{{route('admin.subscriptions')}}">
                    <span class="menu-bullet">
                        <span class="bullet"></span>
                    </span>
                    <span class="menu-title">Subscriptions</span>
                </a>
                <!--end::Menu link-->
            </li>
            <li class="menu-item mb-1">
                <!--begin::Menu link-->
                <a class="menu-link px-6 py-4 @if(Route::is('admin.trials')) active @endif" href="{{route('admin.trials')}}">
                    <span class="menu-bullet">
                        <span class="bullet"></span>
                    </span>
                    <span class="menu-title">Trials</span>
                </a>
                <!--end::Menu link-->
            </li>
            <li class="menu-item mb-1">
                <!--begin::Menu link-->
                <a class="menu-link px-6 py-4 @if(Route::is('admin.users')) active @endif" href="{{route('admin.users')}}">
                    <span class="menu-bullet">
                        <span class="bullet"></span>
                    </span>
                    <span class="menu-title">Users</span>
                </a>
                <!--end::Menu link-->
            </li>
            <!--begin::Menu item-->
            <li class="menu-item mb-1">
                <!--begin::Menu link-->
                <a class="menu-link px-6 py-4 @if(Route::is('admin.payments')) active @endif" href="{{route('admin.payments')}}">
                    <span class="menu-bullet">
                        <span class="bullet"></span>
                    </span>
                    <span class="menu-title">Payments</span>
                </a>
                <!--end::Menu link-->
            </li>
            <li class="menu-item mb-1">
                <!--begin::Menu link-->
                <a class="menu-link px-6 py-4 @if(Route::is('admin.withdrawals')) active @endif" href="{{route('admin.withdrawals')}}">
                    <span class="menu-bullet">
                        <span class="bullet"></span>
                    </span>
                    <span class="menu-title">Withdrawals</span>
                </a>
                <!--end::Menu link-->
            </li>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <li class="menu-item mb-1">
                <!--begin::Menu link-->
                <a class="menu-link px-6 py-4 @if(Route::is('admin.notifications')) active @endif" href="{{route('admin.notifications')}}">
                    <span class="menu-bullet">
                        <span class="bullet"></span>
                    </span>
                    <span class="menu-title">Notifications</span>
                </a>
                <!--end::Menu link-->
            </li>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <li class="menu-item mb-1">
                <!--begin::Menu link-->
                <a class="menu-link px-6 py-4 @if(Route::is('admin.activities')) active @endif" href="{{route('admin.activities')}}">
                    <span class="menu-bullet">
                        <span class="bullet"></span>
                    </span>
                    <span class="menu-title">Activities</span>
                </a>
                <!--end::Menu link-->
            </li>
            <!--end::Menu item-->
            <li class="menu-item mb-1">
                <!--begin::Menu link-->
                <a class="menu-link px-6 py-4 @if(Route::is('admin.plans.index')) active @endif" href="{{route('admin.plans.index')}}">
                    <span class="menu-bullet">
                        <span class="bullet"></span>
                    </span>
                    <span class="menu-title">Plans</span>
                </a>
                <!--end::Menu link-->
            </li>
            <!--begin::Menu item-->
            <li class="menu-item mb-1">
                <!--begin::Menu link-->
                <a class="menu-link px-6 py-4 @if(Route::is('admin.settings')) active @endif" href="{{route('admin.settings')}}">
                    <span class="menu-bullet">
                        <span class="bullet"></span>
                    </span>
                    <span class="menu-title">Settings</span>
                </a>
                <!--end::Menu link-->
            </li>

            <li class="menu-item mb-1">
                <!--begin::Menu link-->
                <a class="menu-link px-6 py-4 @if(Route::is('admin.sports')) active @endif" href="{{route('admin.sports')}}">
                    <span class="menu-bullet">
                        <span class="bullet"></span>
                    </span>
                    <span class="menu-title">Sports</span>
                </a>
                <!--end::Menu link-->
            </li>
            
            <li class="menu-item mb-1">
                <!--begin::Menu link-->
                <a class="menu-link px-6 py-4 @if(Route::is('admin.support')) active @endif" href="{{route('admin.support')}}">
                    <span class="menu-bullet">
                        <span class="bullet"></span>
                    </span>
                    <span class="menu-title">Support</span>
                </a>
                <!--end::Menu link-->
            </li>

            
            
            <!--end::Menu item-->
        </ul>
        <!--end::Menu-->
        <!--begin::Account info-->
        
        <!--end::Account info-->
    </div>
    <!--end::Card body-->
</div>