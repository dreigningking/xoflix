<!DOCTYPE html>
<html lang="en" data-bs-theme="light"><!--begin::Head-->

    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        {{-- <base href=""> --}}
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{asset('media/logos/fav.png')}}" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        
        @stack('styles')
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    </head>

<body id="kt_body" class="auth-bg">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-up -->
        <!--begin::Image placeholder-->
        <style>
            .auth-page-bg {
                background-image: url({{asset('media/illustrations/dozzy-1/14.png')}});
            }

            [data-bs-theme="dark"] .auth-page-bg {
                background-image: url({{asset('media/illustrations/dozzy-1/14-dark.png')}});
            }
        </style>
        <!--end::Image placeholder-->

        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed auth-page-bg">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="{{url('/')}}" class="mb-12">
                    <img alt="Logo" src="{{asset('media/logos/logo.png')}}"
                        class="h-50px theme-light-show">
                    
                </a>
                <!--end::Logo-->

                <!--begin::Wrapper-->
                @yield('main')
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->

            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-semibold fs-6">
                    <a href="#" class="text-muted text-hover-primary px-2">About</a>

                    <a href="#" class="text-muted text-hover-primary px-2">Support</a>

                    <a href="#" class="text-muted text-hover-primary px-2">Contact Us</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Main-->


    <!--begin::Javascript-->
    

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{asset('plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    @stack('scripts')

    <!--begin::Custom Javascript(used for this page only)-->
    
    <!--end::Custom Javascript-->
    <!--end::Javascript-->



    
</body><!--end::Body-->

</html>
