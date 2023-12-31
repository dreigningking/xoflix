<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <base href=""> --}}
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('media/logos/fav.png') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->

    @stack('styles')
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url({{ asset('media/patterns/header-bg.png') }})"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header align-items-stretch" data-kt-sticky="true"
                    data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <!--begin::Container-->
                    <div class="container-xxl d-flex align-items-center">
                        <!--begin::Heaeder menu toggle-->
                        <div class="d-flex align-items-center d-lg-none ms-n2 me-3" title="Show aside menu">
                            <div class="btn btn-icon btn-custom w-30px h-30px w-md-40px h-md-40px"
                                id="kt_header_menu_mobile_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end::Heaeder menu toggle-->
                        <!--begin::Header Logo-->
                        <div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">
                            <a href="https://xoflix.tv">
                                <img alt="Logo" src="{{ asset('media/logos/logo_white.png') }}"
                                    class="h-15px h-lg-50px logo-default" />
                                <img alt="Logo" src="{{ asset('media/logos/logo_dark.png') }}"
                                    class="h-15px h-lg-25px logo-sticky" />
                            </a>
                        </div>
                        <!--end::Header Logo-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                            <!--begin::Navbar-->
                            <div class="d-flex align-items-stretch" id="kt_header_nav">
                                <!--begin::Menu wrapper-->
                                <div class="header-menu align-items-stretch" data-kt-drawer="true"
                                    data-kt-drawer-name="header-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                                    data-kt-drawer-direction="start"
                                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                                    <!--begin::Desktop-->
                                    <div class="d-none d-md-flex menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                                        id="#kt_header_menu" data-kt-menu="true">

                                        <div class="menu-item me-lg-1">
                                            <a class="menu-link py-3" href="{{ route('dashboard') }}">
                                                <span class="menu-title">Dashboards</span>
                                                <span class="menu-arrow d-lg-none"></span>
                                            </a>

                                        </div>
                                        <div class="menu-item  me-lg-1">
                                            <a class="menu-link py-3" href="{{ route('subscription.purchase') }}">
                                                <span class="menu-title">Buy Subscription</span>

                                            </a>

                                        </div>
                                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                            data-kt-menu-placement="bottom-start"
                                            class="menu-item menu-lg-down-accordion me-lg-1">
                                            <span class="menu-link py-3">
                                                <span class="menu-title">FAQ</span>
                                                <span class="menu-arrow d-lg-none"></span>
                                            </span>

                                        </div>
                                        <div class="menu-item me-lg-1">
                                            <a class="menu-link py-3" href="{{ route('support') }}">
                                                <span class="menu-title">Support</span>
                                                
                                            </a>

                                        </div>
                                    </div>
                                    @auth
                                    <div class="d-md-none menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                                        id="#kt_header_menu" data-kt-menu="true">
                                        @if (auth()->user()->role == 'user')
                                            @include('layouts.menu.user_mobile')
                                        @else
                                            @include('layouts.menu.admin_mobile')
                                        @endif

                                    </div>
                                    @endauth
                                    <!--end::Menu-->
                                </div>
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::Navbar-->
                            <!--begin::Topbar-->
                            <div class="d-flex align-items-stretch flex-shrink-0">
                                <!--begin::Toolbar wrapper-->
                                <div class="topbar d-flex align-items-stretch flex-shrink-0">
                                    @auth
                                    <!--begin::Notifications-->
                                    <div class="d-flex align-items-center ms-1 ms-lg-3">
                                        <!--begin::Menu- wrapper-->
                                        <div class="btn btn-icon btn-custom btn-active-light position-relative w-35px h-35px w-md-40px h-md-40px"
                                            data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                            <i class="ki-duotone ki-notification-on fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>
                                            {{-- <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                        fill="black" />
                                                    <path
                                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                        fill="black" />
                                                    <path opacity="0.3"
                                                        d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                        fill="black" />
                                                    <path opacity="0.3"
                                                        d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                        fill="black" />
                                                </svg>
                                            </span> --}}
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px"
                                            data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="d-flex flex-column bgi-no-repeat rounded-top"
                                                style="background-image:url({{ asset('media/patterns/dropdown-header-bg.png') }}">
                                                <h3 class="text-white fw-bold px-9 mt-10 mb-6">Notifications
                                                    @if(!auth()->user()->unreadNotifications->count())
                                                    <span class="fs-8 opacity-75 ps-3">No notifications</span>
                                                    @endif
                                                </h3>
                                            </div>
                                            @if(auth()->user()->unreadNotifications->count())
                                            <div>
                                                <div class="scroll-y mh-325px my-5 px-8">
                                                    @foreach (auth()->user()->unreadNotifications->sortByDesc('created_at') as $notification)
                                                        <div class="d-flex flex-stack py-4">
                                                            <!--begin::Section-->
                                                            <div class="d-flex align-items-center me-2">
                                                                <a href="{{route('notifications')}}" class="text-gray-800 text-hover-primary fw-bold">
                                                                    {{$notification->data['subject']}}
                                                                </a>
                                                            </div>
                                                            <span class="badge badge-light fs-8">{{$notification->created_at->calendar()}}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="py-3 text-center border-top">
                                                    <a href="{{route('notifications')}}" class="btn btn-color-gray-600 btn-active-color-primary">View All
                                                        <span class="svg-icon svg-icon-5">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <!--end::Menu-->
                                        <!--end::Menu wrapper-->
                                    </div>
                                    <!--end::Notifications-->

                                    <!--begin::Chat-->
                                    <div class="d-flex align-items-center ms-1 ms-lg-3">
                                        <!--begin::Menu wrapper-->
                                        <a href="{{route('support')}}" class="btn btn-icon btn-custom btn-active-light position-relative w-30px h-30px w-md-40px h-md-40px">
                                            
                                            <i class="ki-duotone ki-message-text-2 fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                            
                                            <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
                                        </a>
                                        <!--end::Menu wrapper-->
                                    </div>

                                    
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center ms-1 ms-lg-3"
                                        id="kt_header_user_menu_toggle">
                                        <!--begin::Menu wrapper-->
                                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px"   data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                            @if (auth()->user()->image)
                                                <img alt="Pic" src="{{ auth()->user()->avatar }}">
                                            @else
                                                <div
                                                    class="symbol-label display-6 bg-light-primary text-primary rounded-circle">
                                                    {{ auth()->user()->name[0] }}
                                                </div>
                                            @endif
                                        </div>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content d-flex align-items-center px-3">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-50px me-5">
                                                        @if (auth()->user()->image)
                                                            <img alt="Pic" src="{{ auth()->user()->avatar }}">
                                                        @else
                                                            <div
                                                                class="symbol-label display-6 bg-light-primary text-primary rounded-circle">
                                                                {{ auth()->user()->name[0] }}
                                                            </div>
                                                        @endif

                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Username-->
                                                    <div class="d-flex flex-column">
                                                        <div class="fw-bolder d-flex align-items-center fs-5">
                                                            {{ ucwords(auth()->user()->name) }}
                                                        </div>
                                                        <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                                    </div>
                                                    <!--end::Username-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5">
                                                <a href="{{ route('profile') }}" class="menu-link px-5">My
                                                    Profile</a>
                                            </div>

                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5">
                                                @if(Session::has('admin'))
                                                <a href="{{route('admin.loginAs',session('admin'))}}" class="menu-link px-5">Back to Admin</a>
                                                @else
                                                <a href="{{ route('logout') }}" class="menu-link px-5"
                                                    onclick="event.preventDefault(); 
                                                    document.getElementById('logout-form').submit();">Sign
                                                    Out</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                                @endif
                                            </div>

                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->

                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                        <!--end::Menu wrapper-->
                                    </div>
                                    @else
                                    <div class="d-flex align-items-center ms-1 ms-lg-3">
                                        <a class="btn bg-white bg-opacity-20 bg-hover-white text-hover-primary text-white fw-bold py-3" href="{{ route('login') }}">
                                            <span class="">Login</span>
                                            
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center ms-1 ms-lg-3">
                                        <a class="btn bg-white bg-opacity-20 bg-hover-white text-hover-primary text-white fw-bold py-3" href="{{ route('register') }}">
                                            <span class="">Register</span>
                                            {{-- <span class="menu-arrow d-lg-none"></span> --}}
                                        </a>

                                    </div>
                                    @endauth
                                </div>
                                <!--end::Toolbar wrapper-->
                            </div>
                            <!--end::Topbar-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Toolbar-->
                <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
                    <!--begin::Container-->
                    @yield('breadcrumb')
                    <!--end::Container-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Container-->
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <!--begin::Post-->
                    @yield('main')
                    <!--end::Post-->
                </div>
                <!--end::Container-->
                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-end">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class=" fw-bold me-1">© XOFLIX</span>
                            <span class="text-gray-800">2021 </span>
                        </div>

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>



    <div class="modal fade" id="addtrial" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Add Trials</h2>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-1 mx-xl-1">

                    
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    @yield('modals')
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->

    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <script src="//code.tidio.co/o7vudv9lxjxuxogkssx9ywmgdwwoqqrx.js" async></script>
    @stack('scripts')
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('js/custom/widgets.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    <script>
        $(document).ready(function(){
            regcontent = $('.reg-cont').last().prop("outerHTML");
        })
        $('.select-remote').select2({
            width: 'resolve',
            ajax: {
                url: "{{ route('admin.users') }}",
                dataType: 'json',
                cache: true,
                data: function(params) {
                    var query = {
                        search: params.term,
                    }
                    return query;
                },
                processResults: function(data) {
                    var data = $.map(data.data, function(obj) {
                        obj.text = obj.name;
                        return obj;
                    });
                    return {
                        results: data
                    };
                }
            }
        })
        // $('.subscriber-remote').select2({
        //     width: 'resolve',
        //     ajax: {
        //         url: "",
        //         dataType: 'json',
        //         cache: true,
        //         data: function(params) {
        //             var query = {
        //                 search: params.term,
        //             }
        //             return query;
        //         },
        //         processResults: function(data) {
        //             var data = $.map(data.data, function(obj) {
        //                 obj.text = obj.plan.name +':' + obj.duration +' Months:'+ obj.user.name;
        //                      // replace name with the property used for the text
        //                 return obj;
        //             });
        //             return {
        //                 results: data
        //             };
        //         }
        //     }
        // })

        // $('.copy_button').on('click', function() {

        //     const attribute = $(this).attr('data-clipboard-target')
        //     const button = document.getElementById('_' + attribute.slice(1))
        //     const target = document.getElementById(attribute.slice(1));
        //     const clipboard = new ClipboardJS(button, {
        //         target: target,
        //         text: function() {
        //             return target.innerHTML;
        //         }
        //     });
        //     console.log('sometimes')
        //     clipboard.on('success', function(e) {
        //         var checkIcon = button.querySelector('.bi.bi-check');
        //         var svgIcon = button.querySelector('.svg-icon');

        //         // Exit check icon when already showing
        //         if (checkIcon) {
        //             return;
        //         }

        //         // Create check icon
        //         checkIcon = document.createElement('i');
        //         checkIcon.classList.add('bi');
        //         checkIcon.classList.add('bi-check');
        //         checkIcon.classList.add('fs-2x');
        //         // Append check icon
        //         button.appendChild(checkIcon);

        //         // Highlight target
        //         const classes = ['text-success', 'fw-boldest'];
        //         target.classList.add(...classes);

        //         // Hide copy icon
        //         svgIcon.classList.add('d-none');

        //         // Revert button label after 3 seconds
        //         setTimeout(function() {
        //             // Remove check icon
        //             svgIcon.classList.remove('d-none');

        //             // Revert icon
        //             button.removeChild(checkIcon);

        //             // Remove target highlight
        //             target.classList.remove(...classes);

        //         }, 3000)
        //     });
        // })

        pasteButton = document.getElementsByClassName('paste_button');
        for (var i = 0; i < pasteButton.length; i++) {
            pasteButton[i].addEventListener('click', async (e) => {
                let input = e.target.parentElement.querySelector("input")
                try {
                    const text = await navigator.clipboard.readText()
                    input.value = text;
                }catch (error) {
                    console.log('Failed to read clipboard');
                }
            })
        }


        document.getElementsByClassName('copy_button').forEach(function(el) {
            el.addEventListener('click', async () => {
                let clipvalue = el.parentElement.querySelector(".clipboard_value").innerHTML
                console.log(clipvalue)
                try {
                    await navigator.clipboard.writeText(clipvalue)
                    el.querySelector('.copy_icon').style.display = "none";
                    el.querySelector('.check_icon').style.display = "initial";
                    setTimeout(function() {
                        el.querySelector('.copy_icon').style.display = "initial";
                        el.querySelector('.check_icon').style.display = "none";
                    }, 3000)
                }catch (error) {
                    console.log('Failed to read clipboard');
                }
            });
        })

        
    </script>
</body>
<!--end::Body-->

</html>
